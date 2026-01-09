<table id="templateTable" class="table table-bordered border-primary table-hover text-center">
    <thead class="bg-light-primary">
        <tr>
            <th>S.NO</th>
            <th>TEMPLATE NAME</th>
            <th>MESSAGE</th>
            <th>DATE TIME</th>
            <th>ACTIONS</th>
        </tr>
    </thead>

    <tbody style="font-size: 14px !important;">
        @forelse($templates as $key => $row)
            <tr>
                <td>{{ $templates->firstItem() + $key }}</td>

                <td class="">{{ $row->template_name }}</td>
                <td class="text-start">{{ $row->message }}</td>
                <td>{{ date('Y-m-d H:i:s', strtotime($row->created_at)) }}</td>
                <td>
                    <button type="button" data-id="{{ $row->id }}"
                        class="btn badge-light-success f-w-500 editTemplate" title="Edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <button type="button" data-id="{{ $row->id }}"
                        class="btn badge-light-danger f-w-500 deleteTemplate" title="Delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>

        @endforeach
    </tbody>
</table>

@if ($templates instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div id="indexTablePagination" style="float: right;" class="mt-3">
        {{ $templates->links('custom_pagination') }}
    </div>
@endif
