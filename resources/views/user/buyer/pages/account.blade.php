@extends('user.buyer.layouts.app',['title'=>'Account Settings','request'=>'setting'])
@push('css')
<style type="text/css">
    .roundedpencil {
        background: white;
        display: inline-block;
        position: absolute;
        bottom: 0px;
        /* left: 54px; */
        left: 96px;
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
        max-height: 100px;
        max-width: 100px;
        min-height: 100px;
        min-width: 100px;
        border-style: double !important;
        border: 3px;
    }
    .no-border {
        border: none;
    }

    .hw {
        height: 200px;
        width: 100%;
        border: solid 1px black;
    }

    .float {
        float: right !important;
    }

 
</style>
    
@endpush
@section('content')
<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
  
    
	<div class="container">
        @include('alerts.error-alert',['ses_name'=>'error'])
        @include('alerts.success-alert',['ses'=>'success'])
		<div class="row">
          
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
                    @include('user.buyer.pages.userwidget',['page'=>'pass'])
				
				
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>Edit profile</h2>
					{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p> --}}
				</div>
				<!-- Edit Personal Info -->
				<div class="row">
                    <form action="{{route('my-dashboard.update',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                        @method('put') @csrf
					<div class="col-lg-12 col-md-12">
						<div class="widget personal-info">
                           
							{{-- <h3 class="widget-header user">Edit Personal Information</h3> --}}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Profile Pic</label>
                                        <div class="avatar"><img alt="" class="img-70" id="prev" src="{{asset(Auth::user()->buyerDetail->file_path)}}" data-original-title="" title=""></div>
                                        <div class="roundedpencil"><input type="file" value="profile.jpg" name="profile" id="filee" style="display:none" onchange="previewFile(this);" data-original-title="" title=""><label for="filee"><span class="fa fa-pencil"></span></label></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Role</label>
                                        <input class="form-control" name="role" readonly="" value="{{Auth::user()->role=='buyer' ? 'Buyer' : 'Seller'}}" type="text" data-original-title="" title="">
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" name="email" value="{{Auth::user()->email}}" type="email" placeholder="Email" data-original-title="" title="" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Title</label>
                                        <input class="form-control" type="text" name="title" value="{{Auth::user()->buyerDetail->title}}" placeholder="First Name" data-original-title="" title="">
                                        @include('alerts.errorfield',['field'=>'title'])
                                    </div>
                                </div>
    
                                <div class="col-sm-5 col-md-5">
                                    <div class="form-group mb-3">
                                        <label class="form-label">First Name</label>
                                        <input class="form-control" type="text" name="f_name" value="{{Auth::user()->buyerDetail->f_name}}" placeholder="First Name" data-original-title="" title="">
                                        @include('alerts.errorfield',['field'=>'f_name'])
                                    </div>
                                </div>
                                <div class="col-sm-5 col-md-5">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input class="form-control" type="text" name="l_name" value="{{Auth::user()->buyerDetail->l_name}}" placeholder="First Name" data-original-title="" title="">
                                        @include('alerts.errorfield',['field'=>'l_name'])
                                    </div>
                                </div>
    
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Country</label>
                                        <select class="w-100 form-control mt-lg-1 mt-md-2 country-select" name="country">
                                            
                                  @foreach($country as $key=>$country)
                                  <option value="{{$country->id}}" {{$country->id==Auth::user()->buyerDetail->belongtocity->belongtostate->belongtocountry->id ? 'selected' : ''}}>{{$country->name}}</option>
                                  @endforeach
                                  </select>
                                  @include('alerts.errorfield',['field'=>'country'])
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">State</label>
                                        <select name="state" class="w-100 form-control mt-lg-1 mt-md-2 state-select">
                                            <option selected="" disabled="" value="">Select State</option>
                                        </select>
                                        @include('alerts.errorfield',['field'=>'state'])
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">City</label>
                                        <select class="w-100 form-control mt-lg-1 mt-md-2 city-select" required="" name="city">
                                  <option selected="" disabled="" value="">Select City</option>
                                  <option>...</option>
                                  </select>
                                  @include('alerts.errorfield',['field'=>'city'])
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Contact</label>
                                        <input class="form-control" type="text" name="phone" value="{{Auth::user()->buyerDetail->phone}}" placeholder="First Name" data-original-title="" title="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Zip Code</label>
                                        <input class="form-control" type="text" name="zip_code" value="{{Auth::user()->buyerDetail->zip_code}}" placeholder="First Name" data-original-title="" title="">
                                    </div>
                                </div>
    
    
    
                                <div class="col-md-12">
                                    <div class="form-group mb-3 mb-0">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" name="address" rows="3" placeholder="Enter About your description">{{Auth::user()->buyerDetail->address}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" data-original-title="" title="">Save Changes</button>
                                </div>
    
                            </div>
                            
							
						</div>
					</div>
                    </form>
					
				
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@push('js')
<script type="text/javascript">
    var country = "{{Auth::user()->buyerDetail->belongtocity->belongtostate->belongtocountry->id}}";
    var state = "{{Auth::user()->buyerDetail->belongtocity->belongtostate->id}}";
    var city = "{{Auth::user()->buyerDetail->belongtocity->id}}";

    countrychange(country, state);

    function previewFile(input) {
        var file = $("input[name=profile]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#prev").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
    $('.country-select').on('change', function() {
        countrychange($(this).val());
    });
    $('.state-select').on('change', function() {
        statechange($(this).val());
    });

    function countrychange(country, state_id) {
        state_id = state_id || 0;

        $.ajax({
            url: "{{route('get_state')}}",
            type: "get",
            data: {
                country_id: country,
            },
            beforeSend: function() {
                $(".state-select").html("<option value>Finding State.....</option>");
            },
            success: function(resp) {
                console.log(resp.length);
                html = '';
                if (resp.length > 0) {
                    $.each(resp, function(i, v) {
                        if (v.id == state_id) {
                            html += "<option value=" + v.id + " selected>" + v.name + "</option>";
                            statechange(state_id, city);
                        } else {
                            html += "<option value=" + v.id + " >" + v.name + "</option>";
                        }
                        if (i == 0 && state_id == 0)
                            statechange(v.id);

                    });
                } else {
                    html = "<option value=''>No State Found</option>";
                }
                
                $('.state-select').html(html);
            },
            error: function(resp) {
                console.log(resp);
            },
        });

    }

    function statechange(state, city_id) {
        city_id = city_id || 0;

        $.ajax({
            url: "{{route('get_city')}}",
            type: "get",
            data: {
                state_id: state,
            },
            beforeSend: function() {
                $(".city-select").html("<option value>Finding Cities.....</option>");
            },
            success: function(resp) {
                console.log(resp.length);
                html = '';
                if (resp.length > 0) {
                    $.each(resp, function(i, v) {
                        if (v.id == city_id) {
                            html += "<option value=" + v.id + " selected>" + v.name + "</option>";
                        } else {
                            html += "<option value=" + v.id + " >" + v.name + "</option>";
                        }
                    });
                } else {
                    html = "<option value=''>No City Found</option>";
                }
                $('.city-select').html(html);
            },
            error: function(resp) {
                console.log(resp);
            },
        });
    }
</script>
    
@endpush