 <table width="100%" class="table table-sm">
     <tr>
         <td>

         </td>
         <td>
             <strong> Hitcount </strong>
         </td>
         <td>
             <strong> Checkout count </strong>
         </td>
         <td>
             <strong> Purchased </strong>
         </td>
         <td>
             <strong> In % </strong>
         </td>

     </tr>
     @php
         $OrderSummeryORDERCOUNT = 0;
         $OrderSummeryCHECKOUTCOUNT = 0;
         $OrderSummeryORDERCOUNTSUCCESS = 0;
     @endphp
     @foreach ($order as $order)
         <tr>
             <td>{{ $order->ORDERDATE }}</td>
             <td>{{ $order->ORDERCOUNT }}</td>
             <td>{{ $order->CHECKOUTCOUNT }}</td>
             <td>{{ $order->ORDERCOUNTSUCCESS }}</td>

             <td>
                 {{ round(($order->ORDERCOUNTSUCCESS / $order->CHECKOUTCOUNT) * 100, 2) }}</td>

             @php
                 $OrderSummeryORDERCOUNT = $OrderSummeryORDERCOUNT + $order->ORDERCOUNT;
                 $OrderSummeryCHECKOUTCOUNT += $order->CHECKOUTCOUNT;
                 $OrderSummeryORDERCOUNTSUCCESS = $OrderSummeryORDERCOUNTSUCCESS + $order->ORDERCOUNTSUCCESS;
             @endphp
         </tr>
     @endforeach
     <tr>
         <td style="text-align:center;"> <b> Total</b></td>
         <td> <b>{{ $OrderSummeryORDERCOUNT }}</b></td>
         <td><b>{{ $OrderSummeryCHECKOUTCOUNT }}</b></td>
         <td><b> {{ $OrderSummeryORDERCOUNTSUCCESS }}</b></td>

     </tr>
 </table>
