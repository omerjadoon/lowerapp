@extends('user.buyer.layouts.app',['request'=>'ads','title'=>'All Ads']) @push('css')
<link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/range-slider.css')}}">
<style>
    .irs-line-mid,
    .irs-line-left,
    .irs-line-right,
    .irs-bar,
    .irs-bar-edge {
        background-color: #4466f2;
    }.active-search{
        color: #007bff;
    text-decoration: none;
    background-color: transparent;
    }
</style>
@endpush @section('content')

<section class="page-title">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <!-- Title text -->
                <h3>All Ads</h3>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <form action="{{route('allads')}}" method="get" enctype="multipart/form-data">
                            @if(\Request::get('page'))
                                <input type="hidden" value="{{\Request::get('page')}}" name="page" />
                                @endif
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="inputtext4">Ad Title</label>
                                    <input type="text" class="form-control my-2 my-lg-0" name="title" value="{{\Request::get('title')}}" id="inputtext4" placeholder="What are you looking for">
                                </div>
                                @if(\Request::get('category'))
                                <input type="hidden" value="{{\Request::get('category')}}" name="category" />
                                @endif
                                <div class="col-md-1"></div>
                                <div class="form-group col-md-4">

                                    <label class="control-label" for="u-range-03">Price Range</label>
                                    <input id="u-range-03" type="text">
                                    <input type="hidden" id="p_range_from" name="p_range_from" value="{{\Request::get('p_range_from')}}">
                                    <input type="hidden" id="p_range_to" name="p_range_to" value="{{\Request::get('p_range_to')}}">


                                </div>
                           
                                <div class="col-md-1"></div>
                                <div class="form-group col-md-3 mt-4 btn-group">
                                   
                                    <button type="submit" class="btn btn-primary p-2">Search Now</button>
                                    <a href="{{route('allads')}}" class="btn btn-info p-4">{{\Request::get('title') || \Request::get("category")  || \Request::get('p_range_from') || \Request::get('p_range_to') ? 'Reset' : 'Refresh'}} </a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="category-sidebar">
                    <div class="widget category-list">
                        <h4 class="widget-header">All Category</h4>
                        <ul class="category-list">
                            @foreach ($cat as $key=>$item)

                            <li>
                                <div class="row">
                                    <div class="col-md-10"><a class="{{$item->cat_slug==\Request::get('category') ? 'active-search' : ''}}" href="{{route('allads',['title'=>\Request::get('title'),'category'=>$item->cat_slug,'p_range_from'=>\Request::get('p_range_from'),'p_range_to'=>\Request::get('p_range_to')])}}" >{{$item->name}}</a></div>
                                    <div class="col-md-2"><span class="badge badge-info mt-3">{{$item->cathasmanyad->count()}}</span></div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>


                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                @if(\Request::get('title') || \Request::get("category")  || \Request::get('p_range_from') || \Request::get('p_range_to'))
                <div class="category-search-filter">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>{{$ad->count()}} Result</h2>
                            {{-- <h2>Results For "category = {{$cat_name}}"</h2> --}}
                        </div>
                        <div class="col-md-12">
                            {{-- <p>{{$ad->count()}} Result</p> --}}
                        </div>


                    </div>
                </div>
                @endif
                <!-- ad listing list  -->
                @foreach ($ad as $key=>$item)
                    
               
                <div class="ad-listing-list mt-20">
                    <div class="row p-lg-3 p-sm-5 p-4">
                        <div class="col-lg-4 align-self-center">
                          
                                <img src="{{asset($item->cover_file_path)}}" class="img-fluid" alt="">
                            
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 col-md-10">
                                    <div class="ad-listing-content">
                                        <div>
                                            <span class="font-weight-bold"> {{$item->title}}</span>
                                        </div>
                                        <ul class="list-inline mt-2 mb-3">
                                            <li class="list-inline-item"><i class="fa fa-list-alt"></i> {{$item->belongtocategory->name}}</li>
                                            <li class="list-inline-item"><i class="fa fa-calendar"></i> {{ $item->created_at->format('d M') }}</li>
                                        </ul>
                                        <p class="pr-5">{{Str::limit($item->desc, 90, ' ...')}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-right p-3">
                                    {{-- <div class="product-ratings float-lg-right pb-3"> --}}
                                       <div class="row">
                                           <div class="col-md-12"><p class="text-white add-button">$ {{number_format($item->price_range)}}</p></div>
                                           <div class="form-group col-md-12">
                                               <a href="{{route('adsdesc',[$item->ad_slug])}}" class="btn btn-primary p-2"><i class="fa fa-eye"></i> view</a>
                                           </div>
                                           @if($item->adrequestsend())    
                                           <div class="form-group col-md-12"><span class="badge badge-secondary">Applied</span></div>
                           
                             @endif   
                                       </div>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                
                <!-- ad listing list  -->

                <!-- pagination -->
                <div class="pagination justify-content-center py-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                           {{$ad->links()}}
                        </ul>
                    </nav>
                </div>
                <!-- pagination -->
            </div>
        </div>
    </div>
</section>
@endsection 
@push('nice-select-js')
<script src="{{asset('buyer/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
@endpush
@push('js')

<script src={{asset('user/assets/js/range-slider/ion.rangeSlider.min.js') }}></script>
<script src={{asset('user/assets/js/range-slider/rangeslider-script.js') }}></script>
<script>
     $("#u-range-03").ionRangeSlider({
      onChange: function (data) {
            // Called every time handle position is changed
        $('#p_range_from').val(data.from);
        $('#p_range_to').val(data.to);
            // console.log(data.from+' end '+data.to);
        },
            type: "double",
            grid: true,
            min: {{\App\Ad::min('price_range')}},
            max: {{\App\Ad::max('price_range')}},
            from : {{\Request::get('p_range_from')=='' ? \App\Ad::min('price_range') : \Request::get('p_range_from')}},
            to : {{\Request::get('p_range_to')=='' ? \App\Ad::max('price_range') : \Request::get('p_range_to')}},
            prefix: "$"
        });
</script>
@endpush