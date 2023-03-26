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
'products' => 'Our Products',
'quik_view' => 'Quick View',
'mor_info' => 'More Informations',
'show_this' => 'Watch also',
'same_product' => 'products from the same department',
'request' => 'For orders and inquiries',














];
@endphp
@endif


@section('title')
{{$lang['products']}}
@endsection
@section('products')
bg-info px-4
@endsection
@section('products_')
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
            <h2 class="banner-title">{{$lang['products']}}</h2>
            <div class="main-breadcrumb">
                <!-- Breadcrumb NavXT 7.2.0 -->
                <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                        title="Go to Medimall." href="{{url('/')}}" class="home"><span
                            property="name">{{$lang['home']}}</span></a>

                </span><span class="dvdr"> <i class="fas fa-angle-left"></i> </span><span property="itemListElement"
                    typeof="ListItem"><span property="name"
                        class="post post-page current-item">{{$lang['products']}}</span>
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
                                            <div class="section_heade woocommerce-products-header mt-5">
                                                <h4>
                                                    {{$lang['same_product']}}
                                                </h4>
                                                <hr>
                                            </div>

                                            <div
                                                class="section_heade products rdtheme-archive-products row row-cols-1  gutter-24">


                                                @foreach ($products_same as $key)
                                                <div style="height: 430px"
                                                    class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 167814963848-{{$key->sec_id}}  product type-product post-136 status-publish first instock product_cat-accessories product_cat-equipments has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                                                    <div style="height: 100%" class="rt-product-box layout-1 layout-2 position-relative overflow-hidden">
                                                        <div style="height: 60%" class="item-img mx-auto position-relative overflow-hidden">
                                                            <a href="product/equipment-product/index.html"><img width="350" height="100%"
                                                                    src="{{url(asset($key->img))}}"
                                                                    class="attachment- size- wp-post-image" alt="" decoding="async"
                                                                    loading="lazy" {{--
                                                                    srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/product_2.png 400w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/product_2-300x225.png 300w"
                                                                    --}} sizes="(max-width: 400px) 100vw, 400px" />
                                                            </a>
                                                            <ul class="badge-list d-flex align-items-center">
                                                                <li>
                                                                    @if($key->discount > 0)
                                                                    <span class="rt-prodcut-badge-1">{{$key->discount
                                                                        . '-%'}}</span>
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                            <div class="hover-content-1 position-absolute">
                                                                <ul class="action-btn-area">
                                                                    <li> <a href="#" class="yith-wcqv-button" data-product_id="136"
                                                                            title="{{$lang['quik_view']}}"><i
                                                                                class="fas fa-search"></i></a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="item-content">
                                                            <span class='product-cat'>{{$key->section}}</span>
                                                            <h4 class="product-name"><a
                                                                    href="product/equipment-product/index.html">{{$key->name}}</a>
                                                            </h4>

                                                            <div
                                                                class="between-box d-flex align-items-center justify-content-between flex-wrap gutter-15">
                                                                <div class="price">
                                                                    @if($key->discount > 0)
                                                                    <del aria-hidden="true">
                                                                        <span class="woocommerce-Price-amount amount"><span
                                                                                class="woocommerce-Price-currencySymbol">&#036;</span>{{$key->price}}</span></del>
                                                                    @endif

                                                                    <ins> <span class="woocommerce-Price-amount amount"><span
                                                                                class="woocommerce-Price-currencySymbol">&#036;</span>{{$key->price
                                                                            - ($key->price *
                                                                            ($key->discount / 100))
                                                                            }}</span></ins>
                                                                </div>
                                                                <div class="cart-area anim-overflow">
                                                                    <a rel="nofollow" title="{{$lang['mor_info']}}"
                                                                        href="{{url('/products/product/'.$key->id)}}"
                                                                        class="cart-icon action-cart button product_type_variable rtwpvs_add_to_cart rtwpvs_ajax_add_to_cart  product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                            class="fas fa-eye"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                @endforeach




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
                                                <h3 class="price">
                                                    @if($data->discount > 0)
                                                    <del aria-hidden="true">
                                                        <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#036;</span>{{$data->price}}</span></del>
                                                    @endif

                                                    <ins> <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#036;</span>{{$data->price
                                                            - ($data->price *
                                                            ($data->discount / 100))
                                                            }}</span></ins>
                                                </h3>
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




                            <div class="section_heade woocommerce-products-header mt-5">
                                <h4>
                                    {{$lang['show_this']}}
                                </h4>
                                <hr>
                            </div>

                            <div
                                class="section_heade products rdtheme-archive-products row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 gutter-24">


                                @foreach ($products as $key)
                                <div style="height:430px"
                                    class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 167814963848-{{$key->sec_id}}  product type-product post-136 status-publish first instock product_cat-accessories product_cat-equipments has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                                    <div style="height:100%" class="rt-product-box layout-1 layout-2 position-relative overflow-hidden">
                                        <div style="height: 60%" class="item-img mx-auto position-relative overflow-hidden">
                                            <a href="product/equipment-product/index.html"><img width="400" height="300"
                                                    src="{{url(asset($key->img))}}"
                                                    class="attachment- size- wp-post-image" alt="" decoding="async"
                                                    loading="lazy" {{--
                                                    srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/product_2.png 400w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/product_2-300x225.png 300w"
                                                    --}} sizes="(max-width: 400px) 100vw, 400px" />
                                            </a>
                                            <ul class="badge-list d-flex align-items-center">
                                                <li>
                                                    @if($key->discount > 0)
                                                    <span class="rt-prodcut-badge-1">{{$key->discount
                                                        . '-%'}}</span>
                                                    @endif
                                                </li>
                                            </ul>
                                            <div class="hover-content-1 position-absolute">
                                                <ul class="action-btn-area">
                                                    <li> <a href="#" class="yith-wcqv-button" data-product_id="136"
                                                            title="{{$lang['quik_view']}}"><i
                                                                class="fas fa-search"></i></a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <span class='product-cat'>{{$key->section}}</span>
                                            <h4 class="product-name"><a
                                                    href="product/equipment-product/index.html">{{$key->name}}</a>
                                            </h4>

                                            <div
                                                class="between-box d-flex align-items-center justify-content-between flex-wrap gutter-15">
                                                <div class="price">
                                                    @if($key->discount > 0)
                                                    <del aria-hidden="true">
                                                        <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#036;</span>{{$key->price}}</span></del>
                                                    @endif

                                                    <ins> <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#036;</span>{{$key->price
                                                            - ($key->price *
                                                            ($key->discount / 100))
                                                            }}</span></ins>
                                                </div>
                                                <div class="cart-area anim-overflow">
                                                    <a rel="nofollow" title="{{$lang['mor_info']}}"
                                                        href="{{url('/products/product/'.$key->id)}}"
                                                        class="cart-icon action-cart button product_type_variable rtwpvs_add_to_cart rtwpvs_ajax_add_to_cart  product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                            class="fas fa-eye"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach




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
