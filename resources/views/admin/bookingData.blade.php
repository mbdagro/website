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
						<button class="btn btn-outline-success pull-right">Booking Info List</button>
						{{-- <button class="btn btn-primary NewsEventAddButton" ><i class="fa fa-plus"></i> What Makes Us Best Add</button> --}}
					</div>
					<div class="card-block">
						<div class="table-responsive" id="tab">
							<table id="notice_board_table" class="table table-striped table-bordered table-hover" style="border: solid 1px rgba(255, 193, 193, 0.1);">
							</table>

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
		$('#notice_board_table').DataTable({
			processing: true,
			responsive: true,
			serverSide: true,
			ajax: {
				url: "{{route('booking-data.view')}}",
				type: 'GET',
				cache: false
			},
			columns: [
            { title: 'SL', data: 'id', name: 'id' },
            { title: 'Product/Service', data: 'product_service_id', name: 'product_service_id' },
            { title: 'Name', data: 'name', name: 'name' },
            { title: 'Mobile', data: 'mobile', name: 'mobile' },
            { title: 'Email', data: 'email', name: 'email' },
            { title: 'Message', data: 'message', name: 'message' }
			]
		});
		$('#notice_board_insert_update').ajaxForm({
			beforeSend: formBeforeSend,
			beforeSubmit: formBeforeSubmit,
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('#notice_board_table').DataTable().draw(true);
				$("#GallaryAdd").modal('hide');
				$('#hidden-id').setAttribute("disabled");
			},
			clearForm: true,
			resetForm: true
		});
		$(document).on('click','.NewsEventAddButton',function () {
			$('#hidden-id').attr("disabled","true");
			$("#GallaryAdd").modal('show');
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
				url: "{{route('what_makes_us_best.update')}}",
				success: function (responseText) {
					swal("Success!", responseText.message, "success");
					$('#notice_board_table').DataTable().draw(true);
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
				url: "{{route('what_makes_us_best.edit')}}",
				success: function (responseText) {
					$('input[name^="what_makes_us_best"]').val(responseText.data.what_makes_us_best);
					$("#GallaryAdd").modal('show');
				}
			});
		});
	});
</script>
@endsection
