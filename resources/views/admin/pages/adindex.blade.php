@extends('admin.layout.app',['request'=>'Ads','innerrequest'=>'allads','title'=>'Seller Ads']) @push('css')
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
    }
</style>
@endpush @section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ads</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form action="{{route('ads.index')}}" method="get">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>ADS LISITNG</h4>
                                </div>
                                <div class="col-md-3">
                                    <input id="adtitle" name="adquery" value="{{\Request::get('adquery')}}" type="text" placeholder="Enter Query For Search" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <select id="mediatype" name="category" class="form-control">
                                    <option selected="selected" value="">Select Category</option>
                                    @foreach($category as $key=>$m)
                                <option value="{{$m->id}}" {{$m->id == \Request::get("category") ? 'selected' : ''}}>{{$m->name}}</option>
                                @endforeach
                                </select>
                                </div>
                                <div class="col-md-3 btn-group">
                                    <button id="btnsearch" type="submit" class="btn btn-primary">Search</button>
                                    <a class="btn btn-info" href="{{route('ads.index')}}">{{(\Request::get("adquery") || \Request::get('mediatype')) ? 'Reset' : 'Refresh'}}</a>
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
                                            <div class="col-md-12 text-center">
                                                <b>Posted By :</b> <u>{{$ad->belongtoseller->title.' '.$ad->belongtoseller->f_name.' '.$ad->belongtoseller->l_name}}</u>
                                            </div>
                                        </div>
                                        <div class="row mt-10">
                                            <div class="col-md-12 text-center">
                                             <b>Price :</b> <u>{{number_format($ad->price_range)}}$</u>
                                              
                                            </div>
                                        </div>
                                        <div class="row mt-10">
                                            <div class="col-md-12 text-center">
                                                <b> Created At :</b> <u>{{$ad->created_at->format('d M,Y H:i:s A')}}</u>
                                            </div>
                                        </div>
                                        <div class="row mt-10">
                                            <div class="col-md-12 text-center">
                                                <a href="" class="btn btn-info">View Detail</a>
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
                                {{$adsection->links()}}
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
<script>
</script>
@endpush