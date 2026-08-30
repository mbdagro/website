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
                            <button class="btn btn-outline-success pull-right">FAQ List</button>
                            <button class="btn btn-primary FaqAddButton">
                                <i class="fa fa-plus"></i> FAQ Add
                            </button>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive" id="tab">
                                <table id="faq_table" class="table table-striped table-bordered table-hover"
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

    <!--Start Modal-->
    <div class="modal dark_bg fade" id="FaqAdd" tabindex="-1" role="dialog" aria-labelledby="FaqModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="faq_insert_update" action="{{ route('faq.insert') }}" accept-charset="utf-8"
                enctype="multipart/form-data" method="post" class="form-horizontal validatable">
                @csrf
                <input type="hidden" name="id" id="hidden-id" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="FaqModalLabel">FAQ Add / Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">
                                        Question <span style="color:red;">*</span>
                                    </label>
                                    <div class="col-16">
                                        <input type="text" name="question" id="question"
                                            class="form-control" placeholder="Enter Question">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">
                                        Answer <span style="color:red;">*</span>
                                    </label>
                                    <div class="col-16">
                                        <textarea name="answer" id="answer" class="form-control"
                                            rows="4" placeholder="Enter Answer"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">Order</label>
                                    <div class="col-16">
                                        <input type="number" name="order" id="order"
                                            class="form-control" placeholder="0" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">Status</label>
                                    <div class="col-16" style="margin-top:8px;">
                                        <input type="checkbox" name="is_active" id="is_active"
                                            value="1" checked> Active
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
    <!--End Modal-->

@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $('#faq_table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('faq.data') }}",
                    type: 'GET',
                    cache: false
                },
                columns: [
                    { title: 'SL',       data: 'id',        name: 'id' },
                    { title: 'Question', data: 'question',  name: 'question' },
                    { title: 'Answer',   data: 'answer',    name: 'answer' },
                    { title: 'Order',    data: 'order',     name: 'order' },
                    { title: 'Status',   data: 'is_active', name: 'is_active' },
                    { title: 'Action',   data: 'action',    name: 'action' }
                ]
            });

            // Insert / Update
            $('#faq_insert_update').ajaxForm({
                beforeSend: formBeforeSend,
                beforeSubmit: formBeforeSubmit,
                error: formError,
                success: function (responseText, statusText, xhr, $form) {
                    formSuccess(responseText, statusText, xhr, $form);
                    $('#faq_table').DataTable().draw(true);
                    $('#FaqAdd').modal('hide');
                    $('#hidden-id').attr('disabled', 'true');
                },
                clearForm: true,
                resetForm: true
            });

            // Add Button
            $(document).on('click', '.FaqAddButton', function () {
                $('#hidden-id').attr('disabled', 'true');
                $('#FaqAdd').modal('show');
            });

            // Delete
            $(document).on('click', '.tableDelete', function () {
                let Id = $(this).data('id');
                $(this).ajaxSubmit({
                    error: formError,
                    data: { "delete": Id },
                    method: 'POST',
                    dataType: 'json',
                    url: "{{ route('faq.insert') }}",
                    success: function (responseText) {
                        swal("Success!", responseText.message, "success");
                        $('#faq_table').DataTable().draw(true);
                    }
                });
            });

            // Edit
            $(document).on('click', '.tableEdit', function () {
                let Id = $(this).data('id');
                $('#hidden-id').removeAttr('disabled');
                $('#hidden-id').val(Id);

                $(this).ajaxSubmit({
                    error: formError,
                    data: { "id": Id },
                    dataType: 'json',
                    method: 'GET',
                    url: "{{ route('faq.edit') }}",
                    success: function (responseText) {
                        $('#question').val(responseText.data.question);
                        $('#answer').val(responseText.data.answer);
                        $('#order').val(responseText.data.order);
                        $('#is_active').prop('checked', responseText.data.is_active == 1);
                        $('#FaqAdd').modal('show');
                    }
                });
            });

            // Reset on modal close
            $('#FaqAdd').on('hidden.bs.modal', function () {
                $('#faq_insert_update').trigger('reset');
            });

        });
    </script>
@endsection