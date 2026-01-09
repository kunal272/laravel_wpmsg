 <table width="100%" class="table table-sm">
     <tr>
         <td>
         </td>
         <td>
             <strong> Hitcount</strong>
         </td>
         <td>
             <strong> Purchased </strong>
         </td>

     </tr>
     @php
         $SourceTempORDERCOUNT = 0;
         $SourceTempORDERCOUNTSUCCESS = 0;
     @endphp
     @foreach ($summery as $SourceTemprary)
         <tr>
             <td><b>{{ $SourceTemprary->ORDERDATE }}</b>
                 [{{ $SourceTemprary->ORDERDATEAPP }}]</td>
             <td>{{ $SourceTemprary->ORDERCOUNT }}</td>
             <td>{{ $SourceTemprary->ORDERCOUNTSUCCESS }}</td>
             <td>

             </td>
             @php
                 $SourceTempORDERCOUNT = $SourceTempORDERCOUNT + $SourceTemprary->ORDERCOUNT;
                 $SourceTempORDERCOUNTSUCCESS = $SourceTempORDERCOUNTSUCCESS + $SourceTemprary->ORDERCOUNTSUCCESS;
             @endphp
         </tr>
     @endforeach
     <tr>
         <td style="text-align:center;"> <b> Total</b></td>
         <td> <b>{{ $SourceTempORDERCOUNT }}</b></td>
         <td><b> {{ $SourceTempORDERCOUNTSUCCESS }}</b></td>
     </tr>
 </table>
