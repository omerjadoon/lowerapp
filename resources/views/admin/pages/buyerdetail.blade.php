@extends('admin.layout.app',['request'=>'user','innerrequest'=>'buyer','title'=>'Buyer Detail'])
@push('css')
<style type="text/css">
    .activeicon{
        padding: 5px;
    border: 1px solid #3c763d;
    border-radius: 50px;
    background: #3c763d;
    color: white;
    }.img-70{
        border-style: double !important;
    border: 3px;
    }.mt-5{
        margin-top: 5px !important;
    }
</style>
@endpush
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Buyer Details</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                        <h3>{{$buyer->buyerDetail->title.' '.$buyer->buyerDetail->f_name.' '.$buyer->buyerDetail->l_name}}</h3>
                                    </br>
                                    {{-- <b>Total Ad Posted : </b><a href="{{route('ad.index',['seller_id'=>$buyer->buyerDetail->id])}}">{{$buyer->buyerDetail->sellerpostedmanyads->count()}}</a> --}}
                                    
                            </div>
                            <div class="col-md-6 text-right">
                                <img class="img-70 img-fluid m-r-20 rounded-circle update_img_0" width="100px" height="100px" src="{{asset($buyer->buyerDetail->file_path)}}" alt="" data-original-title="" title="">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body p-3">
                        <div class="row p-10">
                            <div class="col-md-6">
                                <b>Email :</b>  {{$buyer->email}}
                            </div>
                            <div class="col-md-6">
                                <b>Contact Info :</b>  {{$buyer->buyerDetail->phone}}
                            </div>
                        </div>
                        <div class="row p-10">
                            <div class="col-md-7">
                                <b>Address :</b>  {{$buyer->buyerDetail->address}}
                            </div>
                            <div class="col-md-5">
                                <b>Zip Code :</b>  {{$buyer->buyerDetail->zip_code}}
                            </div>
                        </div>
                        <div class="row p-10">
                            <div class="col-md-4">
                                <b>City :</b>  {{$buyer->buyerDetail->belongtocity->name}}
                            </div>
                            <div class="col-md-4">
                                <b>State :</b>  {{$buyer->buyerDetail->belongtocity->belongtostate->name}}
                            </div>
                            <div class="col-md-4">
                                <b>Country :</b>  {{$buyer->buyerDetail->belongtocity->belongtostate->belongtocountry->name}}
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
@endsection

@push('js')
<script>

                            $('#dataTables-example').DataTable({
                        responsive: true
                });
        </script>
@endpush