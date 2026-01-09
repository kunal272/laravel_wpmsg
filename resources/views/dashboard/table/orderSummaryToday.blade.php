 @php
     $TodayORDERCOUNT = 0;
     $TodayORDERCOUNTSUCCESS = 0;
     $TotalCheckOutCount = 0;
 @endphp

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
     @foreach ($OrderSummeryToday as $order)
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
                     <img src="{{ url('public/assets/images/icon/default.png') }}" alt="Unknown" width="25"
                         height="25" title="Unknown" />
                 @endif

             </td>
             <td>{{ $order->ORDERCOUNT }}</td>
             <td>{{ $order->CHECKOUTCOUNT }}</td>
             <td>{{ $order->ORDERCOUNTSUCCESS }}</td>
             @php
                 $TodayORDERCOUNT = $TodayORDERCOUNT + $order->ORDERCOUNT;
                 $TotalCheckOutCount = $TotalCheckOutCount + $order->CHECKOUTCOUNT;
                 $TodayORDERCOUNTSUCCESS = $TodayORDERCOUNTSUCCESS + $order->ORDERCOUNTSUCCESS;
             @endphp
         </tr>
     @endforeach
     <tr>
         <td style="text-align:center;"> <b> Total</b></td>
         <td> <b>{{ $TodayORDERCOUNT }}</b></td>
         <td><b>{{ $TotalCheckOutCount }}</b></td>
         <td><b> {{ $TodayORDERCOUNTSUCCESS }}</b></td>
     </tr>
 </table>
