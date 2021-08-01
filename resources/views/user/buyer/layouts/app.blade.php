<!DOCTYPE html>
<html lang="en">
<head> 
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description" content="low lower gone reverse auction site .">
    <meta name="keywords" content="low lower gone reverse auction classified ad site">
    <meta name="author" content="lowlowergone">
    <link rel="icon" href="{{asset('admin/login/logo.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin/login/logo.png')}}" type="image/x-icon">

<title>LowLowerGone - {{$title}}</title>
  
  <!-- FAVICON -->
  <link href="img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('buyer/plugins/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('buyer/plugins/bootstrap/css/bootstrap-slider.css')}}">
  <!-- Font Awesome -->
  <link href="{{asset('buyer/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="{{asset('buyer/plugins/slick-carousel/slick/slick.css')}}" rel="stylesheet">
  <link href="{{asset('buyer/plugins/slick-carousel/slick/slick-theme.css')}}" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="{{asset('buyer/plugins/fancybox/jquery.fancybox.pack.css')}}" rel="stylesheet">
  <link href="{{asset('buyer/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="{{asset('buyer/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
@stack('css')
</head>

<body class="body-wrapper">
  <!--============================
=            Header start        =
=============================-->
@include('user.buyer.partials.header')
  <!--============================
=            Header end        =
=============================-->
@yield('content')
    <!--============================
=            Footer start       =
=============================-->
@include('user.buyer.partials.footer')

    <!--============================
=            Footer end       =
=============================-->

    <!-- JAVASCRIPTS -->
<script src="{{asset('buyer/plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{asset('buyer/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('buyer/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('buyer/plugins/bootstrap/js/bootstrap-slider.js')}}"></script>
  <!-- tether js -->
<script src="{{asset('buyer/plugins/tether/js/tether.min.js')}}"></script>
<script src="{{asset('buyer/plugins/raty/jquery.raty-fa.js')}}"></script>
<script src="{{asset('buyer/plugins/slick-carousel/slick/slick.min.js')}}"></script>
@stack('nice-select-js')
<script src="{{asset('buyer/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('buyer/plugins/smoothscroll/SmoothScroll.min.js')}}"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<!-- google map -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script> --}}
{{-- <script src="{{asset('buyer/plugins/google-map/gmap.js')}}"></script> --}}
<script src="{{asset('buyer/js/script.js')}}"></script>
<script>
  function logout() {
             
                $('#logoutfrm').submit();
      } 
</script>
@stack('js')
</body>

</html>