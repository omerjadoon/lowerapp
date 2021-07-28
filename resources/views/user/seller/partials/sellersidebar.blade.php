 <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div class="logo-wrapper"><a href="{{url('/')}}"><img class="img-fluid for-light" src="{{asset('user/assets/images/logo/logo1.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('user/assets/images/logo/logo.png')}}" alt="looginpage"></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="{{url('/')}}"><img class="img-fluid" src="{{asset('user/assets/images/logo/logo1.png')}}" alt="looginpage"></a></div>

          <nav class="sidebar-main">
            
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
            @if(Auth::user()->email_verified_at!='')
           
              <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn"><a href="{{url('/')}}"><img class="img-fluid" src="{{asset('user/assets/images/logo/logo-icon.png')}}" alt=""></a>
                  <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                </li>
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav {{$request=='dashboard' ? 'active' : ''}}" href="{{route('dashboard.index')}}"><i data-feather="home"></i><span>Dashboard</span></a>
                </li>
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title {{$request=='ads' ? 'active' : ''}}" href="#"><i data-feather="monitor"></i><span>Ads Section</span></a>
                    <ul class="sidebar-submenu">
                    <li><a href="{{route('upload_ad')}}">Upload</a></li>
                    <li><a href="{{route('ads.index')}}">View All</a></li>
                  </ul>
                </li>
                 
              </ul>
            
            @endif
            </div>

            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                            
          </nav>
         
        </div>
        <!-- Page Sidebar Ends-->