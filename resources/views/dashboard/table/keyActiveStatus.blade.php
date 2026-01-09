<table class="table table-sm">
    <tr>
        <th>Year</th>
        <th> Month</th>
        <th>Issued</th>
        <th>Activated</th>
        <th>Blocked</th>
    </tr>
    @php
        $issued = 0;
        $activated = 0;
        $blocked = 0;
    @endphp
    @foreach ($status as $status)
        <tr>
            <td>{{ $status->YER }}</td>
            <td> {{ $status->MNT }}</td>
            <td> {{ $status->CNT_TOT }}</td>
            <td> {{ $status->CNT_ACT }}</td>
            <td style="color:darkred;"> {{ $status->CNT_BLK }}</td>
            @php
                $issued = $issued + $status->CNT_TOT;
                $activated = $activated + $status->CNT_ACT;
                $blocked = $blocked + $status->CNT_BLK;
            @endphp
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td class="text-center"><b> Total</b></td>
        <td><b>{{ $issued }}</b></td>
        <td><b>{{ $activated }}</b></td>
        <td><b>{{ $blocked }}</b></td>
    </tr>
</table>
