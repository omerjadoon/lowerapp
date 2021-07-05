@extends('admin.layout.app',['request'=>'contact-list','innerrequest'=>'','title'=>'Contact Request'])
@push('css')
<style type="text/css">
   q{
    font-style: italic;
    letter-spacing: 1px;
   }
</style>
@endpush
@section('content')

 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contact Request</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Contact List 
                    </div>
                    <div class="panel-body">
                        @foreach($contact as $key=>$cntct)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-9">
                                        {{strtoupper($cntct->name)}} <p class="text-info">< {{$cntct->email}} ></p>   
                                    </div>
                                    <div class="col-md-3">
                                       <p style="font-size:14px"> <u>{{$cntct->phone_number}}</u> </p> 
                                        {{$cntct->created_at->format('Y M,d H:i:s a')}}

                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12 text-left p-3">
                                    <q>{{$cntct->message}}<q>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        <div clas="row">
                            <div clss="col-md-4">{{ $contact->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div> <!-- /#page-wrapper -->    
@endsection
