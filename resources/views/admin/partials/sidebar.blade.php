 <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="{{route('admin_home')}}" class="{{$innerrequest=='dashboard' ? 'active' : ''}}"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"  class="{{$request=='user' ? 'active' : ''}}"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a class="{{$innerrequest=='seller' ? 'active' : ''}}" href="{{route('seller.index')}}">Seller</a>
                                    </li>
                                    <li>
                                        <a class="{{$innerrequest=='buyer' ? 'active' : ''}}" href="#">Buyer</a>
                                    </li>
                                   
                                   
                                    
                                </ul>

                            </li>
                            <li>
                                <a href="{{route('ad.index')}}" class="{{$innerrequest=='allads' ? 'active' : ''}}"><i class="fa fa-desktop fa-fw"></i>  Ads</a>
                            </li>
                           {{-- <li>
                             
                                 <a class="{{$request=='user' ? 'active' : ''}}" href="#" ><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="" >Seller</a>
                                    </li>
                                    <li>
                                        <a href="">Buyer</a>
                                    </li>
                                     
                                </ul>
                            </li> --}}
                            {{-- <li>
                                 <a href=""  class="{{$request=='ads' ? 'active' : ''}}"><i class="fa fa-desktop fa-fw"></i>  Ads
                                    <span class="fa arrow"></span>
                                 </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a class="{{$innerrequest=='viewallads' ? 'active' : ''}}" href="{{route('business-ads.index')}}">All Ads</a>
                                    </li>
                                    <li>
                                        <a class="{{$innerrequest=='viewallparticipant' ? 'active' : ''}}" href="{{route('ad-participants.index')}}">Ad Participants</a>
                                    </li>
                                     <li>
                                        <a class="{{$innerrequest=='lead' ? 'active' : ''}}" href="{{route('participant_leads')}}">Ad Leads</a>
                                    </li>
                                     
                                </ul>
                            </li>--}}
                            <li>
                                        <a class="{{$request=='media' && $innerrequest=='media' ? 'active' : ''}}" href="{{route('cattype_index')}}"><i class="fa fa-dashboard fa-fw"></i> Categories </a>
                            </li>
                            <li>
                                <a href="#"  class="{{$request=='setting' ? 'active' : ''}}"><i class="fa fa-wrench fa-fw"></i> Settings<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a class="{{$innerrequest=='country' ? 'active' : ''}}" href="{{route('country_index')}}">Country</a>
                                    </li>
                                    <li>
                                        <a class="{{$innerrequest=='state' ? 'active' : ''}}" href="{{route('state_index')}}">State</a>
                                    </li>
                                    <li>
                                        <a class="{{$innerrequest=='city' ? 'active' : ''}}" href="{{route('city_index')}}">City</a>
                                    </li>
                                   
                                    
                                </ul>

                            </li>
                            {{--                             <li>
                                <a href="{{route('contact_list')}}" class="{{$request=='contact-list' ? 'active' : ''}}"><i class="fa fa-phone fa-fw"></i> Contact Us</a>
                            </li>--}}
                        </ul>
                    </div>
                </div>