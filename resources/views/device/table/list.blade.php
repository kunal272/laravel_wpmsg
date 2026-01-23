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
                {{-- <td>{{ $d->api_token }}</td> --}}
                <td>
                    {{ $d->api_token }}
                    <i class="fa-solid fa-copy text-primary copy-token" style="cursor:pointer; margin-left: 8px;"
                        data-token="{{ $d->api_token }}" title="Click to copy token">
                    </i>
                </td>

                <td>{{ $d->created_at }}</td>
                <td>
                    <span class="badge bg-{{ $d->status == 'ONLINE' ? 'success' : 'danger' }}">
                        {{ $d->status }}
                    </span>
                </td>
                <td>
                    @if ($d->status == 'ONLINE')
                        <button class="btn badge-light-warning btn-logout" data-id="{{ $d->id }}"
                            data-mobile="{{ $d->mobile_number }}">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    @else
                        <button class="btn badge-light-success btn-scan" data-id="{{ $d->id }}"
                            data-mobile="{{ $d->mobile_number }}">
                            <i class="fa-solid fa-qrcode"></i> Scan
                        </button>
                        <button class="btn badge-light-danger f-w-500 btn-delete" data-id="{{ $d->id }}"
                            data-mobile="{{ $d->mobile_number }}"><i class="fa-solid fa-trash"></i> Delete</button>
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
