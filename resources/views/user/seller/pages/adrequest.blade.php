@extends('user.seller.layouts.app',['title'=>'Ads Offer','request'=>'adrequest'])
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
                <h3>Ads Offers</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i data-feather="home"></i></a></li>
                    {{-- <li class="breadcrumb-item">Ad section</li> --}}
                    <li class="breadcrumb-item active">Ads Offers</li>
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
                  
                    <h5>
                        @if(\Request::get('ad') && $adrequest->count()>0)
                         <a href="{{route('ads.show',$adid)}}">{{$adtitle}}</a> 
                         @else 
                           Ad 
                           @endif 
                         Offer List
                        </h5>

                   
                </div>
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="display" id="export-button">
                            <thead>
                                <tr>
                                    <th>#</th>
                                   
                                    <th>Requested ID</th>
                                    <th>Offer Amount</th>
                                    @if(empty(\Request::get('ad')))
                                    <th>Ad Title</th>
                                    @endif
                                    <th>Buyer</th>
                                    <th>Status</th>
                                    <th>Requested At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adrequest as $key=>$lead)
                                <tr>
                                    <td>{{$key+1}}</td>
                                 <td>{{$lead->ad_u_id}}</td>
                                 <td>{{number_format($lead->offer_price)}}$</td>
                                 @if(empty(\Request::get('ad')))
                                 <td><a href="{{route('ads.show',$lead->belongtoads->id)}}">{{$lead->belongtoads->title}}</a></td>
                                 @endif
                                 <td>{{$lead->belongtobuyer->f_name}}</td>
                                  <td >{{$lead->status===0 ? 'Pending' : ($lead->status==1 ? 'Sold' : ( $lead->status==2 ? 'Reject' : ''))}}</td>   
                                  <td>{{$lead->created_at->format('d M,Y h:i:s A')}}</td>    
                                  <td><a href="{{route('ad-offers.show',$lead->id)}}"><i class="fa fa-eye"></i> </a></td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                   
                                    <th>Requested ID</th>
                                    <th>Offer Amount</th>
                                    @if(empty(\Request::get('ad')))
                                    <th>Ad Title</th>
                                    @endif
                                    <th>Buyer</th>
                                    <th>Status</th>
                                    <th>Requested At</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
@push('js')
<script type="text/javascript">

</script>
@endpush