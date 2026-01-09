@php $UnactiveTotal=0; @endphp
<table class="table table-sm">
    <tr>
        <td><b>Edition </b></td>
        <td><b>Stock </b></td>
    </tr>
    @foreach ($unactive as $unactive)
        <tr>
            <td>{{ $unactive->EDN }}</td>
            <td>
                @if ($unactive->CNT > 100)
                    <div style="color:darkred;">
                        {{ $unactive->CNT }}
                    </div>
                @else
                    <div style="color: green">
                        {{ $unactive->CNT }}
                    </div>
                @endif
            </td>
            @php
                $UnactiveTotal = $UnactiveTotal + $unactive->CNT;
            @endphp
        </tr>
    @endforeach
    <tr>
        <td><b> Total</b></td>
        <td><b>{{ $UnactiveTotal }}</b></td>
    </tr>
</table>
