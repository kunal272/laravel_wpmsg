<div class="modal fade" id="editPhonebookModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Phonebook :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="editPhonebookForm" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $phonebook->id }}">

                <div class="modal-body">

                    <!-- Phonebook Name -->
                    <div class="mb-3">
                        <label class="form-label">Phonebook Name :</label>
                        <input type="text" name="phonebook_name" class="form-control" value="{{ $phonebook->name }}"
                            required>
                    </div>

                    <!-- File Upload -->
                    <div class="mb-3">
                        <label class="form-label">
                            Upload CSV / XLSX (Optional) :
                            <a class="text-primary" href="{{ url('/public/assets/document/bulkWhatsapp.csv') }}">
                                Download Sample
                                <img src="{{ url('/public/assets/images/wp/xls.png') }}" height="24">
                            </a>
                        </label>
                        <input type="file" name="file" class="form-control">
                        <small class="text-muted">
                            Leave empty if you don't want to change file
                        </small>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
