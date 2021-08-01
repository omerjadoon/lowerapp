@extends('admin.layout.app',['request'=>'Ads','innerrequest'=>'offer','title'=>'Ads Offers'])
@push('css')
<style type="text/css">
    .no-brdr{
        border: none;
        background: none;
    }ul{
        list-style: none;
    }.float {
        float: right !important;
    }.ft-20{
        font-size: 20px;
}
</style>
@endpush
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ad Offer Detail</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
<div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                          <b>Offer ID :</b> {{$adsection->ad_u_id}}
                                  
                                    
                            </div>
                            <div class="col-md-6 text-right">
                                <b>Offer At :</b> {{$adsection->created_at->format('d M,Y h:i:s A')}}
                            </div>
                        </div>
                    </div>
                    <div class="panel-body p-3">
                      <div class="row">
                          <div class="col-md-4">
                            <ul class="mt-5">
                                <li class="mt-3 first_name_0"><b>Buyer Detail</b><span class="font-primary url_add_0 float"></span></li>
                                <li class="mt-3">
                                    <hr>
                                </li>
                                <li class="mt-3">Name<span class="font-primary first_name_0 float"><a href="{{route('buyer.show',$adsection->belongtobuyer->belongtouser->id)}}" >{{$adsection->belongtobuyer->f_name.' '.$adsection->belongtobuyer->l_name}}</a></span></li>
                                
                                <li class="mt-3">Contact #<span class="font-primary float">{{$adsection->belongtobuyer->phone}}</span></li>
                                <li class="mt-3">Location<span class="font-primary personality_0 float">{{$adsection->belongtobuyer->belongtocity->name.' '.$adsection->belongtobuyer->belongtocity->belongtostate->name.', '.$adsection->belongtobuyer->belongtocity->belongtostate->belongtocountry->name }}</span></li>
                                

                            </ul>
                          </div>
                          <div class="col-md-4">
                            <ul class="mt-5">
                                <li class="mt-3 first_name_0"><b>Offer Detail</b><span class="font-primary url_add_0 float"></span></li>
                                <li class="mt-3">
                                    <hr>
                                </li>
                                <li class="mt-3">Ad Title<span class="font-primary first_name_0 float"> <a href="{{route('ad.show',$adsection->belongtoads->id)}}" >{{$adsection->belongtoads->title}}</a></span></li>
                                
                                <li class="mt-3">Offer Price <span class="font-primary float">{{number_format($adsection->offer_price)}}$</span></li>
                                <li class="mt-3">Status<span class="font-success personality_0 float badge">{{$adsection->status===0 ? 'Pending' : ($adsection->status==1 ? 'Sold' : ( $adsection->status==2 ? 'Reject' : ''))}}</span></li>
 
                            </ul>
                          </div>
                          <div class="col-md-4">
                            <ul class="mt-5">
                                <li class="mt-3 first_name_0"><b>Seller Detail</b><span class="font-primary url_add_0 float"></span></li>
                                <li class="mt-3">
                                    <hr>
                                </li>
                                <li class="mt-3">Name<span class="font-primary first_name_0 float"><a href="{{route('seller.show',$adsection->belongtoads->belongtoseller->belongtouser->id)}}" >{{$adsection->belongtoads->belongtoseller->f_name.' '.$adsection->belongtoads->belongtoseller->l_name}}</a></span></li>
                                
                                <li class="mt-3">Contact #<span class="font-primary float">{{$adsection->belongtoads->belongtoseller->phone}}</span></li>
                                <li class="mt-3">Location<span class="font-primary personality_0 float">{{$adsection->belongtoads->belongtoseller->belongtocity->name.' '.$adsection->belongtoads->belongtoseller->belongtocity->belongtostate->name.', '.$adsection->belongtoads->belongtoseller->belongtocity->belongtostate->belongtocountry->name}}</span></li>
                                

                            </ul>
                          </div>
                         
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
@endpush