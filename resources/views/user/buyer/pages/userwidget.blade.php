<!-- User Widget -->
<div class="widget user">
    <!-- User Image -->
    <div class="image d-flex justify-content-center">
        <img src="{{Auth::user()->buyerDetail->file_path !='' ? asset(Auth::user()->buyerDetail->file_path) : asset('images/avatar.png')}}" alt="" class="">
    </div>
    <!-- User Name -->
    <h5 class="text-center">{{strtoupper(Auth::user()->buyerDetail->title.'
        '.Auth::user()->buyerDetail->f_name.' '.Auth::user()->buyerDetail->l_name)}}</h5>
         
        <div class="text-center">
            <p >Joined {{Auth::user()->buyerDetail->created_at->format('d M,Y')}}</p>
            @if($page=='pass')
            <a href="{{route('b_change_password')}}" class="btn btn-main-sm">Change Password</a>
            @endif
           
        </div>
        
        <ul class="mt-5">
            <li class="mt-3 first_name_0">Bio<span class="font-primary url_add_0 float"></span></li>
            <li class="mt-3">
                <hr>
            </li>
            <li class="mt-3"><b>First Name</b><span class="font-primary first_name_0 float">{{Auth::user()->buyerDetail->f_name}}</span></li>
            <li class="mt-3"><b>Last Name</b><span class="font-primary first_name_0 float">{{Auth::user()->buyerDetail->l_name}}</span></li>
            <li class="mt-3"><b>Email</b><span class="font-primary first_name_0 float">{{Auth::user()->email}}</span></li>
            <li class="mt-3"><b>Contact #</b><span class="font-primary float">{{Auth::user()->buyerDetail->phone}}</span></li>
            <li class="mt-3"><b>City</b><span class="font-primary personality_0 float">{{Auth::user()->buyerDetail->belongtocity->name}}</span></li>
            <li class="mt-3"><b>State</b><span class="font-primary personality_0 float">{{Auth::user()->buyerDetail->belongtocity->belongtostate->name}}</span></li>
            <li class="mt-3"><b>Country</b><span class="font-primary personality_0 float">{{Auth::user()->buyerDetail->belongtocity->belongtostate->belongtocountry->name}}</span></li>
            <li class="mt-3"><b>Zip Code</b><span class="font-primary personality_0 float">{{Auth::user()->buyerDetail->zip_code}}</span></li>


            <li class="mt-3"><b>Address </b><span class="font-primary">{{Auth::user()->buyerDetail->address}}</span></li>

        </ul>
        <hr>
       
</div>