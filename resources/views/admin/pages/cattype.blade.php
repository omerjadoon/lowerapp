@extends('admin.layout.app',['request'=>'media','innerrequest'=>'media','title'=>'Media Type'])
@push('css')
<style type="text/css">
    .btn-adi{
        text-align: center;
        padding: 5px;
        min-width: 150px;
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
        min-height: 100px;
        max-height: 100px;
        border-style: double !important;
        border: 3px;
        min-width: 50%;
        max-width: 50%;
    }
    .img-icon{
        min-width: 50px;
        max-width: 50px;
    }
</style>
@endpush
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
         <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Categories</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{$page == 'index' ? 'Add ' : 'Edit ' }} Category 
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                         @include('alerts.success-alert',['ses'=>'success'])
                    @include('alerts.error-alert',['ses_name'=>'error'])
                                            <form role="form" action="{{$page == 'index' ? route('cat_store') :  route('cat_update',['id' => $cattype->id]) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                        <div class="col-lg-4">


                                                <div class="form-group">
                                                    <label>Category Name</label> </br>
                                                    @include('alerts.errorfield',['field'=>'type'])
                                                    <input class="form-control" name="type" placeholder="Enter Category" value="{{$page == 'edit' ? $cattype->name : ''}}{{old('type')}}">
                                                     
                                                </div>
                                             
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">

                                                    <label class="form-label">Category Icon</label></br>
                                                    @include('alerts.errorfield',['field'=>'catfile'])
                                                    <div class="avatar"><img alt="" class="img-70 img-thumbnail" id="prev0" src="{{$page != 'edit' ? asset('images/img-place.png') : asset($cattype->file_path)}}" data-original-title="" title=""></div>
                                                    <input type="file" value="" data-idname="0" name="catfile" id="filee0" style="display:none" onchange="previewFile(this);" accept="image/*"  data-original-title="" title="">
                                                    <div class="roundedpencil" id="addclose0"><label for="filee0"><i class="fa fa-pencil"></i></label></div>
                                                </div>

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
                                        <!-- /.row -->
                                         @if($page=='index')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Category List
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Type</th>
                                                    <th>Icon</th>
                                                    <th>Action(s)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cattype as $key=>$cat)
                                                <tr>
                                                    <td >{{$key+1}}</td>
                                                    <td >{{$cat->name}}</td>
                                                    <td><img class="img-icon" src="{{asset($cat->file_path)}}"></td>
                                                    
                                                    <td > 
                                                        
                                                        <a href="{{route('cat_edit',['id' => $cat->id])}}" class="ft-22"><i class="fa fa-edit"></i></a>
                                                        <a href="{{route('cat_del',['id' => $cat->id])}}"  class="ft-22"><i class="fa fa-trash"></i></a>  
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
                    <!-- /.row -->
                    @endif
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
                    $('#addclose' + idnum).html('<label for="filee' + idnum + '"><i  class="fa fa-pencil"></i></label>')
                });
            }

            reader.readAsDataURL(file);
        }
    }
        </script>

@endpush