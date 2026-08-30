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
                        <button class="btn btn-outline-success pull-right">Product/Service Reward List</button>
                        <button class="btn btn-primary ServiceAddButton"><i class="fa fa-plus"></i> Product/Service Reward
                            Add</button>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive" id="tab">
                            <table id="service_table" class="table table-striped table-bordered table-hover"
                                style="border: solid 1px rgba(255, 193, 193, 0.1);">
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
<div class="modal dark_bg fade" id="ServiceAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="service_insert_update" action="{{route('reward.update')}}" accept-charset="utf-8"
            enctype="multipart/form-data" method="post" class="form-horizontal validatable">
            <input type="hidden" name="id" id="hidden-id" />
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product/Service Reward</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{-- <div class="col-md-16  text-white">
                            <div class="form-group">
                                <label for="example-search-input" class="col-16 col-form-label">Product/Service</label>
                                <div class="col-16">
                                    <select name="product_service_id" class="form-control">
                                        <option value="">Select One Option</option>
                                        @foreach ($ProductServices as $ProductService)
                                            <option value="{{ $ProductService->id }}">{{ $ProductService->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}
						<div class="col-md-16  text-white">
                            <div class="form-group">
                                <label for="example-search-input" class="col-12 col-form-label">Rewards</label>
                                <div class="col-16">
                                    <input name="reward" type="file" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary formSubmit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--EndModel-->
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function () {

        $('#service_table').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: "{{route('reward.data')}}",
                type: 'GET',
                cache: false
            },
            columns: [{
                    title: 'SL',
                    data: 'id',
                    name: 'id'
                },
                {
                    title: 'Reward',
                    data: 'reward',
                    name: 'reward'
                },
                {
                    title: 'Add By',
                    data: 'user_id',
                    name: 'user_id'
                },
                {
                    title: 'Action',
                    data: 'action',
                    name: 'action'
                }
            ]
        });

        $('#service_insert_update').ajaxForm({
            beforeSend: formBeforeSend,
            beforeSubmit: formBeforeSubmit,
            error: formError,
            success: function (responseText, statusText, xhr, $form) {
                formSuccess(responseText, statusText, xhr, $form);
                $('#service_table').DataTable().draw(true);
                $("#ServiceAdd").modal('hide');
                $('#hidden-id').attr("disabled", "true");
            },
            clearForm: true,
            resetForm: true
        });

        $(document).on('click', '.ServiceAddButton', function () {
            $('#hidden-id').attr("disabled", "true");
            $("#ServiceAdd").modal('show');
			var ProductServiceID = "PS" + generator.generate();
			$('input[name^="code"]').val(ProductServiceID);
        });
        $(document).on('click', '.tableDelete', function () {
            let Id = $(this).data('id');
            $(this).ajaxSubmit({
                error: formError,
                data: {
                    "delete": Id
                },
                method: 'POST',
                dataType: 'json',
                url: "{{route('reward.update')}}",
                success: function (responseText) {
                    swal("Success!", responseText.message, "success");
                    $('#service_table').DataTable().draw(true);
                }
            });
        });

        $(document).on('click', '.tableEdit', function () {
            let Id = $(this).data('id');
            $('#hidden-id').removeAttr("disabled");
            $('#hidden-id').val(Id);
            $(this).ajaxSubmit({
                error: formError,
                data: {
                    "id": Id
                },
                dataType: 'json',
                method: 'GET',
                url: "{{route('productservice.edit')}}",
                success: function (responseText) {
                    $('select[name^="category"]').val(responseText.data.category);
                    $('select[name^="progress"]').val(responseText.data.progress);
                    $('input[name^="code"]').val(responseText.data.code);
                    $('input[name^="name"]').val(responseText.data.name);
                    $('input[name^="price"]').val(responseText.data.price);
                    $('input[name^="video_link"]').val(responseText.data.video_link);
                    $('input[name^="short_description"]').val(responseText.data.short_description);
                    $("#ServiceAdd").modal('show');
                CKEDITOR.instances['description'].setData(responseText.data.description);
			}
            });
        });
		function IDGenerator(value = 10) {

			this.length = value;
			this.timestamp = +new Date;

			var _getRandomInt = function (min, max) {
				return Math.floor(Math.random() * (max - min + 1)) + min;
			}

			this.generate = function () {
				var ts = this.timestamp.toString();
				var parts = ts.split("").reverse();
				var id = "";

				for (var i = 0; i < this.length; ++i) {
					var index = _getRandomInt(0, parts.length - 1);
					id += parts[index];
				}

				return id;
			}
		}
    });

</script>
@endsection
