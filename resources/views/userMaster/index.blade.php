@extends('layouts.main')
@section('title')
    UserMaster
@stop

@section('style')
    <style>
        div.dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
        }

        table.dataTable td {
            white-space: nowrap;
        }

        *::-webkit-scrollbar-thumb {
            background-color: #b5b5b5;
            border-radius: 10px;
        }

        *::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        .sticky-tr {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        #userMasterTable th:nth-child(1),
        #userMasterTable td:nth-child(1) {
            position: -webkit-sticky;
            position: sticky;
            left: 0;
            background: #fff;
        }

        #userMasterTable th:nth-child(2),
        #userMasterTable td:nth-child(2) {
            position: sticky;
            left: 20px;
            background: #fff;
            /* z-index: 5; */
        }

        #userMasterTable th:nth-child(3),
        #userMasterTable td:nth-child(3) {
            position: sticky;
            left: 150px;
            background: #fff;
            /* z-index: 5; */
        }

        table.dataTable td,
        table.dataTable th {
            white-space: nowrap;
        }
    </style>
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
                            <i class="fa-solid fa-key fa-fw"></i> UserMaster :
                        </h5>

                        <div class="mt-md-0" style="gap: 0.5rem;">
                            <span id="totalUserCount" class="badge bg-transparent-danger text-danger border-danger fs-7">Total User : {{ $UserCount}}</span>
                            <button type="button" id="addUserBtn" class="btn btn-outline-primary ms-3">
                                <i class="fa-solid fa-plus me-1"></i> Add User
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


                    <div class="modal fade" id="addNewUserModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Add New User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="javascript:void(0);" id="addNewUserForm">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="username" class="form-label fw-bold">Enter Username : </label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                autocomplete="off" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label fw-bold">Enter Password : </label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                autocomplete="off" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="roleSelect" class="form-label fw-bold">User Role</label>
                                            <select class="form-select" id="roleSelect" name="user_role" required>
                                                <option selected value="">Select user role...</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User </option>
                                            </select>
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
                </div>
            </div>

        </div>

    </div>
    <!-- END MAIN-CONTENT -->
@stop
@section('scripts')
    <script src="{{ url('/public/assets/js/custom/usermaster/usermaster.js') }}"></script>
@stop
