<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="{{route('main')}}">
						<img src="{{asset('buyer/images/loginlogo.png')}}" alt="">
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
							<li class="nav-item {{$request=='cat' ? 'active' : ''}}">
								<a class="nav-link" href="{{route('allcate')}}">Categories</a>
							</li>
							<li class="nav-item {{$request=='ads' ? 'active' : ''}}">
								<a class="nav-link" href="{{route('allads')}}">All Ads</a>
							</li>
                            <li class="nav-item {{$request=='privacy' ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('privacy_policy')}}">Privacy Policy</a>
                            </li>
                            <li class="nav-item {{$request=='about' ? 'active' : ''}}">
								<a class="nav-link" href="{{route('aboutus')}}">About Us</a>
							</li>
                            <li class="nav-item {{$request=='contact' ? 'active' : ''}}">
								<a class="nav-link" href="{{route('contactus')}}">Contact Us</a>
							</li>
                            
							{{-- <li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Dashboard<span><i class="fa fa-angle-down"></i></span>
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="dashboard.html">Dashboard</a>
									<a class="dropdown-item" href="dashboard-my-ads.html">Dashboard My Ads</a>
									<a class="dropdown-item" href="dashboard-favourite-ads.html">Dashboard Favourite Ads</a>
									<a class="dropdown-item" href="dashboard-archived-ads.html">Dashboard Archived Ads</a>
									<a class="dropdown-item" href="dashboard-pending-ads.html">Dashboard Pending Ads</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pages <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="about-us.html">About Us</a>
									<a class="dropdown-item" href="contact-us.html">Contact Us</a>
									<a class="dropdown-item" href="user-profile.html">User Profile</a>
									<a class="dropdown-item" href="404.html">404 Page</a>
									<a class="dropdown-item" href="package.html">Package</a>
									<a class="dropdown-item" href="single.html">Single Page</a>
									<a class="dropdown-item" href="store.html">Store Single</a>
									<a class="dropdown-item" href="single-blog.html">Single Post</a>
									<a class="dropdown-item" href="blog.html">Blog</a>

								</div>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Listing <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="category.html">Ad-Gird View</a>
									<a class="dropdown-item" href="ad-listing-list.html">Ad-List View</a>
								</div>
							</li> --}}
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							@guest
								
							
							<li class="nav-item">
								<a class="nav-link login-button" href="login.html">Login As Buyer</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white add-button" href="{{route('login',['seller'=>'yes'])}}">Login As Seller</a>
							</li>
							@endguest
							@auth
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
									<a class="dropdown-item" href="dashboard.html">Dashboard</a>
									<a class="dropdown-item" href="dashboard-my-ads.html">Dashboard My Ads</a>
									<a class="dropdown-item" href="dashboard-favourite-ads.html">Dashboard Favourite Ads</a>
									<a class="dropdown-item" href="dashboard-archived-ads.html">Dashboard Archived Ads</a>
									<a class="dropdown-item" href="dashboard-pending-ads.html">Dashboard Pending Ads</a>
								</div>
							</li>	
								@endif
							@endauth
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>