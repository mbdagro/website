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
                            <button class="btn btn-outline-success pull-right">Sister Concern List</button>
                            <button class="btn btn-primary NewsEventAddButton"><i class="fa fa-plus"></i> Sister Concern Add</button>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive" id="tab">
                                <table id="news_event_table" class="table table-striped table-bordered table-hover"
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
    <div class="modal dark_bg fade" id="GallaryAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="news_event_insert_update" action="{{ route('concern.update') }}" accept-charset="utf-8"
                enctype="multipart/form-data" method="post" class="form-horizontal validatable">
                <input type="hidden" name="id" value="" id="hidden-id" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sister Concern</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-16 -16  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-12 col-form-label"> Title</label>
                                    <div class="col-16">
                                        <input name="title" type="text" class="form-control" value=""
                                            placeholder="Enter Title">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-16 -16  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-8 col-form-label">Type</label>
                                    <select name="type" class="form-control">
                                        <option value="">Select Any</option>
                                        <option value="Our Concern">Our Concern</option>
                                        <option value="Printing">Printing & publication</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-16 -16  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-8 col-form-label"> Logo </label>
                                    <div class="col-16">
                                        <input type="file" class="form-control" placeholder="" name="image" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-16 -16  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-12 col-form-label"> Long
                                        Description</label>
                                    <div class="col-16">
                                        <input name="description" type="text" class="form-control" value=""
                                            placeholder="Enter Title">
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
            </form>
        </div>
    </div>
    <!--EndModel-->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#news_event_table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('concern.data') }}",
                    type: 'GET',
                    cache: false
                },
                columns: [{
                        title: 'SL',
                        data: 'id',
                        name: 'id'
                    },
                    {
                        title: 'Title',
                        data: 'title',
                        name: 'title'
                    },

                    {
                        title: 'Type',
                        data: 'type',
                        name: 'type'
                    },

                    {
                        title: 'Description',
                        data: 'description',
                        name: 'description'
                    },
                    {
                        title: 'Logo',
                        data: 'logo',
                        name: 'logo'
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
            $('#news_event_insert_update').ajaxForm({
                beforeSend: formBeforeSend,
                beforeSubmit: formBeforeSubmit,
                error: formError,
                success: function(responseText, statusText, xhr, $form) {
                    formSuccess(responseText, statusText, xhr, $form);
                    $('#news_event_table').DataTable().draw(true);
                    $("#GallaryAdd").modal('hide');
                    $('#hidden-id').setAttribute("disabled");
                },
                clearForm: true,
                resetForm: true
            });
            $(document).on('click', '.NewsEventAddButton', function() {
                $('#hidden-id').attr("disabled", "true");
                $("#GallaryAdd").modal('show');
            });
            $(document).on('click', '.tableDelete', function() {
                let Id = $(this).data('id');
                $(this).ajaxSubmit({
                    error: formError,
                    data: {
                        "delete": Id
                    },
                    method: 'POST',
                    dataType: 'json',
                    url: "{{ route('concern.update') }}",
                    success: function(responseText) {
                        swal("Success!", responseText.message, "success");
                        $('#news_event_table').DataTable().draw(true);
                    }
                });
            });

            $(document).on('click', '.tableEdit', function() {
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
                    url: "{{ route('concern.edit') }}",
                    success: function(responseText) {
                        $('input[name^="name"]').val(responseText.data.name);
                        $('input[name^="title"]').val(responseText.data.title);
                        $('input[name^="description"]').val(responseText.data.description);
                        $('select[name^="date"]').val(responseText.data.date);
                        $("#GallaryAdd").modal('show');
                    }
                });
            });
        });
    </script>
@endsection
