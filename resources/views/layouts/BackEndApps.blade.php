<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--
    <link rel="icon" href="{{ asset('apps_resource/img/') }}/design_touch.png"> --}}
    <link rel="shortcut icon"
        href="{{ $HomeManagement->logo ? Storage::disk(config('filesystems.voucher_disk', 'public'))->url($HomeManagement->logo) : asset('favicon.ico') }}">
    {{-- <title>{{asset($HomeManagement->company_name)}}</title> --}}
    <title>{{$HomeManagement->company_name}}</title>
    <!-- Fontawesome icon CSS -->
    <link rel="stylesheet" href="{{ asset('apps_resource/') }}/vendor/font-awesome-4.7.0/css/font-awesome.min.css"
        type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('apps_resource/') }}/vendor/bootstrap4alpha/css/bootstrap.css"
        type="text/css">

    <link rel="stylesheet" href="{{ asset('js/jquery.typeahead.css')}}" type="text/css">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('apps_resource/') }}/vendor/datatables/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="{{ asset('apps_resource/') }}/vendor/datatables/css/responsive.dataTables.min.css" rel="stylesheet">
    <!-- jvectormap CSS -->
    <link href="{{ asset('apps_resource/vendor/jquery-jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet">
    <!-- Adminux CSS -->
    <link rel="stylesheet" href="{{ asset('apps_resource/css/dark_blue_adminux.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('sweetalert/sweetalert.css')}}">

    <style>
        table {
            width: 300px;
            font: 17px Calibri;
        }

        table,
        th,
        td {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
        }

        .sweet-alert h2 {
            color: black;
        }

        .text-muted p {
            color: black;
        }
    </style>
    @yield('css')
    <style>
        .text-muted {
            color: black;
        }
    </style>
</head>

<body class="menuclose menuclose-right">
    <!--Start wrapper-content-->
    @yield('content')
    <!--End wrapper-content-->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="{{ asset('apps_resource/') }}/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="{{ asset('apps_resource/') }}/vendor/bootstrap4alpha/js/tether.min.js"></script>
    <script src="{{ asset('apps_resource/') }}/vendor/bootstrap4alpha/js/bootstrap.min.js" type="text/javascript">
    </script>

    <script src="{{ asset('apps_resource/') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('apps_resource/') }}/vendor/datatables/js/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('apps_resource/') }}/vendor/datatables/js/dataTables.responsive.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('apps_resource/') }}/js/ie10-viewport-bug-workaround.js"></script>
    <!-- Circular chart progress js -->
    <script src="{{ asset('apps_resource/') }}/vendor/cicular_progress/circle-progress.min.js" type="text/javascript">
    </script>

    <!--sparklines js-->
    <script type="text/javascript" src="{{ asset('apps_resource/') }}/vendor/sparklines/jquery.sparkline.min.js">
    </script>

    <!-- custome template js -->

    <script src="{{ asset('apps_resource/') }}/js/adminux.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('sweetalert/sweetalert.min.js')}}"></script>

    <script src="{{ asset('js/form.js') }}"></script>
    <script src="{{ asset('js/typehead.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>


    @yield('script')
    <script>
        $(document).ready(function () {

            $('.modal.printable').on('shown.bs.modal', function () {
                $('.modal-dialog', this).addClass('focused');
                $('body').addClass('modalprinter');

            }).on('hidden.bs.modal', function () {
                $('.modal-dialog', this).removeClass('focused');
                $('body').removeClass('modalprinter');
            });

            function getDateFormat(date = null) {
                if (date) {
                    var now = new Date(date);
                } else {
                    var now = new Date();
                }
                var month = (now.getMonth() + 1);
                var day = now.getDate();
                if (month < 10)
                    month = "0" + month;
                if (day < 10)
                    day = "0" + day;
                var today = now.getFullYear() + '-' + month + '-' + day;
                return today;
            }

            var date = new Date();
            var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
            var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
            $('.currentDate').val(getDateFormat());
            $('.firstDate').val(getDateFormat(firstDay));
            $('.lastDate').val(getDateFormat(lastDay));
        });

        var _arr  = {};

        function loadScript(scriptName, callback) {
            if (!_arr[scriptName]) {
                _arr[scriptName] = true;
                var body = document.getElementsByTagName('body')[0];
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = scriptName;
                script.onload = callback;
                body.appendChild(script);
            } else if (callback) {
                callback();
            }
        };

    </script>
    <script>
        $(document).ready(function () {
            $('#logout-form').ajaxForm({
                beforeSend: formBeforeSend,
                beforeSubmit: formBeforeSubmit,
                error: formError,
                success: function (responseText, statusText, xhr, $form) {
                    // formSuccess(responseText, statusText, xhr, $form);
                    location.href = responseText.url;
                },
                clearForm: true,
                resetForm: true
            });
        });

    </script>
</body>

</html>
