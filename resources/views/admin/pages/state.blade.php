@extends('admin.layout.app',['request'=>'setting','innerrequest'=>'state','title'=>'State'])
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
                            <h1 class="page-header">State</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{$page == 'index' ? 'Add'  :  'Edit' }} State 
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                                         @include('alerts.success-alert',['ses'=>'success'])
                                                            @include('alerts.error-alert',['ses_name'=>'error'])
                                            <form role="form" action="{{$page == 'index' ? route('state_store') :  route('state_update',['id' => $state->id]) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                               
                                        <div class="col-lg-4">


                                                <div class="form-group">
                                                    <!-- <label>Country Name</label> -->
                                                    <input name="state" class="form-control" placeholder="Enter State Name" value="{{$page == 'edit' ? $state->name : ''}}{{old('state')}}">
                                                     @include('alerts.errorfield',['field'=>'state'])

                                                </div>
                                                 
                                             
                                            </div>
                                             <div class="col-lg-4">
                                                  <select name="country" id="country" class="form-control">
                                                        <option value="">Select Country</option>
                                                        @foreach($country as $key=>$count)
                                                        @if($page=='edit')
                                                        <option value="{{$count->id}}" {{$count->id==$state->country_id ? 'selected' : ''}}>{{$count->name}}</option>
                                                        @else
                                                        <option value="{{$count->id}}" {{$count->id==old('country') ? 'selected' : ''}}>{{$count->name}}</option>
                                                        @endif
                                                       @endforeach
                                                    </select>
                                                      @include('alerts.errorfield',['field'=>'country'])
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
                                    State List
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Country Name</th>
                                                    <th>Action(s)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($state as $key=>$state)
                                                <tr>
                                                    <td >{{$key+1}}</td>
                                                    <td >{{$state->name}}</td>
                                                    <td >{{$state->belongtocountry->name}}</td>
                                                    <td > 
                                                        <a href="{{route('state_edit',['id' => $state->id])}}" class="ft-22"><i class="fa fa-edit"></i></a>
                                                        <a href="{{route('state_del',['id' => $state->id])}}"  class="ft-22"><i class="fa fa-trash"></i></a>   
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