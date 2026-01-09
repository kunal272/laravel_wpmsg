<table width="100%" class="table table-sm">
    <tr>
        <td>
        </td>
        <td>
            <strong> Date </strong>
        </td>
        <td>
            <strong> Count </strong>
        </td>
        <td></td>

    </tr>
    <tr>
        <td>
        </td>
        <td>
            {{ date('d-m-Y', strtotime('-15 days')) }} TO
            {{ date('d-m-Y', strtotime('0 days')) }}
        </td>
        <td>

            <span class="fw-bold" id="KeyNotSentCount">0</span>
        </td>

        <td>
            <button id="keynotsendorderno" class="btn btn-primary btn-sm keynotsendorderno" data-toggle="modal"
                data-target="#keynotsendModal" style="display: none">view</button>
        </td>

    </tr>
</table>
