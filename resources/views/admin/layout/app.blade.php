<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LowLowerGone - Admin | {{$title}}</title>
            <link rel="icon" href="{{asset('admin/login/logo.png')}}" type="image/x-icon">
        <!-- Bootstrap Core CSS -->
        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('admin/css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{asset('admin/css/timeline.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('admin/css/startmin.css')}}" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="{{asset('admin/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="{{asset('admin/css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">

        
        <!-- Custom Fonts -->
        <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin/js/taginput/tagsinput.css')}}" rel="stylesheet" type="text/css">

       <style type="text/css">
           .ft-14{
            font-size:14px;
           }
           .ft-16{
            font-size :16px;
           }
           .ft-18{
            font-size:18px;
           }
           .ft-20{
            font-size :20px;
           }
           .ft-22{
            font-size :22px;
           }.p-10{
            padding: 10px !important;
           }.badge-success{
                background: #3c763d !important;
            }.badge-danger{
                background: #dc3545 !important;
            }.badge-warning{
                background: #f8d62b !important;
            }.badge-info{
                background: #a927f9 !important;
            }.badge-primary{
                background: #7366ff !important;
            }.mt-3{
                margin-top: 3px !important;
            }.mt-5{
                margin-top: 5px !important;
            }

       </style>
        @stack('css')
    </head>
    <body>
        <div id="wrapper">
              <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                @include('admin.partials.header');
                @include('admin.partials.sidebar');
            </nav>
            @yield('content')

</div>
        <!-- /#wrapper -->
   <!-- jQuery -->
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('admin/js/metisMenu.min.js')}}"></script>

        <!-- Morris Charts JavaScript -->
        <script src="{{asset('admin/js/raphael.min.js')}}"></script>


                <!-- DataTables JavaScript -->
        <script src="{{asset('admin/js/dataTables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/js/dataTables/dataTables.bootstrap.min.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{asset('admin/js/startmin.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
        
        @stack('js')
</body>
</html>
