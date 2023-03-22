<a class="skip-link screen-reader-text" href="#main-content">Skip to content</a>
<header class="header header-style-1 sticky-on  d-none d-xl-block">

    <div id="topbar-wrap" class="topbar style-1 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-6">
                    <div class="rt-topbar-menu top-list">
                        <nav class="menu-top-bar-menu-container">
                            <ul id="menu-top-bar-menu" class="menu">
                                <li id="menu-item-74"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-74">
                                    <a href="my-account/index.html"><i class="fa fa-at"></i>
                                        {{$setting->contact_mail}} </a>
                                </li>

                                <li id="menu-item-74"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-74">
                                    <a href="my-account/index.html"><i class="fa fa-phone"></i>
                                        {{$setting->contact_phone}} </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-6 align-self-end">
                    <ul class="rt-social style-1 d-flex  align-items-center justify-content-end flex-wrap">
                        <li class="social-title">{{$lang['fallow']}}</li>

                        @php
                        $social = DB::table('socialmedia')->where('state',1)->get();
                        @endphp
                        @foreach ( $social as $key)
                        <li class="social-item"><a href="{{$key->url}}" class="social-link fb" target="_blank"><i
                                    class="fab fa-{{$key->name}}"></i></a></li>

                        @endforeach
{{--
                        <li class="social-item"><a href="#" class="social-link fb" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a></li>

                        <li class="social-item"><a href="#" class="social-link fb" target="_blank"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="social-item"><a href="#" class="social-link fb" target="_blank"><i
                                    class="fab fa-linkedin-in"></i></a></li>
                        <li class="social-item"><a href="#" class="social-link fb" target="_blank"><i
                                    class="fab fa-pinterest-p"></i></a></li>
                        <li class="social-item"><a href="#" class="social-link fb" target="_blank"><i
                                    class="fab fa-vimeo-v"></i></a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- logo and sersh box -->
    <div class="main-header">
        <div id="navbar-wrap" class="navbar-wrap">
            <div class="container">
                <div class="row align-items-center action-bar-style-1">
                    <div class="col-xl-3 col-lg-3">

                        <div class="logo">
                            <a href="index.html" class="logo logo-dark">
                                <img width='227' height='51' src='{{url(asset($company->logo))}}' alt='{{$company->name}}'>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 search_sec">


                        <div class="search-box-wrap-1 flex-grow-1 product-search">
                            <form method="get" action="https://radiustheme.com/demo/wordpress/themes/medimall/">
                                <div class="category-search-dropdown-js">
                                    <ul class="action-list-styl-1 d-flex align-items-center">
                                        <li class="item rt-cat-drop-1 cat-drop">
                                            <div class="dropdown">
                                                <input type="hidden" name="product_cat" value="">
                                                <div class="cat-btn-wrap">

                                                    <button class="rt-btn-3 w-100 cat-toggle" type="button"
                                                        id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <span class="cat-label">{{$lang['all']}}</span>
                                                        <span class="icon"><i class="fas fa-angle-down"></i></span>
                                                    </button>
                                                    <ul class="dropdown-menu rt-drop-menu style-1"
                                                        aria-labelledby="dropdownMenuButton1">
                                                        @foreach ( DB::table('sections')->select(['id','name'])->get() as $key )
                                                        <li data-slug="">{{$key->name}}</li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item rt-advanced-search-1 flex-grow-1">
                                            <div class="rt-input-group">
                                                <input type="text" autocomplete="off" name="s"
                                                    class="form-control search-form product-search-input product-autocomplete-js search_input "
                                                    placeholder="{{$lang['serch_product']}}" value="">
                                                <div class="input-group-append">
                                                    <button class="search-btn"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                            <div class="result"></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Navbar  -->
        <div class="rt-menu-wrapper-1" style="background:#0a5682">
            <div class="container">
                <div class="row">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="navgination-area">
                            <nav class="rt-main-menu style-2">
                                <ul id="menu-main-menu" class="menu">



                                    <li id="menu-item-459"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                                        <a href="{{url('/')}}">{{$lang['home']}}</a>
                                    </li>

                                    <li id="menu-item-459"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                                        <a href="{{url('/about')}}">{{$lang['about']}}</a>
                                    </li>

                                    <li id="menu-item-459"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                                        <a href="{{url('/products')}}">{{$lang['products']}}</a>
                                    </li>

                                    <li id="menu-item-459"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                                        <a href="service.html">{{$lang['services']}}</a>
                                    </li>

                                    <li id="menu-item-459"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                                        <a href="blog.html">{{$lang['blogs']}}</a>
                                    </li>




                                    <li id="menu-item-490"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-490">
                                        <a href="{{url('/contact')}}">{{$lang['contact']}}</a>
                                    </li>
                                    <li id="menu-item-459"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">

                                </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- where hte screen be down  -->
    <div class="fixed-header-style-1" style="background:#0a5682">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div class="logo">

                        <div class="logo">
                            <a href="index.html" class="logo logo-light">
                                <img width='227' height='51' src='{{url(asset($company->icon))}}' alt='{{$company->name}}'
                                    class="p-1">
                            </a>
                        </div>
                    </div>
                    <div class="navgination-area">
                        <nav class="rt-main-menu style-2">
                            <ul id="menu-main-menu-1" class="menu">
                                <li id="menu-item-459"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                                    <a href="{{url('/')}}">{{$lang['home']}}</a>
                                </li>

                                <li id="menu-item-459"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                                    <a href="{{url('/about')}}">{{$lang['about']}}</a>
                                </li>

                                <li id="menu-item-459"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                                    <a href="{{url('/products')}}">{{$lang['products']}}</a>
                                </li>

                                <li id="menu-item-459"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                                    <a href="service.html">{{$lang['services']}}</a>
                                </li>

                                <li id="menu-item-459"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                                    <a href="blog.html">{{$lang['blogs']}}</a>
                                </li>




                                <li id="menu-item-490"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-490">
                                    <a href="{{url('/contact')}}">{{$lang['contact']}}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- wheil the sceeen willl be a phone screen -->
<div class="rt-header-menu  position-relative section_heade" id="meanmenu">
    <div id="mobile-sticky-placeholder"></div>
    <div class="mobile-top-bar">


        <div class="search-box-wrap-1 flex-grow-1 product-search">
            <form method="get" action="https://radiustheme.com/demo/wordpress/themes/medimall/">
                <div class="rt-advanced-search-1">
                    <div class="rt-input-group">
                        <input type="text" autocomplete="off" name="s"
                            class="form-control search-form product-search-input product-autocomplete-js"
                            placeholder="Search For Products ..." value="">
                        <div class="input-group-append">
                            <button class="search-btn"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="result"></div>
        </div>

    </div>
    <div class="rt-mobile-menn-bar" id="mobile-menu-bar-wrap">
        <div class="mean-bar">
            <div class="logo">
                <a href="index.html">
                    <img width='227' height='51' src='{{url(asset($company->logo))}}' alt='{{$company->name}}'> </a>
            </div>

            <span class="sidebarBtn">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </span>
        </div>
        <div class="rt-slide-nav">
            <div class="offscreen-navigation">
                <ul id="menu-main-menu-2" class="menu">
                    <li id="menu-item-459"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                        <a href="{{url('/')}}">{{$lang['home']}}</a>
                    </li>

                    <li id="menu-item-459"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                        <a href="{{url('/about')}}">{{$lang['about']}}</a>
                    </li>

                    <li id="menu-item-459"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                        <a href="{{url('/products')}}">{{$lang['products']}}</a>
                    </li>

                    <li id="menu-item-459"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                        <a href="service.html">{{$lang['services']}}</a>
                    </li>

                    <li id="menu-item-459"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459">
                        <a href="blog.html">{{$lang['blogs']}}</a>
                    </li>




                    <li id="menu-item-490"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-490">
                        <a href="{{url('/contact')}}">{{$lang['contact']}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
