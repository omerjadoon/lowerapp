<section>
	<div class="@auth container @endauth @guest container @endguest ">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="{{route('main')}}">
						<img src="{{asset('buyer/images/loginlogo.PNG')}}" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item {{$request=='index' ? 'active' : ''}}">
								<a class="nav-link" href="{{route('main')}}">Home</a>
							</li>
							{{-- <li class="nav-item {{$request=='cat' ? 'active' : ''}}">
								<a class="nav-link" href="{{route('allcate')}}">Categories</a>
							</li>
							<li class="nav-item {{$request=='ads' ? 'active' : ''}}">
								<a class="nav-link" href="{{route('allads')}}">All Ads</a>
							</li> --}}
                            <li class="nav-item {{$request=='privacy' ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('privacy_policy')}}">Privacy Policy</a>
                            </li>
                            <li class="nav-item {{$request=='about' ? 'active' : ''}}">
								<a class="nav-link" href="{{route('aboutus')}}">About Us</a>
							</li>
                            <li class="nav-item {{$request=='contact' ? 'active' : ''}}">
								<a class="nav-link" href="{{route('contactus')}}">Contact Us</a>
							</li>
                            
						
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							@guest
								
							
							<li class="nav-item">
								<a class="nav-link login-button" href="{{route('login',['buyer'=>'yes'])}}">Login As Buyer</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white add-button" href="{{route('login',['seller'=>'yes'])}}">Login As Seller</a>
							</li>
							@endguest
							
							@if(Auth::user()->role=='seller')
							<li class="nav-item text-white add-button dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Welcome, {{Auth::user()->sellerDetail->title.' '.Auth::user()->sellerDetail->f_name}}<span></span>
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="{{route('dashboard.index')}}"><i class="fa fa-home"></i> My Dashboard</a>
									<form action="{{route('logout')}}" id="logoutfrm" method="post">@csrf<span class="dropdown-item" style="cursor: pointer" onclick="logout()"><i class="fa fa-sign-out"></i> Logout</span></form>
								</div>
							</li>	
							@elseif(Auth::user()->role=='buyer')
							<li class="nav-item text-white add-button dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Welcome, {{Auth::user()->buyerDetail->title.' '.Auth::user()->buyerDetail->f_name}}<span></span>
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu">
								<a class="dropdown-item" href="{{route('my-dashboard.index')}}"><i class="fa fa-home"></i> My Dashboard</a>
									<a class="dropdown-item" href="{{route('b_account')}}"><i class="fa fa-cog"></i> Account Setting</a>
									{{-- <a class="dropdown-item" href="{{route('b_change_password')}}"><i class="fa fa-key"></i> Change Password</a> --}}
									{{--<a class="dropdown-item" href="dashboard-favourite-ads.html">Dashboard Favourite Ads</a>
									<a class="dropdown-item" href="dashboard-archived-ads.html">Dashboard Archived Ads</a>
									<a class="dropdown-item" href="dashboard-pending-ads.html">Dashboard Pending Ads</a> --}}
									<form action="{{route('logout')}}" id="logoutfrm" method="post">@csrf<span class="dropdown-item" style="cursor: pointer" onclick="logout()"><i class="fa fa-sign-out"></i> Logout</span></form>
								</div>
							</li>	
								@endif
							
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>