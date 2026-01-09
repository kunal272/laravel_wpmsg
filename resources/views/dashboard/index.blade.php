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

        .card {
            border-radius: 18px;
        }

        .card-header {
            border-bottom: 1px solid #f1f1f1;
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
            <!-- STATS -->
            <div class="row g-3 mt-2">

                <div class="col-md-3">
                    <div class="card shadow-sm border-0 text-center">
                        <div class="card-body">
                            <i class="fa-solid fa-mobile fa-2x text-primary"></i>
                            <h6 class="mt-2">Total Devices</h6>
                            <h4>{{ $totalDevices }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm border-0 text-center">
                        <div class="card-body">
                            <i class="fa-solid fa-wifi fa-2x text-success"></i>
                            <h6 class="mt-2">Active Devices</h6>
                            <h4>{{ $activeDevices }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm border-0 text-center">
                        <div class="card-body">
                            <i class="fa-solid fa-book fa-2x text-warning"></i>
                            <h6 class="mt-2">Phonebooks</h6>
                            <h4>{{ $phonebooks }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm border-0 text-center">
                        <div class="card-body">
                            <i class="fa-solid fa-paper-plane fa-2x text-danger"></i>
                            <h6 class="mt-2">Messages Today</h6>
                            <h4>{{ $todayMessages }}</h4>
                        </div>
                    </div>
                </div>

            </div>

            <!-- QUICK ACTIONS -->
            <div class="row mt-4">



                <div class="col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-header fw-bold">
                            Quick Actions
                        </div>
                        <div class="card-body d-flex gap-2">
                            <a href="{{ url('/sendmessage') }}" class="btn btn-primary"><i
                                    class="fa-solid fa-paper-plane text-primary me-2"></i> Send Message</a>
                            <a href="{{ url('/phonebook') }}" class="btn btn-outline-secondary"><i
                                    class="fa-solid fa-book text-success me-2"></i>Phonebook</a>
                            <a href="{{ url('/templates') }}" class="btn btn-outline-success"><i
                                    class="fa-solid fa-message text-warning me-2"></i> Templates</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">
                Message Analytics
            </div>

            <div class="card-body">
                <canvas id="msgChart" height="50"></canvas>
            </div>
        </div>


    </div>
    <!-- END MAIN-CONTENT -->
@stop
@section('scripts')


    {{-- <script src="{{ url('/public/assets/js/custom/dashboard.js') }}"></script> --}}

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



    <script>
        new Chart(document.getElementById('msgChart'), {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Messages',
                    data: [10, 20, 30, 40, 5, 7, 10],
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }]
            }
        });
    </script>

@stop
