@extends('FrontEnd.layouts.master')
@php
$company = DB::table('company')->first();
$setting = DB::table('sittings')->first();

@endphp

@if($setting->view_lang == 'ar')

@php
$lang = [
'home' => 'الرئيسية',
'serv' => 'خدماتنا',

'quik_view' => 'نظرة سريعة',
'mor_info' => 'مزيد من المعلومات',
'show_this' => 'شاهد ايضاً',
'same_product' => 'منتجات من نفس القسم',
'request' => 'للطلب والاستفسار',



];
@endphp
@else
@php
$lang = [
'home' => 'Home',
'serv' => 'Our Services',
'quik_view' => 'Quick View',
'mor_info' => 'More Informations',
'show_this' => 'Watch also',
'same_product' => 'products from the same department',
'request' => 'For orders and inquiries',














];
@endphp
@endif


@section('title')
{{$lang['serv']}}
@endsection
@section('services')
bg-info px-4
@endsection
@section('services_')
#6dc7b2
@endsection
@section('content')




<div id="content" class="site-content">
    <div class="section_heade inner-page-banner overflow-hidden">
        <ul class="element-list d-none d-lg-block">
            <li><img width='458' height='150'
                src='{{url(asset('build/wp-content/themes/medimall/assets/img/element_13.png'))}}' alt='Medimall'>
            </li>
            <li><img width='653' height='150'
                src='{{url(asset('\build/wp-content/themes/medimall/assets/img/element_14.png'))}}' alt='Medimall'>
            </li>

        </ul>
        <div class="container">
            <h2 class="banner-title">{{$lang['serv']}}</h2>
            <div class="main-breadcrumb">
                <!-- Breadcrumb NavXT 7.2.0 -->
                <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                        title="Go to Medimall." href="{{url('/')}}" class="home"><span
                            property="name">{{$lang['home']}}</span></a>

                </span><span class="dvdr"> <i class="fas fa-angle-left"></i> </span><span property="itemListElement"
                    typeof="ListItem"><span property="name"
                        class="post post-page current-item">{{$lang['serv']}}</span>
                </span>
                <span property="itemListElement" typeof="ListItem">
                </span><span class="dvdr"> <i class="fas fa-angle-left"></i> </span><span property="itemListElement"
                    typeof="ListItem"><span property="name" class="post post-page current-item">{{$data->name}}</span>
                </span>
            </div>
        </div>
    </div>
    <div id="primary" class="content-area shop-section style-1 section-padding overflow-hidden">
        <div class="container">
            <div class="row sticky-coloum-wrap">
                <div class="col-sm-12 col-12">
                    <div class="rt-main-content-2">

                        <div class="woocommerce-notices-wrapper"></div>
                        <div id="product-116"
                            class="rtwpvg-product rtwpvs-product product type-product post-116 status-publish first instock product_cat-equipments has-post-thumbnail shipping-taxable purchasable product-type-variable">

                            <div class="single-product-top-2">

                                <div class="col-12">
                                    <div class="row sticky-coloum-wrap">
                                        <div class="col-lg-6 sticky-coloum-item">
                                            <div class="rtin-left">

                                                <div style=""
                                                    class="rtwpvg-images rtwpvg-images-thumbnail-columns-4 rtwpvg-has-product-thumbnail">

                                                    <div
                                                        class=" rtwpvg-wrapper rtwpvg-thumbnail-position-bottom rtwpvg-product-type-variable">

                                                        <div class="rtwpvg-container rtwpvg-preload-style-blur">

                                                            <div class="rtwpvg-slider-wrapper">
                                                                <div class="rtwpvg-slider"
                                                                    data-slick='{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:false,&quot;adaptiveHeight&quot;:false,&quot;rtl&quot;:false,&quot;asNavFor&quot;:&quot;.rtwpvg-thumbnail-slider&quot;,&quot;prevArrow&quot;:&quot;&lt;i class=\&quot;rtwpvg-slider-prev-arrow dashicons dashicons-arrow-left-alt2\&quot;&gt;&lt;\/i&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;i class=\&quot;rtwpvg-slider-next-arrow dashicons dashicons-arrow-right-alt2\&quot;&gt;&lt;\/i&gt;&quot;,&quot;rows&quot;:0}'>
                                                                    <div class="rtwpvg-gallery-image">
                                                                        <div>
                                                                            <div class="rtwpvg-single-image-container">
                                                                                <img width="400" height="300"
                                                                                    src="{{url(asset($data->img))}}"
                                                                                    class="wp-post-image rtwpvg-post-image attachment-woocommerce_single size-woocommerce_single "
                                                                                    alt="" title="{{$data->name}}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div> <!-- .Slider-wrapper -->


                                                        </div> <!-- .container -->
                                                    </div> <!-- .rtwpvg-wrapper -->
                                                </div>


                                                <div class="clear"></div>
                                            </div>

                                        </div>
                                        <div class=" section_heade col-lg-6 sticky-coloum-item">
                                            <div class="rtin-right single-product-description style-1">
                                                <h2 class="product_title entry-title">{{$data->name}}</h2>
                                                <div class="woocommerce-product-rating">

                                                    <span>{{$data->section}}</span>
                                                    <span class="woocommerce-review-link" rel="nofollow">(<span
                                                            class="count">1</span> customer review)</span>
                                                </div>

                                                <div class="woocommerce-product-details__short-description">
                                                    <p>{!! $data->desc !!}</p>
                                                </div>
                                                <span style="border-bottom:2px solid #8dd332 " class="rounded mb-5 mr:5 px-3">
                                                    {{$lang['request']}}
                                                </span>
                                                <br>
                                                <br>
                                                <div class="woocommerce-product-details__short-description">
                                                    <a style="width: 100%" href="mailto:{{$setting->contact_mail}}"
                                                        class="rt-btn-7 mb-2">{{$setting->contact_mail}}<i
                                                            class="fas fa-at icon"></i></a>
                                                    <a style="width: 100%" href="tel:{{$setting->contact_phone}}"
                                                        class="rt-btn-4">{{$setting->contact_phone}}<i
                                                            class="fas fa-phone icon"></i></a>
                                                </div>







                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>





                            <div class="single-product-bottom-2">
                            </div>
                        </div>



                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- container -->
    </div><!-- #primary -->


</div><!-- #content -->



@endsection
