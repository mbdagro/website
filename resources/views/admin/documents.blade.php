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
                            <button class="btn btn-outline-success">Document List</button>
                            <button class="btn btn-primary DocumentAddButton">
                                <i class="fa fa-plus"></i> Add Document
                            </button>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="document_table" class="table table-striped table-bordered table-hover"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>

    {{-- MODAL --}}
    <div class="modal dark_bg fade" id="DocumentAdd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="document_insert_update" action="{{ route('document.insert') }}" accept-charset="utf-8"
                enctype="multipart/form-data" method="post" class="form-horizontal validatable">
                @csrf
                <input type="hidden" name="id" id="hidden-id" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Document Add / Edit</h5>
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
                                            placeholder="Enter Document Title">
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
                                        <input type="checkbox" name="is_active" id="is_active" value="1" checked>
                                        Active
                                    </div>
                                </div>
                            </div>

                            {{-- PDF --}}
                            <div class="col-md-12 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">
                                        PDF File <span id="pdf_required" style="color:red;">*</span>
                                        <small id="pdf_hint" class="text-muted"></small>
                                    </label>
                                    <div class="col-16">
                                        <input type="file" name="pdf" id="pdf" class="form-control"
                                            accept="application/pdf">
                                    </div>
                                    <div id="current_pdf_wrap" class="mt-2" style="display:none;">
                                        <a id="current_pdf_link" href="#" target="_blank"
                                            class="btn btn-outline-secondary btn-sm">
                                            <i class="fa fa-file-pdf-o"></i> View Current PDF
                                        </a>
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
        $(document).ready(function() {

            // ── DataTable ──────────────────────────────────
            $('#document_table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('document.data') }}",
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
                        title: 'PDF',
                        data: 'pdf',
                        name: 'pdf',
                        orderable: false
                    },
                    {
                        title: 'Order',
                        data: 'sort_order',
                        name: 'sort_order'
                    },
                    {
                        title: 'Status',
                        data: 'is_active',
                        name: 'is_active'
                    },
                    {
                        title: 'Action',
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });

            // ── Insert / Update ────────────────────────────
            $('#document_insert_update').ajaxForm({
                beforeSend: formBeforeSend,
                beforeSubmit: formBeforeSubmit,
                error: formError,
                success: function(responseText, statusText, xhr, $form) {
                    formSuccess(responseText, statusText, xhr, $form);
                    $('#document_table').DataTable().draw(true);
                    $('#DocumentAdd').modal('hide');
                    $('#hidden-id').attr('disabled', 'true');
                },
                clearForm: true,
                resetForm: true
            });

            // ── Add Button ─────────────────────────────────
            $(document).on('click', '.DocumentAddButton', function() {
                $('#hidden-id').attr('disabled', 'true');
                $('#pdf_required').show();
                $('#pdf_hint').text('');
                $('#current_pdf_wrap').hide();
                $('#DocumentAdd').modal('show');
            });

            // ── Delete ─────────────────────────────────────
            $(document).on('click', '.tableDelete', function() {
                let Id = $(this).data('id');
                $(this).ajaxSubmit({
                    error: formError,
                    data: {
                        "delete": Id
                    },
                    method: 'POST',
                    dataType: 'json',
                    url: "{{ route('document.insert') }}",
                    success: function(responseText) {
                        swal("Success!", responseText.message, "success");
                        $('#document_table').DataTable().draw(true);
                    }
                });
            });

            // ── Edit ───────────────────────────────────────
            $(document).on('click', '.tableEdit', function() {
                let Id = $(this).data('id');
                $('#hidden-id').removeAttr('disabled').val(Id);
                $('#pdf_required').hide();
                $('#pdf_hint').text('(Leave empty to keep current)');

                $(this).ajaxSubmit({
                    error: formError,
                    data: {
                        "id": Id
                    },
                    dataType: 'json',
                    method: 'GET',
                    url: "{{ route('document.edit') }}",
                    success: function(responseText) {
                        let d = responseText.data;
                        $('#title').val(d.title);
                        $('#sort_order').val(d.sort_order);
                        $('#is_active').prop('checked', d.is_active == 1);

                        if (d.pdf) {
                            $('#current_pdf_link').attr('href', '/storage/' + d.pdf);
                            $('#current_pdf_wrap').show();
                        } else {
                            $('#current_pdf_wrap').hide();
                        }

                        $('#DocumentAdd').modal('show');
                    }
                });
            });

            // ── Reset on close ─────────────────────────────
            $('#DocumentAdd').on('hidden.bs.modal', function() {
                $('#document_insert_update').trigger('reset');
                $('#current_pdf_wrap').hide();
                $('#pdf_required').show();
                $('#pdf_hint').text('');
            });

        });
    </script>
@endsection
