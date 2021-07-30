@extends('user.seller.layouts.app',['title' => 'Register'])
@push('css')
<style>
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color:rgb(223, 219, 219) !important;
  opacity: 1; /* Firefox */
}
</style>
    
@endpush
@section('login_signup')
<div class="container-fluid p-0"> 
      <div class="row">
        <div class="col-12">     
          <div class="login-card">
            <div>
              <div><a class="logo" href="{{url('/')}}"><img class="img-fluid for-light" src="{{asset('user/assets/images/logo/reg-log.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('user/assets/images/logo/logo.png')}}" alt="looginpage"></a></div>
              <div class="login-main"> 
                <form class="theme-form" id="reg_form" action="{{route('register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <h4>Create your account as {{\Request::get('seller') ? 'Seller' : 'Buyer'}}</h4>
                  <p>Enter your personal details to create account</p>
                  @include('alerts.error-alert',['ses_name'=>'error'])
                  <div class="form-group">
                    <label class="col-form-label pt-0">Your Name</label>
                    <div class="form-row">
                      <div class="col-2">
                        <input class="form-control" type="text" name="title" required=""  value="{{old('title')}}" placeholder="Mr/Ms">
                      
                      </div>
                      <div class="col-5">
                        <input class="form-control" type="text" name="first_name" required="" value="{{old('first_name')}}" placeholder="First name">
                      
                      </div>
                      <div class="col-5">
                        <input class="form-control" type="text" name="last_name" required="" value="{{old('last_name')}}" placeholder="Last name">
                    
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" name="email" required="" value="{{old('email')}}" placeholder="Test@gmail.com">
                   
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Phone #</label>
                   <input class="form-control" type="text" name="phone" required="" value="{{old('phone')}}" placeholder="+923073286665">
                     
                  </div>
                                    <div class="form-group">
                    <label class="col-form-label">Address </label>
                    <textarea  class="form-control" col="3" type="text" name="address" required="" placeholder="Dha Phase V tauheed Commercial">{{old('address')}}</textarea>
                    
                  </div>

                  <div class="form-group">
                    
                    <div class="form-row">
                       <div class="col-6">
                        <label class="col-form-label">Country</label>
                   <select class="custom-select country-select" required="" name="country">
                            <option selected="" value="">Select Country</option>
                            @foreach($country as $key=>$country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                          </select>
                  </div>
                   <div class="col-6">
                    <label class="col-form-label">State</label>
                                         <select class="custom-select state-select" required="" name="state">
                            <option selected="" disabled="" value="">Select State</option>
                            <option>...</option>
                          </select>
                   </div>
                  </div>
                      
                  </div>
                                    <div class="form-group">
                    
                    <div class="form-row">
                       <div class="col-6">
                        <label class="col-form-label">City</label>
                     <select class="custom-select city-select" required="" name="city">
                            <option selected="" disabled="" value="">Select City</option>
                            <option>...</option>
                          </select>
                  </div>
                   <div class="col-6">
                    <label class="col-form-label">Zip Code</label>
                      <input class="form-control" type="text" name="zip_code" required="" value="{{old('zip_code')}}" placeholder="7890909">
                   </div>
                  </div>
                      
                  </div>

                  
          
                  <input type="hidden" value="{{\Request::get('seller') ? 'seller' : 'buyer'}}" name="role" >
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <input class="form-control" type="password" id="pass" name="login[password]" required="" placeholder="*********">
                    <!-- <div class="show-hide"><span class="show"></span></div> -->

                  </div>
                                    <div class="form-group">
                    <label class="col-form-label">Confirm Password</label>
                    <input class="form-control" type="password" id="c_pass" name="login[password]" required="" placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>

                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox" name="agree"  checked="checked">
                      <label class="text-muted" for="checkbox1" >Agree with<a class="ml-2" href="{{route('privacy_policy')}}">Privacy Policy</a></label>
                       
                    </div>
                    <button class="btn btn-primary btn-block" id="btnreg" type="button">Create Account</button>
                  </div>
                 <!--  <h6 class="text-muted mt-4 or">Or signup with</h6>
                  <div class="social mt-4">
                    <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                  </div> -->
                  <p class="mt-4 mb-0">Already have an account?<a class="ml-2" href="{{\Request::get('seller') ? route('login',['seller'=>'yes']) : route('login',['buyer'=>'yes'])}}">Sign in</a></p>
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
<script type="text/javascript">
   $(document).ready(function() {
        $('#btnreg').on('click',function(){
            c_pass=$('#c_pass').val();
            pass=$('#pass').val();
            if(pass===c_pass){
              var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Success</strong> Password Match...', {
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
                $('#reg_form').submit();
            }else{
               var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Error</strong> Password Mix Match...', {
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
            }
        });
    });

   $('.country-select').on('change', function() {
      $.ajax({
        url:"{{route('get_state')}}",
        type:"get",
        data:{
          country_id:$(this).val(),
        },
        beforeSend: function() {
               $(".state-select").html("<option value>Finding State.....</option>");
           },
        success:function(resp) {
          console.log(resp.length);
          html='';
          if(resp.length>0){
            $.each(resp, function(i, v) {
                   html+="<option value=" + v.id + ">" + v.name + "</option>";
                   if(i==0)
                      statechange(v.id);
                   
            });
          }else{
             html="<option>No State Found</option>";
          } 
          $('.state-select').html(html);
        },
        error:function(resp){
          console.log(resp);
        },
      });
   });
      $('.state-select').on('change', function() {
        statechange($(this).val());
   });
function statechange(state){
   $.ajax({
        url:"{{route('get_city')}}",
        type:"get",
        data:{
          state_id:state,
        },
        beforeSend: function() {
               $(".city-select").html("<option value>Finding Cities.....</option>");
           },
        success:function(resp) {
          console.log(resp.length);
          html='';
          if(resp.length>0){
            $.each(resp, function(i, v) {
                   html+="<option value=" + v.id + ">" + v.name + "</option>";
            });
          }else{
             html="<option>No City Found</option>";
          } 
          $('.city-select').html(html);
        },
        error:function(resp){
          console.log(resp);
        },
      });
}

</script>
@endpush