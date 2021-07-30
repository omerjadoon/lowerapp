@extends('user.buyer.layouts.app',['request'=>'cat','title'=>'Ads Categories'])
@push('css')
@endpush
@section('content')

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
					<h2>All Categories</h2>
					<p>Explore Ads By Categories!</p>
				</div>
				<div class="row">
					<!-- Category list -->
				@foreach ($cat as $key=>$itme)
					
				
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<a href="{{route('allads',['category'=>$itme->cat_slug])}}">
						<div class="category-block">
							<div class="header">
								{{-- <i class="fa fa-laptop icon-bg-1"></i>  --}}
								<img width="40px" src="{{asset($itme->file_path)}}"> 
								<h4>{{$itme->name}}</h4>
                               
								
							</div>
                            <center><p>{{$itme->cathasmanyad->count()}} Ads</p></center>
							
						</div>
					</a>
					</div> 
					@endforeach
					
				
					
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

@endpush