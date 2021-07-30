@extends('user.buyer.layouts.app',['title'=>'Change Password','request'=>'setting'])
@push('css')
<style type="text/css">
.float {
        float: right !important;
    }

</style>
    
@endpush
@section('content')
<section class="user-profile section">
  
    
	<div class="container">
        @include('alerts.error-alert',['ses_name'=>'error'])
        @include('alerts.success-alert',['ses'=>'success'])
		<div class="row">
          
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
                    @include('user.buyer.pages.userwidget',['page'=>'prof'])
				
				
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                	<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>Edit Password</h2>
					{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p> --}}
				</div>
                <div class="widget change-password">
                    {{-- <h3 class="widget-header user">Edit Password</h3> --}}
                    <form action="{{route('change_password_upd')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Current Password -->
                        <div class="form-group">
                            <label for="current-password">Current Password</label>
                            <input name="oldpassword" type="password" class="form-control" id="current-password">
                            @include('alerts.errorfield',['field'=>'oldpassword'])
                        </div>
                        <!-- New Password -->
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <input name="password" type="password" class="form-control" id="new-password">
                            @include('alerts.errorfield',['field'=>'password'])
                        </div>
                        <!-- Confirm New Password -->
                        <div class="form-group">
                            <label for="confirm-password">Confirm New Password</label>
                            <input name="password_confirmation" type="password" class="form-control" id="confirm-password">
                            @include('alerts.errorfield',['field'=>'password_confirmation'])
                        </div>
                        <!-- Submit Button -->
                        <div class="text-right"> <button class="btn btn-transparent">Change Password</button></div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script type="text/javascript">

</script>
    
@endpush