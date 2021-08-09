@extends('user.seller.layouts.app',['title'=>'Upload Ad','request'=>'upload-ads']) @push('css')
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
    .displayon{
        display: block;
    }
    .displayoff{
        display: none;
    }
</style>
@endpush @section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Upload Ads</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Ad section</li>
                    <li class="breadcrumb-item active">Upload Ad</li>
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
                    <h5>Upload Ads</h5><span>Please Upload Content According To Category </span> @include('alerts.error-alert',['ses_name'=>'error']) @include('alerts.success-alert',['ses'=>'success'])
                </div>
                <div class="card-body">
                    <form class="form-vertical" action="{{route('ads.store')}}" method="POST" id="adupload" enctype="multipart/form-data">
                        @csrf
                        <div class="container-fluid displayon" id="step1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="control-label" for="title_">Ad Title</label>
                                            <input id="title_" name="title" value="{{old('title')}}" type="text" placeholder="Ad title" class="form-control">
                                            <span class="error-field text-danger custom" id="title" role="alert"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="cat_id">Choose Category</label>
                                            <select id="cat_id" name="category" class="form-control">
	    							<option value="">Select Category</option>
	    							@foreach ($category as $key=>$cat)
                                        <option value="{{$cat->id}}" {{$cat->id==old('category') ? 'selected' : ''}}>{{$cat->name}}</option>
                                    @endforeach
	      						
	    						</select>   <span class="error-field text-danger custom" id="category" role="alert"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="desc">Ad Description</label>
                                            <textarea name="desc" class="form-control" placeholder="Ad description">{{old('desc')}}</textarea>
                                            <span class="error-field text-danger custom" id="desc" role="alert"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   

                                    <div class="form-group mb-3">

                                        <label class="form-label">Ad Cover Image</label>
                                        <div class="avatar"><img alt="" class="img-70 img-thumbnail" id="prev0" src="{{asset('images/img-place.png')}}" data-original-title="" title=""></div>
                                        <input type="file" value="" data-idname="0" name="coverfile" id="filee0" style="display:none" onchange="previewFile(this);" accept="image/*" data-original-title="" title="">
                                        <div class="roundedpencil" id="addclose0"><label for="filee0"><i class="icofont icofont-pencil-alt-5"></i></label></div>
                                   
                                    </div>
                                    
                                   
                                </div>
                              

                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                              
                                      
                                    <span class="error-field text-danger custom" id="coverfile" role="alert"></span>
                                    <button type="button" offclass="step1" onclass="step2" checkaddr="step1" class="btn btn-primary changestep">NEXT</button>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid displayoff" id="step2">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12 mt-2">
                                            <label class="control-label" for="price_range_s">Basic Price</label>
                                            <input id="price_range_s" name="price_range" value="{{old('price_range')}}" type="number" placeholder="Ad Price" class="form-control">
                                            <span class="error-field text-danger custom" id="price_range" role="alert"></span>
                                        
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <label class="control-label" for="no_of_days_c">Number Of Days</label>
                                            <input id="no_of_days_c" name="no_of_days" value="{{old('no_of_days')}}" type="number" placeholder="no of days for discount activate" class="form-control">
                                            <span class="error-field text-danger custom" id="no_of_days" role="alert"></span>
                                        
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                                <div class="form-check form-check-inline radio radio-primary">
                                                    <input class="form-check-input" id="radioinline1" type="radio" offclass="per_wise" name="discounttype" value="amt_wise" data-bs-original-title="" title="">
                                                    <label class="form-check-label mb-0" for="radioinline1">Amount Wise</label>
                                                </div>
                                                <div class="form-check form-check-inline radio radio-primary">
                                                    <input class="form-check-input" id="radioinline2" type="radio" name="discounttype" offclass="amt_wise" value="per_wise" data-bs-original-title="" title="">
                                                    <label class="form-check-label mb-0" for="radioinline2">Percent Wise</label>
                                                </div>
                                                <span class="error-field text-danger custom" id="discounttype" role="alert"></span>
                                            </div>
                                            <input type="hidden" id="distype">
                                        </div>
                                        <div class="col-md-12 mt-2 displayoff" id="per_wise">
                                            <label class="control-label" for="dis_per">Discount Percent</label>
                                            <input id="dis_per" min="0" max="100" distype="per_wise" name="dis_percent" value="{{old('dis_per')}}" type="number" placeholder="Discount Percent per day" class="form-control calc">
                                            <span class="text-danger displayoff" id="p_serror">percentage will be between 1-100 </span>
                                            <span class="error-field text-danger custom" id="dis_percent" role="alert"></span>   
                                        </div>
                                        <div class="col-md-12 mt-2 displayoff" id="amt_wise">
                                            <label class="control-label" for="dis_amt">Discout Amount</label>
                                            <input id="dis_amt" distype="amt_wise" name="dis_amount" value="{{old('dis_amt')}}" type="number" placeholder="Discount Amount per day" class="form-control calc">
                                            <span class="error-field text-danger custom" id="dis_amount" role="alert"></span>  
                                        </div>
                                        <div class="col-md-12 mt-2 text-right">
                                            <button class="btn btn-warning" id="calc" type="button"> Calculate </button>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <label class="control-label" for="lower_selling_price">Lower Selling Price</label>
                                            <input id="ls" disabled name="l_s" value="{{old('lower_selling_price')}}" type="number" placeholder="0.0" class="form-control"> 
                                            <span class="text-danger displayoff" id="l_serror">Lower Selling Price Never Be Negative</span>
                                            <input type="hidden" name="lower_selling_price" >
                                            <span class="error-field text-danger custom" id="lower_selling_price" role="alert"></span>  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="button" offclass="step2" onclass="step1" class="btn btn-secondary changestep">Previous</button>
                                    <button type="button" offclass="step2" onclass="step3" checkaddr="step2" class="btn btn-primary changestep">NEXT</button>
                                </div>
                            </div>

                        </div>
                        <div class="container-fluid displayoff" id="step3">
                            <label class="control-label" for="filesss">Attach atleast 6 images</label>
                            <div class="row">

                                @for($i=1;$i
                                <=10;$i++) <div class="col-md-3">
                                    <div class="form-group mb-3">

                                        {{-- <label class="form-label">Profile Pic</label> --}}
                                        <div class="avatar"><img alt="" class="img-70 img-thumbnail" id="prev{{$i}}" src="{{asset('images/img-place.png')}}" data-original-title="" title=""></div>
                                        <input type="file" value="" data-idname="{{$i}}" name="adsfile[]" id="filee{{$i}}" style="display:none" onchange="previewFile(this);" accept="image/*" data-original-title="" title="">
                                        <div class="roundedpencil" id="addclose{{$i}}"><label for="filee{{$i}}"><i class="icofont icofont-pencil-alt-5"></i></label></div>
                                    </div>
                            </div>
                            @endfor


                        </div>
                        <span class="error-field text-danger custom" id="adsfile" role="alert"></span>  
                                      
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <button type="button" offclass="step3" onclass="step2" class="btn btn-secondary changestep">Previous</button>
                                <button type="button" checkaddr="step3" id="finish" class="btn btn-success btn-lg text-center">Finish</button>
                            </div>
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection @push('js')
<script type="text/javascript">
$('#finish').click(function(){
    $('.error-field').html('');
    checkaddr=$(this).attr('checkaddr');
        var adsfile = $("input[name='adsfile[]']")
              .map(function(){
                 
                      return $(this).val();
                   
                  
                  }).get();

                  var results = adsfile.filter(function(item){
                      if(item!='')
                         return item;  
                    });
                  
              $.ajax({
                url:"{{route('validation')}}",
                type:"get",
                data:{
                    checkaddr:checkaddr,
                    adsfile:results,
                },            
                success:function(resp){
                   swal({
                        title: "Are you sure?",
                        text: "Once You submiited this ad will be locked and you are unable to edit or delete",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $('#adupload').submit();
                        } else {
                                swal("Your Ads data is safe!");
                        }
                    });
                  
                },error:function(err){
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            $('#'+i).html(error);
                        });
                    }
                }
            });
});

        
    $('.changestep').click(function(){
        $('.error-field').html('');
        offstep=$(this).attr('offclass');
        onstep=$(this).attr('onclass');
        checkaddr=$(this).attr('checkaddr');
        var form = $('#adupload').serialize();
        if(checkaddr){
            $.ajax({
                url:"{{route('validation')}}",
                type:"post",
                dataType: "json",
                data:form + "&coverfile="+$("input[name=coverfile]").val()+"&checkaddr="+checkaddr,            
                success:function(resp){
                    console.log("succes" + resp.status)
                    $('#'+offstep).removeClass('displayon').addClass('displayoff');
                    $('#'+onstep).removeClass('displayoff').addClass('displayon');
                },error:function(err){
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            $('#'+i).html(error);
                         
                        });
                    }
                }
            });
        }else{
            $('#'+offstep).removeClass('displayon').addClass('displayoff');
            $('#'+onstep).removeClass('displayoff').addClass('displayon'); 
        }

        
    })

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
    $('.form-check-input').click(function(){
        $('#'+$(this).val()).removeClass('displayoff').addClass('displayon');
        $('#distype').val($(this).val());
      
        if(!$('#'+$(this).attr('offclass')).hasClass('displayoff')){
            $('#'+$(this).attr('offclass')).removeClass('displayon').addClass('displayoff');
        }

    });
    $('#calc').click(function(){
        $('.error-field').html('');
        b_p=Number($('#price_range_s').val());
        n_f_d=Number($('#no_of_days_c').val());
        d_type=$('#distype').val();
        d_per=Number($('#dis_per').val());
        d_val=Number($('#dis_amt').val());
        if(b_p != '' && n_f_d != '' && d_type != '' && (d_per != '' || d_val != '')){
        if(d_type=='per_wise'){
            if(d_per>0 && d_per<101){
            temp_amount=b_p;
            for(i=0;i<n_f_d;i++){
                temp_amount=temp_amount.toFixed(2);
                temp_amount-=(temp_amount * (d_per/100));
                
               
            }
            $('#ls').val(temp_amount.toFixed(2)); 
            $("input[name=lower_selling_price]").val(temp_amount.toFixed(2));
            
          
            if(temp_amount<0){
                $('#l_serror').removeClass('displayoff').addClass('displayon');
            }else{
                if($('#l_serror').hasClass('displayon')){
                    $('#l_serror').removeClass('displayon').addClass('displayoff');
                }
            }
                if($('#p_serror').hasClass('displayon')){
                    $('#p_serror').removeClass('displayon').addClass('displayoff');
                }
            }else{
                $('#p_serror').removeClass('displayoff').addClass('displayon');   
            }
           
           

        }else if(d_type=='amt_wise'){
           
            l_s=b_p-(n_f_d*d_val);
            $('#ls').val(l_s);
            $("input[name=lower_selling_price]").val(l_s);
            if(l_s<0){
                $('#l_serror').removeClass('displayoff').addClass('displayon');
            }else{
                if($('#l_serror').hasClass('displayon')){
                    $('#l_serror').removeClass('displayon').addClass('displayoff');
                }
            }
        }
        }else{
            $("input[name=lower_selling_price]").val('');
            $('#ls').val('');
            alert("plese fill all the field above");
        }
      
    });
</script>
@endpush