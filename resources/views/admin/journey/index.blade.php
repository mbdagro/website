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
                        <button class="btn btn-outline-success pull-right">Journey List</button>
                        <button class="btn btn-primary JourneyAddButton">
                            <i class="fa fa-plus"></i> Add Journey
                        </button>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive" id="tab">
                            <table id="journey_table" class="table table-striped table-bordered table-hover"
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

{{-- ── MODAL ─────────────────────────────────────────── --}}
<div class="modal dark_bg fade" id="JourneyAdd" tabindex="-1" role="dialog" aria-labelledby="JourneyModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="journey_insert_update" action="{{ route('journey.insert') }}" accept-charset="utf-8"
            enctype="multipart/form-data" method="post" class="form-horizontal validatable">
            @csrf
            <input type="hidden" name="id" id="hidden-id" />

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="JourneyModalLabel">Journey Add / Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">

                        {{-- Year --}}
                        <div class="col-md-6 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">
                                    Year <span style="color:red;">*</span>
                                </label>
                                <div class="col-16">
                                    <input type="number" name="year" id="year" class="form-control"
                                        placeholder="e.g. 1992" min="1900" max="2100">
                                </div>
                            </div>
                        </div>

                        {{-- Sort Order --}}
                        <div class="col-md-6 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">Sort Order</label>
                                <div class="col-16">
                                    <input type="number" name="sort_order" id="sort_order" class="form-control"
                                        placeholder="0" value="0">
                                </div>
                            </div>
                        </div>

                        {{-- Title --}}
                        <div class="col-md-12 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">
                                    Title <span style="color:red;">*</span>
                                </label>
                                <div class="col-16">
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Enter Title">
                                </div>
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="col-md-12 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">
                                    Description <span style="color:red;">*</span>
                                </label>
                                <div class="col-16">
                                    <textarea name="description" id="description" class="form-control" rows="4"
                                        placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Image Position --}}
                        <div class="col-md-6 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">
                                    Image Position <span style="color:red;">*</span>
                                </label>
                                <div class="col-16">
                                    <select name="image_position" id="image_position" class="form-control">
                                        <option value="left">Left</option>
                                        <option value="right">Right</option>
                                    </select>
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

                        {{-- Image Upload --}}
                        <div class="col-md-12 text-white">
                            <div class="form-group">
                                <label class="col-12 col-form-label">
                                    Image <span id="image_required" style="color:red;">*</span>
                                    <small class="text-muted" id="image_hint"></small>
                                </label>
                                <div class="col-16">
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                </div>
                                {{-- Preview current image on edit --}}
                                <div id="current_image_wrap" class="mt-2" style="display:none;">
                                    <small class="text-muted">Current Image:</small><br>
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
{{-- ── END MODAL ─────────────────────────────────────── --}}

@endsection

@section('script')
<script>
    $(document).ready(function () {

    // ── DataTable ──────────────────────────────────────────
    $('#journey_table').DataTable({
        processing: true,
        responsive: true,
        serverSide: true,
        ajax: {
            url: "{{ route('journey.data') }}",
            type: 'GET',
            cache: false
        },
        columns: [
            { title: 'SL',       data: 'id',             name: 'id' },
            { title: 'Year',     data: 'year',            name: 'year' },
            { title: 'Image',    data: 'image',           name: 'image', orderable: false },
            { title: 'Title',    data: 'title',           name: 'title' },
            // { title: 'Position', data: 'image_position',  name: 'image_position' },
            { title: 'Description', data: 'description',  name: 'description' },
            { title: 'Order',    data: 'sort_order',      name: 'sort_order' },
            { title: 'Status',   data: 'is_active',       name: 'is_active' },
            { title: 'Action',   data: 'action',          name: 'action', orderable: false }
        ]
    });

    // ── Insert / Update ────────────────────────────────────
    $('#journey_insert_update').ajaxForm({
        beforeSend: formBeforeSend,
        beforeSubmit: formBeforeSubmit,
        error: formError,
        success: function (responseText, statusText, xhr, $form) {
            formSuccess(responseText, statusText, xhr, $form);
            $('#journey_table').DataTable().draw(true);
            $('#JourneyAdd').modal('hide');
            $('#hidden-id').attr('disabled', 'true');
        },
        clearForm: true,
        resetForm: true
    });

    // ── Add Button ─────────────────────────────────────────
    $(document).on('click', '.JourneyAddButton', function () {
        $('#hidden-id').attr('disabled', 'true');
        $('#image_required').show();
        $('#image_hint').text('');
        $('#current_image_wrap').hide();
        $('#JourneyAdd').modal('show');
    });

    // ── Delete ─────────────────────────────────────────────
    $(document).on('click', '.tableDelete', function () {
        let Id = $(this).data('id');
        $(this).ajaxSubmit({
            error: formError,
            data: { "delete": Id },
            method: 'POST',
            dataType: 'json',
            url: "{{ route('journey.insert') }}",
            success: function (responseText) {
                swal("Success!", responseText.message, "success");
                $('#journey_table').DataTable().draw(true);
            }
        });
    });

    // ── Edit ───────────────────────────────────────────────
    $(document).on('click', '.tableEdit', function () {
        let Id = $(this).data('id');
        $('#hidden-id').removeAttr('disabled');
        $('#hidden-id').val(Id);
        $('#image_required').hide();
        $('#image_hint').text('(Leave empty to keep current)');

        $(this).ajaxSubmit({
            error: formError,
            data: { "id": Id },
            dataType: 'json',
            method: 'GET',
            url: "{{ route('journey.edit') }}",
            success: function (responseText) {
                let d = responseText.data;
                $('#year').val(d.year);
                $('#title').val(d.title);
                $('#description').val(d.description);
                $('#image_position').val(d.image_position);
                $('#sort_order').val(d.sort_order);
                $('#is_active').prop('checked', d.is_active == 1);

                // Show current image preview
                if (d.image) {
                    $('#current_image_preview').attr('src', '/storage/' + d.image);
                    $('#current_image_wrap').show();
                } else {
                    $('#current_image_wrap').hide();
                }

                $('#JourneyAdd').modal('show');
            }
        });
    });

    // ── Reset on modal close ───────────────────────────────
    $('#JourneyAdd').on('hidden.bs.modal', function () {
        $('#journey_insert_update').trigger('reset');
        $('#current_image_wrap').hide();
        $('#image_required').show();
        $('#image_hint').text('');
    });

});
</script>
@endsection
