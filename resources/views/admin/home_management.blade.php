@extends('layouts.BackEndApps')
@section('content')
@include('admin.header')
@include('admin.sidebar-left')
<br><br>
<br><br>

<div class="wrapper-content">

    <div class="container">
        <div class="row  align-items-center justify-content-between">
            <div class="col-sm-16 col-md-16">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Home Management</h6>
                    </div>
                    <div class="card-block">
                        <form id="home_management_from" action="{{route('home_management.update')}}"
                            accept-charset="utf-8" enctype="multipart/form-data" method="post"
                            class="form-horizontal validatable">
                            <input type="hidden" name="id" value="" id="hidden-id" />

                            <div class="row">
                                <!-- Company Name -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="company_name" class="col-8 col-form-label">Company Name</label>
                                        <div class="col-16">
                                            <input type="text" name="company_name" class="form-control"
                                                placeholder="Enter Company Name"
                                                value="{{$HomeManagement->company_name}}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Slogan -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="slogan" class="col-8 col-form-label">Slogan</label>
                                        <div class="col-16">
                                            <input type="text" name="slogan" class="form-control"
                                                placeholder="Enter Slogan" value="{{$HomeManagement->slogan}}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Company Logo -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="logo" class="col-8 col-form-label">Company Logo (600*600
                                            jpg)</label>
                                        <div class="col-16">
                                            <input type="file" class="form-control" name="logo">
                                            @php
                                            $logo = $HomeManagement->logo
                                            ? Storage::disk(config('filesystems.voucher_disk',
                                            'public'))->url($HomeManagement->logo)
                                            : asset('images/no-image.png');
                                            @endphp

                                            <img src="{{ $logo }}" alt="Company Logo" class="img-fluid"
                                                style="width:100px;height:100px;object-fit:cover;">
                                        </div>
                                    </div>
                                </div>

                                <!-- About Us Image -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="welcome_image" class="col-8 col-form-label">Mission Image (702*536
                                            jpg)</label>
                                        <div class="col-16">
                                            <input type="file" class="form-control" name="welcome_image">
                                            @php
                                            $welcomeImage = $HomeManagement->welcome_image
                                            ? Storage::disk(config('filesystems.voucher_disk',
                                            'public'))->url($HomeManagement->welcome_image)
                                            : asset('images/no-image.png');
                                            @endphp

                                            <img src="{{ $welcomeImage }}" alt="Mission Image" class="img-fluid"
                                                style="width:100px;height:100px;object-fit:cover;">
                                        </div>
                                    </div>
                                </div>

                                <!-- About Us Description -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="welcome_description" class="col-8 col-form-label">Mision
                                            Description</label>
                                        <div class="col-16">
                                            <textarea name="welcome_description" class="form-control"
                                                placeholder="Enter Description">{{$HomeManagement->welcome_description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="vision_image" class="col-8 col-form-label">Vision Image (702*536
                                            jpg)</label>
                                        <div class="col-16">
                                            <input type="file" class="form-control" name="vision_image">
                                            @php
                                            $visionImage = $HomeManagement->vision_image
                                            ? Storage::disk(config('filesystems.voucher_disk',
                                            'public'))->url($HomeManagement->vision_image)
                                            : asset('images/no-image.png');
                                            @endphp

                                            <img src="{{ $visionImage }}" alt="Vision Image" class="img-fluid"
                                                style="width:100px;height:100px;object-fit:cover;">
                                        </div>
                                    </div>
                                </div>

                                <!-- About Us Description -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="vision_description" class="col-8 col-form-label">Vision
                                            Description</label>
                                        <div class="col-16">
                                            <textarea name="vision_description" class="form-control"
                                                placeholder="Enter Description">{{$HomeManagement->vision_description}}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <!-- Address Description -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="address" class="col-8 col-form-label">Address</label>
                                        <div class="col-16">
                                            <textarea name="address" class="form-control"
                                                placeholder="Enter Address">{{$HomeManagement->address}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!--Our Mission -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="our_mission" class="col-8 col-form-label">Our Mission</label>
                                        <div class="col-16">
                                            <textarea name="our_mission" class="form-control"
                                                placeholder="Our Mission">{{$HomeManagement->our_mission}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Our Vission -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="our_vission" class="col-8 col-form-label">Our Vission</label>
                                        <div class="col-16">
                                            <textarea name="our_vission" class="form-control"
                                                placeholder="Our Vission">{{$HomeManagement->our_vission}}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-16 text-white">
                                    <div class="form-group">
                                        <label for="our_focus" class="col-8 col-form-label">Our Focus</label>
                                        <div class="col-16">
                                            <textarea name="our_focus" class="form-control"
                                                placeholder="Our focus">{{$HomeManagement->our_focus}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-16 text-white">
                                    <div class="form-group">
                                        <label for="about_us_card" class="col-8 col-form-label">About us Card</label>
                                        <div class="col-16">
                                            <textarea name="about_us_card" class="form-control"
                                                placeholder="About Us Card">{{$HomeManagement->about_us_card}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="founder_name" class="col-8 col-form-label">Founder Name</label>
                                        <div class="col-16">
                                            <input type="text" name="founder_name" class="form-control"
                                                placeholder="Founder Name" value="{{$HomeManagement->founder_name}}">
                                        </div>
                                    </div>
                                </div>



                                <!-- Contact Number -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="contact_no" class="col-8 col-form-label">Contact/CALL US
                                            24/7</label>
                                        <div class="col-16">
                                            <input type="text" name="contact_no" class="form-control"
                                                placeholder="Enter Contact Number"
                                                value="{{$HomeManagement->contact_no}}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="email" class="col-8 col-form-label">Email/WRITE US</label>
                                        <div class="col-16">
                                            <input type="text" name="email" class="form-control"
                                                placeholder="Enter Email Address" value="{{$HomeManagement->email}}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Start Date -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="start_date" class="col-8 col-form-label">Company Start Date</label>
                                        <div class="col-16">
                                            <input type="date" name="start_date" class="form-control"
                                                value="{{$HomeManagement->start_date}}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Mobile -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="mobile" class="col-8 col-form-label">Mobile</label>
                                        <div class="col-16">
                                            <input type="text" name="mobile" class="form-control"
                                                placeholder="Enter Mobile Number" value="{{$HomeManagement->mobile}}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Links -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="facebook_link" class="col-8 col-form-label">Facebook Link</label>
                                        <div class="col-16">
                                            <input type="url" name="facebook_link" class="form-control"
                                                placeholder="Enter Facebook Link"
                                                value="{{$HomeManagement->facebook_link}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="youtube_link" class="col-8 col-form-label">YouTube Link</label>
                                        <div class="col-16">
                                            <input type="url" name="youtube_link" class="form-control"
                                                placeholder="Enter YouTube Link"
                                                value="{{$HomeManagement->youtube_link}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="linkedin_link" class="col-8 col-form-label">LinkedIn Link</label>
                                        <div class="col-16">
                                            <input type="url" name="linkedin_link" class="form-control"
                                                placeholder="Enter LinkedIn Link"
                                                value="{{$HomeManagement->linkedin_link}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="instagram_link" class="col-8 col-form-label">Instagram Link</label>
                                        <div class="col-16">
                                            <input type="url" name="instagram_link" class="form-control"
                                                placeholder="Enter Instagram Link"
                                                value="{{$HomeManagement->instagram_link}}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Opening and Closing Times -->
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="opening_time" class="col-8 col-form-label">Opening Time</label>
                                        <div class="col-16">
                                            <input type="time" name="opening_time" class="form-control"
                                                value="{{$HomeManagement->opening_time}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 text-white">
                                    <div class="form-group">
                                        <label for="closing_time" class="col-8 col-form-label">Closing Time</label>
                                        <div class="col-16">
                                            <input type="time" name="closing_time" class="form-control"
                                                value="{{$HomeManagement->closing_time}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <center>
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </center>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
		$('#home_management_from').ajaxForm({
			beforeSend: formBeforeSend,
			beforeSubmit: formBeforeSubmit,
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('#hidden-id').setAttribute("disabled");
			}
			// clearForm: true,
			// resetForm: true
		});
	});
</script>
@endsection
