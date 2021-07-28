@extends('user.seller.layouts.app',['title' => 'Login'])
@push('css')
  <style>
          ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color:rgb(223, 219, 219) !important;
  opacity: 1; /* Firefox */
}
       .modal.fade {
            opacity: 1;
        }

        .modal.fade .modal-dialog {
            -webkit-transform: translate(0);
            -moz-transform: translate(0);
            transform: translate(0);
        }
.pbh-10{
  padding: 10px;
}</style>  
@endpush
@section('login_signup')
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-12">     
          <div class="login-card">
            <div>
              <div><a class="logo" href="{{url('/')}}">
                <img class="img-fluid for-light" src="{{asset('user/assets/images/logo/reg-log.png')}}" alt="looginpage">
                <img class="img-fluid for-dark"src="{{asset('user/assets/images/logo/reg-log.png')}}" alt="looginpage">
            </a></div>
              <div class="login-main"> 
                <form class="theme-form" method="POST" action="{{ route('login') }}">
                        @csrf
                  <h4>Sign in to account</h4>
                  <p>Enter your email & password to login</p>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" name="email" value="{{ old('email') }}"  type="email" required="" placeholder="Test@gmail.com">
                  </div> 
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <input class="form-control" type="password" name="password"  placeholder="*********">
                    <!-- <div class="show-hide"><span class="show">                         </span></div> -->
                  </div>
                  <div class="form-group">
                    <a  href="{{route('password.request')}}">Forgot password?</a>
                  </div>
                  <div class="form-group">
                   <!--  <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <label class="text-muted" for="checkbox1">Remember password</label> 
                    </div> -->
                    
                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                  </div>
                 <!--  <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                  <div class="social mt-4">
                    <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                  </div> -->
                  
                  <p class="mt-4 mb-0">Don't have account?
                 
                 <a class="ml-2" href="{{route('register',['seller'=>'yes'])}}">Register Now</a></br> 
                        
                </p> 
                 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
    
@endsection

@push('js')
@if(count($errors)>0)
@foreach($errors->all() as $key=>$error)
<script type="text/javascript">
  var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Error!</strong> {{$error}}...', {
    type: 'theme',
    allow_dismiss: true,
    delay: 4000,
    showProgressbar: true,
    timer: 500,
    animate:{
        enter:'animated fadeInDown',
        exit:'animated fadeOutUp'
    }
});



</script>
@endforeach
@endif
<script>

function modalAnimation(animation) {
                $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + animation + ' animated');
            };
            $('.modalAnimate').on('show.bs.modal', function(e) {
                var anim = $(this).attr('data-animation-in');
                modalAnimation(anim);
            });
            $('.modalAnimate').on('hide.bs.modal', function(e) {
                var anim = $(this).attr('data-animation-out');
                modalAnimation(anim);
            });
</script>
@endpush