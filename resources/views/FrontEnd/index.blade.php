@extends('FrontEnd.layouts.master')
@php
$company = DB::table('company')->first();
$setting = DB::table('sittings')->first();

@endphp

@if($setting->view_lang == 'ar')

@php
$lang = [
'home' => 'الرئيسية',
'all' => 'الكل',
'mor_info' => 'مزيد من المعلومات',
'last_product' => 'أحدث منتجاتنا',
'k_last_product' => 'تعرف على احدث منتجاتنا',
'quik_view' => 'نظرة سريعة',
'mor_learn' => 'اعرف أكثر',
'our_services' => 'خدمتنا',
'service_desc' => 'تعرف على خدماتنا المتنوعة',
'our_offers' => 'عروضنا المتنوعة',
'review' => 'ماذا قال عملائنا عنا؟',
'brand' => 'ماركات مشهورة',
'brand_info' =>'وكلاء لشركات معتمدة عالميا',
'blog' => 'أحدث منشوراتنا',
'blog_desc' => 'ننشر كل ماهو مفيد ',
'read_more' => 'اقرأ المزيد',
'newsletter' => 'تابع جديد منشوراتنا' ,

];
@endphp
@else
@php
$lang = [
'home' => 'Home',
'all' => 'All',
'mor_info' => 'More Informations',
'last_product' => 'Our Latest Products',
'k_last_product' => 'Learn about our latest products',
'quik_view' => 'Quick View',
'mor_learn' => 'learn more',
'our_services' => 'Our Services',
'service_desc' => 'Learn about our various services',
'our_offers' => 'Our various offers',
'review' => 'What our clients said about us?',
'brand' => 'Popular Brands',
'brand_info' =>'Agents for internationally accredited companies',
'blog' => 'Our Latest Blogs',
'blog_desc' => 'We publish everything useful',
'read_more' => 'Read more',
'newsletter' => 'Follow our new posts',







];
@endphp
@endif


@section('title')
{{$lang['home']}}
@endsection
@section('content')





<!-- sliders sections -->
<div id="content" class="site-content">
    <div data-elementor-type="wp-page" data-elementor-id="63" class="elementor elementor-63">
        <div class="elementor-inner">
            <div class="elementor-section-wrap">







                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-7ef878a4 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="7ef878a4" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7efc4ab4"
                                data-id="7efc4ab4" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-2e800001 elementor-widget elementor-widget-rt-banner-slider"
                                            data-id="2e800001" data-element_type="widget"
                                            data-widget_type="rt-banner-slider.default">
                                            <div class="elementor-widget-container">

                                                <div class="banner-section-style-4 rt-slide-wrap">
                                                    <div class="row section_heade">
                                                        <div class="col-12">
                                                            <div class="banner-wrap-4 motion-effects-wrap">
                                                                <div class="rt-slider-style-5 swiper-container">
                                                                    <div class="swiper-wrapper"
                                                                        data-carousel-options="{&quot;autoplay&quot;:true,&quot;speed&quot;:&quot;5000&quot;}">

                                                                        @foreach ($slids as $key)
                                                                        <div class="swiper-slide">
                                                                            <div class="single-item">
                                                                                <div
                                                                                    class="row gutter-30 align-items-center">
                                                                                    <div
                                                                                        class="offset-xl-1 col-xl-5 col-lg-6">
                                                                                        <div
                                                                                            class="rt-banner-content style-1 slider-animation">

                                                                                            <h2 class="title">
                                                                                                <span
                                                                                                    class="anim-overflow">
                                                                                                    {{$key->title}}
                                                                                                </span>
                                                                                            </h2>
                                                                                            <p class="item-desc">
                                                                                                <span
                                                                                                    class="anim-overflow">
                                                                                                    {{$key->content}}
                                                                                                </span>
                                                                                            </p>

                                                                                            <div class="btn-area">
                                                                                                <span
                                                                                                    class="anim-overflow">
                                                                                                    <a href="{{url(asset($key->url))}}"
                                                                                                        class="rt-btn-1"
                                                                                                        target="_blank">
                                                                                                        {{$lang['mor_info']}}
                                                                                                        <i
                                                                                                            class="fas  fa-angle-right icon"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-5 col-lg-6">
                                                                                        <div
                                                                                            class="banner-product-style-4">
                                                                                            <div class="anim-overflow">
                                                                                                <img width="526"
                                                                                                    height="465"
                                                                                                    src="{{url(asset($key->img))}}"
                                                                                                    class="attachment-full size-full wp-post-image"
                                                                                                    alt=""
                                                                                                    decoding="async"
                                                                                                    loading="lazy" {{--
                                                                                                    srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/banner-product_2.png 526w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/banner-product_2-300x265.png 300w"
                                                                                                    --}}
                                                                                                    sizes="(max-width: 526px) 100vw, 526px" />
                                                                                            </div>
                                                                                            <ul
                                                                                                class="element-list d-none d-xl-block">
                                                                                                <li>
                                                                                                    <span
                                                                                                        class="d-block motion-effects6">
                                                                                                        <img width="58"
                                                                                                            height="58"
                                                                                                            src="{{url(asset('build/wp-content/uploads/2022/06/element_15.png'))}}"
                                                                                                            class="attachment-full size-full wp-post-image"
                                                                                                            alt=""
                                                                                                            decoding="async"
                                                                                                            loading="lazy" />
                                                                                                    </span>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span
                                                                                                        class="d-block motion-effects6">
                                                                                                        <img width="154"
                                                                                                            height="154"
                                                                                                            src="{{url(asset('build/wp-content/uploads/2022/06/element_16.png'))}}"
                                                                                                            class="attachment-full size-full wp-post-image"
                                                                                                            alt=""
                                                                                                            decoding="async"
                                                                                                            loading="lazy"
                                                                                                            srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_16.png 154w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_16-150x150.png 150w"
                                                                                                            sizes="(max-width: 154px) 100vw, 154px" />
                                                                                                    </span>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach



                                                                    </div>
                                                                    <div class="slider-navigation-2 layout-2 "
                                                                        dir="ltr">
                                                                        <i
                                                                            class="fas fa-chevron-left slider-btn btn-prev"></i>
                                                                        <i
                                                                            class="fas fa-chevron-right slider-btn btn-next"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>








                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-64a3429f elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="64a3429f" data-element_type="section"
                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4d243aee"
                                data-id="4d243aee" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-34ddd250 elementor-invisible elementor-widget elementor-widget-rt-product-categories"
                                            data-id="34ddd250" data-element_type="widget"
                                            data-widget_type="rt-product-categories.default">
                                            <div class="elementor-widget-container">
                                                <div class="row d-flex align-items-center justify-content-center">

                                                    @foreach ($sections as $key )
                                                    <div class="rt-cat-item wow fadeInUp col-md-2"
                                                        data-wow-delay="200ms" data-wow-duration="1200ms">
                                                        <div class="rt-category-box style-1">
                                                            <div
                                                                class="item-img d-flex align-items-center justify-content-center mx-auto">
                                                                <a href="product-category/surgical-mask/index.html">
                                                                    <img decoding="async" width="400" height="300"
                                                                        src="{{url(asset($key->img))}}"
                                                                        class="attachment-full size-full wp-post-image"
                                                                        alt="" loading="lazy" /> </a>
                                                            </div>
                                                            <div class="item-content text-center">
                                                                <h3 class="item-title text-capitalize">
                                                                    <a
                                                                        href="product-category/surgical-mask/index.html">{{$key->name}}</a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach




                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>




                <section
                    class="section_trans  elementor-section elementor-top-section elementor-element elementor-element-1e5eb3ff elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="1e5eb3ff" data-element_type="section"
                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5a11106b"
                                data-id="5a11106b" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-16ab5dbf elementor-widget elementor-widget-rt-product-isotope"
                                            data-id="16ab5dbf" data-element_type="widget"
                                            data-widget_type="rt-product-isotope.default">
                                            <div class="elementor-widget-container">
                                                <div
                                                    class="latest-product-section-style-1 product-section-style-1 rt-isotope-wrap-1 rtin-layout-1">
                                                    <div class="row section_heade">
                                                        <div class="col-12">
                                                            <div class="rt-section-heading-wrapper position-relative">
                                                                <div
                                                                    class="gap-2 d-flex align-items-center justify-content-between flex-wrap">
                                                                    <div class="rt-section-heading">
                                                                        <span
                                                                            class="sub-title d-inline-block fw-light">{{$lang['k_last_product']}}</span>
                                                                        <h2 class="section-title">
                                                                            {{$lang['last_product']}}</h2>
                                                                    </div>
                                                                    <div
                                                                        class="filter-box-wrap d-flex align-items-center flex-wrap gutter-10">
                                                                        <div
                                                                            class="rt-isotope-menu-1 d-flex align-items-center flex-wrap">
                                                                            <a href="#" data-filter="*"
                                                                                class="menu-item current">{{$lang['all']}}</a>

                                                                            @foreach ($pro_sec as $key)
                                                                            <a href="#" class="menu-item"
                                                                                data-filter=".167814963848-{{$key->id}}">{{$key->name}}</a>
                                                                            @endforeach

                                                                            <a href="#"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row rt-gutter-20">
                                                        <div class="col-xl-3 order-2 order-xl-1 mx-auto">
                                                            <div class="rt-ad-banner-1 h-100 text-center">
                                                                <a href="http://medishopdev.local/shop/"
                                                                    class="d-block h-100">
                                                                    @php
                                                                    $add = DB::table('adds')->first();
                                                                    @endphp
                                                                    <img width="330" height="697"
                                                                        src="{{url(asset($add->add1))}}"
                                                                        class="attachment-full size-full wp-post-image"
                                                                        alt="" decoding="async" loading="lazy" {{--
                                                                        srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/ad-banner_4.png 330w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/ad-banner_4-142x300.png 142w"
                                                                        --}} sizes="(max-width: 330px) 100vw, 330px" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9 order-1 order-xl-2">
                                                            <div class="row rt-gutter-20  rt-isotope-container-1">
                                                                @foreach ( $products as $key)
                                                                <div
                                                                    class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 167814963848-{{$key->sec_id}}  product type-product post-136 status-publish first instock product_cat-accessories product_cat-equipments has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                                                                    <div
                                                                        class="rt-product-box layout-1 layout-2 position-relative overflow-hidden">
                                                                        <div
                                                                            class="item-img mx-auto position-relative overflow-hidden">
                                                                            <a
                                                                                href="product/equipment-product/index.html"><img
                                                                                    width="400" height="300"
                                                                                    src="{{url(asset($key->img))}}"
                                                                                    class="attachment- size- wp-post-image"
                                                                                    alt="" decoding="async"
                                                                                    loading="lazy" {{--
                                                                                    srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/product_2.png 400w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/product_2-300x225.png 300w"
                                                                                    --}}
                                                                                    sizes="(max-width: 400px) 100vw, 400px" />
                                                                            </a>
                                                                            <ul
                                                                                class="badge-list d-flex align-items-center">
                                                                                <li>
                                                                                    @if($key->discount > 0)
                                                                                    <span
                                                                                        class="rt-prodcut-badge-1">{{$key->discount
                                                                                        . '-%'}}</span>
                                                                                    @endif
                                                                                </li>
                                                                            </ul>
                                                                            <div
                                                                                class="hover-content-1 position-absolute">
                                                                                <ul class="action-btn-area">
                                                                                    <li> <a href="#"
                                                                                            class="yith-wcqv-button"
                                                                                            data-product_id="136"
                                                                                            title="{{$lang['quik_view']}}"><i
                                                                                                class="fas fa-search"></i></a>
                                                                                    </li>

                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="item-content">
                                                                            <span
                                                                                class='product-cat'>{{$key->section}}</span>
                                                                            <h4 class="product-name"><a
                                                                                    href="product/equipment-product/index.html">{{$key->name}}</a>
                                                                            </h4>

                                                                            <div
                                                                                class="between-box d-flex align-items-center justify-content-between flex-wrap gutter-15">
                                                                                <div class="price">
                                                                                    @if($key->discount > 0)
                                                                                    <del aria-hidden="true">
                                                                                        <span
                                                                                            class="woocommerce-Price-amount amount"><span
                                                                                                class="woocommerce-Price-currencySymbol">&#036;</span>{{$key->price}}</span></del>
                                                                                    @endif

                                                                                    <ins> <span
                                                                                            class="woocommerce-Price-amount amount"><span
                                                                                                class="woocommerce-Price-currencySymbol">&#036;</span>{{$key->price
                                                                                            - ($key->price *
                                                                                            ($key->discount / 100))
                                                                                            }}</span></ins>
                                                                                </div>
                                                                                <div class="cart-area anim-overflow">
                                                                                    <a rel="nofollow"
                                                                                        title="{{$lang['mor_info']}}"
                                                                                        href="indexa763.html?add-to-cart=136"
                                                                                        data-quantity="1"
                                                                                        data-product_id="136"
                                                                                        data-product_sku="LN95FM13"
                                                                                        class="cart-icon action-cart button product_type_variable rtwpvs_add_to_cart rtwpvs_ajax_add_to_cart  product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top"><i
                                                                                            class="fas fa-eye"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                @endforeach


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-69debfc elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="69debfc" data-element_type="section"
                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">

                    <div class=" section_heade container">

                        <div class="rt-section-heading-wrapper position-relative">
                            <div class="gap-2 d-flex align-items-center justify-content-between flex-wrap">
                                <div class="rt-section-heading">
                                    <span class="sub-title d-inline-block fw-light">{{$lang['service_desc']}}</span>
                                    <h2 class="section-title">
                                        {{$lang['our_services']}}</h2>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="elementor-container elementor-column-gap-default">

                        <div class="elementor-row">

                            @foreach ($services as $key)

                            <div class="mx-1 elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-36de68b4"
                                data-id="36de68b4" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-554e50e8 elementor-invisible elementor-widget elementor-widget-rt-info-box-2"
                                            data-id="554e50e8" data-element_type="widget"
                                            data-widget_type="rt-info-box-2.default">
                                            <div class="elementor-widget-container section_heade">

                                                <div class="rt-post-banner-wrapper wow fadeInUp" data-wow-delay="200ms"
                                                    data-wow-duration="800ms">
                                                    <div
                                                        class="row motion-effects-wrap rt-post-banner layout-2 style-4 ex-img position-relative overflow-hidden d-flex align-items-center justify-content-between">
                                                        <div class=" col-6">

                                                            <h3 class="title text-white">{{$key->name}}</h3>
                                                            <div class="btn-area">
                                                                <a href="http://medishopdev.local/shop/"
                                                                    class="rt-btn-1">{{$lang['mor_learn']}}<i
                                                                        class="fas  fa-angle-right icon icon"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="http://medishopdev.local/shop/">
                                                                <img width="269" height="249"
                                                                    src="{{url(asset($key->img))}}"
                                                                    class="attachment-full size-full wp-post-image"
                                                                    alt="" decoding="async" loading="lazy" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach








                            {{-- <div
                                class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-36de68b4"
                                data-id="36de68b4" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-5fb6fab8 elementor-invisible elementor-widget elementor-widget-rt-info-box-2"
                                            data-id="5fb6fab8" data-element_type="widget"
                                            data-widget_type="rt-info-box-2.default">
                                            <div class="elementor-widget-container">

                                                <div class="rt-post-banner-wrapper wow fadeInUp" data-wow-delay="400ms"
                                                    data-wow-duration="800ms">
                                                    <div
                                                        class="motion-effects-wrap rt-post-banner layout-2 style-4 ex-img-2 position-relative overflow-hidden d-flex align-items-center justify-content-between">
                                                        <div class="post-content">
                                                            <div class="offer-2">Upto 25% Off</div>
                                                            <h2 class="title">100% Pure <br>Hand Sanitizer</h2>
                                                            <div class="btn-area">
                                                                <a href="http://medishopdev.local/shop/"
                                                                    class="rt-btn-1">Shop Now<i
                                                                        class="fas  fa-angle-right icon icon"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-img">
                                                            <a href="http://medishopdev.local/shop/">
                                                                <img width="176" height="191"
                                                                    src="wp-content/uploads/2022/06/product_27.png"
                                                                    class="attachment-full size-full wp-post-image"
                                                                    alt="" decoding="async" loading="lazy" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-7575220a"
                                data-id="7575220a" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-554e50e8 elementor-invisible elementor-widget elementor-widget-rt-info-box-2"
                                            data-id="554e50e8" data-element_type="widget"
                                            data-widget_type="rt-info-box-2.default">
                                            <div class="elementor-widget-container">

                                                <div class="rt-post-banner-wrapper wow fadeInUp" data-wow-delay="600ms"
                                                    data-wow-duration="800ms">
                                                    <div
                                                        class="motion-effects-wrap rt-post-banner layout-2 style-4 ex-img-2 position-relative overflow-hidden d-flex align-items-center justify-content-between">
                                                        <div class="post-content">
                                                            <div class="offer-2">Upto 25% Off</div>
                                                            <h2 class="title">100% Pure <br>Hand Sanitizer</h2>
                                                            <div class="btn-area">
                                                                <a href="http://medishopdev.local/shop/"
                                                                    class="rt-btn-1">Shop Now<i
                                                                        class="fas  fa-angle-right icon icon"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-img">
                                                            <a href="http://medishopdev.local/shop/">
                                                                <img width="183" height="240"
                                                                    src="wp-content/uploads/2022/06/product_28.png"
                                                                    class="attachment-full size-full wp-post-image"
                                                                    alt="" decoding="async" loading="lazy" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </section>




                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-4ddfb561 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="4ddfb561" data-element_type="section"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-12dba34"
                                data-id="12dba34" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <section
                                            class="elementor-section elementor-inner-section elementor-element elementor-element-2192a0a elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                            data-id="2192a0a" data-element_type="section">
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-row section_heade">
                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-656592d5"
                                                        data-id="656592d5" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-9bae6ce elementor-widget elementor-widget-rt-title"
                                                                    data-id="9bae6ce" data-element_type="widget"
                                                                    data-widget_type="rt-title.default">
                                                                    <div class="elementor-widget-container">

                                                                        <div class="rt-section-heading style-5">

                                                                            <h2 class="section-title">
                                                                                {{$lang['our_offers']}}
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </section>
                                        <section
                                            class="elementor-section elementor-inner-section elementor-element elementor-element-1c0dc8fa elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                            data-id="1c0dc8fa" data-element_type="section">
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-row">
                                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-6baa4c77"
                                                        data-id="6baa4c77" data-element_type="column"
                                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-2016d2a elementor-widget elementor-widget-rt-product-carousel"
                                                                    data-id="2016d2a" data-element_type="widget"
                                                                    data-widget_type="rt-product-carousel.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="rt-slide-wrap">
                                                                            <div
                                                                                class="deal-slider-wrapper-3 rtin-style-4">
                                                                                <div
                                                                                    class="swiper-container rt-slider-style-1">
                                                                                    <div class="swiper-wrapper"
                                                                                        data-carousel-options="{&quot;col_xl&quot;:&quot;5&quot;,&quot;autoplay&quot;:false,&quot;speed&quot;:&quot;5000&quot;,&quot;col_lg&quot;:&quot;4&quot;,&quot;col_md&quot;:&quot;2&quot;,&quot;col_sm&quot;:&quot;2&quot;,&quot;col_xs&quot;:&quot;1&quot;}">

                                                                                        @foreach ($top_products as $key)

                                                                                        <div class="swiper-slide">
                                                                                            <div
                                                                                                class="rt-product-box layout-1 layout-2 position-relative overflow-hidden">
                                                                                                <div
                                                                                                    class="item-img mx-auto position-relative overflow-hidden">
                                                                                                    <a
                                                                                                        href="product/equipment-product/index.html"><img
                                                                                                            width="400"
                                                                                                            height="300"
                                                                                                            src="{{url(asset($key->img))}}"
                                                                                                            class="attachment- size- wp-post-image"
                                                                                                            alt=""
                                                                                                            decoding="async"
                                                                                                            loading="lazy"
                                                                                                            {{--
                                                                                                            srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/product_2.png 400w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/product_2-300x225.png 300w"
                                                                                                            --}}
                                                                                                            sizes="(max-width: 400px) 100vw, 400px" />
                                                                                                    </a>
                                                                                                    <ul
                                                                                                        class="badge-list d-flex align-items-center">
                                                                                                        <li>
                                                                                                            @if($key->discount
                                                                                                            > 0)
                                                                                                            <span
                                                                                                                class="rt-prodcut-badge-1">{{$key->discount
                                                                                                                .
                                                                                                                '-%'}}</span>
                                                                                                            @endif
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                    <div
                                                                                                        class="hover-content-1 position-absolute">
                                                                                                        <ul
                                                                                                            class="action-btn-area">
                                                                                                            <li> <a href="#"
                                                                                                                    class="yith-wcqv-button"
                                                                                                                    data-product_id="136"
                                                                                                                    title="{{$lang['quik_view']}}"><i
                                                                                                                        class="fas fa-search"></i></a>
                                                                                                            </li>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="item-content">
                                                                                                    <span
                                                                                                        class='product-cat'>{{$key->section}}</span>
                                                                                                    <h4
                                                                                                        class="product-name">
                                                                                                        <a
                                                                                                            href="product/equipment-product/index.html">{{$key->name}}</a>
                                                                                                    </h4>

                                                                                                    <div
                                                                                                        class="between-box d-flex align-items-center justify-content-between flex-wrap gutter-15">
                                                                                                        <div
                                                                                                            class="price">
                                                                                                            @if($key->discount
                                                                                                            > 0)
                                                                                                            <del
                                                                                                                aria-hidden="true">
                                                                                                                <span
                                                                                                                    class="woocommerce-Price-amount amount"><span
                                                                                                                        class="woocommerce-Price-currencySymbol">&#036;</span>{{$key->price}}</span></del>
                                                                                                            @endif

                                                                                                            <ins> <span
                                                                                                                    class="woocommerce-Price-amount amount"><span
                                                                                                                        class="woocommerce-Price-currencySymbol">&#036;</span>{{$key->price
                                                                                                                    -
                                                                                                                    ($key->price
                                                                                                                    *
                                                                                                                    ($key->discount
                                                                                                                    /
                                                                                                                    100))
                                                                                                                    }}</span></ins>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="cart-area anim-overflow">
                                                                                                            <a rel="nofollow"
                                                                                                                title="{{$lang['mor_info']}}"
                                                                                                                href="indexa763.html?add-to-cart=136"
                                                                                                                data-quantity="1"
                                                                                                                data-product_id="136"
                                                                                                                data-product_sku="LN95FM13"
                                                                                                                class="cart-icon action-cart button product_type_variable rtwpvs_add_to_cart rtwpvs_ajax_add_to_cart  product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                                                                data-bs-toggle="tooltip"
                                                                                                                data-bs-placement="top"><i
                                                                                                                    class="fas fa-eye"></i></a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        @endforeach






                                                                                    </div>
                                                                                </div>
                                                                                {{-- <div
                                                                                    class="rt-slider-pagination mt--30">
                                                                                </div> --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>







                <br>
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-3b03d96b elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="3b03d96b" data-element_type="section"
                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6f34a1e7"
                                data-id="6f34a1e7" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-68fde6ab elementor-widget elementor-widget-rt-ad-box"
                                            data-id="68fde6ab" data-element_type="widget"
                                            data-widget_type="rt-ad-box.default">
                                            <div class="elementor-widget-container">

                                                <div class="container">
                                                    <img src="{{url(asset($add->add2))}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>




                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-7cc0e22d elementor-section-stretched elementor-section-content-middle overflow-hidden elementor-reverse-tablet elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="7cc0e22d" data-element_type="section"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-44265416"
                                data-id="44265416" data-element_type="column" id="motion-effects-wrap">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-2dab309e elementor-widget elementor-widget-rt-image-box"
                                            data-id="2dab309e" data-element_type="widget"
                                            data-widget_type="rt-image-box.default">
                                            <div class="elementor-widget-container">
                                                <div class="motion-effects-wrap">
                                                    <div class="shape-img-wrap">
                                                        <img width="352" height="513" src="{{url(asset($add->add3))}}"
                                                            class="attachment-full size-full wp-post-image" alt=""
                                                            decoding="async" loading="lazy" {{--
                                                            srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/test-img_1.png 352w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/test-img_1-206x300.png 206w"
                                                            --}} sizes="(max-width: 352px) 100vw, 352px" />
                                                        <ul class="element-list">
                                                            <li class="none"><img width="388" height="281"
                                                                    src="{{url(asset('build/wp-content/uploads/2022/06/element_3.png'))}}"
                                                                    class="attachment-full size-full wp-post-image"
                                                                    alt="" decoding="async" loading="lazy" {{--
                                                                    srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_3.png 388w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_3-300x217.png 300w"
                                                                    --}} sizes="(max-width: 388px) 100vw, 388px" />
                                                            </li>
                                                            <li class="motion-effects5"><img width="154" height="153"
                                                                    src="{{url(asset('build/wp-content/uploads/2022/06/element_4.png'))}}"
                                                                    class="attachment-full size-full wp-post-image"
                                                                    alt="" decoding="async" loading="lazy" {{--
                                                                    srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_4.png 154w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_4-150x150.png 150w"
                                                                    --}} sizes="(max-width: 154px) 100vw, 154px" />
                                                            </li>
                                                            <li class="motion-effects1"><img width="133" height="55"
                                                                    src="{{url(asset('build/wp-content/uploads/2022/06/element_5.png'))}}"
                                                                    class="attachment-full size-full wp-post-image"
                                                                    alt="" decoding="async" loading="lazy" />
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-761519c0"
                                data-id="761519c0" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-730176f5 elementor-widget elementor-widget-rt-testimonial"
                                            data-id="730176f5" data-element_type="widget"
                                            data-widget_type="rt-testimonial.default">
                                            <div class="elementor-widget-container">
                                                <div class="rt-slide-wrap">
                                                    <div class="rt-section-heading-wrapper style-3 position-relative ">
                                                        <div
                                                            class="gutter-15 d-flex align-items-center justify-content-between flex-wrap section_heade">
                                                            <div class="rt-section-heading">
                                                                <h2 class="section-title">{{$lang['review']}}</h2>
                                                            </div>
                                                            <div class="navigation-box-style-1">
                                                                <div class="slider-navigation" dir="ltr">
                                                                    <i
                                                                        class="fas fa-chevron-left slider-btn btn-prev"></i>
                                                                    <span class="delimeter"></span>
                                                                    <i
                                                                        class="fas fa-chevron-right slider-btn btn-next"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="testimonial-wrap-style-1">
                                                        <div
                                                            class="swiper-container rt-slider-style-3 deal-slider-wrapper">
                                                            <div class="swiper-wrapper"
                                                                data-carousel-options="{&quot;col_xl&quot;:&quot;4&quot;,&quot;autoplay&quot;:false,&quot;speed&quot;:&quot;5000&quot;,&quot;col_lg&quot;:&quot;2&quot;,&quot;col_md&quot;:&quot;2&quot;,&quot;col_sm&quot;:&quot;1&quot;,&quot;col_xs&quot;:&quot;1&quot;}">
                                                                @foreach ($review as $key)
                                                                <div class="swiper-slide">
                                                                    <div
                                                                        class="rt-testimonial-box-1 position-relative overflow-hidden">
                                                                        <div class="test-box position-relative">
                                                                            <ul
                                                                                class="rating d-flex align-items-center">
                                                                                <li class="star-rate"><i
                                                                                        class="fa fa-star"
                                                                                        aria-hidden="true"></i>
                                                                                </li>
                                                                                <li class="star-rate"><i
                                                                                        class="fa fa-star"
                                                                                        aria-hidden="true"></i>
                                                                                </li>
                                                                                <li class="star-rate"><i
                                                                                        class="fa fa-star"
                                                                                        aria-hidden="true"></i>
                                                                                </li>
                                                                                <li class="star-rate"><i
                                                                                        class="fa fa-star"
                                                                                        aria-hidden="true"></i>
                                                                                </li>
                                                                                <li class="star-rate"><i
                                                                                        class="fa fa-star"
                                                                                        aria-hidden="true"></i>
                                                                                </li>

                                                                            </ul>
                                                                            <p class="test-desc">
                                                                                {{$key->review}}
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="test-author-box d-flex align-items-center">
                                                                            <div class="author-img me-3"><img
                                                                                    decoding="async" width="100"
                                                                                    height="100"
                                                                                    src="{{url(asset($key->logo))}}"
                                                                                    class="attachment-full size-full wp-post-image"
                                                                                    alt="" loading="lazy" />
                                                                            </div>
                                                                            <div class="author-info">
                                                                                <h4 class="name">{{$key->name}}
                                                                                </h4>
                                                                                <span
                                                                                    class="designation">{{$key->adjective}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>




                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-33f0c41 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="33f0c41" data-element_type="section"
                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7749812e"
                                data-id="7749812e" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-5fec255e elementor-widget elementor-widget-rt-brands"
                                            data-id="5fec255e" data-element_type="widget"
                                            data-widget_type="rt-brands.default">
                                            <div class="elementor-widget-container">

                                                <div
                                                    class="brand-section-style-1 position-relative overflow-hidden rt-slide-wrap">
                                                    <div class="row  section_heade">
                                                        <div class="col-12">
                                                            <div
                                                                class="rt-section-heading-wrapper style-2 position-relative">
                                                                <div
                                                                    class="gutter-15 d-flex align-items-center justify-content-between flex-wrap">
                                                                    <div class="rt-section-heading">
                                                                        <span
                                                                            class="sub-title d-inline-block fw-light">{{$lang['brand_info']}}</span>
                                                                        <h2 class="section-title">{{$lang['brand']}}
                                                                        </h2>
                                                                    </div>
                                                                    <div class="navigation-box-style-1">
                                                                        <div class="slider-navigation" dir="ltr">
                                                                            <i
                                                                                class="fas fa-chevron-left slider-btn btn-prev"></i>
                                                                            <span class="delimeter"></span>
                                                                            <i
                                                                                class="fas fa-chevron-right slider-btn btn-next"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="swiper-container rt-slider-style-1 brand-slider-wrapper">
                                                        <div class="swiper-wrapper"
                                                            data-carousel-options="{&quot;col_xl&quot;:&quot;5&quot;,&quot;autoplay&quot;:false,&quot;speed&quot;:&quot;5000&quot;,&quot;col_lg&quot;:&quot;4&quot;,&quot;col_md&quot;:&quot;2&quot;,&quot;col_sm&quot;:&quot;1&quot;,&quot;col_xs&quot;:&quot;1&quot;}">
                                                            @foreach ($brands as $key)
                                                            <div class="swiper-slide">
                                                                <div
                                                                    class="rt-brand-box-1 position-relative overflow-hidden">
                                                                    <div
                                                                        class="item-img position-relative overflow-hidden">

                                                                    </div>
                                                                    <br>
                                                                    <div class="item-content border">
                                                                        <div
                                                                            class="info-box d-flex justify-content-center align-items-center">
                                                                            <div class="item-icon me-2">
                                                                                <img decoding="async" width="75"
                                                                                    height="75"
                                                                                    src="{{url(asset($key->logo))}}"
                                                                                    class="attachment-full size-full wp-post-image"
                                                                                    alt="" loading="lazy" />
                                                                            </div>
                                                                            <div class="item-desc">
                                                                                <h3 class="title">{{$key->name}}</h3>
                                                                                <div class="subtitle">
                                                                                    {{$key->adjective}}</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach


                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>




                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-65e1007e elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="65e1007e" data-element_type="section"
                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3f524fb2"
                                data-id="3f524fb2" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-6cca534c elementor-widget elementor-widget-rt-post"
                                            data-id="6cca534c" data-element_type="widget"
                                            data-widget_type="rt-post.default">
                                            <div class="elementor-widget-container">

                                                <div
                                                    class="blog-section-style-2 position-relative overflow-hidden rt-slide-wrap">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div
                                                                class="rt-section-heading-wrapper style-2 position-relative">
                                                                <div
                                                                    class="gutter-15 d-flex align-items-center justify-content-between flex-wrap section_heade">
                                                                    <div class="rt-section-heading">
                                                                        <span
                                                                            class="sub-title d-inline-block fw-light">{{$lang['blog_desc']}}</span>
                                                                        <h2 class="section-title">{{$lang['blog']}}</h2>
                                                                    </div>
                                                                    <div class="navigation-box-style-1">
                                                                        <div class="slider-navigation" dir="ltr">
                                                                            <i
                                                                                class="fas fa-chevron-left slider-btn btn-prev"></i>
                                                                            <span class="delimeter"></span>
                                                                            <i
                                                                                class="fas fa-chevron-right slider-btn btn-next"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end col -->
                                                    </div>
                                                    <div class="swiper-container rt-slider-style-2 deal-slider-wrapper">
                                                        <div class="swiper-wrapper"
                                                            data-carousel-options="{&quot;col_xl&quot;:&quot;4&quot;,&quot;autoplay&quot;:true,&quot;speed&quot;:&quot;5000&quot;,&quot;col_lg&quot;:&quot;3&quot;,&quot;col_md&quot;:&quot;2&quot;,&quot;col_sm&quot;:&quot;1&quot;,&quot;col_xs&quot;:&quot;1&quot;}">
                                                            @foreach ($blogs as $key)
                                                            <div class="swiper-slide">
                                                                <div
                                                                    class="rt-blog-box layout-2 position-relative overflow-hidden">
                                                                    <div
                                                                        class="blog-img position-relative overflow-hidden">
                                                                        <a
                                                                            href="mirage-deep-dive-under-anding-timin-response-10/index.html">
                                                                            <img width="571" height="370"
                                                                                src="{{url(asset($key->img))}}"
                                                                                class="attachment-rdtheme-size2 "
                                                                                alt="" /> </a>
                                                                    </div>
                                                                    <div class="blog-content">
                                                                        <ul class="rt-post-meta-box">
                                                                            <li>
                                                                                <span class="rt-meta">
                                                                                    <i
                                                                                        class="far fa-calendar-alt icon"></i>
                                                                                    {{$key->created_at->format('Y-m-d')}}
                                                                                </span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="rt-meta">
                                                                                    <i class="far fa-user icon"></i>
                                                                                    <a href="author/admin/index.html"
                                                                                        title="Posts by admin"
                                                                                        rel="author">{{$key->created}}</a>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                        <h3 class="blog-title"><a
                                                                                href="mirage-deep-dive-under-anding-timin-response-10/index.html">{{$key->name}}</a>
                                                                        </h3>
                                                                        <div
                                                                            class="between-box d-flex align-items-center justify-content-between flex-wrap">
                                                                            <a href="mirage-deep-dive-under-anding-timin-response-10/index.html"
                                                                                class=" btn btn-outline-primary btn-sm">{{$lang['read_more']}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>




            </div>
        </div>
    </div>

</div><!-- #content -->



@endsection
