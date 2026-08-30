@extends('layouts.BackEndApps')
@section('content')
@include('admin.header')
@include('admin.sidebar-left')
<div class="wrapper-content">
	<div class="container">
		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="profile" role="tabpanel" aria-expanded="true">
				<div class="row">
					<div class="col-sm-16">
						<h3 class="mt-2">Personal Info</h3>
						<hr>
					</div>
					<form id="userProfileUpdate" class="col-sm-16" method="POST" action="{{ route('profile.update') }}">
						@csrf
						<div class="row">
							<div class="col-md-16">
								<div class="form-group row">
									<div class="col-lg-8 col-md-8">
										<label>Name:</label>
										<input type="text" name="name" class="form-control" value="{{$users->name}}">
									</div>
									<div class="col-lg-8 col-md-8">
										<label>Mobile:</label>
										<input type="text" name="mobile" class="form-control" value="{{$users->mobile}}">
									</div>
									<div class="col-lg-8 col-md-8">
										<label>Business Name:</label>
										<input type="text" name="business_name" class="form-control" value="{{$users->company}}">
									</div>
									<div class="col-lg-8 col-md-8">
										<label>Email:</label>
										<input type="text" name="email" class="form-control" value="{{$users->email}}">
									</div>								
									<div class="col-lg-8 col-md-8">
										<label>Flat & House No</label>
										<input type="text" name="flat_house" class="form-control" placeholder="Flat & House No" value="{{$users->house_no}}">
									</div>
									<div class="col-lg-8 col-md-8">
										<label>Road No</label>
										<input type="text" name="road_no" class="form-control" placeholder="Road No" value="{{$users->road_no}}">
									</div>
									<div class="col-lg-8 col-md-8">
										<label>Address</label>
										<input type="text" name="address" class="form-control" value="{{$users->address}}">
									</div>	
								</div>					
								<div class="form-group row">
									<div class="col-lg-8 col-md-8">
										<label>Current Password:</label>
										<input type="password" name="current_password" id="current_password" class="form-control" placeholder="Leave Current Password blank if dont want to change">
									</div>
									<div class="col-lg-8 col-md-8">
										<label>New Password:</label>
										<input type="password" name="new_password" id="new_password" class="form-control" placeholder="Leave New Password blank if dont want to change">
									</div>
								</div>					
								<div class="form-group row">
									<div class="col-lg-16 col-md-16">
										<center><button type="submit" class="btn btn-primary">Update Profile</button></center>
									</div>
								</div>
							</div>
						</div>
					</form>
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
		$('#userProfileUpdate').ajaxForm({
			beforeSend: formBeforeSend,
			beforeSubmit: formBeforeSubmit,
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('#current_password').val('');
				$('#new_password').val('');
			}
		});
	});
</script>
@endsection	