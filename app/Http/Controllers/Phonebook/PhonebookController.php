<?php

namespace App\Http\Controllers\Phonebook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Helper\ActionHelper;

class PhonebookController extends Controller
{
    /**
     * List Phonebooks (GET)
     */
    public function index()
    {
        $phonebooks = DB::table('phonebooks')
            ->count();

        return view('phonebook.index', compact('phonebooks'));
    }

    /**
     * AJAX Data Load (POST)
     */
    public function getData(Request $request)
    {
        try {
            $phonebooks = DB::table('phonebooks')
                ->orderBy('id', 'desc')
                ->paginate(10);

            return view('phonebook.table.list', compact('phonebooks'));
        } catch (\Exception $e) {
            info('Error at PhonebookController getData :' . $e->getMessage());
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }

    /**
     * Store Phonebook + CSV/XLSX (POST)
     */
    public function add(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'phonebook_name' => 'required|string|max:150',
                'file' => 'required|file|mimetypes:text/csv,text/plain,application/vnd.ms-excel'
            ],
            [
                'phonebook_name.required' => 'Phonebook name is required',
                'phonebook_name.max'      => 'Phonebook name must not exceed 150 characters',
                'file.required'           => 'Please upload a CSV or Excel file',
                'file.mimetypes'          => 'Only CSV or XLSX files are allowed'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        DB::beginTransaction();

        try {
            $phonebookId = DB::table('phonebooks')->insertGetId([
                'user_id' => Auth::id(),
                'name' => $request->phonebook_name,
                'total_numbers' => 0,
                'created_at' => now()
            ]);

            $rows = Excel::toArray([], $request->file('file'))[0];

            if (count($rows) < 2) {
                return response()->json(['error' => 'File is empty']);
            }

            /* ================= HEADER VALIDATION ================= */
            $header = array_map('strtolower', array_map('trim', $rows[0]));

            if ($header[0] !== 'name' || $header[1] !== 'mobile') {
                return response()->json([
                    'error' => 'Invalid file format. First column must be "name" and second column must be "mobile".'
                ]);
            }

            /* ================= ROW VALIDATION ================= */
            $count = 0;

            foreach ($rows as $index => $row) {

                if ($index === 0) continue; // skip header

                $name   = trim($row[0] ?? '');
                $mobile = preg_replace('/\D/', '', $row[1] ?? '');

                if ($name === '' || $mobile === '') {
                    continue; // skip empty rows
                }

                if (!preg_match('/^[6-9]\d{9}$/', $mobile)) {
                    continue; // invalid Indian mobile
                }

                DB::table('phonebook_contacts')->insert([
                    'phonebook_id' => $phonebookId,
                    'name' => $name,
                    'mobile' => $mobile,
                    'created_at' => now()
                ]);

                $count++;
            }

            if ($count === 0) {
                DB::rollBack();
                return response()->json(['error' => 'No valid contacts found in file']);
            }

            DB::table('phonebooks')
                ->where('id', $phonebookId)
                ->update(['total_numbers' => $count]);

            DB::commit();

            try {
                $phonebookInfo = DB::connection('mysql')
                    ->table('phonebooks')
                    ->where('id', $phonebookId)->first();
                ActionHelper::saveAction(
                    "Phonebook added successfully...",
                    $phonebookInfo->name,
                    Auth::user()->id
                );
            } catch (\Exception $e) {
                info($e->getMessage());
                return response()->json(['error' => substr($e->getMessage(), 0, 126)]);
            }

            return response()->json(['success' => 'Phonebook added successfully']);
        } catch (\Exception $e) {
            info('Error at DeviceController getData :' . $e->getMessage());
            DB::rollBack();
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }

    /**
     * View Contacts (GET)
     */
    public function view(Request $request)
    {
        try {
            if (!$request->id) {
                return response()->json(['error' => 'Phonebook ID required']);
            }

            $phonebook = DB::table('phonebooks')->where('id', $request->id)->first();

            if (!$phonebook) {
                return response()->json(['error' => 'Phonebook not found']);
            }

            $contacts = DB::table('phonebook_contacts')
                ->where('phonebook_id', $request->id)
                ->get();

            return view('phonebook.modal.viewPhonebook', compact('phonebook', 'contacts'));
        } catch (\Exception $e) {
            DB::rollBack();
            info('Error at PhonebookController view :' . $e->getMessage());
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json([
                    'error' => substr($e->getMessage(), 0, 126),
                    'string' => $e->__toString()
                ]);
            } else {
                return response()->json(['error' => 'Something went wrong..!']);
            }
        }
    }

    /**
     * Delete Phonebook (POST)
     */
    public function delete(Request $request)
    {
        // dd($request->all());

        $id = $request->id;

        if (!$id) {
            return response()->json(['error' => 'Phonebook id required.']);
        }

        DB::beginTransaction();

        try {
            DB::table('phonebook_contacts')->where('phonebook_id', $id)->delete();
            DB::table('phonebooks')->where('id', $id)->delete();

            DB::commit();

            try {
                $phonebookInfo = DB::connection('mysql')
                    ->table('phonebooks')
                    ->where('id', $id)->first();
                ActionHelper::saveAction(
                    "Phonebook deleted successfully...",
                    $phonebookInfo->name,
                    Auth::user()->id
                );
            } catch (\Exception $e) {
                info($e->getMessage());
                return response()->json(['error' => substr($e->getMessage(), 0, 126)]);
            }

            return response()->json(['success' => 'Phonebook deleted successfully.']);
        } catch (\Exception $e) {
            info('Error at phonebookController Delete :' . $e->getMessage());
            DB::rollBack();
            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }

    public function edit(Request $request)
    {
        // dd($request->all());

        $id = $request->id;

        if (!$id) {
            return response()->json(['error' => 'Phonebook id required.']);
        }
        try {
            $phonebook = DB::table('phonebooks')->where('id', $id)->first();

            return view('phonebook.modal.editPhoneBook', compact('phonebook'));
        } catch (\Exception $e) {
            info('Error at phonebookController edit :' . $e->getMessage());

            if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
                return response()->json(['error' => substr($e->getMessage(), 0, 126), 'string' => $e->__toString()]);
            } else {
                return response()->json(['error' => "Something went wrong..!"]);
            }
        }
    }

    // public function update(Request $request)
    // {
    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             'id'             => 'required|exists:phonebooks,id',
    //             'phonebook_name' => 'required|string|max:150',
    //             'file'           => 'nullable|file|mimes:csv,xlsx|max:10240'
    //         ],
    //         [
    //             'phonebook_name.required' => 'Phonebook name is required',
    //             'phonebook_name.max'      => 'Phonebook name must not exceed 150 characters',
    //             'file.mimes'              => 'Only CSV or XLSX files are allowed'
    //         ]
    //     );

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()->first()]);
    //     }

    //     DB::beginTransaction();

    //     try {
    //         // Update phonebook name
    //         DB::table('phonebooks')
    //             ->where('id', $request->id)
    //             ->update([
    //                 'name' => $request->phonebook_name,
    //                 'updated_at' => now()
    //             ]);

    //         //If new file uploaded, replace contacts
    //         if ($request->hasFile('file')) {

    //             // Delete old contacts
    //             DB::table('phonebook_contacts')
    //                 ->where('phonebook_id', $request->id)
    //                 ->delete();

    //             $rows = Excel::toArray([], $request->file('file'))[0];
    //             $count = 0;

    //             foreach ($rows as $index => $row) {

    //                 if ($index === 0) continue; // skip header
    //                 if (empty($row[0])) continue;

    //                 DB::table('phonebook_contacts')->insert([
    //                     'phonebook_id' => $request->id,
    //                     'name'         => $row[0] ?? null,
    //                     'mobile'       => preg_replace('/\D/', '', $row[1]),
    //                     'created_at'   => now()
    //                 ]);

    //                 $count++;
    //             }

    //             // Update total numbers
    //             DB::table('phonebooks')
    //                 ->where('id', $request->id)
    //                 ->update(['total_numbers' => $count]);
    //         }

    //         DB::commit();

    //         try {
    //             $phonebookInfo = DB::connection('mysql')
    //                 ->table('phonebooks')
    //                 ->where('id', $request->id)->first();
    //             ActionHelper::saveAction(
    //                 "Phonebook deleted successfully...",
    //                 $phonebookInfo->name,
    //                 Auth::user()->id
    //             );
    //         } catch (\Exception $e) {
    //             info($e->getMessage());
    //             return response()->json(['error' => substr($e->getMessage(), 0, 126)]);
    //         }

    //         return response()->json(['success' => 'Phonebook updated successfully']);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         info('Error at PhonebookController update :' . $e->getMessage());
    //         if (in_array($_SERVER['REMOTE_ADDR'], config()->get('constant.Setting.AdminIpList'))) {
    //             return response()->json([
    //                 'error' => substr($e->getMessage(), 0, 126),
    //                 'string' => $e->__toString()
    //             ]);
    //         } else {
    //             return response()->json(['error' => 'Something went wrong..!']);
    //         }
    //     }
    // }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id'             => 'required|exists:phonebooks,id',
                'phonebook_name' => 'required|string|max:150',
                'file'           => 'nullable|file|mimetypes:text/csv,text/plain,application/vnd.ms-excel'
            ],
            [
                'phonebook_name.required' => 'Phonebook name is required',
                'phonebook_name.max'      => 'Phonebook name must not exceed 150 characters',
                'file.mimetypes'         => 'Only CSV or XLSX files are allowed'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        DB::beginTransaction();

        try {

            // Update phonebook name
            DB::table('phonebooks')
                ->where('id', $request->id)
                ->update([
                    'name' => $request->phonebook_name,
                    'updated_at' => now()
                ]);

            // If new file uploaded, replace contacts
            if ($request->hasFile('file')) {

                $rows = Excel::toArray([], $request->file('file'))[0];

                if (count($rows) < 2) {
                    return response()->json(['error' => 'Uploaded file is empty']);
                }

                /* ================= HEADER VALIDATION ================= */
                $header = array_map('strtolower', array_map('trim', $rows[0]));

                if (
                    !isset($header[0], $header[1]) ||
                    $header[0] !== 'name' ||
                    $header[1] !== 'mobile'
                ) {
                    return response()->json([
                        'error' => 'Invalid file format. First column must be "name" and second column must be "mobile".'
                    ]);
                }

                // Delete old contacts
                DB::table('phonebook_contacts')
                    ->where('phonebook_id', $request->id)
                    ->delete();

                $count = 0;

                foreach ($rows as $index => $row) {

                    if ($index === 0) continue; // skip header

                    $name   = trim($row[0] ?? '');
                    $mobile = preg_replace('/\D/', '', $row[1] ?? '');

                    if ($name === '' || $mobile === '') {
                        continue; // skip empty rows
                    }

                    // Indian mobile validation
                    if (!preg_match('/^[6-9]\d{9}$/', $mobile)) {
                        continue;
                    }

                    DB::table('phonebook_contacts')->insert([
                        'phonebook_id' => $request->id,
                        'name'         => $name,
                        'mobile'       => $mobile,
                        'created_at'   => now()
                    ]);

                    $count++;
                }

                if ($count === 0) {
                    DB::rollBack();
                    return response()->json(['error' => 'No valid contacts found in file']);
                }

                // Update total numbers
                DB::table('phonebooks')
                    ->where('id', $request->id)
                    ->update(['total_numbers' => $count]);
            }

            DB::commit();

            try {
                $phonebookInfo = DB::connection('mysql')
                    ->table('phonebooks')
                    ->where('id', $request->id)->first();
                ActionHelper::saveAction(
                    "Phonebook updated successfully...",
                    $phonebookInfo->name,
                    Auth::user()->id
                );
            } catch (\Exception $e) {
                info($e->getMessage());
                return response()->json(['error' => substr($e->getMessage(), 0, 126)]);
            }

            return response()->json(['success' => 'Phonebook updated successfully']);
        } catch (\Exception $e) {

            DB::rollBack();
            info('Error at PhonebookController update :' . $e->getMessage());

            if (in_array($_SERVER['REMOTE_ADDR'], config('constant.Setting.AdminIpList'))) {
                return response()->json([
                    'error' => substr($e->getMessage(), 0, 126),
                    'string' => $e->__toString()
                ]);
            }

            return response()->json(['error' => 'Something went wrong..!']);
        }
    }
}
