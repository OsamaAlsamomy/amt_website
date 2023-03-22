<!DOCTYPE html>
<html lang="en-US">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='robots' content='max-image-preview:large' />




    @php
    $company = DB::table('company')->first();
    $setting = DB::table('sittings')->first();

    @endphp

    @if($setting->view_lang == 'ar')
    <link rel="stylesheet" href="{{url(asset('build/wp-content/rtl.css'))}}">
    <style>
        @font-face {
            font-family: cairo;
            src: url('{{url(asset('build/assets/fonts/cairo.ttf'))}}');
        }
        @font-face{
            font-family: tajawal;
            src: url('{{url(asset('build/assets/fonts/tajawal.ttf'))}}');
        }
        @font-face{
            font-family: changa;
            src: url('{{url(asset('build/assets/fonts/changa.ttf'))}}');

        }

        *,
        span,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        li,
        a,
        p,
        li {
            font-family: changa;
        }
    </style>
    @php
    $lang = [
        'home' =>'الرئيسية',
        'about' => 'عن الشركة',
        'products' => 'منتجاتنا',
        'services' => 'خدماتنا',
        'blogs' => 'المدونة',
        'contact' => 'تواصل معنا',
        'fallow' => 'تابعنا على',
        'serch_product' => '... البحث عن منتجات',
        'all' => 'كل الأقسام',
    ];
    @endphp
    @else
    @php
    $lang = [
        'home' =>'Home',
        'about' => 'ABOUT US',
        'products' => 'OUR PRODUCTS',
        'services' => 'SERVICES',
        'blogs' => 'BLOGS',
        'contact' => 'CONTACT',
        'fallow' => 'Follow Us On',
        'serch_product' => 'Search For Products ...',
        'all' => 'All Sections',
    ];
    @endphp
    @endif
    <title>{{$company->name}} - @yield('title')</title>
    @include('FrontEnd.layouts.header')

</head>

<body

    class="home page-template page-template-elementor_header_footer page page-id-63 wp-embed-responsive theme-medimall woocommerce-no-js rtwpvg rtwpvs rtwpvs-rounded rtwpvs-attribute-behavior-blur rtwpvs-archive-align-left rtwpvs-tooltip non-stick header-style-1 has-topbar has-footer-dark no-sidebar scheme-custom has-ajax-sidebar product-grid-view elementor-default elementor-template-full-width elementor-kit-5 elementor-page elementor-page-63">

    <div id="preloader" style="background-image:url(wp-content/themes/medimall/assets/img/preloader.gif);"></div>

    <div id="wrapper" class="wrapper">
        @include('FrontEnd.layouts.main_header')
        @yield('content')
        @include('FrontEnd.layouts.main_footer')
    </div>





    <a href="#" id="back-to-top"><i class="fas fa-angle-double-up"></i></a>


    <div class="drawer-container">

        <span class="close">
            <i class="fas fa-times"></i>
        </span>
        <div class="cart-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="side-content-area-id"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    @include('FrontEnd.layouts.footer')
</body>

</html>
