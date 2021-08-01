@extends('user.buyer.layouts.app',['request'=>'ads','title'=>'Ads Detail']) @push('css')
<style>
    .product-slider .slick-dots li img{
        min-width: 112px;
    max-width: 112px;
    height: 100px;
    }
    #demo {
  height:100%;
  position:relative;
  overflow:hidden;
}


.green{
  background-color:#6fb936;
}
        .thumb{
            margin-bottom: 30px;
        }
        
        .page-top{
            margin-top:85px;
        }

   
img.zoom {
    width: 100%;
    height: 200px;
    border-radius:5px;
    object-fit:cover;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
}
        
 
.transition {
    -webkit-transform: scale(1.2); 
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}
    .modal-header {
   
     border-bottom: none;
}
    .modal-title {
        color:#000;
    }
    .modal-footer{
      display:none;  
    }
</style>
@endpush @section('content')

<section class="page-title">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <!-- Title text -->
                <h3>Ad Details</h3>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>
<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
        @include('alerts.error-alert',['ses_name'=>'error'])
        @include('alerts.success-alert',['ses'=>'success'])
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title">{{$ad->title}}</h1>
					<div class="product-meta">
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fa fa-user-o"></i> By {{$ad->belongtoseller->f_name}}</li>
							<li class="list-inline-item"><i class="fa fa-list-alt"></i> Category  <a href="{{route('allads',['category'=>$ad->belongtocategory->cat_slug])}}">{{$ad->belongtocategory->name}}</a></li>
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i>  Location {{$ad->belongtoseller->belongtocity->name.' '.$ad->belongtoseller->belongtocity->belongtostate->name.', '.$ad->belongtoseller->belongtocity->belongtostate->belongtocountry->name}}</li>
						</ul>
					</div>


                    <div class="container-fluid mt-5 widget">
                            
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a href="{{asset($ad->cover_file_path)}}" class="fancybox" rel="ligthbox">
                                    <img  src="{{asset($ad->cover_file_path)}}" class="zoom img-fluid "  alt="">
                                </a>
                            </div> 
                            @foreach ($ad->adhasmanyimage as $image)
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a href="{{asset($image->file_path)}}" class="fancybox" rel="ligthbox">
                                    <img  src="{{asset($image->file_path)}}" class="zoom img-fluid "  alt="">
                                </a>
                            </div> 
                            @endforeach  
                        </div>
                    </div>
                  
					<!-- product slider -->

					
						<div class="container-fluid mt-5 widget">
                           
                       
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="tab-title"> <b>Description : </b></h3><blockquote> <p class="">{{$ad->desc}}</p></blockquote>
                                 </div>
                            </div>
                            <hr>
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <h3 ><b> Price : </b>${{number_format($ad->price_range)}} </h3>
                                    
                                </div> --}}
                                <div class="col-md-6">
                                    <h3 ><b>Posted At :</b> {{$ad->created_at->format('M d,Y' )}}</h3>
                                </div>
                               
                            </div>
                        </div>
						
					
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget price text-center">
						<h4>Price</h4>
						<p>${{number_format($ad->price_range)}}</p>
					</div>
					<!-- User Profile widget -->
					<div class="widget user text-center">
						<img class="rounded-circle img-fluid mb-5 px-5" src="{{asset($ad->belongtoseller->file_path)}}" alt="">
						<h4><a href="">{{$ad->belongtoseller->title.' '.$ad->belongtoseller->f_name.' '.$ad->belongtoseller->l_name}}</a></h4>
						<p class="member-time">Member Since {{$ad->belongtoseller->created_at->format('M d,Y')}}</p>
                        <p class="member-time">Contact # {{$ad->belongtoseller->phone}}</p>
						{{-- <a href="">See all ads</a> --}}
						<ul class="list-inline mt-20">
                            
				 @if(!$ad->adrequestsend())
							<li class="list-inline-item"><a href="{{route('make_offer',['ad'=>$ad->id])}}" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Make an
									offer</a></li>
                             @elseif($ad->adrequestsend())    
                             <li class="list-inline-item"><button class="badge badge-success">Applied</button></li>
                           
                             @endif   
						</ul>
					</div>
					
					<!-- Safety tips widget -->
					<div class="widget disclaimer">
						<h5 class="widget-header">Safety Tips</h5>
						<ul>
							<li><mark>Meet seller at a public place</mark></li>
							<li><mark>Check the item before you buy</mark></li>
							<li><mark>Pay only after collecting the item</mark></li>
							<li><mark>Pay only after collecting the item</mark></li>
						</ul>
			

				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>

@endsection
@push('nice-select-js')
<script src="{{asset('buyer/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
@endpush
 @push('js')

<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
      $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
		
		$(this).addClass('transition');
	}, function(){
        
		$(this).removeClass('transition');
	});
</script>
@endpush