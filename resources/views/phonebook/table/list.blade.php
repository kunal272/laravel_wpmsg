<table id="phonebookTable" class="table table-bordered border-primary table-hover text-center">
    <thead class="bg-light-primary">
        <tr>
            <th>S.NO</th>
            <th>PHONEBOOK NAME</th>
            <th>NUMBER COUNT</th>
            <th>DATE TIME</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody class="text-center" style="font-size: 14px !important;">
        @forelse($phonebooks as $key => $row)
            <tr>
                <td>{{ $phonebooks->firstItem() + $key }}</td>
                <td class="text-primary">{{ $row->name }}</td>
                <td>{{ $row->total_numbers }}</td>
                <td>{{ date('Y-m-d H:i:s', strtotime($row->created_at)) }}</td>
                <td>
                    <button type="button" data-id="{{ $row->id }}" class="btn btn-sm btn-info viewPhonebook" title="View"><i
                            class="fa-solid fa-eye"></i></button>
                    <button type="button" data-id="{{ $row->id }}" class="btn btn-sm btn-success editPhonebook"
                        title="Edit"><i class="fa-solid fa-pen-to-square" title="Edit"></i></button>
                    <button type="button" data-id="{{ $row->id }}" class="btn btn-sm btn-danger deletePhonebook"
                        title="Delete"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($phonebooks instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div id="indexTablePagination" style="float: right;" class="mt-3">
        {{ $phonebooks->links('custom_pagination') }}
    </div>
@endif
