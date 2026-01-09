@extends('layouts.main')
@section('title')
    WhatsApp Template
@stop

@section('style')
@stop

@section('content')

    <!-- MAIN-CONTENT -->
    <div class="page-body">
        <div class="container-fluid p-2"></div>

        <div class="container-fluid default-dashboard">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">
                            <i class="fa-solid fa-message text-primary fa-fw"></i> WhatsApp Template :
                        </h5>

                        <div class="mt-md-0" style="gap: 0.5rem;">
                            <span id="totalTemplateCount"
                                class="badge bg-transparent-danger text-danger border-danger fs-7">
                                Total Templates : {{ $templates }}
                            </span>

                            <button type="button" id="addTemplateBtn" class="btn btn-outline-primary ms-3">
                                <i class="fa-solid fa-plus me-1"></i> Add Template
                            </button>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Table -->
                    <div class="table-responsive mt-4">
                        <div id="dataTable" class="mb-0">
                            <!-- AJAX Loaded Table -->
                        </div>
                    </div>

                    <!-- View Modal Content -->
                    <div class="viewData mb-0"></div>

                    <!-- ADD TEMPLATE MODAL -->
                    <div class="modal fade" id="addTemplateModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Add New Template :</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <form action="javascript:void(0);" id="addTemplateForm">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Template Name</label>
                                            <input type="text" name="template_name" class="form-control"
                                                placeholder="Template Name" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Message</label>
                                            <textarea name="message" rows="6" class="form-control" placeholder="Type your message here..." required></textarea>
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
                    <!-- END MODAL -->

                    <div class="modal fade" id="editTemplateModal" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog">
                            <form id="editTemplateForm">
                                @csrf
                                <input type="hidden" name="id">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Edit Template</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Template Name</label>
                                            <input type="text" name="template_name" class="form-control mb-2"
                                                placeholder="Template Name" required>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Message</label>
                                            <textarea name="message" class="form-control" rows="6" placeholder="Type your message here..." required></textarea>

                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN-CONTENT -->

@stop

@section('scripts')
    <script src="{{ url('/public/assets/js/custom/template/template.js') }}"></script>
@stop
