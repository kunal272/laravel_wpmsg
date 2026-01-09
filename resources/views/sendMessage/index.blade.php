@extends('layouts.main')
@section('title')
    Send Message
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
                        <h5 class="mb-3">
                            <i class="fa-solid fa-paper-plane text-primary"></i> Send Message
                        </h5>

                        <div class="mt-md-0" style="gap: 0.5rem;">

                        </div>
                    </div>

                    <hr class="my-4">
                    <div class="container">
                        <form id="sendMessageForm" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Device <span class="text-danger">*</span></label>
                                    <select name="device_id" class="form-control" required>
                                        <option value="">Select Device</option>
                                        @foreach ($devices as $device)
                                            <option value="{{ $device->id }}">
                                                {{ $device->device_name }} ({{ $device->mobile_number }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Phonebook (Optional)</label>
                                    <select name="phonebook_id" class="form-control">
                                        <option value="">Select Phonebook</option>
                                        @foreach ($phonebooks as $pb)
                                            <option value="{{ $pb->id }}">{{ $pb->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Single receiver</label>
                                <input type="text" name="numbers" class="form-control" placeholder="917499318917">
                            </div>

                            <div class="mb-3">
                                <label>Template</label>
                                <select id="templateSelect" class="form-control">
                                    <option value="">Select Template</option>
                                    @foreach ($templates as $tpl)
                                        <option value="{{ $tpl->message }}">
                                            {{ $tpl->template_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Body Text (Max 1024)</label>
                                <textarea name="message" id="messageBox" rows="6" class="form-control" required></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Media file</label>
                                    <input type="file" name="media" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Schedule time</label>
                                    <input type="datetime-local" name="schedule_at" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Message delay (seconds)</label>
                                    <input type="number" name="delay" class="form-control">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-paper-plane"></i> Send
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN-CONTENT -->

@stop

@section('scripts')
    <script src="{{ url('/public/assets/js/custom/sendmessage/sendmessage.js') }}"></script>
@endsection
