 <table width="100%" class="table table-sm" id="KeyStockLiveTable">
     <tr>
         <td><b>Edition</b></td>
         <td><b>Stock</b></td>
     </tr>
     @php
         $TotalKey = 0;
         $EDN = ['AV PRO 1 YR', 'TS 1 YR', 'TS 3 YR', 'Z SEC 1/3 YR', 'Z SEC 1 YR', 'Z SEC 3 YR'];
     @endphp
     @foreach ($serial as $KeyStock)
         @php
             $edition = substr($KeyStock->EDN, 3);
             $isHighlighted = in_array($edition, $EDN);
             $TotalKey += $KeyStock->CNT_STK; // Update total count
         @endphp
         <tr style="{{ $isHighlighted ? 'background-color:#efd8f5;font-weight:600;' : '' }}">
             <td>{{ $edition }}</td>
             <td>{{ $KeyStock->CNT_STK }}</td>
         </tr>
     @endforeach
     <tr>
         <td><b>Total</b></td>
         <td><b>{{ $TotalKey }}</b></td>
     </tr>
 </table>
