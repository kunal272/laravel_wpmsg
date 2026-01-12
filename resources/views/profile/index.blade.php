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
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="nav nav-pills" id="profile-tabs" role="tablist">
                            <ul class="d-flex gap-2">
                                <li>
                                    <a class="nav-link main btn active" id="Profile_tab" data-bs-toggle="pill"
                                        href="#Profile" role="tab" aria-selected="true">
                                        <i class="fa-solid fa-user me-2"></i> Profile
                                    </a>
                                </li>

                                <li>
                                    <a class="nav-link main btn" id="Session_tab" data-bs-toggle="pill" href="#Session"
                                        role="tab" aria-selected="false">
                                        <i class="fa-solid fa-clock-rotate-left me-2"></i> Sessions
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </div>

                    <hr class="my-4">


                    <div class="container py-4">


                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Profile" role="tabpanel"
                                aria-labelledby="Profile_tab">
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
                                                                class="form-control edit-mode d-none"
                                                                value="{{ $user->username }}">
                                                        </div>
                                                    </div>

                                                    <!-- Password (edit only) -->
                                                    <div class="row mb-3 edit-mode d-none">
                                                        <div class="col-md-4 text-muted">Password</div>
                                                        <div class="col-md-8">
                                                            <input type="password" name="password" class="form-control"
                                                                placeholder="Enter new password">
                                                            <small class="text-muted">Leave blank to keep current
                                                                password</small>
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
                                                                    {{ $user->access == 'admin' ? 'selected' : '' }}>admin
                                                                </option>
                                                                <option value="user"
                                                                    {{ $user->access == 'user' ? 'selected' : '' }}>user
                                                                </option>
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

                            <div class="tab-pane fade" id="Session" role="tabpanel" aria-labelledby="Session_tab">

                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="mb-0">
                                                <i class="fa-solid fa-shield-halved me-1"></i>
                                                Active Sessions
                                            </h6>
                                            <div class="d-flex mt-2 mt-md-0" style="gap: 0.5rem;">
                                                <button id="logoutAll" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-right-from-bracket"></i> Logout All
                                                </button>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        @forelse ($sessions as $session)
                                            <div
                                                class="d-flex align-items-center justify-content-between border rounded p-3 mb-3">

                                                <!-- LEFT -->
                                                <div>
                                                    <h6 class="mb-1">
                                                        {{ str_contains($session->user_agent, 'Chrome') ? 'Chrome' : 'Browser' }}
                                                        <small class="text-muted">on Windows</small>
                                                    </h6>

                                                    <p class="mb-0 text-muted">
                                                        IP: {{ $session->ip_address }}
                                                    </p>

                                                    <small class="text-muted">
                                                        Last activity:
                                                        {{ \Carbon\Carbon::parse($session->last_activity)->diffForHumans() }}
                                                    </small>
                                                </div>

                                                <!-- RIGHT -->
                                                <div class="text-end">
                                                    @if ($session->session_id === session()->getId())
                                                        <span class="badge badge-success">Current Session</span>
                                                    @else
                                                        <form method="POST" action="">
                                                            @csrf
                                                            <button class="btn btn-sm btn-outline-danger logout-device"
                                                                data-id="{{ $session->id }}">
                                                                Logout
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>

                                            </div>

                                        @empty
                                            <div class="text-center text-muted">
                                                No active sessions found
                                            </div>
                                        @endforelse
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

            // 🟡 Logout One Device
            $(document).on('click', '.logout-device', function(e) {
                e.preventDefault();

                let id = $(this).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to logout this device?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, logout!",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (!result.isConfirmed) return;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: baseUrl + "/logout-device/" + id,
                        type: "POST",
                        beforeSend: function() {
                            $(".loader-wrapper").removeClass("d-none");
                        },
                        success: function(data) {
                            if (data.success) {
                                // Remove session card
                                $(`button[data-id='${id}']`).closest('.border')
                                    .remove();

                                showToast("success", data.success);
                            } else {
                                showToast("error", data.error ||
                                    "Failed to logout device");
                            }
                        },
                        complete: function() {
                            $(".loader-wrapper").addClass("d-none");
                        },
                        error: function() {
                            showToast("error", "Something went wrong. Try again.");
                        }
                    });
                });
            });


            // 🔵 Logout All Other Devices
            $('#logoutAll').on('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Logout All Devices?",
                    text: "You will be logged out from all other active sessions.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, logout all!",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (!result.isConfirmed) return;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: baseUrl + "/logout-all",
                        type: "POST",
                        beforeSend: function() {
                            $(".loader-wrapper").removeClass("d-none");
                        },
                        success: function(data) {
                            if (data.success) {
                                // Remove all except current session
                                $('.logout-device').closest('.border').remove();

                                showToast("success", data.success);
                            } else {
                                showToast("error", data.error || "Logout failed");
                            }
                        },
                        complete: function() {
                            $(".loader-wrapper").addClass("d-none");
                        },
                        error: function() {
                            showToast("error", "Something went wrong. Try again.");
                        }
                    });
                });
            });

        });
    </script>
@stop
