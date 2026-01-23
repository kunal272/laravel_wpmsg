@extends('layouts.main')
@section('title')
    Today Report Analysis
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
                            <i class="fa-solid fa-key fa-fw"></i> Today Report Analysis:
                        </h5>

                        <div class="mt-md-0" style="gap: 0.5rem;">
                            <span id="totalUserCount"
                                class="badge bg-transparent-danger text-danger border-danger fs-7">Total Meassage :
                                {{ $messageCount }}</span>
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

    </div>
    <!-- END MAIN-CONTENT -->
@stop
@section('scripts')
    <script src="{{ url('/public/assets/js/custom/report/todatReport.js') }}"></script>
@stop
