<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    /**
     * List Templates (GET)
     */
    public function index()
    {
        $templates = DB::table('whatsapp_templates')
            ->where('user_id', Auth::user()->id)
            ->count();

        return view('template.index', compact('templates'));
    }

    /**
     * AJAX Data Load (POST)
     */
    public function getData(Request $request)
    {
        try {
            $templates = DB::table('whatsapp_templates')
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->paginate(10);

            return view('template.table.list', compact('templates'));
        } catch (\Exception $e) {
            info('Error at TemplateController getData :' . $e->getMessage());

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
     * add Template (POST)
     */
    public function add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'template_name' => 'required|string|max:100',
                'message'       => 'required|string'
            ],
            [
                'template_name.required' => 'Template name is required',
                'template_name.max'      => 'Template name must not exceed 100 characters',
                'message.required'       => 'Message text is required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        try {
            DB::table('whatsapp_templates')->insert([
                'user_id'       => Auth::user()->id,
                'template_name' => $request->template_name,
                'message'       => $request->message,
                'created_at'    => now()
            ]);

            return response()->json(['success' => 'Template added successfully']);
        } catch (\Exception $e) {
            info('Error at TemplateController store :' . $e->getMessage());

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
     * Edit Template (POST)
     */
    public function edit(Request $request)
    {
        if (!$request->id) {
            return response()->json(['error' => 'Template ID required']);
        }

        try {
            $template = DB::table('whatsapp_templates')
                ->where('id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->first();

            if (!$template) {
                return response()->json(['error' => 'Template not found']);
            }

            return response()->json($template);
        } catch (\Exception $e) {
            info('Error at TemplateController edit :' . $e->getMessage());

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
     * Update Template (POST)
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id'            => 'required|exists:whatsapp_templates,id',
                'template_name' => 'required|string|max:100',
                'message'       => 'required|string'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        try {
            DB::table('whatsapp_templates')
                ->where('id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->update([
                    'template_name' => $request->template_name,
                    'message'       => $request->message,
                    'updated_at'    => now()
                ]);

            return response()->json(['success' => 'Template updated successfully']);
        } catch (\Exception $e) {
            info('Error at TemplateController update :' . $e->getMessage());

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
     * Delete Template (POST)
     */
    public function delete(Request $request)
    {
        if (!$request->id) {
            return response()->json(['error' => 'Template ID required']);
        }

        try {
            DB::table('whatsapp_templates')
                ->where('id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->delete();

            return response()->json(['success' => 'Template deleted successfully']);
        } catch (\Exception $e) {
            info('Error at TemplateController delete :' . $e->getMessage());

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
}
