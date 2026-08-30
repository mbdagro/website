@extends('layouts.BackEndApps')
@section('content')
    @include('admin.header')
    @include('admin.sidebar-left')
    <br>
    <br>
    <br>
    <div class="wrapper-content">
        <div class="container">
            <div class="row  align-items-center justify-content-between">
                <div class="col-16 col-sm-16 page-title" align="center">
                    <h3>Welcome To MBD AGRO </h3>
                </div>
                <!--div class="col text-right ">
        <div class="btn-group pull-right">
        <button class="btn btn-outline-primary btn-round dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text">Customise</span> <i class="fa fa-cogs ml-2"></i></button>
        <div class="dropdown-menu"> <a class="dropdown-item" href="#">Dark-blue Theme</a> <a class="dropdown-item" href="#">Dark Purple Theme</a> <a class="dropdown-item" href="#">Dark Red Theme</a> <a class="dropdown-item" href="#">Dark Grey Theme</a> <a class="dropdown-item" href="#">Dark Green Theme</a> <a class="dropdown-item" href="#">Dark Brown Theme</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Light theme</a> <a class="dropdown-item" href="#">Light Round theme</a> </div>
        </div>
       </div-->
            </div>

        </div>
        @include('layouts.footer')
    </div>
@endsection
