@extends('layouts.BackEndApps')
@section('content')
@include('admin.header')
@include('admin.sidebar-left')
<div class="wrapper-content">
	<div class="container">
		<div class="tab-content">
			<div class="tab-pane active" id="profile" role="tabpanel" aria-expanded="true">
				<!--div class="row">
					<div class="col-sm-16">
						<h3 class="mt-2">User Management</h3>
						<hr>
					</div>
					<form class="col-sm-16" id="newMemberUpdate" method="POST" action="{{ route('user_management.update') }}">
						@if($users)
						<input type="hidden" name="id" value="{{$users->id}}" />
						@endif
						<div class="row">
							<div class="col-md-16">
								<div class="form-group row">
									<div class="col-lg-8 col-md-8">
										<label>Your Name:</label>
										<input type="text" class="form-control" placeholder="" name="name" value="@if($users){{$users->name}}@endif">
									</div>
									<div class="col-lg-8 col-md-8">
										<label>Mobile:</label>
										<input type="text" class="form-control" name="mobile" placeholder="" value="@if($users){{$users->mobile}}@endif">
									</div>
								</div>
							</div>
							<div class="col-md-16">
								<div class="form-group row">
									<div class="col-lg-8 col-md-8">
										<label>New Password:</label>
										<input type="password" class="form-control" name="password"  placeholder="New Password">
									</div>
									<div class="col-lg-8 col-md-8">
										<label>Confirm Password:</label>
										<input type="password" class="form-control" name="confirm_password"  placeholder="Confirm Password">
									</div>
								</div>
							</div>
							<div class="col-md-16">
								<div class="form-group row">
									<div class="col-lg-8 col-md-8">
										<label>Role:</label>
										<select name="user_role" class="form-control" data-live-search="true" tabindex="-1" aria-hidden="true">
											<option value="">Select Status</option>																				
											<option value="manager" @if($users && $users->getRoleNames()[0] == 'manager') selected @endif >Manager</option>																				
											<option value="user" @if($users && $users->getRoleNames()[0] == 'user') selected @endif >User</option>																				
											<option value="admin" @if($users && $users->getRoleNames()[0] == 'admin') selected @endif >Admin</option>																			
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-2 row">
							<div class="col-lg-16">
								<hr>
								<center><button type="submit" class="btn btn-primary">Submit</button> 
								<a href="{{route('user_management')}}" class="btn btn-danger">Reset</a></center>
							</div>
						</div>
					</form>
				</div-->
				<div class="row">
					<div class="col-sm-16 col-md-16">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">User List</h5>
							</div>
							<div class="card-block">
								<div class="table-responsive" >
									<table class="table table-striped table-bordered table-hover" id="UserList" style="border: solid 1px rgba(255, 193, 193, 0.1);"></table>
								</div>
							</div>
						</div>
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
		$('#UserList').DataTable({
			processing: true,
			responsive: true,
			serverSide: true,
			ajax: {
				url: "{{ route('user.only_user_list.data') }}",
				type: 'GET',
				cache: false
			},
			columns: [
            { title: 'SL', data: 'id', name: 'id' },
			{ title: 'Name', data: 'name', name: 'name' },
			{ title: 'Mobile', data: 'mobile', name: 'mobile' },
			{ title: 'Company', data: 'company', name: 'role' },
			{ title: 'House No', data: 'house_no', name: 'house_no' },
			{ title: 'Road No', data: 'road_no', name: 'road_no' },
			{ title: 'Address', data: 'address', name: 'address' },
			{ title: 'Role', data: 'role', name: 'role' },
			]
		});
		
		$('#newMemberUpdate').ajaxForm({
			beforeSend: formBeforeSend,
			beforeSubmit: formBeforeSubmit,
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('#UserList').DataTable().draw(true);
			},
			@if(!$users)
			clearForm: true,
			resetForm: true
			@endif
		});
	});
</script>	
@endsection	