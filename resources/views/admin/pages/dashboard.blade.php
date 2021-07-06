@extends('admin.layout.app',['request'=>'dashboard','innerrequest'=>'dashboard','title'=>'Dashboard'])
@push('css')
<!-- Morris Charts CSS -->
        <link href="{{asset('admin/css/morris.css')}}" rel="stylesheet">
<style>

</style>
@endpush
@section('content')
<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-4 col-md-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-database fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">0 Cent</div>
                                            <div>Total Commission Earned</div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-8">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-get-pocket fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">0 Cent</div>
                                            <div>Commission Recevied</div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-8">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-exclamation-triangle fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">0 Cent</div>
                                            <div>Commission Remaining</div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">0</div>
                                            <div>Business Partners</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="">
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-4"><b>Total Amount</b><div> 0 Cent</div></div>
                                             <div class="col-md-4"><b>Amount Received</b><div> 0 Cent</div></div>
                                             <div class="col-md-4"><b>Amount Remaining</b><div> 0 Cent</div></div>
                                        </div>

                                      <!--   <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                                                <div class="col-lg-6 col-md-12">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">0</div>
                                            <div>Media Partners</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="">
                                   <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-4"><b>Commission Earned</b><div> 0 Cent</div></div>
                                             <div class="col-md-4"><b>Received</b><div> 0 Cent</div></div>
                                             <div class="col-md-4"><b>Remaining</b><div> 0 Cent</div></div>
                                        </div>

                                      <!--   <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                       <div class="col-lg-6 col-md-12">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-desktop fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">0</div>
                                            <div>Total Ads</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">0</div>
                                            <div>Total Leads</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
@endsection

@push('js')
        <script src="{{asset('admin/js/morris.min.js')}}"></script>
        <script src="{{asset('admin/js/morris-data.js')}}"></script>
@endpush