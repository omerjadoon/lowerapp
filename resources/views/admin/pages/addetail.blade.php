@extends('admin.layout.app',['request'=>'Ads','innerrequest'=>'allads','title'=>'Ad Detail']) @push('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
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
    #demo {
  height:100%;
  position:relative;
  overflow:hidden;
}


.green{
  background-color:#6fb936;
}
        .thumb{
            margin-bottom: 30px;
        }
        
        .page-top{
            margin-top:85px;
        }

   
img.zoom {
    width: 100%;
    height: 200px;
    border-radius:5px;
    object-fit:cover;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
}
        
 
.transition {
    -webkit-transform: scale(1.2); 
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}
    .modal-header {
   
     border-bottom: none;
}
    .modal-title {
        color:#000;
    }
    .modal-footer{
      display:none;  
    }li{
        
        list-style: none;
    }

</style>
@endpush @section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ad Detail</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if(!empty($adsection))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-5"> <h4>{{strtoupper($adsection->title)}}</h4></div>
                            <div class="col-md-2">
                                @if($adsection->status==1) <span class="badge badge-success mt-10">Sold</span>@endif
                            </div>
                            <div class="col-md-2 text-right">
                                <h4><b>Posted At :</b></h4> 
                            </div>
                            <div class="col-md-3"><h4>{{$adsection->created_at->format('d M,Y H:i:s A')}}</h4></div>
                        </div>
                       
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                         <!-- Page Content -->
                         <div class="row">
                             <div class="col-md-8">
                                <div class="img-container">
                                   <img class="img-fluid rounded" src="{{asset($adsection->cover_file_path)}}" itemprop="thumbnail" alt="gallery"> 
                                </div>
                             </div>
                             <div class="col-md-4">
                               
                                        
                                            <li class="p-10"><span style="font-size: 20px"><b>Posted By : </b></span><span style="font-size: 18px"><a href="{{route('seller.show',$adsection->belongtoseller->belongtouser->id)}}">{{$adsection->belongtoseller->title.' '.$adsection->belongtoseller->f_name.' '.$adsection->belongtoseller->l_name}}</a></span></li>
                                            <li class="p-10"><span style="font-size: 20px"><b>Basic Price : </b></span><span style="font-size: 18px">{{number_format($adsection->price_range)}}$</span></li>
                                            <li class="p-10"><span style="font-size: 20px"><b>Current Price : </b></span><span style="font-size: 18px">{{number_format($adsection->actual_price)}}$</span></li>
                                            {{-- <li class="p-10"><span style="font-size: 20px"><b>Description : </b></span><span style="font-size: 18px">{{$adsection->desc}}</span></li> --}}
                                            <li class="p-10"><span style="font-size: 20px"><b>Total Offer : </b></span><span style="font-size: 18px"><a href="{{route('adofer',['ad_id'=>$adsection->id])}}">{{$adsection->adhasmanyrequest->count()}}</a></span></li>
                                             <li><hr>DISCOUNT SETTING<hr></li>   
                                            <li class="p-10"><span style="font-size: 20px"><b>Number Of days : </b></span><span style="font-size: 18px">{{$adsection->no_of_days}} Days</span></li>
                                            <li class="p-10"><span style="font-size: 20px"><b>Discount Type : </b></span><span style="font-size: 18px">{{$adsection->discounttype=='amt_wise' ? 'Amount Wise' : 'Percent Wise'}}</span></li>
                                            <li class="p-10"><span style="font-size: 20px"><b>Per Day Discount : </b></span><span style="font-size: 18px">{{number_format($adsection->perdaydiscount )}}{{$adsection->discounttype=='amt_wise' ? '$' : '%'}}</span></li>
                                            <li class="p-10"><span style="font-size: 20px"><b>Lower Selling Price : </b></span><span style="font-size: 18px">{{number_format($adsection->lower_selling_price)}}$</span></li>
                                          
                                       
                             </div>
                             <div class="col-md-12 mt-10">
                                <li class="p-10"><span style="font-size: 20px"><b>Description : </b></span><span style="font-size: 18px">{{$adsection->desc}}</span></li>
                             </div>
                         </div>
                        
                        {{-- <div class="container page-top"> --}}
                            
                            <div class="row mt-10">
                                @foreach ($adsection->adhasmanyimage as $image)
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a href="{{asset($image->file_path)}}" class="fancybox" rel="ligthbox">
                                        <img  src="{{asset($image->file_path)}}" class="zoom img-fluid "  alt="">
                                    </a>
                                </div> 
                                @endforeach  
                            </div>
                        {{-- </div> --}}
                      
                        <div class="row mt-10">
                            <div class="col-md-12 text-center">
                                @if($adsection->delete_request==1)
                                <button class="btn btn-sm btn-secondary">Request For Deletion</button>
                            </br>
                        </br>
                            <button href="{{route('ad.edit',$adsection->id)}}" status=3 class="btn btn-sm btn-success rem"><i class="fa fa-check"></i> Accept</button>
                            <button href="{{route('ad.edit',$adsection->id)}}" status=2 class="btn btn-sm btn-danger rem"><i class="fa fa-remove"></i> Reject</button>
                           
                            @elseif($adsection->delete_request==2)
                            <button class="btn btn-sm btn-danger">Deletion Request Rejected</button>
                            @endif
                        </div>
                        </div>
                      
                        <div class="row mt-10">
                            <div class="col-md-12 text-right"><button onClick="history.go(-1);" class="btn btn-primary">Go back</button></div>
                        </div>
                        
                    </div>
                </div>
                @else
                <center><h2 class="text-danger">404 Not Found</h2></center>
                @endif
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection @push('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
      $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
		
		$(this).addClass('transition');
	}, function(){
        
		$(this).removeClass('transition');
	});


    $('.rem').on('click',function(){
        status=$(this).attr('status');
        if(status==3){
            msg="Once deleted, you will not be able to recover this Ad";

        }else if(status==2){
            msg="You want to reject this Ad Deletion Request";
        }
                swal({
  title: "Are you sure?",
  text: msg,
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      link=$(this).attr('href')+"?status="+status;
    window.location.href=link;

  } else {
    swal("Your Action is safe!");
  }
});
               });
</script>
@endpush