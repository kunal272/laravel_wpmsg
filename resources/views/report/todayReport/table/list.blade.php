<table id="todayReportTable" class="table table-bordered border-primary table-hover text-center">
    <thead class="bg-light-primary">
        <tr>
            <th>#</th>
            <th>Device</th>
            <th>Mobile</th>
            {{-- <th>Message</th> --}}
            <th>Status</th>
            <th>Error</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody class="text-center" style="font-size: 14px !important;">
        @forelse($messages as $msg)
            <tr>
                <td>{{ $msg->id }}</td>

                <td>
                    {{ $msg->device_name ?? 'Unknown Device' }}
                    <br>
                    <small class="text-muted">
                        ({{ $msg->mobile_number ?? 'N/A' }})
                    </small>
                </td>

                <td>{{ $msg->mobile }}</td>

                {{-- <td class="text-truncate" style="max-width:250px;">
                    {{ $msg->message }}
                </td> --}}
                <td>
                    @if ($msg->status === 'failed')
                        <span class="badge bg-danger">Failed</span>
                    @elseif($msg->status === 'sent')
                        <span class="badge bg-success">Success</span>
                    @else
                        <span class="badge bg-warning text-dark">Pending</span>
                    @endif
                </td>
                <td class="{{ !empty($msg->error_message) ? 'text-danger' : 'text-success' }}">
                    @php
                        $error = $msg->error_message;
                    @endphp

                    @if (!empty($error) && strlen($error) > 50)
                        <p class="visible-content error{{ $msg->id }}">
                            {{ substr($error, 0, 50) }}...
                        </p>

                        <p class="hidden-content error{{ $msg->id }}" style="display:none;">
                            {{ $error }}
                        </p>

                        <a href="javascript:void(0)" class="toggle-link text-primary" data-id="{{ $msg->id }}"
                            data-type="error">
                            Read More...
                        </a>
                    @else
                        {{ $error ?? 'Successfully sent...' }}
                    @endif
                </td>
                <td>{{ $msg->sent_at ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($messages instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div id="indexTablePagination" style="float: right;" class="mt-3">
        {{ $messages->links('custom_pagination') }}
    </div>
@endif
