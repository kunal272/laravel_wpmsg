@extends('layouts.main')
@section('title')
    Device
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
                            <i class="fa-solid fa-key fa-fw"></i> Device :
                        </h5>

                        <div class="mt-md-0" style="gap: 0.5rem;">
                            <span id="totalUserCount"
                                class="badge bg-transparent-danger text-danger border-danger fs-7">Total Device :
                                {{ $DeiceCount }}</span>
                            <button type="button" id="addUserBtn" class="btn btn-outline-primary ms-3">
                                <i class="fa-solid fa-plus me-1"></i> Add Device
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


                    <div class="modal fade" id="addDeviceModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Add New User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="javascript:void(0);" id="addDeviceForm">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="device_name" class="form-label fw-bold">Enter Device Name : </label>
                                            <input type="text" class="form-control" name="device_name"
                                                placeholder="Device Name" autocomplete="off" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile_number" class="form-label fw-bold">Enter Mobile Number :
                                            </label>
                                            <input type="mobile_number" class="form-control" id="mobile_number"
                                                name="mobile_number" autocomplete="off" placeholder="Mobile Number"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="webhook_url" class="form-label fw-bold">User Role</label>
                                            <input type="webhook_url" class="form-control" id="webhook_url"
                                                name="webhook_url" autocomplete="off" placeholder="Webhook URL" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="modal fade" id="qrModal" tabindex="-1">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content text-center p-3">
                                <h6>Scan WhatsApp QR</h6>
                                <div id="qrBox" class="mt-3"></div>
                            </div>
                        </div>
                    </div> --}}


                    <div class="modal fade" id="qrModal" tabindex="-1" data-bs-backdrop="static">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content rounded-4 shadow">

                                <!-- Header -->
                                <div class="modal-header border-0 pb-0">
                                    <h6 class="modal-title fw-semibold">
                                        Scan WhatsApp QR
                                    </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Body -->
                                <div class="modal-body pt-2">
                                    <div class="row g-3 align-items-center">

                                        <!-- LEFT : GIF + STEPS -->
                                        <div class="col-md-6 text-center">

                                            <!-- GIF / Image -->
                                            <img src="{{ url('/public/assets/images/wp/wplink_step.png') }}"
                                                class="img-fluid rounded mb-3" alt="Scan guide">
                                        </div>

                                        <!-- RIGHT : QR -->
                                        <div class="col-md-6 text-center">
                                            <div class="border border-success rounded-4 p-3 bg-light">
                                                <div id="qrBox" class="my-2">
                                                    <span class="text-muted small">
                                                        Generating QR…
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="mt-2 text-muted small">
                                                Waiting for scan
                                            </div>
                                        </div>

                                    </div>
                                </div>

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
    <script src="{{ url('/public/assets/js/custom/device/device.js') }}"></script>
@stop
