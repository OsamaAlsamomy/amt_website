<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{url(App::getLocale().'/home')}}"><i class="ti-home"></i><span
                                class="right-nav-text">{{trans('main_trans.dashboard')}}</span> </a>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        {{trans('main_trans.website_manage')}} </li>
                    <li>
                        <a class="@yield('service')" href="{{url(App::getLocale().'/admin/services')}}"><i
                                class="ti-bag"></i><span class="right-nav-text">{{trans('main_trans.services')}}</span>
                        </a>
                    </li>

                    <li>

                        <a class="@yield('section')" href="{{url(App::getLocale().'/admin/sections')}}"><i
                                class="ti-menu-alt"></i><span
                                class="right-nav-text">{{trans('main_trans.section')}}</span> </a>
                        <a class="@yield('product')" href="{{url(App::getLocale().'/admin/products')}}"><i
                                class="ti-shopping-cart"></i><span
                                class="right-nav-text">{{trans('main_trans.product')}}</span> </a>
                        <a class="@yield('brands')" href="{{url(App::getLocale().'/admin/brands')}}"><i
                                class="fa fa-tags"></i><span
                                class="right-nav-text">{{trans('main_trans.brands')}}</span> </a>
                        <a class="@yield('reviews')" href="{{url(App::getLocale().'/admin/reviews')}}"><i
                                class="fa fa-user-circle"></i><span
                                class="right-nav-text">{{trans('main_trans.customer_o')}}</span> </a>
                        <a class="@yield('message')" href="{{url(App::getLocale().'/admin/message')}}"><i
                                class="fa fa-envelope"></i><span
                                class="right-nav-text">{{trans('main_trans.mail')}}</span> </a>



                    </li>

                    <li>
                        <a class="@yield('blog')" href="{{url(App::getLocale().'/admin/blogs')}}"><i
                                class="fa fa-pencil-square"></i><span
                                class="right-nav-text">{{trans('main_trans.blog')}}</span> </a>
                        <a class="@yield('subscription')" href="{{url(App::getLocale().'/admin/subscriptions')}}"><i
                                class="fa fa-users"></i><span
                                class="right-nav-text">{{trans('main_trans.subscriptions')}}</span> </a>
                    </li>

                    @if (Auth::user()->type == 'A' || Auth::user()->type == 'S')
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.settings')}}
                    </li>
                    <!-- menu item Widgets-->
                    <li>

                        <a class="@yield('company')" href="{{url(App::getLocale().'/admin/company')}}"><i
                                class="ti-info-alt"></i><span
                                class="right-nav-text">{{trans('main_trans.company_details')}}</span></a>
                        <a class="@yield('socialmedia')" href="{{url(App::getLocale().'/admin/socialmedia')}}"><i
                                class="ti-twitter"></i><span
                                class="right-nav-text">{{trans('main_trans.social')}}</span></a>
                        <a class="@yield('phonemail')" href="{{url(App::getLocale().'/admin/phonemail')}}"><i
                                class="ti-mobile"></i><span
                                class="right-nav-text">{{trans('main_trans.phone_email')}}</span></a>
                        <a class="@yield('interfaces')" href="{{url(App::getLocale().'/admin/interfaces')}}"><i
                                class="ti-desktop"></i><span
                                class="right-nav-text">{{trans('main_trans.display')}}</span></a>
                        <a class="@yield('sittings')" href="{{url(App::getLocale().'/admin/sittings')}}"><i
                                class="fa   fa-cogs"></i><span
                                class="right-nav-text">{{trans('main_trans.main_sitting')}}</span></a>


                    </li>
                    @endif
                    @if ( Auth::user()->type == 'S')
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.user_manage')}}
                    </li>
                    <li>
                        <a class="@yield('user')" href="{{url(App::getLocale().'/admin/users')}}"><i
                                class="ti-user"></i><span class="right-nav-text">{{trans('main_trans.users')}}</span>
                        </a>
                    </li>
                    @endif


                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
