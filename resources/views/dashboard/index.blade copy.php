@extends('layouts.main')
@section('title')
    Dashboard
@stop
@section('style')
    <style>
        /*  Card Enhancements */
        .card {
            border-radius: 15px !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
        }

        /*  Card Header Styling */
        .card h5 {
            font-weight: 600;
            letter-spacing: 0.5px;
            color: #333;
            border-bottom: 2px solid #97dfdb;
        }

        /*  Header Backgrounds */
        .card h5[id^="Source"],
        .card h5[id^="Order"],
        .card h5[id^="Key"],
        .card h5[id^="Unactivated"],
        .card h5[id^="Product"] {
            /* background: linear-gradient(135deg, #ffe6c7, #ffd2a1); */
            border-radius: 15px 15px 0 0;
            color: #2e2e2e;
        }

        /* === General Card Styling === */
        .accordion-card {
            border-radius: 15px !important;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .accordion-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        /* === Accordion Header Styling === */
        .accordion-header-btn {
            background: linear-gradient(135deg, #97dfdb, #74c7c3);
            color: #1a1a1a;
            font-weight: 600;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #e0e0e0;
            transition: background-color 0.3s ease;
        }

        .accordion-header-btn:hover {
            background: linear-gradient(135deg, #7ed3cf, #64bfb9);
        }

        /* === Accordion Title === */
        .accordion-title {
            font-size: 1rem;
            text-align: center;
            color: #2e2e2e;
        }

        /* === Live Tag === */
        .live-tag {
            color: #d9534f;
            font-weight: 700;
            margin-left: 5px;
        }

        /* === Accordion Body === */
        .accordion-body {
            background-color: #f9fcfc;
            border-top: 1px solid #e5e5e5;
            font-size: 0.95rem;
            color: #333;
        }

        /* === Responsive Adjustments === */
        @media (max-width: 768px) {
            .accordion-title {
                font-size: 0.9rem;
            }

            .accordion-header-btn {
                height: 40px;
            }
        }

        /*  Table Styling */
        .table {
            border-collapse: separate;
            border-spacing: 0 4px;
        }

        .table th {
            background-color: #fafafa;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            border-bottom: 2px solid #eee;
        }

        .table td {
            vertical-align: middle;
            padding: 8px 10px;
        }

        .table tr:hover {
            background-color: #d8f5f3;
        }

        /*  Total Row Highlight */
        .table tr:last-child {
            /* background-color: #e6f7ff; */
            font-weight: bold;
            border-top: 2px solid #007bff;
        }

        /*  Button & Badge Styling */
        .btn-primary.btn-sm {
            border-radius: 10px;
            font-weight: 500;
        }

        /*  Accordion Styling */
        .accordion-button {
            font-weight: 600;
            /* background: linear-gradient(135deg, #ffe6c7, #ffd2a1); */
            color: #333;
            border-radius: 12px !important;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        /*  Small Icon Fix */
        img {
            border-radius: 3px;
        }

        /*  Column Padding */
        .col-4 {
            padding: 0 10px;
        }

        /*  Responsive Fixes */
        @media (max-width: 992px) {
            .col-4 {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
@stop

@section('content')




    <!-- MAIN-CONTENT -->
    <div class="page-body">
        {{-- <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-6">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div> --}}
        <div class="container-fluid p-2">

        </div>
        <div class="container-fluid default-dashboard">
            <div class="row  mt-2">
                <div class="col-4  mt-2">
                    <div class="card-columns">
                        <div class="card border-primary">
                            <h5 class="text-center" id="SourceTemproryToday"
                                style="background-color:#97dfdb; height:40px;cursor:pointer;">
                                <div class="mt-2">Source Temprory
                                    <span> [Today Only] </span>
                                </div>
                            </h5>


                            <div class="card-body" id="SourceContainer">
                                <p class="text-center text-muted">Loading...</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-columns  mt-2">
                        <div class="card border-primary">
                            <h5 class="text-center " id="ProductSummeryToday"
                                style="background-color:#97dfdb; height:40px; cursor:pointer">
                                <div class="mt-2"> Product Summery
                                    <span> [Today] </span>
                                </div>
                            </h5>
                            <div class="card-body" id="ProductContainer">
                                <p class="text-center text-muted">Loading...</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-columns mt-2">
                        <div class="card border-primary">
                            <h5 class="text-center " id="OrderSummerylastTenDays"
                                style="background-color:#97dfdb; height:40px; cursor:pointer;">
                                <div class="mt-2"> Order Summery
                                    <span> [Last 10 Days]</span>
                                </div>
                            </h5>
                            <div class="card-body" id="OrderTenDays">
                                <p class="text-center text-muted">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card-columns mt-2">
                        <div class="card border-primary">
                            <h5 class="text-center " id="OrderSummeryToday"
                                style="background-color:#97dfdb; height:40px; cursor:pointer">
                                <div class="mt-2">Order Summery
                                    <span> [Today]</span>
                                </div>
                            </h5>

                            <div class="card-body" id="OrderToday">
                                <p class="text-center text-muted">Loading...</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-columns mt-2">
                        <div class="card border-primary">
                            <h5 class="text-center " id="KeyStockLive"
                                style="background-color:#97dfdb; height:40px; cursor:pointer;">
                                <div class="mt-2"> Key Stock <span> [Live]</span> </div>
                            </h5>
                            <div class="card-body" id="KeyStockContainer">
                                <p class="text-center text-muted">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card-columns mt-2">
                        <div class="card border-primary">
                            <h5 class="text-center " id="OrderSummeryYesterday"
                                style="background-color:#97dfdb; height:40px; cursor:pointer;">
                                <div class="mt-2"> Order Summery
                                    <span> [Yesterday]</span>
                                </div>
                            </h5>
                            <div class="card-body" id="OrderYesteday">
                                <p class="text-center text-muted">Loading...</p>
                            </div>
                        </div>
                    </div>


                    <div class="card-columns mt-2">
                        <div class="card border-primary">
                            <h5 class="text-center " id="KeyNotSent"
                                style="background-color:#97dfdb; height:40px; cursor:pointer;">
                                <div class="mt-2"> Key Not Sent <span> [Last 15 Days]</span>
                                </div>
                            </h5>
                            <div class="card-body" id="KeyNotSend">
                                <p class="text-center text-muted">Loading...</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-columns mt-2">
                        <div class="card border-primary shadow-sm accordion-card">
                            <div class="accordion accordion-flush" id="accordionFlushExample1">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed accordion-header-btn" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            <h5 class="accordion-title mb-0">
                                                Unactivated Keys <span class="live-tag text-success">[Live]</span>
                                            </h5>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample1">
                                        <div id="UnActivatedKeys" class="accordion-body p-3">
                                            <!-- Dynamic content goes here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-columns mt-2">
                        <div class="card border-primary shadow-sm accordion-card">
                            <div class="accordion accordion-flush" id="accordionFlushExample2">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed accordion-header-btn" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTWO"
                                            aria-expanded="false" aria-controls="flush-collapseTWO">
                                            <h5 class="accordion-title mb-0">
                                                Key Act Status <span class="live-tag text-success">[Live]</span>
                                            </h5>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTWO" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample2">
                                        <div id="KeyStatus" class="accordion-body p-3">
                                            <!-- Dynamic content goes here -->
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


    <script src="{{ url('/public/assets/js/custom/dashboard.js') }}"></script>

    {{-- ✅ Toast Message Display --}}
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                showToast('success', '{{ session('success') }}');
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                showToast('error', '{{ session('error') }}');
            });
        </script>
    @endif
@stop
