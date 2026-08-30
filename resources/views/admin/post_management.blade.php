@extends('layouts.BackEndApps')
@section('content')
  @include('admin.header')
  @include('admin.sidebar-left')
	<div class="wrapper-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-16 col-md-16">
						<div class="card">
							<div class="card-footer align-items-center justify-content-between d-flex">
								<button class="btn btn-outline-success pull-right">Post Management List</button>
								<button class="btn btn-primary" id="btPrint" onclick="createPDF()"><i class="fa fa-print"></i> Print</button>
							</div>
							<div class="card-block">
								<div class="table-responsive" id="tab">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>SL</th>				  			  			  
												<th>Post Name</th>				  			  			  				  
												<th>Post Status</th>				  			  
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Post Name</td>		  			  		  			  
												<td>Active</td>			  			  		  			  
												<td>
													<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Permission"><i class="fa fa-folder-open"></i></button>											
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Post Name</td>		  			  		  			  
												<td>Active</td>			  			  		  			  
												<td>
													<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Permission"><i class="fa fa-folder-open"></i></button>											
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>Post Name</td>		  			  		  			  
												<td>Active</td>			  			  		  			  
												<td>
													<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Permission"><i class="fa fa-folder-open"></i></button>											
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>Post Name</td>		  			  		  			  
												<td>Active</td>			  			  		  			  
												<td>
													<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Permission"><i class="fa fa-folder-open"></i></button>											
												</td>
											</tr>

										</tbody>
									</table>						
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		@include('layouts.footer') 
	</div>
		<!--Start Modal-->
		<div class="modal dark_bg fade" id="Permission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Post Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-16 -16  text-white">
								<div class="form-group">
									<label for="example-search-input" class="col-8 col-form-label">Post Name</label>
									<div class="col-16">
										<input type="text" name="post_name" class="form-control" placeholder="Post Name" value="">
									</div>
								</div>
							</div>							

							<div class="col-md-16 -16  text-white">
								<div class="form-group">
									<label for="example-search-input" class="col-8 col-form-label">Post Description</label>
									<div class="col-16">
										<textarea class="form-control" name="description" id="exampleTextarea" rows="3"></textarea>									
									</div>
								</div>
							</div>
							<div class="col-md-16 -16  text-white">
								<div class="form-group">
									<label for="example-search-input" class="col-8 col-form-label">Status</label>
									<div class="col-16">
										<select name="status" class="form-control">
											<option value="active">Active</option>
											<option value="deactivate">Deactivate</option>
										</select>										
									</div>
								</div>
							</div>							
						</div>
					</div>					   
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</div>
		<!--End Modal-->	
@endsection