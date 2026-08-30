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
                        <button class="btn btn-outline-success">Blog List</button>
                        <button class="btn btn-primary BlogAddButton">
                            <i class="fa fa-plus"></i> Add Blog
                        </button>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table id="blog_table" class="table table-striped table-bordered table-hover"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>

{{-- MODAL --}}
<div class="modal dark_bg fade" id="BlogAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="blog_insert_update" action="{{ route('blog.insert') }}" accept-charset="utf-8"
            enctype="multipart/form-data" method="post" class="form-horizontal validatable">
            @csrf
            <input type="hidden" name="id" id="hidden-id" />
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Blog Add / Edit</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        {{-- Title --}}
                        <div class="col-md-12 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">Title <span style="color:red;">*</span></label>
                                <div class="col-16">
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Enter Blog Title">
                                </div>
                            </div>
                        </div>

                        {{-- Excerpt --}}
                        <div class="col-md-12 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">Short Excerpt</label>
                                <div class="col-16">
                                    <textarea name="excerpt" id="excerpt" class="form-control" rows="2"
                                        placeholder="Short description..."></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="col-md-12 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">Full Description</label>
                                <div class="col-16">
                                    <textarea name="description" id="description" class="form-control" rows="5"
                                        placeholder="Full blog content..."></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Sort Order --}}
                        <div class="col-md-6 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">Sort Order</label>
                                <div class="col-16">
                                    <input type="number" name="sort_order" id="sort_order" class="form-control"
                                        value="0">
                                </div>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">Status</label>
                                <div class="col-16" style="margin-top:8px;">
                                    <input type="checkbox" name="is_active" id="is_active" value="1" checked> Active
                                </div>
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="col-md-12 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">
                                    Image <span id="img_required" style="color:red;">*</span>
                                    <small id="img_hint" class="text-muted"></small>
                                </label>
                                <div class="col-16">
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                </div>
                                <div id="current_image_wrap" class="mt-2" style="display:none;">
                                    <small class="text-muted">Current:</small><br>
                                    <img id="current_image_preview" src=""
                                        style="max-height:80px; border-radius:6px; margin-top:4px;">
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
{{-- END MODAL --}}

@endsection

@section('script')
<script>
    $(document).ready(function () {

    // ── DataTable ──────────────────────────────────
    $('#blog_table').DataTable({
        processing: true,
        responsive: true,
        serverSide: true,
        ajax: { url: "{{ route('blog.data') }}", type: 'GET', cache: false },
        columns: [
            { title: 'SL',      data: 'id',         name: 'id' },
            { title: 'Image',   data: 'image',       name: 'image', orderable: false },
            { title: 'Title',   data: 'title',       name: 'title' },
            { title: 'Order',   data: 'sort_order',  name: 'sort_order' },
            { title: 'Status',  data: 'is_active',   name: 'is_active' },
            { title: 'Action',  data: 'action',      name: 'action', orderable: false }
        ]
    });

    // ── Insert / Update ────────────────────────────
    $('#blog_insert_update').ajaxForm({
        beforeSend: formBeforeSend,
        beforeSubmit: formBeforeSubmit,
        error: formError,
        success: function (responseText, statusText, xhr, $form) {
            formSuccess(responseText, statusText, xhr, $form);
            $('#blog_table').DataTable().draw(true);
            $('#BlogAdd').modal('hide');
            $('#hidden-id').attr('disabled', 'true');
        },
        clearForm: true,
        resetForm: true
    });

    // ── Add Button ─────────────────────────────────
    $(document).on('click', '.BlogAddButton', function () {
        $('#hidden-id').attr('disabled', 'true');
        $('#img_required').show();
        $('#img_hint').text('');
        $('#current_image_wrap').hide();
        $('#BlogAdd').modal('show');
    });

    // ── Delete ─────────────────────────────────────
    $(document).on('click', '.tableDelete', function () {
        let Id = $(this).data('id');
        $(this).ajaxSubmit({
            error: formError,
            data: { "delete": Id },
            method: 'POST',
            dataType: 'json',
            url: "{{ route('blog.insert') }}",
            success: function (responseText) {
                swal("Success!", responseText.message, "success");
                $('#blog_table').DataTable().draw(true);
            }
        });
    });

    // ── Edit ───────────────────────────────────────
    $(document).on('click', '.tableEdit', function () {
        let Id = $(this).data('id');
        $('#hidden-id').removeAttr('disabled').val(Id);
        $('#img_required').hide();
        $('#img_hint').text('(Leave empty to keep current)');

        $(this).ajaxSubmit({
            error: formError,
            data: { "id": Id },
            dataType: 'json',
            method: 'GET',
            url: "{{ route('blog.edit') }}",
            success: function (responseText) {
                let d = responseText.data;
                $('#title').val(d.title);
                $('#excerpt').val(d.excerpt);
                $('#description').val(d.description);
                $('#sort_order').val(d.sort_order);
                $('#is_active').prop('checked', d.is_active == 1);

                if (d.image) {
                    let disk = '{{ config("filesystems.voucher_disk", "public") }}';
                    $('#current_image_preview').attr('src', '/storage/' + d.image);
                    $('#current_image_wrap').show();
                } else {
                    $('#current_image_wrap').hide();
                }

                $('#BlogAdd').modal('show');
            }
        });
    });

    // ── Reset on close ─────────────────────────────
    $('#BlogAdd').on('hidden.bs.modal', function () {
        $('#blog_insert_update').trigger('reset');
        $('#current_image_wrap').hide();
        $('#img_required').show();
        $('#img_hint').text('');
    });

});
</script>
@endsection
