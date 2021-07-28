<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="big profit ads media partner.">
    <meta name="keywords" content="big profit ads media partner">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('admin/login/logo.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin/login/logo.png')}}" type="image/x-icon">
    <title>LowLowerGone - {{$title}}</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/fontawesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/feather-icon.css')}}">
    @auth

    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/datatable-extension.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/owlcarousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/sweetalert2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/range-slider.css')}}">
    <!-- Plugins css Ends-->
    @endauth
    
        <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('user/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/responsive.css')}}">
      <style type="text/css">
      .error-field{
        color: red; 
        display:block;
        margin-top: -10px;
        margin-bottom: 3px;

    }
  </style>
    @stack('css')
  </head>
<body @auth  onload="startTime()" @endauth>
         @guest
            @yield('login_signup')
         @endguest   
        @auth
              <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
  <div class="page-wrapper compact-wrapper" id="pageWrapper">
         <!-- Page Header Start-->
        @include('user.seller.partials.header')
         <!-- Page Header end-->
          <!-- Page sidebar and body Start-->
        <div class="page-body-wrapper sidebar-icon">
          <!-- Page Sidebar Start-->
          {{-- @if(Auth::user()->role=='buyer') @include('user.partial.buyersidebar') @endif  --}}
          {{-- @if(Auth::user()->role=='seller')@endif --}}
           @include('user.seller.partials.sellersidebar')
          
           <!-- Page Sidebar end-->
           <!-- page body start -->
              <div class="page-body">
               @yield('content') 
              </div>
            <!-- page body end --> 
             <!-- footer start-->
       {{-- @if(Auth::user()->role=='buisness')      
          @if(Auth::user()->email_verified_at!='' && Auth::user()->businessdetail->agreement_status==1)
            @include('user.partial.footer')
          @endif 
          @elseif(Auth::user()->role=='media')--}}
           @if(Auth::user()->email_verified_at!='')
            @include('user.seller.partials.footer')
           @endif
          {{--@endif --}}
         <!-- footer end-->

      </div>
         <!-- Page sidebar and body end-->
     </div>
      <!-- page-wrapper end-->
        @endauth
     <!-- latest jquery-->
    <script src="{{asset('user/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('user/assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('user/assets/js/bootstrap/bootstrap.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('user/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('user/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('user/assets/js/config.js')}}"></script>
       <script src="{{asset('user/assets/js/notify/bootstrap-notify.min.js')}}"></script>
        
    @auth
    <!-- Plugins JS start-->
    <script src="{{asset('user/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('user/assets/js/prism/prism.min.js')}}"></script>
    <script src="{{asset('user/assets/js/clipboard/clipboard.min.js')}}"></script>
    <script src="{{asset('user/assets/js/counter/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('user/assets/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('user/assets/js/counter/counter-custom.js')}}"></script>
    <script src="{{asset('user/assets/js/custom-card/custom-card.js')}}"></script>
    <script src="{{asset('user/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('user/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('user/assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('user/assets/js/owlcarousel/owl.carousel.js')}}"></script>
    <script src="{{asset('user/assets/js/general-widget.js')}}"></script>
    <script src="{{asset('user/assets/js/height-equal.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script>
    <script src="{{asset('user/assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
      <script src="{{asset('user/assets/js/datatable/datatable-extension/custom.js')}}"></script>
    <script src="{{asset('user/assets/js/modal-animated.js')}}"></script>
    <script src="{{asset('user/assets/js/chart/chartist/chartist.js')}}"></script>
    <script src="{{asset('user/assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
    <script src="{{asset('user/assets/js/chart/knob/knob.min.js')}}"></script>
    <script src="{{asset('user/assets/js/chart/knob/knob-chart.js')}}"></script>
    <script src="{{asset('user/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('user/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('user/assets/js/dashboard/default.js')}}"></script>
    <script src="{{asset('user/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('user/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('user/assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('user/assets/js/typeahead/handlebars.js')}}"></script>
    <script src="{{asset('user/assets/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{asset('user/assets/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{asset('user/assets/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{asset('user/assets/js/typeahead-search/typeahead-custom.js')}}"></script>
    <script src="{{asset('user/assets/js/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('user/assets/js/sweet-alert/app.js')}}"></script>
    <script src="{{asset('user/assets/js/tooltip-init.js')}}"></script>
    <script src={{asset('user/assets/js/range-slider/ion.rangeSlider.min.js') }}></script>
    <script src={{asset('user/assets/js/range-slider/rangeslider-script.js') }}></script>
    <!-- Plugins JS Ends-->
    <!-- <script src="{{asset('user/assets/js/theme-customizer/customizer.js')}}"></script> -->
    <script type="text/javascript">

     function logout() {
                $('#logoutfrm').submit();
      } 
         </script>
    @endauth
    <!-- Theme js-->
    <script src="{{asset('user/assets/js/script.js')}}"></script>

    <!-- login js-->
    <!-- Plugin used-->
    @stack('js')
  </body>
</html>