<table id="ActionLogsTable" class="table table-bordered border-primary table-hover text-center">
    <thead class="bg-light-primary">
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Action</th>
            <th>Description</th>
            <th>Indate</th>
        </tr>
    </thead>
    <tbody class="text-center" style="font-size: 14px !important;">
        @foreach ($actionlogs as $key => $act)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $act->username }}</td>
                <td>{{ $act->Action }}</td>
                <td>{{ $act->Description }}</td>
                <td>{{ $act->Indate }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($actionlogs instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div id="indexTablePagination" style="float: right;" class="mt-3">
        {{ $actionlogs->links('custom_pagination') }}
    </div>
@endif
