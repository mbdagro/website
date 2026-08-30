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
                            <button class="btn btn-outline-success pull-right">Gallary List</button>
                            <button class="btn btn-primary GallaryAddButton"><i class="fa fa-plus"></i> Gallary Add</button>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive" id="tab">
                                <table id="gallary_table" class="table table-striped table-bordered table-hover"
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
            <form id="gallary_insert_update" action="{{ route('gallary.update') }}" accept-charset="utf-8"
                enctype="multipart/form-data" method="post" class="form-horizontal validatable">
                <input type="hidden" name="id" value="" id="hidden-id" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gallary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-16 -16  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-16 col-form-label">Category</label>
                                    <div class="col-16">
                                        <select name="type" class="form-control">
                                            <option value="">Select One Option</option>
                                            <option value="gallary">Gallary</option>
                                            <option value="slider">Slider</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-16 -16  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-12 col-form-label">Name</label>
                                    <div class="col-16">
                                        <input name="name" type="text" class="form-control" value=""
                                            placeholder="Enter Name">
                                    </div>
                                </div>
                            </div>
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
                                    <label for="example-search-input" class="col-12 col-form-label"> Short
                                        Description</label>
                                    <div class="col-16">
                                        <input name="sort_des" type="text" class="form-control" value=""
                                            placeholder="Enter Title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-16 -16  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-12 col-form-label"> Long
                                        Description</label>
                                    <div class="col-16">
                                        <input name="long_des" type="text" class="form-control" value=""
                                            placeholder="Enter Title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-16 -16  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-8 col-form-label"> Gallary (300*300 jpg) if
                                        Slider(1350*450 jpg)</label>
                                    <div class="col-16">
                                        <input type="file" class="form-control" placeholder="" name="image"
                                            value="">
                                        <div id="single-image-preview" class="mt-2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-16 -16 text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-8 col-form-label">Multiple Images (upload
                                        8-9 images)</label>
                                    <div class="col-16">
                                        <input type="file" class="form-control" name="multi_image[]" multiple
                                            accept="image/*">
                                        <div id="multi-image-preview" class="col-16 mt-2 d-flex flex-wrap"></div>
                                        <div id="existing-multi-image-inputs"></div>
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
            let existingMultiImages = [];

            function renderMultiImagePreview() {
                let previewHtml = '';
                existingMultiImages.forEach(function(img, index) {
                    previewHtml +=
                        '<div class="multi-img-wrap" style="position:relative;display:inline-block;margin:0 8px 8px 0;">' +
                        '<img src="/storage/' + img + '" width="60" style="border-radius:4px;" />' +
                        '<span class="remove-multi-img" data-index="' + index + '" ' +
                        'style="position:absolute;top:-6px;right:-6px;background:#dc3545;color:#fff;border-radius:50%;width:18px;height:18px;line-height:18px;text-align:center;cursor:pointer;font-size:12px;">&times;</span>' +
                        '</div>';
                });
                $('#multi-image-preview').html(previewHtml);

                // backend ke janano hobe kon kon image rakhte hobe
                let hiddenHtml = '';
                existingMultiImages.forEach(function(img) {
                    hiddenHtml += '<input type="hidden" name="existing_multi_image[]" value="' + img + '">';
                });
                $('#existing-multi-image-inputs').html(hiddenHtml);
            }

            $(document).on('click', '.remove-multi-img', function() {
                let index = $(this).data('index');
                existingMultiImages.splice(index, 1);
                renderMultiImagePreview();
            });
            $('#gallary_table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('gallary.data') }}",
                    type: 'GET',
                    cache: false
                },
                columns: [{
                        title: 'SL',
                        data: 'id',
                        name: 'id'
                    },
                    {
                        title: 'Type',
                        data: 'type',
                        name: 'type'
                    },
                    {
                        title: 'name',
                        data: 'name',
                        name: 'name'
                    },
                    {
                        title: 'title',
                        data: 'title',
                        name: 'title'
                    },
                    {
                        title: 'sort_des',
                        data: 'sort_des',
                        name: 'sort_des'
                    },
                    {
                        title: 'long_des',
                        data: 'long_des',
                        name: 'long_des'
                    },
                    {
                        title: 'image',
                        data: 'image',
                        name: 'image'
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
            $('#gallary_insert_update').ajaxForm({
                beforeSend: formBeforeSend,
                beforeSubmit: formBeforeSubmit,
                error: formError,
                success: function(responseText, statusText, xhr, $form) {
                    formSuccess(responseText, statusText, xhr, $form);
                    $('#gallary_table').DataTable().draw(true);
                    $("#GallaryAdd").modal('hide');
                    $('#hidden-id').setAttribute("disabled");
                },
                clearForm: true,
                resetForm: true
            });
            $(document).on('click', '.GallaryAddButton', function() {
                $('#hidden-id').attr("disabled", "true");
                $('#single-image-preview').html('');
                existingMultiImages = [];
                renderMultiImagePreview();
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
                    url: "{{ route('gallary.update') }}",
                    success: function(responseText) {
                        swal("Success!", responseText.message, "success");
                        $('#gallary_table').DataTable().draw(true);
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
                    url: "{{ route('gallary.edit') }}",
                    success: function(responseText) {
                        $('select[name^="type"]').val(responseText.data.type);
                        $('input[name^="name"]').val(responseText.data.name);
                        $('input[name^="title"]').val(responseText.data.title);
                        $('input[name^="sort_des"]').val(responseText.data.sort_des);
                        $('input[name^="long_des"]').val(responseText.data.long_des);

                        // single image preview
                        let singlePreviewHtml = '';
                        try {
                            if (responseText.data.image) {
                                singlePreviewHtml = '<img src="/storage/' + responseText.data
                                    .image +
                                    '" width="80" style="border-radius:4px;" />';
                            }
                        } catch (e) {
                            console.error('image preview error:', e);
                        }
                        $('#single-image-preview').html(singlePreviewHtml);

                        let multiImages = responseText.data.multi_image;
                        try {
                            if (typeof multiImages === 'string') {
                                multiImages = JSON.parse(multiImages);
                            }
                            existingMultiImages = Array.isArray(multiImages) ? multiImages : [];
                        } catch (e) {
                            existingMultiImages = [];
                        }
                        renderMultiImagePreview();

                        // modal.show() ekhon always call hobe, even jodi kono error hoy
                        $("#GallaryAdd").modal('show');
                    },
                    error: function(xhr) {
                        console.error('Edit fetch failed:', xhr.responseText);
                        formError(xhr);
                    }
                });
            });
        });
    </script>
@endsection
