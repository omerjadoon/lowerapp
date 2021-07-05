@extends('admin.layout.app',['request'=>'setting','innerrequest'=>'city','title'=>'City'])
@push('css')
<style type="text/css">
    .btn-adi{
        text-align: center;
        padding: 5px;
        min-width: 150px;
    }
</style>
@endpush
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
         <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">City</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{$page == 'index' ? 'Add'  :  'Edit' }} City 
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                                         @include('alerts.success-alert',['ses'=>'success'])
                                                            @include('alerts.error-alert',['ses_name'=>'error'])
                                            <form role="form" action="{{$page == 'index' ? route('city_store') :  route('city_update',['id' => $city->id]) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                               
                                        <div class="col-lg-4">


                                                <div class="form-group">
                                                    <!-- <label>Country Name</label> -->
                                                    <input name="city" class="form-control" placeholder="Enter City Name" value="{{$page == 'edit' ? $city->name : ''}}{{old('city')}}">
                                                    @include('alerts.errorfield',['field'=>'city'])
                                                </div>
                                             
                                            </div>
                                             <div class="col-lg-4">
                                                  <select name="state" class="form-control">
                                                        <option value="">Select State</option>
                                                        @foreach($state as $key=>$state)
                                                        @if($page=='edit')
                                                        <option value="{{$state->id}}" {{$state->id==$city->state_id ? 'selected' : ''}}>{{$state->name}}</option>
                                                        @else
                                                        <option value="{{$state->id}}" {{$state->id==old('state') ? 'selected' : ''}}>{{$state->name}}</option>
                                                        @endif
                                                       @endforeach
                                                    </select>
                                                    @include('alerts.errorfield',['field'=>'state'])
                                             </div>
                                            <div class="col-lg-4">
                                                <button type="submit" class="btn btn-default btn-adi">{{$page == 'index' ? 'Add'  :  'Update' }}</button>
                                                                                               @if($page=='index')
                                                <button type="reset" class="btn btn-default btn-adi">Reset</button>
                                                @else
                                                 <button type="submit" class="btn btn-default btn-adi"  onclick="window.history.go(-1); return false;">cancel</button>
                                                
                                                @endif
                                            </div>
                                        
                                        </form>
                                        
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                               @if($page=='index')            <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    City List
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>State Name</th>
                                                    <th>Country Name</th>
                                                    <th>Action(s)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($city as $key=>$city)
                                                <tr>
                                                    <td >{{$key+1}}</td>
                                                    <td >{{$city->name}}</td>
                                                    <td >{{$city->belongtostate->name}}</td>
                                                    <td >{{$city->belongtostate->belongtocountry->name}}</td>
                                                    <td > 
                                                        <a href="{{route('city_edit',['id' => $city->id])}}" class="ft-22"><i class="fa fa-edit"></i></a>
                                                        <a href="{{route('city_del',['id' => $city->id])}}"  class="ft-22"><i class="fa fa-trash"></i></a>   </td>
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
                    @endif
                    <!-- /.row -->
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