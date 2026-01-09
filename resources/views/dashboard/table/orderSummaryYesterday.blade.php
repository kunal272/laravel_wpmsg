<table width="100%" class="table table-sm">
    <tr>
        <td>
        </td>
        <td>
            <strong> Hitcount</strong>
        </td>
        <td>
            <strong> Checkout count </strong>
        </td>
        <td>
            <strong> Purchased </strong>
        </td>
    </tr>
    @php
        $YesterdayORDERCOUNT = 0;
        $YesterdayCHECKCOUNT = 0;
        $YesterdayORDERCOUNTSUCCESS = 0;
    @endphp
    @foreach ($OrderSummeryYesterday as $order)
        <tr>
            <td>
                {{ $order->ORDERTYPENAME }}
                @php
                    $type = config('constant.order_types')[$order->ORDERTYPE] ?? null;
                @endphp

                @if ($type)
                    @if (!empty($type['icon']))
                        <img src="{{ url('public/assets/images/icon/' . $type['icon']) }}" alt="{{ $type['alt'] }}"
                            width="15" height="15" title="{{ $type['title'] }}" />
                    @endif
                @else
                    <img src="{{ url('public/assets/images/icon/default.png') }}" alt="Unknown" width="15"
                        height="15" title="Unknown" />
                @endif

            </td>
            <td>{{ $order->ORDERCOUNT }}</td>
            <td>{{ $order->CHECKOUTCOUNT }}</td>
            <td>{{ $order->ORDERCOUNTSUCCESS }}</td>
            @php
                $YesterdayORDERCOUNT = $YesterdayORDERCOUNT + $order->ORDERCOUNT;
                $YesterdayCHECKCOUNT += $order->CHECKOUTCOUNT;
                $YesterdayORDERCOUNTSUCCESS = $YesterdayORDERCOUNTSUCCESS + $order->ORDERCOUNTSUCCESS;
            @endphp
        </tr>
    @endforeach
    <tr>
        <td style="text-align:center;"> <b> Total</b></td>
        <td> <b>{{ $YesterdayORDERCOUNT }}</b></td>
        <td><b>{{ $YesterdayCHECKCOUNT }}</b></td>
        <td><b> {{ $YesterdayORDERCOUNTSUCCESS }}</b></td>
    </tr>
</table>
