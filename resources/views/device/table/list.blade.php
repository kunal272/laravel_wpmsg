<table id="deviceTable" class="table table-bordered border-primary table-hover text-center">
    <thead class="bg-light-primary">
        <tr>
            <th>#</th>
            <th>Device Name</th>
            <th>Sender</th>
            <th>Token</th>
            <th>Timestamp</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="text-center" style="font-size: 14px !important;">
        @foreach ($devices as $i => $d)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $d->device_name }}</td>
                <td>{{ $d->mobile_number }}</td>
                <td>{{ $d->api_token }}</td>
                <td>{{ $d->created_at }}</td>
                <td>
                    <span class="badge bg-{{ $d->status == 'ONLINE' ? 'success' : 'danger' }}">
                        {{ $d->status }}
                    </span>
                </td>
                <td>
                    @if ($d->status == 'ONLINE')
                        <button class="btn btn-sm btn-warning btn-logout" data-id={{ $d->user_id }}
                            data-mobile="{{ $d->mobile_number }}">
                            Logout
                        </button>
                    @else
                        <button class="btn btn-sm btn-success btn-scan" data-id={{ $d->user_id }}
                            data-mobile="{{ $d->mobile_number }}">
                            Scan
                        </button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    @endif

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($devices instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div id="indexTablePagination" style="float: right;" class="mt-3">
        {{ $devices->links('custom_pagination') }}
    </div>
@endif
