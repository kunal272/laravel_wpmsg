<div class="modal fade" id="viewPhonebookModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    Phonebook : {{ $phonebook->name }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <table id="ContactPhonebookTable" class="table table-bordered border-primary table-hover text-center">
                    <thead class="bg-light-primary">

                        <tr>
                            <th width="5%">#</th>
                            <th>Name</th>
                            <th>Mobile</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $key => $contact)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->mobile }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

                {{-- @if ($contacts instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div id="indexTablePagination1" style="float: right;" class="mt-3">
                        {{ $contacts->links('custom_pagination') }}
                    </div>
                @endif --}}

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
