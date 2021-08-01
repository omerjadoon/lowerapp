<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
    <div class="sidebar">
      <!-- User Widget -->
      <div class="widget user-dashboard-profile user">
        <!-- User Image -->
        <div class="image d-flex justify-content-center">
          <img src="{{asset(Auth::user()->buyerDetail->file_path)}}" alt="" class="">
      </div>
        <!-- User Name -->
        <h5 class="text-center">{{strtoupper(Auth::user()->buyerDetail->title.'
          '.Auth::user()->buyerDetail->f_name.' '.Auth::user()->buyerDetail->l_name)}}</h5>
        <p>Joined {{Auth::user()->buyerDetail->created_at->format('d M,Y')}}</p>
        {{-- <a href="{{route('b_account')}}" class="btn btn-main-sm">Account Setting</a> --}}
      </div>
      <!-- Dashboard Links -->
      <div class="widget user-dashboard-menu">
        <ul>
            <li class="{{$link=='dashboard' ? 'active' : '' }}"><a href="{{route('my-dashboard.index')}}"><i class="fa fa-home"></i> My Dashboard</a></li>
          <li class="{{$link=='apply' ? 'active' : '' }}"><a href="{{route('myads',['pending'=>'yes'])}}"><i class="fa fa-bolt"></i> Pending Approval <span>{{App\AdRequest::where('buyer_id',Auth::user()->buyerDetail->id)->where('status',0)->count()}}</span></a></li>
          <li class="{{$link=='approve' ? 'active' : '' }}"><a href="{{route('myads',['approve'=>'yes'])}}"><i class="fa fa-check"></i> Approved Ads <span>{{App\AdRequest::where('buyer_id',Auth::user()->buyerDetail->id)->where('status',1)->count()}}</span></a></li>
          <li class="{{$link=='reject' ? 'active' : '' }}"><a href="{{route('myads',['reject'=>'yes'])}}"><i class="fa fa-remove"></i> Rejected Ads <span>{{App\AdRequest::where('buyer_id',Auth::user()->buyerDetail->id)->where('status',2)->count()}}</span></a></li>
        
        </ul>
      </div>

      

    </div>
  </div>