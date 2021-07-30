
@extends('user.buyer.layouts.app',['request'=>'contact','title'=>'Contact Us'])
@push('css')
@endpush
@section('content')
<!--================================
=            Page Title            =
=================================-->
<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<h3>Contact Us</h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
<!-- page title -->

<!-- contact us start-->
<section class="section">
    <div class="container">
        @include('alerts.error-alert',['ses_name'=>'error']) 
        @include('alerts.success-alert',['ses'=>'success']) 
        <div class="row">
            <div class="col-md-6">
                <div class="contact-us-content p-4">
                    <h5>Contact Us</h5>
                    <h1 class="pt-3">Hello, what's on your mind?</h1>
                    <p class="pt-3 pb-5">Get in touch with us today.</p>
                </div>
            </div>
            <div class="col-md-6">
                    <form action="{{route('save_contact')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
                                        <input type="text" name="name" placeholder="Name *" class="form-control" >
                                        @include('alerts.errorfield',['field'=>'name'])
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input type="text" placeholder="Contact *"  name="phone_number" class="form-control" >
                                        @include('alerts.errorfield',['field'=>'phone_number'])
                                    </div>
                                    
                                </div>
                            </div>
                            <input type="email" placeholder="Email *" name="email" class="form-control" >
                            @include('alerts.errorfield',['field'=>'email'])
                            <input type="text" placeholder="Subject *" name="subject" class="form-control mt-3 mt-lg-4" >
                            @include('alerts.errorfield',['field'=>'subject'])
                            <textarea name="message" id="" name="message"  placeholder="Message *" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                            @include('alerts.errorfield',['field'=>'message'])
                            <div class="btn-grounp">
                                <button type="submit" class="btn btn-primary mt-2 float-right">SUBMIT</button>
                            </div>
                        </fieldset>
                    </form>
            </div>
        </div>
    </div>
</section>
<!-- contact us end -->
@endsection
@push('nice-select-js')
<script src="{{asset('buyer/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
@endpush
@push('js')

@endpush
