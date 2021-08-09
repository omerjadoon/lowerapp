@extends('admin.layout.app',['request'=>'Ads','innerrequest'=>'allads','title'=>'Ads']) @push('css')
<link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/vendors/range-slider.css')}}">
<style>
    .activeicon {
        padding: 5px;
        border: 1px solid #3c763d;
        border-radius: 50px;
        background: #3c763d;
        color: white;
    }

    .h-revert {
        height: revert !important;
    }

    .h-900 {
        height: 900px !important;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .mt-10 {
        margin-top: 10px !important;
    }.irs-line-mid, .irs-line-left, .irs-line-right, .irs-bar, .irs-bar-edge {
    background-color: #4466f2;
}
</style>
@endpush @section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ads Listing</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form action="{{route('ad.index')}}" method="get">
                            @if(\Request::get('seller_id'))
                                <input type="hidden" name="seller_id" value="{{\Request::get('seller_id')}}"/>
                            @endif
                            <div class="row p-10">
                                <div class="col-md-12 text-center">
                                    <h4>{{\Request::get('seller_id') ? strtoupper($seller_name) : 'All Ads'}}</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label" for="adtitle">Enter Title</label>
                                    <input id="adtitle" name="title" value="{{\Request::get('title')}}" type="text" placeholder="Enter title" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label" for="mediatype">choose Category</label>
                                    <select id="mediatype" name="category" class="form-control">
                                    <option selected="selected" value="">Select Category</option>
                                    @foreach($category as $key=>$m)
                                <option value="{{$m->id}}" {{$m->id == \Request::get("category") ? 'selected' : ''}}>{{$m->name}}</option>
                                @endforeach
                                </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label" for="u-range-03">Price Range</label>
                                    <input id="u-range-03" type="text">
                                    <input type="hidden" id="p_range_from" name="p_range_from" value="{{\Request::get('p_range_from')}}">
                                    <input type="hidden" id="p_range_to" name="p_range_to" value="{{\Request::get('p_range_to')}}">
          
                                </div>
                                <div class="col-md-2 btn-group mt-10">
                                    <button id="btnsearch" type="submit" class="btn btn-primary">Search</button>
                                    <a class="btn btn-info" href="{{\Request::get('seller_id') ? route('ad.index',['seller_id'=>\Request::get('seller_id')]) : route('ad.index')}}">
                                      {{\Request::get('title') || \Request::get("category")  || \Request::get('p_range_from') || \Request::get('p_range_to') ? 'Reset' : 'Refresh'}}      
                                       
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        @if($adsection->count()>0)
                        <div class="row">
                            @foreach($adsection as $key=>$ad)
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">

                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h4>{{$ad->title}}</h4>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="img-container">
                                                    <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                                                        <figure itemprop="associatedMedia" itemscope="">
                                                            <img class="img-fluid rounded" src="{{asset($ad->cover_file_path)}}" itemprop="thumbnail" alt="gallery"> {{--
                                                            <figcaption itemprop="caption description">{{$ad->belongtomedia->name}}</figcaption> --}}
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-10">
                                            @if(empty(\Request::get('seller_id')))
                                            <div class="col-md-12 text-center">
                                                <b>Posted By :</b> <u>{{$ad->belongtoseller->title.' '.$ad->belongtoseller->f_name.' '.$ad->belongtoseller->l_name}}</u>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row mt-10">
                                            <div class="col-md-12 text-center">
                                             <b>Price :</b> <u>{{number_format($ad->price_range)}}$</u>
                                              
                                            </div>
                                        </div>
                                        <div class="row mt-10">
                                            <div class="col-md-12 text-center">
                                                <b> Posted At :</b> <u>{{$ad->created_at->format('d M,Y H:i:s A')}}</u>
                                            </div>
                                        </div>
                                        <div class="row mt-10">
                                            <div class="col-md-12 text-center">
                                                <a href="{{route('ad.show',$ad->id)}}" class="btn btn-info">View Detail</a>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            


                            @endforeach
                        </div>
                        @else
                        <div class="container-fluid">
                            <div class="row">
                                <div clas="col-md-12 text-center">
                                    <h6> No Result Found</h6>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">

                            <div class="col-md-12  text-center">
                                {{$adsection->appends(Request::all())->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection @push('js')

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