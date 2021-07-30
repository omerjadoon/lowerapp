@extends('user.buyer.layouts.app',['request'=>'index','title'=>'Reverse Auction']) @push('css') @endpush @section('content')
<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Contetnt -->
                <div class="content-block">
                    <h1>Buy & Sell Near You </h1>
                    <p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
                    {{--
                    <div class="short-popular-category-list text-center">
                        <h2>Popular Category</h2>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="category.html"><i class="fa fa-bed"></i> Hotel</a></li>
                            <li class="list-inline-item">
                                <a href="category.html"><i class="fa fa-grav"></i> Fitness</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="category.html"><i class="fa fa-car"></i> Cars</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="category.html"><i class="fa fa-cutlery"></i> Restaurants</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="category.html"><i class="fa fa-coffee"></i> Cafe</a>
                            </li>
                        </ul>
                    </div> --}}

                </div>
                <!-- Advance Search -->
                <div class="advance-search">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 align-content-center">
                                <form action="{{route('allads')}}" method="GET" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control my-2 my-lg-1" name="title" id="inputtext4" placeholder="What are you looking for">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select name="category" class="w-100 form-control mt-lg-1 mt-md-2">
													<option value="">Category</option>
													@foreach($cat as $key=>$item)
													<option value="{{$item->cat_slug}}">{{$item->name}}</option>
													@endforeach
												</select>
                                        </div>
                                        {{--
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Location">
                                        </div> --}}
                                        <div class="form-group col-md-2 align-self-center">
                                            <button type="submit" class="btn btn-primary">Search Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Ads</h2>
                    {{--
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <!-- offer 01 -->
            <div class="col-lg-12">
                <div class="{{$ad->count()>1 ? 'trending-ads-slide' : ''}}">
				@foreach ($ad as $key=>$item)
					
				
                    <div class="col-sm-12 col-lg-4">
                        <!-- product card -->
                        <div class="product-item bg-light">
                            <div class="card">
                                <div class="thumb-content">
                                    <!-- <div class="price">$200</div> -->
                                    {{-- <a href="single.html"> --}}
										<img class="card-img-top img-fluid" src="{{asset($item->cover_file_path)}}" alt="Card image cap">
									{{-- </a> --}}
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><a href="{{route('allads',['title'=>$item->title])}}">{{$item->title}}</a></h4>
                                    <ul class="list-inline product-meta">
                                        <li class="list-inline-item">
                                            <a href="{{route('allads',['category'=>$item->belongtocategory->cat_slug])}}"><i class="fa fa-list-alt"></i>{{$item->belongtocategory->name}}</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0);"><i class="fa fa-calendar"></i>{!! $item->created_at->format('d M') !!}</a>
                                        </li>
                                    </ul>
                                    <p class="card-text">{{Str::limit($item->desc, 80, ' ...')}}</p>
                                   <div class="text-center">
                                    <a href="{{route('adsdesc',[$item->ad_slug])}}" class="btn btn-primary p-2"><i class="fa fa-eye"></i> view</a>
                                   </div>
                                </div>
                            </div>
                        </div>
					</div>
					
					@endforeach
				</div>
            </div>


        </div>
          <div class="section-title">
                    <a href="{{route('allads')}}" class="btn btn-info">View All</a>
                </div>
    </div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section title -->
                <div class="section-title">
                    <h2>Categories</h2>
                    <p>Explore Ads By Categories!</p>
                </div>
                <div class="row">
                    <!-- Category list -->
                    @foreach ($cat as $key=>$itme)


                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                {{-- <i class="fa fa-laptop icon-bg-1"></i> --}}
                                <img width="40px" src="{{asset($itme->file_path)}}">
                                <h4>{{$itme->name}}</h4>

                            </div>

                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="section-title">
                    <a href="{{route('allcate')}}" class="btn btn-info">View All</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>


<!--====================================
=            Call to Action            =
=====================================-->

<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-smile-o d-block"></i>
                    <span class="counter my-2 d-block" >{{App\BuyerDetail::count()}}</span>
                    <h5>Verified Buyers</h5>

                </div>
            </div>
			<div class="col-lg-4 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-bookmark-o d-block"></i>
                    <span class="counter my-2 d-block" >{{App\Ad::count()}}</span>
                    <h5>Verified Ads</h5>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-user-o d-block"></i>
                    <span class="counter my-2 d-block" >{{App\SellerDetail::count()}}</span>
                    <h5>Trusted Seller</h5>
                </div>
            </div>
           
            {{-- <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-smile-o d-block"></i>
                    <span class="counter my-2 d-block" data-count="200">0</span>
                    <h5>Happy Customers</h5>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection
@push('nice-select-js')
<script src="{{asset('buyer/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
@endpush
@push('js') 

@endpush