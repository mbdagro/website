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
						<button class="btn btn-outline-success pull-right">Category List</button>
						<button class="btn btn-primary CategoryAddButton" ><i class="fa fa-plus"></i> Category Add</button>
					</div>
					<div class="card-block">
						<div class="table-responsive" id="tab">
							<table id="category_table" class="table table-striped table-bordered table-hover" style="border: solid 1px rgba(255, 193, 193, 0.1);">  
							</table>
							
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	@include('layouts.footer') 
</div>  
<!--Start Model-->
<div class="modal dark_bg fade" id="CategoryAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form id="category_insert_update" action="{{route('category.update')}}" accept-charset="utf-8"  enctype="multipart/form-data" method="post"  class="form-horizontal validatable">
			<input type="hidden" name="id" value="" id="hidden-id" />		
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body">									
					<div class="row">	
						
						<div class="col-md-16 -16  text-white">
							<div class="form-group">
								<label for="example-search-input" class="col-12 col-form-label">Name</label>
								<div class="col-16">
									<input name="name" type="text" class="form-control" value="" placeholder="Enter Name">
								</div>
							</div>
						</div>
					
						<!--div class="col-md-16 -16  text-white">
							<div class="form-group">
								<label for="example-search-input" class="col-8 col-form-label">Image</label>
								<div class="col-16">
								<input type="file" class="form-control" placeholder="" name="image" value="">
								</div>
							</div>
						</div-->
					</div>
				</div>	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>	
	</div>
</div>
		<!--EndModel-->
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$('#category_table').DataTable({
			processing: true,
			responsive: true,
			serverSide: true,
			ajax: {
				url: "{{route('category.data')}}",
				type: 'GET',
				cache: false
			},
			columns: [
            { title: 'SL', data: 'id', name: 'id' },
            { title: 'name', data: 'name', name: 'name' },
          //  { title: 'image', data: 'image', name: 'image' },
			{ title: 'Add By', data: 'user_id', name: 'user_id' },
			{ title: 'Action', data: 'action', name: 'action' }
			]
		});
		$('#category_insert_update').ajaxForm({
			beforeSend: formBeforeSend,
			beforeSubmit: formBeforeSubmit,
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('#category_table').DataTable().draw(true);
				$("#CategoryAdd").modal('hide');
				$('#hidden-id').setAttribute("disabled");
			},
			clearForm: true,
			resetForm: true
		});
		$(document).on('click','.CategoryAddButton',function () { 
			$('#hidden-id').attr("disabled","true");
			$("#CategoryAdd").modal('show');
		});
		$(document).on('click','.tableDelete',function () { 
			let Id = $(this).data('id');
			$(this).ajaxSubmit({
				error: formError,
				data: {  
					"delete": Id 
				},
				method: 'POST',
				dataType: 'json',
				url: "{{route('category.update')}}",
				success: function (responseText) {
					swal("Success!", responseText.message, "success");
					$('#category_table').DataTable().draw(true);
				}
			});
		});
		
		$(document).on('click','.tableEdit',function () { 
			let Id = $(this).data('id');
			$('#hidden-id').removeAttr("disabled");
			$('#hidden-id').val(Id);
			$(this).ajaxSubmit({
				error: formError,
				data: { "id": Id },
				dataType: 'json',
				method: 'GET',
				url: "{{route('category.edit')}}",
				success: function (responseText) {
					$('input[name^="name"]').val(responseText.data.name);
					$("#CategoryAdd").modal('show');
				}
			});
		});
	});
</script>
@endsection