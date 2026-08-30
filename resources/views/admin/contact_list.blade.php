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
                        <button class="btn btn-outline-success pull-right">Contact/Order List</button>

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

@endsection
@section('script')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function () {

        $('#service_table').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: "{{route('contact_us.data')}}",
                type: 'GET',
                cache: false
            },
            columns: [{
                    title: 'SL',
                    data: 'id',
                    name: 'id'
                },
                {
                    title: 'Name',
                    data: 'full_name',
                    name: 'full_name'
                },
				{
                    title: 'Phone',
                    data: 'phone',
                    name: 'phone'
                },
                {
                    title: 'E-mail',
                    data: 'email',
                    name: 'address'
                },
                {
                    title: 'Subject',
                    data: 'subject',
                    name: 'subject'
                },
                {
                    title: 'Message',
                    data: 'message',
                    name: 'message'
                }


            ]
        });

    });

</script>
@endsection
