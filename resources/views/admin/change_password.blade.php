@extends('layouts.BackEndApps')
@section('content')
  @include('admin.header')
  @include('admin.sidebar-left')
	<div class="wrapper-content">
		<div class="container">
			<div class="tab-content">
				<div class="tab-pane active" id="profile" role="tabpanel" aria-expanded="true">		
					<div class="row">
						<div class="col-sm-16">
							<h3 class="mt-2">Password Change</h3>
							<hr>
						</div>
						<form class="col-sm-16" method="POST" action="">
							@csrf
							<div class="row">
								<div class="col-md-16">
									<div class="form-group row">
										<div class="col-lg-8 col-md-8">
											
											<label>Current Password:</label>
											<input type="text" name="current_password" id="current_password" class="form-control" placeholder="">
										</div>
										<div class="col-lg-8 col-md-8">
											<label>New Password:</label>
											<input type="text" name="new_password" id="new_password" class="form-control" placeholder="">
										</div>
									</div>
								</div>
							</div>
							<div class="mb-2 row">
								<div class="col-lg-16">
									<hr>
									<center>
										<button type="submit" class="btn btn-primary">Change Password</button>
									</center>
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