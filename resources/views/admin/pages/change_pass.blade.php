@extends('admin.layout.app',['request'=>'pass','innerrequest'=>'pass','title'=>'Change Password']) @push('css')

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


</style>
@endpush @section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Settings</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Edit Password</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('alerts.error-alert',['ses_name'=>'pass_error'])
                                @include('alerts.success-alert',['ses'=>'ok'])
                                <form action="{{route('change_pass_admin_upd')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="control-label" for="old-pass">Old Password</label>
                                        <input class="form-control" placeholder="Old Password" name="oldpass" type="password">
                                    </div>
                                    @include('alerts.errorfield', ['field' => 'oldpass'])
                                    <div class="form-group">
                                        <label class="control-label" for="old-pass">New Password</label>
                                        <input class="form-control" placeholder="New Password" name="password" type="password">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="old-pass">Confirm Password</label>
                                        <input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password">
                                    </div>
                                    @include('alerts.errorfield', ['field' => 'password'])
                                    {{-- @include('alerts.errorfield', ['field' => 'confirmpass']) --}}
                                    <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary"> Save Changes </button>
                                    </div>
                                </form>
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
@endsection @push('js')
<script ></script>
@endpush