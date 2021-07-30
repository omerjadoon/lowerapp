@extends('user.buyer.layouts.app',['title'=>'Email Verify','request'=>'verify'])
@push('css')
<style>
 
</style>
    
@endpush
@section('content')
<section class="page-title">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <!-- Title text -->
                <h3>Account Verification</h3>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>
<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray" style="padding:152px 0px !important">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to email address.')}} {{Auth::user()->email}}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@push('js')
    
@endpush
