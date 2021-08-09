@extends('user.seller.layouts.app',['title'=>'Ad Detail','request'=>'Ads'])
 @push('css')
<style type="text/css">
.custom {
    margin-top: 5px;
}
    .roundedpencil {
        background: white;
        display: inline-block;
        position: absolute;
        bottom: 0px;
        left: 54px;
        border-radius: 100%;
        /* padding: 8px; */
        padding-top: 8px;
        padding-bottom: -1px;
        padding-left: 10px;
        padding-right: 10px;
        text-align: center;
        cursor: pointer;
    }

    .img-70 {
        min-height: 200px;
        max-height: 200px;
        border-style: double !important;
        border: 3px;
        min-width: 100%;
        max-width: 100%;
    }.no-border{
        border: none;
    }.cvr-img-70{
        min-height: 500px;
        max-height: 500px;
        border-style: double !important;
        border: 3px;
        min-width: 100%;
        max-width: 100%;
    }
</style>
@endpush 
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Ad Detail</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Ad section</li>
                    <li class="breadcrumb-item"><a href="{{route('ads.index')}}">Ads</a></li>
                    <li class="breadcrumb-item active">{{$ad->title}}</li>
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
                    <div class="row">
                        <div class="col-md-6"><h5>{{strtoupper($ad->title)}}</h5></div>
                        <div class="col-md-6 text-right">
                            @if($ad->status==1)
                            <span class="badge badge-success">Sold</span></br>
                            @endif
                            <b>Total Offers : </b><a href="{{route('ad-offers.index',['ad'=>$ad->id])}}">{{$ad->adhasmanyrequest->count()}}</a>
                            
                        </div>
                    </div>
                    
                    {{-- <span>Please edit Content According To Category </span> --}}
                     @include('alerts.error-alert',['ses_name'=>'error']) @include('alerts.success-alert',['ses'=>'success'])
                </div>
                <div class="card-body">
                    <form class="form-vertical" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">

                                    <label class="form-label"><u>Cover Image</u></label>
                                    <div class="avatar"><img alt="" class="cvr-img-70 img-thumbnail" id="prev0" src="{{asset($ad->cover_file_path)}}" data-original-title="" title=""></div>
                                    {{-- <input type="file" value="" data-idname="0" name="coverfile" id="filee0" style="display:none" onchange="previewFile(this);" accept="image/*"  data-original-title="" title="">
                                    <div class="roundedpencil" id="addclose0"><label for="filee0"><i class="icofont icofont-pencil-alt-5"></i></label></div> --}}
                                </div>
                            </div>
                            <div class="col-md-4">
                            {{-- <div class="col-md-12 p-2">
                                <label class="control-label" for="title"><u>Title</u></label>
                                <input disabled readonly id="title" name="title" value="{{$ad->title}}" type="text" placeholder="Ad title" class="form-control no-border">
                                
                            </div> --}}
                            <div class="col-md-12 p-2">
                                 <label class="control-label" for="cat_id"><u>Category</u></label>
                                 <input disabled readonly id="cat_id" name="cat" value="{{$ad->belongtocategory->name}}" type="text" placeholder="Ad title" class="form-control no-border">
                                
                                 
                              
                            </div>
                            <div class="col-md-12 p-2">
                                <label class="control-label" for="price_range"><u>Basic Price</u></label>
                                <input disabled readonly id="price_range" name="price_range" value="{{number_format($ad->actual_price)}}$" type="text" placeholder="Ad Price" class="form-control no-border">
                                 
                            </div>
                            <div class="col-md-12 p-2">
                                <label class="control-label" for="price_range"><u>Current Price</u></label>
                                <input disabled readonly id="price_range" name="price_range" value="{{number_format($ad->price_range)}}$" type="text" placeholder="Ad Price" class="form-control no-border">
                                
                            </div>
                            <div class="col-md-12">
                                <hr>
                                DISCOUNT SETTING
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label" for="lower_selling_price"><u>Discount Type </u></label>
                                        <input disabled readonly id="lower_selling_price" name="lower_selling_price" value="{{$ad->discounttype=='amt_wise' ? 'Amount Wise' : 'Percent Wise'}}" type="text" placeholder="Lower Selling Ad Price" class="form-control no-border"> 
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="lower_selling_price"><u>Per Day Discount </u></label>
                                        <input disabled readonly id="lower_selling_price" name="lower_selling_price" value="{{number_format($ad->perdaydiscount )}}{{$ad->discounttype=='amt_wise' ? '$' : '%'}}" type="text" placeholder="Lower Selling Ad Price" class="form-control no-border"> 
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-2">
                                <label class="control-label" for="lower_selling_price"><u>Number Of Days</u></label>
                                <input disabled readonly id="lower_selling_price" name="lower_selling_price" value="{{$ad->no_of_days}} Days" type="text" placeholder="Lower Selling Ad Price" class="form-control no-border"> 
                                
                            </div>
                        
                           
                            <div class="col-md-12 p-2">
                                <label class="control-label" for="lower_selling_price"><u>Lower Selling Price </u></label>
                                <input disabled readonly id="lower_selling_price" name="lower_selling_price" value="{{number_format($ad->lower_selling_price)}}$" type="text" placeholder="Lower Selling Ad Price" class="form-control no-border"> 
                                
                            </div>

                        </div>
                    </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="control-label" for="desc"><u>Description</u></label>
                                <textarea readonly disabled name="desc" class="form-control no-border" placeholder="Ad description">{{$ad->desc}}</textarea>
                                
                                @include('alerts.errorfield',['field'=>'desc'])
                            </div>
                            
                           
                        </div>
                        <label class="control-label" for="filesss"><u>Images</u></label>
                        <div class="row">
                            @foreach ($ad->adhasmanyimage as $key=>$item)
                            <div class="col-md-3">
                                <div class="form-group mb-3">

                                    <div class="avatar"><img alt="" class="img-70 img-thumbnail" id="prev{{$key+1}}" src="{{asset($item->file_path)}}" data-original-title="" title=""></div>
                                       </div>
                            </div> 
                            
                            @endforeach
                           
                      
                            
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                @if($ad->delete_request==0)
                                <a href="{{route('ads.edit',$ad->id)}}" class="btn btn-danger btn-sm text-center"><i class="fa fa-trash"></i>  Request Deletion</a>
                                @elseif($ad->delete_request==1)
                                <button class="btn btn-warning btn-sm text-center"><i class="fa fa-bolt"></i> Deletion Request Pending</button>
                                @elseif($ad->delete_request==2)
                                <a href="{{route('ads.edit',$ad->id)}}" class="btn btn-danger btn-sm text-center"><i class="fa fa-remove"></i> Deletion Request Rejected </br> Request Again</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
        function previewFile(input) {
        var file = input.files[0];
        var id = input.dataset.idname;
        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $('#addclose' + id).html('<span class="remove" idname="' + id + '"><i class="fa fa-remove"></span>');
                $("#prev" + id).attr("src", reader.result);
                $('.remove').on('click', function() {

                    idnum = $(this).attr('idname');
                    $('#filee' + idnum).val('');
                    $("#prev" + idnum).attr("src", "{{asset('images/img-place.png')}}");
                    $('#addclose' + idnum).html('<label for="filee' + idnum + '"><i class="icofont icofont-pencil-alt-5"></i></label>')
                });
            }

            reader.readAsDataURL(file);
        }
    }
    $('.remove-by').on('click', function() {

idnum = $(this).attr('idname');
$('#filee' + idnum).val('');
$("#prev" + idnum).attr("src", "{{asset('images/img-place.png')}}");
$('#addclose' + idnum).html('<label for="filee' + idnum + '"><i class="icofont icofont-pencil-alt-5"></i></label>')
});
</script>
@endpush