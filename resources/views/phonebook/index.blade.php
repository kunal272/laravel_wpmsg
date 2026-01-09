@extends('layouts.main')
@section('title')
    PhoneBook
@stop

@section('style')

@stop

@section('content')


    <!-- MAIN-CONTENT -->
    <div class="page-body">
        <div class="container-fluid p-2">

        </div>

        <div class="container-fluid default-dashboard">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">
                            <i class="fa-solid fa-key fa-fw"></i> PhoneBook :
                        </h5>

                        <div class="mt-md-0" style="gap: 0.5rem;">
                            <span id="totalPhoneBookCount"
                                class="badge bg-transparent-danger text-danger border-danger fs-7">Total PhoneBook :
                                {{ $phonebooks }}</span>
                            <button type="button" id="addPhoneBookBtn" class="btn btn-outline-primary ms-3">
                                <i class="fa-solid fa-plus me-1"></i> Add PhoneBook
                            </button>
                        </div>
                    </div>

                    <hr class="my-4">


                    <!-- Buy Now exe Table -->
                    <div class="table-responsive mt-4">
                        <div id="dataTable" class="mb-0">
                            <!-- Dynamic Content -->
                        </div>

                    </div>

                    <div class="viewData" class="mb-0">
                        <!-- Dynamic Content -->
                    </div>

                    <div class="modal fade" id="addPhonebookModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Add New Phonebook :</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <form action="javascript:void(0);" enctype="multipart/form-data" id="addPhonebookForm">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="phonebook_name" class="form-label fw-bold">Phonebook Name</label>
                                            <input type="text" name="phonebook_name" class="form-control"
                                                placeholder="Phonebook Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="file" class="form-label">Phonebook filename &nbsp;&nbsp;&nbsp;
                                                <a class="text-primary"
                                                    href="{{ url('/public/assets/document/bulkWhatsapp.csv') }}">Download
                                                    sample XLSX here
                                                    <img src="{{ url('/public/assets/images/wp/xls.png') }}" alt="png"
                                                        height="32">
                                                </a>
                                            </label>
                                            {{-- <label for="file" class="form-label fw-bold">Upload CSV / XLSX
                                                :</label> --}}
                                            <input type="file" name="file" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>
    <!-- END MAIN-CONTENT -->
@stop
@section('scripts')
    <script src="{{ url('/public/assets/js/custom/phonebook/phonebook.js') }}"></script>
@stop
