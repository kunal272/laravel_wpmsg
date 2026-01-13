@extends('layouts.main')

@section('title')
    Send Message
@stop

@section('style')
    <style>
        .wa-mobile {
            width: 100%;
            max-width: 360px;
            background: #e5ddd5;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .15);
            margin: auto;
            font-family: system-ui, -apple-system, BlinkMacSystemFont;
        }

        .wa-topbar {
            background: #075e54;
            color: #fff;
            padding: 12px;
            text-align: center;
            font-weight: 600;
        }

        .wa-chat-area {
            padding: 12px;
            min-height: 260px;
        }

        .wa-msg {
            max-width: 85%;
            padding: 8px 10px 18px;
            border-radius: 8px;
            font-size: 14px;
            line-height: 1.45;
            position: relative;
        }

        .wa-received {
            background: #ffffff;
            margin-right: auto;
            border-top-left-radius: 0;
        }

        .wa-text {
            white-space: pre-wrap;
            color: #111;
        }

        .wa-meta {
            position: absolute;
            right: 8px;
            bottom: 4px;
            font-size: 11px;
            color: #888;
        }

        .preview-placeholder {
            color: #777;
            font-style: italic;
        }
    </style>
@stop

@section('content')

    <div class="page-body">

        <div class="container-fluid p-2">

        </div>

        <div class="container-fluid default-dashboard">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5>
                            <i class="fa-solid fa-paper-plane text-primary"></i> Send Message
                        </h5>
                    </div>

                    <hr class="my-4">

                    <div class="container-fluid">
                        <div class="row">

                            <!-- LEFT : FORM (8 COLS) -->
                            <div class="col-md-9">
                                <form id="sendMessageForm" class="form theme-form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Device <span class="text-danger">*</span></label>
                                            <select name="device_id" class="form-select" required>
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
                                            <select name="phonebook_id" class="form-select">
                                                <option value="">Select Phonebook</option>
                                                @foreach ($phonebooks as $pb)
                                                    <option value="{{ $pb->id }}">{{ $pb->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label>Single receiver</label>
                                        <input type="text" name="numbers" class="form-control"
                                            placeholder="917499318917">
                                    </div>

                                    <div class="mb-3">
                                        <label>Template</label>
                                        <select id="templateSelect" class="form-select">
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
                                        <textarea name="message" id="messageBox" rows="6" maxlength="1024" class="form-control" required></textarea>
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

                            <!-- RIGHT : PREVIEW (4 COLS) -->
                            <div class="col-md-3">
                                <div class="preview-wrapper">
                                    <div class="preview-header text-center">
                                        <i class="fa-solid fa-eye"></i> Message Preview
                                    </div>

                                    <div class="wa-mobile">
                                        <div class="wa-topbar">
                                            <i class="fa-brands fa-whatsapp"></i> WhatsApp
                                        </div>

                                        <div class="wa-chat-area">
                                            <div class="wa-msg wa-received">
                                                <div id="messagePreview" class="wa-text">
                                                    <span class="preview-placeholder">
                                                        Message preview will appear here...
                                                    </span>
                                                </div>

                                                <div class="wa-meta">
                                                    <span class="wa-time">{{ date('g:i A') }}</span>
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
    </div>

@stop

@section('scripts')
    <script src="{{ url('/public/assets/js/custom/sendmessage/sendmessage.js') }}"></script>
@endsection
