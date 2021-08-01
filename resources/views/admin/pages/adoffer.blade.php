@extends('admin.layout.app',['request'=>'Ads','innerrequest'=>'offer','title'=>'Ads Offers'])
@push('css')
<style type="text/css">
    .no-brdr{
        border: none;
        background: none;
    }
    .float {
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
                <h1 class="page-header">Ads Offers</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center">
                                    @if(\Request::get('ad_id'))
                         <a href="{{route('ad.show',$adid)}}">{{$ad_title}}</a> 
                         @else 
                           Ad 
                           @endif 
                      Offer List
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Offer Id</th>
                                                    @if(empty(\Request::get('ad_id')))
                                                    <th>Ad Title</th>
                                                    @endif
                                                    <th>Offer Price</th>
                                                    <th>Offer Date</th>
                                                    <th>Status</th>
                                                    <th>Action(s)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($offer as $key=>$item)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$item->ad_u_id}}</td>
                                                    @if(empty(\Request::get('ad_id')))
                                                    <td><a href="{{route('ad.show',$item->belongtoads->id)}}">{{$item->belongtoads->title}}</a></td>
                                                    @endif
                                                    <td>{{number_format($item->offer_price)}}$</td>
                                                    <td>{{$item->created_at->format('d M,Y h:i:s A')}}</td>    
                                                    <td >{{$item->status===0 ? 'Pending' : ($item->status==1 ? 'Sold' : ( $item->status==2 ? 'Reject' : ''))}}</td>   
                                                    <td><a href="{{route('offershow',$item->id)}}" ><i class="fa fa-eye"></i></a></td>
                                                </tr>
                                                @endforeach
                                              
                                              
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                  
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
   </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@push('js')
<script>

                            $('#dataTables-example').DataTable({
                        responsive: true
                });
               $('.rem').on('click',function(){
                swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this user detail! include Ads and many more",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      link=$(this).attr('linking');
      window.location.href=link;

  } else {
    swal("Your User data is safe!");
  }
});
               });
        </script>
        @if(Session::has('del'))
        <script>
            swal("Poof! User has been deleted!", {
      icon: "success",
    });
        </script>
        @endif
@endpush