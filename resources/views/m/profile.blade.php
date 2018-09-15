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
                        <div class="panel-title">Update Profile Form</div>
                    </div>
                    <div class="panel-body">
                        <form class="" action="{{ url('/m/profile/update') }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Profile Picture: <span class="text-danger">*</span></label>
                                <div class="center-block text-center">
                                    <span style="cursor: pointer;" onclick="document.getElementById('input_profile_picture').click();">
                                        @if (session()->has('active_profile_picture'))
                                            <img src="{{ asset(session('active_profile_picture')) }}" alt="Profile Picture" style="max-height: 7rem;" class="img profile_picture_img">
                                        @else
                                            <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile Picture" style="max-height: 7rem;" class="img profile_picture_img">
                                        @endif
                                        <div class="help-block">click to change</div>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">First Name: <span class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="Your First Name" type="text" name="first_name" value="{{ old('first_name', Auth::user()->first_name) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Last Name: <span class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="Your Last Name" type="text" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Email: <span class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="Your Email" type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Phone: <span class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="Your Phone Number" type="tel" name="phone" value="{{ old('phone', Auth::user()->phone) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Gender: <span class="text-danger">*</span></label>
                                <select name="gender" class="form-control" required>
                                    <option value="MALE" {{ old('gender', Auth::user()->gender) == 'MALE' ? 'selected' : '' }}>MALE</option>
                                    <option value="FEMALE" {{ old('gender', Auth::user()->gender) == 'FEMALE' ? 'selected' : '' }}>FEMALE</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Date of Birth: </label>
                                <input class="form-control" type="date" name="date_of_birth" value="{{ old('date_of_birth', Auth::user()->date_of_birth) }}" placeholder="Y-m-d">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Address: </label>
                                <textarea class="form-control" name="address" placeholder="Address" rows="2">{{ old('address', Auth::user()->address) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Country: </label>
                                        <input class="form-control" type="text" name="country" placeholder="Country" value="{{ old('country', Auth::user()->country) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">State: </label>
                                        <input class="form-control" type="text" name="state" placeholder="State" value="{{ old('state', Auth::user()->state) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Job: </label>
                                <input class="form-control" type="text" name="job" placeholder="Job" value="{{ old('job', Auth::user()->job) }}">
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if (Auth::user()->role_id > 1)
                    <div class="clearfix"></div>
                    <br>

                    <div id="upload-cv" class="panel">
                        <div class="panel-heading border">
                            <div class="panel-title">Upload CV</div>
                        </div>
                        <div class="panel-body">
                            <form class="" action="{{ url('/m/upload/cv') }}" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                </div>

                                <div class="form-group">
                                    <label for="file" class="form-control-label">CV FIle: <span class="text-danger">*</span></label>
                                    <input class="form-control" placeholder="Your CV" type="file" name="file" required>
                                    <span class="help-block">accepted formats: <code>.pdf</code></span>
                                </div>

                                <div class="text-right">
                                    @if (Auth::user()->cv)
                                        <button type="submit" class="btn btn-success">Upload New</button>
                                    @else
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                <div class="clearfix"></div>
                <br>

                <div id="change-password" class="panel">
                    <div class="panel-heading border">
                        <div class="panel-title">Change Password Form</div>
                    </div>
                    <div class="panel-body">
                        <form class="" action="{{ url('/m/password/change') }}" method="POST">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>

                            <div class="form-group">
                                <label for="current_password" class="form-control-label">Current Password: <span class="text-danger">*</span></label>
                                <input class="form-control" placeholder="Your Current Password" type="password" name="current_password" required>
                            </div>

                            <div class="form-group" class="form-control-label">
                                <label for="new_password" class="form-control-label">New Password: <span class="text-danger">*</span></label>
                                <input class="form-control" placeholder="Your New Password" type="password" name="new_password" required>
                            </div>

                            <div class="form-group" class="form-control-label">
                                <label for="new_password_confirmation" class="form-control-label">Confirm New Password: <span class="text-danger">*</span></label>
                                <input class="form-control" placeholder="Confirm New Password" type="password" name="new_password_confirmation" required>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-success">Change</button>
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
<input id="input_profile_picture" type="file" name="profile_picture" class="form-input d-invisible m-0 p-0" accept="image/*" style="margin-top: -40px; z-index: -1;">
<script type="text/javascript">
	$('input[name="profile_picture"]').change(function() {
		var formData = new FormData();
		formData.append('image', $(this)[0].files[0]);

		// AJAX Upload Profile Picture
		$.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			url: '{{ url('/m/upload/profile_picture') }}',
			type: 'POST',
			dataType: 'json',
			data: formData,
		    cache: false,
			contentType: false,
		    processData: false,
		})
		.done(function(response) {
			$('.profile_picture_img').attr('src', response.imagepath);
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
