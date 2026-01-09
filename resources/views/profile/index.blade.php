@extends('layouts.main')
@section('title')
    Profile
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
                            <i class="fa-solid fa-key fa-fw"></i> Profile :
                        </h5>
                    </div>

                    <hr class="my-4">


                    <div class="container py-4">

                        <div class="row">
                            <!-- LEFT PROFILE CARD -->
                            <div class="col-md-4">
                                <div class="card shadow-sm border-0 text-center">
                                    <div class="card-body">

                                        <div class="mb-3">
                                            @php
                                                $username = $user->username; // kunalb
                                                $initials = strtoupper($username[0] . substr($username, -1));
                                            @endphp

                                            <img src="https://ui-avatars.com/api/?name={{ $initials }}&background=6f42c1&color=fff&size=120"
                                                class="rounded-circle shadow" alt="User Avatar">

                                        </div>

                                        <h5 class="mb-1">{{ $user->username ?? '-' }}</h5>
                                        <span class="badge bg-primary mb-2">{{ ucfirst($user->access) }}</span>

                                        <hr>

                                        <div class="text-muted small">
                                            <div>Joined on</div>
                                            <strong>
                                                {{ \Carbon\Carbon::parse($user->indate)->format('d M Y') }}
                                            </strong>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- RIGHT DETAILS CARD -->
                            <div class="col-md-8">
                                <div class="card shadow-sm border-0">
                                    <div class="card-header bg-light fw-semibold">
                                        <i class="bi bi-person-lines-fill me-2"></i>User Information
                                    </div>

                                    <div class="card-body">

                                        <form id="editForm">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">

                                            <!-- User ID -->
                                            <div class="row mb-3">
                                                <div class="col-md-4 text-muted">User ID</div>
                                                <div class="col-md-8 fw-semibold">{{ $user->id }}</div>
                                            </div>

                                            <!-- Username -->
                                            <div class="row mb-3">
                                                <div class="col-md-4 text-muted">Username</div>
                                                <div class="col-md-8">
                                                    <span class="view-mode fw-semibold"
                                                        id="viewUsername">{{ $user->username }}</span>
                                                    <input type="text" name="username"
                                                        class="form-control edit-mode d-none" value="{{ $user->username }}">
                                                </div>
                                            </div>

                                            <!-- Password (edit only) -->
                                            <div class="row mb-3 edit-mode d-none">
                                                <div class="col-md-4 text-muted">Password</div>
                                                <div class="col-md-8">
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="Enter new password">
                                                    <small class="text-muted">Leave blank to keep current password</small>
                                                </div>
                                            </div>

                                            <!-- Access -->
                                            <div class="row mb-3">
                                                <div class="col-md-4 text-muted">Access Level</div>
                                                <div class="col-md-8">
                                                    <span class="view-mode badge bg-info text-dark" id="viewAccess">
                                                        {{ $user->access }}
                                                    </span>
                                                    <select name="access" class="form-select edit-mode d-none">
                                                        <option value="admin"
                                                            {{ $user->access == 'admin' ? 'selected' : '' }}>admin</option>
                                                        <option value="user"
                                                            {{ $user->access == 'user' ? 'selected' : '' }}>user</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- IP Address (READ ONLY) -->
                                            <div class="row mb-3">
                                                <div class="col-md-4 text-muted">IP Address</div>
                                                <div class="col-md-8 fw-semibold" id="viewIp">
                                                    {{ $user->ip }}
                                                </div>
                                            </div>

                                            <!-- Last Login -->
                                            <div class="row mb-3">
                                                <div class="col-md-4 text-muted">Last Login</div>
                                                <div class="col-md-8 fw-semibold">
                                                    {{ $user->lastlogin ? \Carbon\Carbon::parse($user->lastlogin)->format('d M Y, h:i A') : 'Never Logged In' }}
                                                </div>
                                            </div>

                                            <!-- Save / Cancel -->
                                            <div class="text-end edit-actions d-none">
                                                <button type="button" id="cancelEdit"
                                                    class="btn btn-light btn-sm">Cancel</button>
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-save"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    {{-- <div class="card-footer bg-white text-end">
                                        <a href="javascript:void(0)" id="editProfile"
                                            class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit Profile
                                        </a>
                                    </div> --}}

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
    <script>
        $(document).ready(function(e) {
            // Enable edit mode
            $('#editProfile').on('click', function() {
                $('.view-mode').addClass('d-none');
                $('.edit-mode').removeClass('d-none');
                $('.edit-actions').removeClass('d-none');
            });

            // Cancel edit
            $('#cancelEdit').on('click', function() {
                $('.view-mode').removeClass('d-none');
                $('.edit-mode').addClass('d-none');
                $('.edit-actions').addClass('d-none');
                $('input[name="password"]').val('');
            });

            // Save (AJAX)
            $(document).on('submit', '#editForm', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: baseUrl + '/profile/update',
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('.loader-wrapper').removeClass('d-none');
                    },
                    success: function(data) {
                        if (data.hasOwnProperty("error")) {
                            showToast("error", data.error);
                        } else {
                            showToast("success", data.success);
                            // Update view text
                            $('#viewUsername').text($('input[name="username"]').val());
                            $('#viewAccess').text($('select[name="access"]').val());
                            // Reset password
                            $('input[name="password"]').val('');
                            // Exit edit mode
                            $('.view-mode').removeClass('d-none');
                            $('.edit-mode').addClass('d-none');
                            $('.edit-actions').addClass('d-none');
                            location.reload();
                        }
                    },
                    complete: function() {
                        $('.loader-wrapper').addClass('d-none');
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });
        });
    </script>
@stop
