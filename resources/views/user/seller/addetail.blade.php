@extends('layouts.app',['title'=>'Ads','request'=>'Ads'])
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
    }
</style>
@endpush 
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>{{$ad->title}}</h3>
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
                    <h5>Edit Ads</h5><span>Please edit Content According To Category </span> @include('alerts.error-alert',['ses_name'=>'error']) @include('alerts.success-alert',['ses'=>'success'])
                </div>
                <div class="card-body">
                    <form class="form-vertical" action="{{route('ads.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label" for="title">Ad Title</label>
                                <input id="title" name="title" value="{{$ad->title}}" type="text" placeholder="Ad title" class="form-control"> @include('alerts.errorfield',['field'=>'title'])
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="cat_id">Choose Category</label>
                                <select id="cat_id" name="category" class="form-control">
	    							{{-- <option value="">Select Category</option> --}}
	    							@foreach ($category as $key=>$cat)
                                        <option value="{{$cat->id}}" {{$cat->id==$ad->cat_id ? 'selected' : ''}}>{{$cat->name}}</option>
                                    @endforeach
	      						
	    						</select> @include('alerts.errorfield',['field'=>'cat_id'])
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="price_range">Price</label>
                                <input id="price_range" name="price_range" value="{{$ad->price_range}}" type="number" placeholder="Ad Price" class="form-control"> @include('alerts.errorfield',['field'=>'price_range'])
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="lower_selling_price">Lower Selling Price</label>
                                <input id="lower_selling_price" name="lower_selling_price" value="{{$ad->lower_selling_price}}" type="number" placeholder="Lower Selling Ad Price" class="form-control"> @include('alerts.errorfield',['field'=>'lower_selling_price'])
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="control-label" for="desc">Ad Description</label>
                                <textarea name="desc" class="form-control" placeholder="Ad description">{{$ad->desc}}</textarea>
                                
                                @include('alerts.errorfield',['field'=>'desc'])
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">

                                    <label class="form-label">Ad Cover Image</label>
                                    <div class="avatar"><img alt="" class="img-70 img-thumbnail" id="prev0" src="{{asset($ad->cover_file_path)}}" data-original-title="" title=""></div>
                                    <input type="file" value="" data-idname="0" name="coverfile" id="filee0" style="display:none" onchange="previewFile(this);" accept="image/*"  data-original-title="" title="">
                                    <div class="roundedpencil" id="addclose0"><label for="filee0"><i class="icofont icofont-pencil-alt-5"></i></label></div>
                                </div>
                            </div>
                        </div>
                        <label class="control-label" for="filesss">Attach atleast 6 images</label>
                        <div class="row">
                            @foreach ($ad->adhasmanyimage as $key=>$item)
                            <div class="col-md-3">
                                <div class="form-group mb-3">

                                    {{-- <label class="form-label">Profile Pic</label> --}}
                                    <div class="avatar"><img alt="" class="img-70 img-thumbnail" id="prev{{$key+1}}" src="{{asset($item->file_path)}}" data-original-title="" title=""></div>
                                    <input type="file" value="" data-idname="{{$key+1}}" name="adsfile[]" id="filee{{$key+1}}" style="display:none" onchange="previewFile(this);" accept="image/*"  data-original-title="" title="">
                                    <div class="roundedpencil" id="addclose{{$key+1}}"><span class="remove-by" idname="{{$key+1}}"><i class="fa fa-trash"></i></span></div>
                                </div>
                            </div> 
                            
                            @endforeach
                           
                            @for($i=$key+2;$i<=10;$i++) 
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <div class="avatar"><img alt="" class="img-70 img-thumbnail" id="prev{{$i}}" src="{{asset('images/img-place.png')}}" data-original-title="" title=""></div>
                                    <input type="file" value="" data-idname="{{$i}}" name="adsfile[]" id="filee{{$i}}" style="display:none" onchange="previewFile(this);" accept="image/*"  data-original-title="" title="">
                                    <div class="roundedpencil" id="addclose{{$i}}"><label for="filee{{$i}}"><i class="icofont icofont-pencil-alt-5"></i></label></div>
                                </div>
                            </div>    
                            @endfor
                            
                            
                        </div>
                        @include('alerts.errorfield',['field'=>'adsfile'])
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" style="width:inherit" class="btn btn-success btn-lg text-center">Save Changes</button>
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