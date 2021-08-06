@extends('user.seller.layouts.app',['title'=>'Ads Offer Detail','request'=>'adrequest'])
 @push('css')
<style type="text/css">
.custom {
    margin-top: 5px;
} .img-70 {
        min-height: 200px;
        max-height: 200px;
        border-style: double !important;
        border: 3px;
        min-width: 100%;
        max-width: 100%;
    }ul{
        list-style: none;
    }
    .float {
        float: right !important;
    }.ft-20{
        font-size: 20px;
}
    
</style>
@endpush 
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Offer Detail </h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Ads Offers</li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                   <div class="row">
                       <div class="col-md-7">
                        <h5>Offer ID : {{$adrequest->ad_u_id}}</h5>
                       </div>
                       <div class="col-md-5">
                        <h5 >Offer Date : {{$adrequest->created_at->format('d M,Y h:i:s A')}}</h5>
                       </div>
                   </div>
                    
                   
                       
                    
                   
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                           <div class="avatar"><img alt="" class="img-70 img-thumbnail" id="prev" src="{{asset($adrequest->belongtobuyer->file_path)}}" data-original-title="" title=""></div>
                        </div>
                        <div class="col-md-4">
                            <ul class="mt-5">
                                <li class="mt-3 first_name_0">Buyer Detail<span class="font-primary url_add_0 float"></span></li>
                                <li class="mt-3">
                                    <hr>
                                </li>
                                <li class="mt-3">Name<span class="font-primary first_name_0 float">{{$adrequest->belongtobuyer->f_name.' '.$adrequest->belongtobuyer->l_name}}</span></li>
                                
                                {{-- <li class="mt-3">Contact #<span class="font-primary float">{{$adrequest->belongtobuyer->phone}}</span></li> --}}
                                <li class="mt-3">Location<span class="font-primary personality_0 float">{{$adrequest->belongtobuyer->belongtocity->name.' '.$adrequest->belongtobuyer->belongtocity->belongtostate->name.', '.$adrequest->belongtobuyer->belongtocity->belongtostate->belongtocountry->name }}</span></li>
                                

                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="mt-5">
                                <li class="mt-3 first_name_0">Offer Detail<span class="font-primary url_add_0 float"></span></li>
                                <li class="mt-3">
                                    <hr>
                                </li>
                                <li class="mt-3">Ad Title<span class="font-primary first_name_0 float">{{$adrequest->belongtoads->title}}</span></li>
                                
                                <li class="mt-3">Offer Price <span class="font-primary float">{{number_format($adrequest->offer_price)}}$</span></li>
                                <li class="mt-3">Status<span class="font-success personality_0 float">{{$adrequest->status===0 ? 'Pending' : ($adrequest->status==1 ? 'Approve' : ( $adrequest->status==2 ? 'Reject' : ''))}}</span></li>
                                

                            </ul>
                        </div>
                    </div>
                    <div class="row mt-5">
                        @if($adrequest->status==0)
                        <div class="col-md-6 text-right">
                            <button request-id="{{$adrequest->id}}" ad-id="{{$adrequest->ad_id}}" status="1" class="btn btn-success sweet-5">Approve</button>
                           
                        </div>
                        <div class="col-md-6 text-left">
                            <button  request-id="{{$adrequest->id}}" ad-id="{{$adrequest->ad_id}}" status="2" class="btn btn-danger sweet-5">Reject</button>
                        </div>
                        @elseif($adrequest->status==1)
                        <div class="col-md-12 text-center">
                            <span class="badge badge-success ft-20">Sold</span>
                        </div>
                        @elseif($adrequest->status==2)
                        <div class="col-md-12 text-center">
                            <span class="badge badge-danger ft-20">Rejected</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script type="text/javascript">
$('.sweet-5').on('click', function(){
        req_id=$(this).attr('request-id');
        ad_id=$(this).attr('ad-id');
        status=$(this).attr('status');
        if(status==1){
            txt='If you Accept this buyer offer other offer against this Ad will rejected';
        }else if(status==2){
            txt='Once you reject you can not revert it back';
        }

                swal({
                    title: "Are you sure?",
                    text: txt,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                            $.ajax({
                            url:"{{route('requestaction')}}",
                            type:"get",
                            data:{
                                req_id:req_id,
                                ad_id:ad_id,
                                status:status,
                            },
                            success:function(res){
                                if(res.status==200){
                                 swal(res.msg, {
                                    icon: "success",
                                });
                               location.reload();
                                }else if(res.status==500){
                                     swal("Oh! Something Went Wrong!", {
                                    icon: "danger",
                                });
                                }                        
                            },error:function(res){
                                console.log(res);
                            },
                            }); 
                    } else {
                        swal("Your Ad Offer is safe!");
                    }
                })
        });
</script>
@endpush