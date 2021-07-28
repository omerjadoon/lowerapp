@extends('user.seller.layouts.app',['title'=>'Ads','request'=>'Ads'])
 @push('css')
<style type="text/css">
.custom {
    margin-top: 5px;
}
</style>
@endpush 
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Ads</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Ad section</li>
                    <li class="breadcrumb-item active">Ads</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-header">
                <h5>Find An Ads</h5>
              </div>
              <div class="card-body">
                <form action="{{route('ads.index')}}" method="get" enctype="multipart/form-data">
                  <div class="form-group row">
                    <div class="col-md-3">
                        <label class="control-label" for="title">Title</label>
                        <input id="title" name="title" value="{{\Request::get('title')}}" type="text" placeholder="Enter Ad Title" class="form-control"> 
                    </div>
                    <div class="col-md-3">
                      <label class="control-label" for="cat_id">Choose Category</label>
                      <select id="cat_id" name="category" class="form-control">
                        <option value="">Select Category</option>
                          @foreach ($category as $key=>$cat)
                              <option value="{{$cat->id}}" {{$cat->id==\Request::get('category') ? 'selected' : ''}}>{{$cat->name}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-md-5">
                       
                          <label class="control-label" for="u-range-03">Price Range</label>
                          <input id="u-range-03" type="text">
                          <input type="hidden" id="p_range_from" name="p_range_from" value="{{\Request::get('p_range_from')}}">
                          <input type="hidden" id="p_range_to" name="p_range_to" value="{{\Request::get('p_range_to')}}">
                                               
                    </div>
                    {{-- <div class="col-md-3">
                       
                      <label class="control-label" for="u-lower-range-03">Lower Selling Price Range</label>
                      <input id="u-lower-range-03" type="text">
                      <input type="hidden" id="p_l_range_from" name="p_l_range_from" value="{{\Request::get('p_l_range_from')}}">
                      <input type="hidden" id="p_l_range_to" name="p_l_range_to" value="{{\Request::get('p_l_range_to')}}">
                     
                                           
                </div> --}}
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-info">Find</button>
                      <a href="{{route('ads.index')}}" class="btn btn-secondary">Reset</a>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    @if($ads->count()>0)
    @foreach ($ads as $key=>$item)
      <div class="col-md-6 col-xl-3 box-col-6">
        <div class="card">
          <div class="blog-box blog-grid text-center">
            <img class="img-fluid top-radius-blog" src="{{asset($item->cover_file_path)}}" alt="">
            <div class="blog-details-main">
              <h6 class="blog-bottom-details">{{$item->title}}</h6>
              <hr>
              <ul class="blog-social">
                <li>Price : {{number_format($item->price_range)}}$</li>
                <li>{{$item->created_at->format('d M,Y')}}</li>
              </ul>
              <a href="{{route('ads.show',$item->id)}}" class="btn btn-primary mb-3">View Details</a>
            </div>
          </div>
        </div>
      </div>    
    @endforeach
    @else
    <div class="col-md-4 offset-5">
      <h4>No result found</h4>
    </div>
    @endif
  </div>
  <div class="row mb-3">
    <div class="col-md-2 offset-5 text-center">
     
        {{$ads->links()}}
      
    </div>
  </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $("#u-range-03").ionRangeSlider({
      onChange: function (data) {
            // Called every time handle position is changed
        $('#p_range_from').val(data.from);
        $('#p_range_to').val(data.to);
            // console.log(data.from+' end '+data.to);
        },
            type: "double",
            grid: true,
            min: {{Auth::user()->sellerDetail->sellerpostedmanyads->min('price_range')}},
            max: {{Auth::user()->sellerDetail->sellerpostedmanyads->max('price_range')}},
            from : {{\Request::get('p_range_from')=='' ? Auth::user()->sellerDetail->sellerpostedmanyads->min('price_range') : \Request::get('p_range_from')}},
            to : {{\Request::get('p_range_to')=='' ? Auth::user()->sellerDetail->sellerpostedmanyads->max('price_range') : \Request::get('p_range_to')}},
            prefix: "$"
        });
        $("#u-lower-range-03").ionRangeSlider({
      onChange: function (data) {
            // Called every time handle position is changed
            $('#p_l_range_from').val(data.from);
        $('#p_l_range_to').val(data.to);
            // console.log(data.from+' end '+data.to);
        },
            type: "double",
            grid: true,
            min: {{Auth::user()->sellerDetail->sellerpostedmanyads->min('lower_selling_price')}},
            max: {{Auth::user()->sellerDetail->sellerpostedmanyads->max('lower_selling_price')}},
            from : {{\Request::get('p_l_range_from')=='' ? Auth::user()->sellerDetail->sellerpostedmanyads->min('lower_selling_price') : \Request::get('p_l_range_from')}},
            to : {{\Request::get('p_l_range_to')=='' ? Auth::user()->sellerDetail->sellerpostedmanyads->max('lower_selling_price') : \Request::get('p_l_range_to')}},

            prefix: "$"
        })
</script>
@endpush