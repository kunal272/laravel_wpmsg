<table width="100%" class="table table-sm">
    <tr>
        <td> </td>
        <td> <strong> Hitcount</strong> </td>
        <td> <strong> Checkout Count</strong> </td>
        <td> <strong> Purchased</strong> </td>
        <td><strong>In %</strong></td>
    </tr>
    @php
        $productOrdercount = 0;
        $productCheckCount = 0;
        $productORDERCOUNTSUCCESS = 0;
    @endphp
    @foreach ($Product as $productSummery)
        <tr>
            <td>{{ $productSummery->PRODNAME }}</td>
            <td>{{ $productSummery->ORDERCOUNT }}</td>
            <td>{{ $productSummery->CHECKOUTCOUNT }}</td>
            <td>{{ $productSummery->ORDERCOUNTSUCCESS }}</td>
            <td>
                {{ round(($productSummery->ORDERCOUNTSUCCESS / ($productSummery->CHECKOUTCOUNT == 0 ? 1 : $productSummery->CHECKOUTCOUNT)) * 100, 2) }}
            </td>
            @php
                $productOrdercount = $productOrdercount + $productSummery->ORDERCOUNT;
                $productCheckCount = $productCheckCount + $productSummery->CHECKOUTCOUNT;
                $productORDERCOUNTSUCCESS = $productORDERCOUNTSUCCESS + $productSummery->ORDERCOUNTSUCCESS;
            @endphp
        </tr>
    @endforeach
    <tr>
        <td style="text-align:center;"> <b> Total</b></td>
        <td><b>{{ $productOrdercount }}</b></td>
        <td><b>{{ $productCheckCount }}</b></td>
        <td><b> {{ $productORDERCOUNTSUCCESS }}</b></td>

    </tr>
</table>
