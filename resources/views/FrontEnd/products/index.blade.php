@extends('FrontEnd.layouts.master')
@php
$company = DB::table('company')->first();
$setting = DB::table('sittings')->first();

@endphp

@if($setting->view_lang == 'ar')

@php
$lang = [
'home' => 'الرئيسية',
'products' => 'منتجاتنا',


];
@endphp
@else
@php
$lang = [
'home' => 'Home',
'products' => 'Our Products',









];
@endphp
@endif


@section('title')
{{$lang['home']}}
@endsection
@section('content')





<div id="content" class="site-content">
    <div class="section_heade inner-page-banner overflow-hidden">
        <ul class="element-list d-none d-lg-block">
            <li><img width='458' height='150' src='{{url(asset('build/wp-content/themes/medimall/assets/img/element_13.png'))}}' alt='Medimall'>
            </li>
            <li><img width='653' height='150' src='{{url(asset('build/wp-content/themes/medimall/assets/img/element_14.png'))}}' alt='Medimall'>
            </li>

        </ul>
        <div class="container">
            <h2 class="banner-title">{{$lang['products']}}</h2>
            <div class="main-breadcrumb">
                <!-- Breadcrumb NavXT 7.2.0 -->
                <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                        title="Go to Medimall." href="{{url('/')}}"
                        class="home"><span property="name">{{$lang['home']}}</span></a>
                    <meta property="position" content="1">
                </span><span class="dvdr">  <i class="fas fa-angle-left"></i> </span><span property="itemListElement" typeof="ListItem"><span
                        property="name" class="post post-page current-item">{{$lang['products']}}</span>
                    <meta property="url" content="https://radiustheme.com/demo/wordpress/themes/medimall/contact/">
                    <meta property="position" content="2">
                </span>
            </div>
        </div>
    </div>

    <div id="primary" class="content-area shop-section style-1 section-padding overflow-hidden">
        <div class="container">
            <div class="row sticky-coloum-wrap">
                <div class="col-sm-12 col-12">
                    <div class="rt-main-content-2">
                        <header class="woocommerce-products-header">

                        </header>



                        <div class="products rdtheme-archive-products row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 gutter-24">


                            @foreach ($products as $key)
                            <div  class="section_heade col rtwpvg-product rtwpvs-product product type-product post-116 status-publish first instock product_cat-equipments has-post-thumbnail shipping-taxable purchasable product-type-variable">
                                <div class="rt-product-box layout-1 style-4 position-relative overflow-hidden">

                                    <div class="item-img mx-auto position-relative overflow-hidden">
                                        <a href="product/digital-thermometer/index.html">
                                            <img width="360" height="300"
                                                src="{{url(asset($key->img))}}"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                                alt="" decoding="async" loading="lazy" />
                                            </a>
                                        <div class="hover-content-2 position-absolute">

                                            <ul class="action-btn-area">
                                                <li class="text"><a rel="nofollow" title="Select options"
                                                        href="product/digital-thermometer/index.html" data-quantity="1"
                                                        data-product_id="116" data-product_sku="LN95FM4"
                                                        class="cart-icon action-cart button product_type_variable rtwpvs_add_to_cart rtwpvs_ajax_add_to_cart  product_type_variable add_to_cart_button"
                                                        data-bs-toggle="tooltip-none"
                                                        data-bs-placement="top"><span>Select options</span></a>
                                                </li>
                                                <li class="icon"> <a href="#" class="yith-wcqv-button"
                                                        data-product_id="116" title="QuickView"><i
                                                            class="fas fa-search"></i></a>
                                                </li>
                                                <li class="icon">
                                                    <a href="https://radiustheme.com/demo/wordpress/themes/medimall?action=yith-woocompare-add-product&amp;id=116"
                                                        class="compare" data-product_id="116" title="Add To Compare"><i
                                                            class="fas fa-random" aria-hidden="true"></i></a>
                                                </li>
                                                <li class="icon"><a href="wishlist/index.html" title="Add to Wishlist"
                                                        rel="nofollow" data-product-id="116"
                                                        data-title-after="Aleady exists in Wishlist! Click here to view Wishlist"
                                                        class="rdtheme-wishlist-icon rdtheme-add-to-wishlist"
                                                        data-nonce="9dd405e793">
                                                        <i class="wishlist-icon far fa-heart"></i><i
                                                            class="ajax-loading fa fa-spinner fa-spin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div
                                            class="between-box d-flex align-items-center justify-content-between flex-wrap gutter-15">
                                            <div class="cat-area"><span class='product-cat'>{{$key->section}}</span>
                                            </div>

                                        </div>
                                        <h4 class="product-name"><a
                                                href="product/digital-thermometer/index.html">{{$key->name}}</a></h4>
                                        <div
                                            class="between-box d-flex align-items-center justify-content-between flex-wrap gutter-15">
                                            <div class="price"> <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">&#036;</span>45.00</span>
                                                &ndash; <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">&#036;</span>62.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach




                        </div>
                        <div class="pagination-area text-center">
                            <ul class="clearfix">
                                <li class="pagi pagi-previous disabled"><span><i
                                            class="fas fa-angle-double-left"></i></span></li>
                                <li class="active"><span>1</span></li>
                                <li><a href="page/2/index7a04.html?sidebar=full">2</a></li>
                                <li class="pagi pagi-next"><a href="page/2/index7a04.html?sidebar=full"><i
                                            class="fas fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- container -->
    </div><!-- #primary -->
</div><!-- #content -->



@endsection
