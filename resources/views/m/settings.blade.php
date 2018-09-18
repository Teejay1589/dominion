@extends('layouts.admin')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')

    <section>
        <div class="row mb15">
            <div class="col-md-1 col-sm-12"></div>
            <div class="col-md-10 col-sm-12">
                <div id="update-profile" class="panel">
                    <div class="panel-heading border">
                        <div class="panel-title">Hospital Information Settings Form</div>
                    </div>
                    <div class="panel-body">
                        <form class="" action="{{ url('/m/settings/update') }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>

                            {{-- <div class="form-group">
                                <label class="form-control-label">Hospital Logo: <span class="text-danger">*</span></label>
                                <div class="center-block text-center">
                                    <span style="cursor: pointer;" onclick="document.getElementById('input_hospital_logo').click();">
                                        @if (session()->has('active_hospital_logo'))
                                            <img src="{{ asset(session('active_hospital_logo')) }}" alt="Hospital Logo" style="max-height: 7rem;" class="img hospital_logo_img">
                                        @else
                                            <img src="{{ asset(App\Setting::find(1)->hospital_logo) }}" alt="Hospital Logo" style="max-height: 7rem;" class="img hospital_logo_img">
                                        @endif
                                        <div class="help-block">click to change</div>
                                    </span>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Hospital Name: <span class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="Hospital Name" type="text" name="hospital_name" value="{{ old('hospital_name', App\Setting::find(1)->hospital_name) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Hospital Tagline: </label>
                                        <input class="form-control" placeholder="Your Hospital Tagline" type="text" name="hospital_tagline" value="{{ old('hospital_tagline', App\Setting::find(1)->hospital_tagline) }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Hospital Address: </label>
                                <textarea class="form-control" name="hospital_address" placeholder="Hospital Address" rows="2">{{ old('hospital_address', App\Setting::find(1)->hospital_address) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Hospital Phone: <span class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="Hospital Phone Number" type="tel" name="hospital_phone" value="{{ old('hospital_phone', App\Setting::find(1)->hospital_phone) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Hospital Email: <span class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="Hospital Email" type="email" name="hospital_email" value="{{ old('hospital_email', App\Setting::find(1)->hospital_email) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="clearfix"></div>
                <br>

                <div id="change-password" class="panel">
                    <div class="panel-heading border">
                        <div class="panel-title">SMS Settings Form</div>
                    </div>
                    <div class="panel-body">
                        <form class="" action="{{ url('/m/settings/update') }}" method="POST">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">SMS Username: <span class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="SMS Username" type="text" name="sms_username" value="{{ old('sms_username', App\Setting::find(1)->sms_username) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">SMS Password: <span class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="SMS Password" type="text" name="sms_password" value="{{ old('sms_password', App\Setting::find(1)->sms_password) }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">SMS From: <span class="text-danger">*</span></label>
                                <input class="form-control" placeholder="SMS From" type="text" name="sms_from" value="{{ old('sms_from', App\Setting::find(1)->sms_from) }}" required>
                            </div>

                            <div class="text-right">
                                <a href="{{ url('/m/sms/balance') }}" class="btn btn-default">Check Balance</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-sm-12"></div>
        </div>
    </section>

@endsection

@section('page_scripts')
<input id="input_hospital_logo" type="file" name="hospital_logo" class="form-input d-invisible m-0 p-0" accept="image/*" style="margin-top: -40px; z-index: -1;">
<script type="text/javascript">
	$('input[name="hospital_logo"]').change(function() {
		var formData = new FormData();
		formData.append('image', $(this)[0].files[0]);

		// AJAX Upload Hospital Logo
		$.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			url: '{{ url('/m/upload/hospital_logo') }}',
			type: 'POST',
			dataType: 'json',
			data: formData,
		    cache: false,
			contentType: false,
		    processData: false,
		})
		.done(function(response) {
			$('.hospital_logo_img').attr('src', response.imagepath);
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
</script>
@endsection
