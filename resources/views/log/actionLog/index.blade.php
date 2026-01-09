@extends('layouts.main')
@section('title')
    Action Log
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
                            <i class="fa-solid fa-key fa-fw"></i> Action Log :
                        </h5>

                        <div class="col-4 text-end">
                            <h5 class="text-danger mt-3 mb-3 fw-bold me-2">Total Count : {{ $actionlogscnt }} </h5>
                        </div>

                    </div>

                    <hr class="my-4">


                    <!-- Buy Now exe Table -->
                    <div class="table-responsive mt-4">
                        <div id="dataTable" class="mb-0">
                            <!-- Dynamic Content -->
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- END MAIN-CONTENT -->
@stop
@section('scripts')
    <script src="{{ url('/public/assets/js/custom/actionlog.js') }}"></script>
@stop
