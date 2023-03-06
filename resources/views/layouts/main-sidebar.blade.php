<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="todo-list.html"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.dashboard')}}</span> </a>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.website_manage')}} </li>
                    <li>
                        <a class="@yield('service')" href="{{url(App::getLocale().'/admin/services')}}"><i class="ti-bag"></i><span class="right-nav-text">{{trans('main_trans.services')}}</span> </a>
                    </li>

                    <li>
                        
                        <a class="@yield('section')" href="{{url(App::getLocale().'/admin/sections')}}"><i class="ti-menu-alt"></i><span class="right-nav-text">{{trans('main_trans.section')}}</span> </a>
                        <a class="@yield('product')" href="{{url(App::getLocale().'/admin/products')}}"><i class="ti-shopping-cart"></i><span class="right-nav-text">{{trans('main_trans.product')}}</span> </a>

                      
                      
                    </li>

                    <li >
                        <a class="@yield('blog')" href="{{url(App::getLocale().'/admin/blogs')}}"><i class="ti-menu-alt"></i><span class="right-nav-text">{{trans('main_trans.blog')}}</span> </a>
                        <a class="@yield('subscription')" href="{{url(App::getLocale().'/admin/subscriptions')}}"><i class="ti-menu-alt"></i><span class="right-nav-text">{{trans('main_trans.subscriptions')}}</span> </a>
                    </li>
                    

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.settings')}} </li>
                    <!-- menu item Widgets-->
                    <li>
                        <a href="widgets.html"><i class="ti-info-alt"></i><span class="right-nav-text">{{trans('main_trans.company_details')}}</span></a>
                        <a href="widgets.html"><i class="ti-twitter"></i><span class="right-nav-text">{{trans('main_trans.social')}}</span></a>
                        <a href="widgets.html"><i class="ti-mobile"></i><span class="right-nav-text">{{trans('main_trans.phone_email')}}</span></a>
                        <a href="widgets.html"><i class="ti-desktop"></i><span class="right-nav-text">{{trans('main_trans.display')}}</span></a>
                        <a href="widgets.html"><i class="ti-cog"></i><span class="right-nav-text">{{trans('main_trans.main_sitting')}}</span></a>
                    </li>

                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.user_manage')}}</li>
                    <li>
                        <a class="@yield('user')" href="{{url(App::getLocale().'/admin/users')}}"><i class="ti-user"></i><span class="right-nav-text">{{trans('main_trans.users')}}</span> </a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
