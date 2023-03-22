<!--=================================
 header start-->
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        @php
        $image = DB::table('company')->select(['logo','icon','name'])->first();
        @endphp
        <a class="navbar-brand brand-logo" href="index.html"><img src="{{url(asset($image->icon))}}" alt=""></a>
        <a class="navbar-brand brand-logo-mini px-1" href="index.html"><img src="{{url(asset($image->icon))}}"
                alt=""></a>
    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i
                    class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
        <li class="nav-item">
            <div class="search">
                <a class="search-btn not_click" href="javascript:void(0);"></a>
                <div class="search-box not-click">
                    <input type="text" class="not-click form-control" placeholder="Search" value="" name="search">
                    <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                </div>
            </div>
        </li>
    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">


        <div class="btn-group mb-1">
            <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @if (App::getLocale() == 'ar')
                {{ LaravelLocalization::getCurrentLocaleName() }}
                <img src="{{ URL::asset('build/assets/images/flags/YE.png') }}" alt="">
                @else
                {{ LaravelLocalization::getCurrentLocaleName() }}
                <img src="{{ URL::asset('build/assets/images/flags/US.png') }}" alt="">
                @endif
            </button>
            <div class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
                @endforeach
            </div>
        </div>




        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>


        <li class="nav-item dropdown ">
            @php
            $msg = DB::table('messages')->select(['id','name','created_at'])->where('read',0)->get();
            @endphp
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa fa-envelope-o"></i>
                @if( $msg->count() != 0 )
                <span class="badge badge-success notification-status  "> </span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">

                <div class="dropdown-header notifications">
                    <strong>{{trans('main_trans.read_msg')}}</strong>
                    <span class="badge badge-pill badge-warning">{{ $msg->count() }}</span>
                </div>
                <div class="dropdown-divider"></div>

                @foreach ($msg as $key)
                <a href="{{ url(App::getLocale() . '/admin/message/read') .'/'. $key->id }}"
                    class="dropdown-item">{{$key->name}} <small
                        class="float-right text-muted time">{{$key->created_at}}</small> </a>
                @endforeach


            </div>
        </li>



        {{-- <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big">
                <div class="dropdown-header">
                    <strong>Quick Links</strong>
                </div>
                <div class="dropdown-divider"></div>
                <div class="nav-grid">
                    <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i>
                        <h5>New Task</h5>
                    </a>
                    <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                        <h5>Assign Task</h5>
                    </a>
                </div>
                <div class="nav-grid">
                    <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                        <h5>Add Orders</h5>
                    </a>
                    <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i>
                        <h5>New Orders</h5>
                    </a>
                </div>
            </div>
        </li> --}}
        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <img src="{{url(asset('build/assets/images/profile-avatar.jpg'))}}" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{Auth::user()->name}}</h5>
                            <span>{{Auth::user()->email}}</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                {{-- <a class="dropdown-item" href="#"><i
                        class="text-secondary ti-reload"></i>{{trans('main_trans.activity')}}</a>
                <a class="dropdown-item" href="#"><i
                        class="text-success ti-email"></i>{{trans('main_trans.messages')}}</a> --}}
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profile_modal"><i
                        class="text-warning ti-user"></i>{{trans('main_trans.profile')}}</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#password_modal"><i
                        class="text-info ti-settings"></i>{{trans('main_trans.change_password')}}</a>

                <a class="dropdown-item" href="{{url('logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                        class="text-danger ti-unlock"></i>{{trans('main_trans.logout')}}</a>
                <form id="logout-form" action="{{url('logout')}}" method="POST" class="d-none">
                    @csrf

                </form>
            </div>
        </li>
    </ul>
</nav>



{{-- Add new user Modale --}}
<div class="modal fade bd-example-modal-lg" id="profile_modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main_trans.profile') }}
                </h5>
                <button type="button" class="close btn_close" data-dismiss="modal" aria-label="Close" ">
                    <span aria-hidden=" true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span> {{ trans('main_trans.name') }} : </span>{{Auth::user()->name}}
                <br>
                <br>
                <span> {{ trans('main_trans.email') }} : </span>{{Auth::user()->email}}
                <br>
                <br>
                <span> {{ trans('main_trans.roll') }} : </span>
                @if(Auth::user()->type == 'S' )
                <span class="bg-success text-white px-2 rounded"> {{ trans('users_trans.s_admin') }} </span>
                @elseif (Auth::user()->type == 'A')
                <span class="bg-success text-white px-2 rounded"> {{ trans('users_trans.admin') }} </span>
                @else
                <span class="bg-success text-white px-2 rounded"> {{ trans('users_trans.user') }} </span>
                @endif
                <br>
                <br>
                <span> {{ trans('main_trans.created_at') }} : </span>{{Auth::user()->created_at}}
                <br>
                <br>
                <span> {{ trans('main_trans.last_update') }} : </span>{{Auth::user()->updated_at}}
                <br>
                <br>
                <button class="btn btn-outline-primary" data-toggle="modal"
                    data-target="#password_modal">{{trans('main_trans.change_password')}}</button>


            </div>


        </div>
    </div>
</div>


{{-- Add new user Modale --}}
<div class="modal fade" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    data-keyboard="false" data-backdrop="static" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main_trans.change_password') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url(App::getLocale() . '/admin/users/password') }}" method="POST" id="form_password">
                @csrf

                <div class="modal-body">
                    <!-- add_form -->

                    <div class="form-group">

                        <label for="name" class="mr-sm-2">{{ trans('users_trans.old_password') }}
                            :</label>
                        <input id="old_pass" type="text" name="old_pass" class="form-control">
                        <span class="old_pass-error text-danger"></span>
                    </div>
                    <div class="form-group">

                        <label for="name" class="mr-sm-2">{{ trans('users_trans.new_password') }}
                            :</label>
                        <input id="password" type="text" name="password" class="form-control">
                        <span class="password-error text-danger"></span>
                    </div>
                    <div class="form-group">

                        <label for="name" class="mr-sm-2">{{ trans('users_trans.re_password') }}
                            :</label>
                        <input id="password_confirmation" type="text" name="password_confirmation" class="form-control">
                        <span class="password_confirmation-error text-danger"></span>
                    </div>


                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main_trans.cancel')
                        }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('main_trans.save') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
