@extends('FrontEnd.layouts.master')
@php
$company = DB::table('company')->first();
$setting = DB::table('sittings')->first();

$add = DB::table('adds')->first();

@endphp

@if($setting->view_lang == 'ar')

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
'review' => 'ماذا قال عملائنا عنا؟',

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
'review' => 'What our clients said about us?',
];
@endphp
@endif


@section('title')
{{$lang['about']}}
@endsection



@section('content')





<!-- sliders sections -->
<div id="content" class="site-content">
    <div class="section_heade inner-page-banner overflow-hidden ">
        <ul class="element-list d-none d-lg-block">
            <li>
                <img width="458" height="150"
                    src="{{url(asset('build/wp-content/themes/medimall/assets/img/element_13.png'))}}" alt="Medimall" />
            </li>
            <li>
                <img width="653" height="150"
                    src="{{url(asset('build/wp-content/themes/medimall/assets/img/element_14.png'))}}" alt="Medimall" />
            </li>
        </ul>
        <div class="container">
            <h2 class="banner-title">{{$lang['about']}}</h2>
            <div class="main-breadcrumb">
                <!-- Breadcrumb NavXT 7.2.0 -->
                <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                        title="Go to Medimall." href="{{url('/')}}"
                        class="home"><span property="name">{{$lang['home']}}</span></a>
                    <meta property="position" content="1" />
                </span><span class="dvdr"> <i class="fas fa-angle-left"></i> </span><span property="itemListElement"
                    typeof="ListItem"><span property="name" class="post post-page current-item">{{$lang['about']}}</span>
                    <meta property="url" content="https://radiustheme.com/demo/wordpress/themes/medimall/about-us/" />
                    <meta property="position" content="2" />
                </span>
            </div>
        </div>
    </div>
    <div data-elementor-type="wp-page" data-elementor-id="457" class="elementor elementor-457">
        <div class="elementor-inner">
            <div class="elementor-section-wrap">
                <section
                    class=" section_heade elementor-section elementor-top-section elementor-element elementor-element-50893ed5 elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="50893ed5" data-element_type="section"
                    data-settings='{"stretch_section":"section-stretched"}'>
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6d5a0eb3"
                                data-id="6d5a0eb3" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-602a3cca elementor-widget elementor-widget-rt-image-box"
                                            data-id="602a3cca" data-element_type="widget"
                                            data-widget_type="rt-image-box.default">
                                            <div class="elementor-widget-container">
                                                <div class="about-img-wrap style-1">
                                                    <div class="item-img-1">
                                                        <img width="570" height="570"
                                                            src="{{url(asset($add->add4))}}"
                                                            class="about-img-1 wow fadeInRight wp-post-image" alt=""
                                                           />
                                                    </div>
                                                    <div class="item-img-2 ">
                                                        <img width="255" height="255"
                                                            src="{{url(asset($company->logo))}}"
                                                            class=" wow fadeInLeft  " alt=""
                                                            decoding="async" loading="lazy"  />
                                                    </div>
                                                    <ul class="element-list">

                                                        <li>
                                                            <span class="d-block">
                                                                <img width="835" height="328"
                                                                    src="{{url(asset('build/wp-content/uploads/2022/06/element_22.png'))}}"
                                                                    class="attachment-full size-full wp-post-image"
                                                                    alt="" />
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-4882e1fe"
                                data-id="4882e1fe" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-4c7d0f7b elementor-widget elementor-widget-heading"
                                            data-id="4c7d0f7b" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                {{-- <span class="elementor-heading-title elementor-size-default">What
                                                    We Are Doing For Our
                                                    Business</span> --}}
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-16cd7386 elementor-widget elementor-widget-heading"
                                            data-id="16cd7386" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">
                                                    {{$company->name}}
                                                </h2>
                                                <br>
                                                <p>
                                                    {{$company->desc}}
                                                </p>

                                                <p>
                                                    {{$company->address}}
                                                </p>
                                                <p>
                                                    {!! $company->about !!}
                                                 </p>
                                            </div>
                                        </div>

                                        {{-- <section
                                            class="elementor-section elementor-inner-section elementor-element elementor-element-39ca114a elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                            data-id="39ca114a" data-element_type="section">
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-row">
                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6b82f6b1"
                                                        data-id="6b82f6b1" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-15266d6c elementor-invisible elementor-widget elementor-widget-rt-text-with-icon"
                                                                    data-id="15266d6c" data-element_type="widget"
                                                                    data-widget_type="rt-text-with-icon.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="wow fadeInUp" data-wow-dealy="300ms"
                                                                            data-wow-duration="800ms">
                                                                            <div class="item d-flex align-item-center">
                                                                                <div class="item-icon me-3">
                                                                                    <img width="60" height="60"
                                                                                        src="wp-content/uploads/2022/06/icon_1.png"
                                                                                        class="attachment-full size-full wp-post-image"
                                                                                        alt="" decoding="async"
                                                                                        loading="lazy" />
                                                                                </div>
                                                                                <div class="item-content">
                                                                                    <span
                                                                                        class="sub-title d-block">Professionals</span>
                                                                                    <h4 class="title mb-0">
                                                                                        Doctors
                                                                                    </h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4165b348"
                                                        data-id="4165b348" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-ad661f8 elementor-invisible elementor-widget elementor-widget-rt-text-with-icon"
                                                                    data-id="ad661f8" data-element_type="widget"
                                                                    data-widget_type="rt-text-with-icon.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="wow fadeInUp" data-wow-dealy="600ms"
                                                                            data-wow-duration="800ms">
                                                                            <div class="item d-flex align-item-center">
                                                                                <div class="item-icon me-3">
                                                                                    <i width="60" height="60"

                                                                                        class="   fa fa-shopping-cart"
                                                                                        alt=""  ></i>
                                                                                </div>
                                                                                <div class="item-content">
                                                                                    <span
                                                                                        class="sub-title d-block">60</span>
                                                                                    <h4 class="title mb-0">
                                                                                        {{$lang['products']}}
                                                                                    </h4>
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
                                        </section> --}}



                                        <div class="elementor-element elementor-element-26b3f6c9 elementor-widget elementor-widget-rt-button"
                                            data-id="26b3f6c9" data-element_type="widget"
                                            data-widget_type="rt-button.default">
                                            <div class="elementor-widget-container">
                                                <div class="btn-area">
                                                    <a href="{{url('/contact')}}" class="rt-btn-2">{{$lang['contact']}}<i class="fas fa-angle-right icon"></i></a>
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
                    class="elementor-section elementor-top-section elementor-element elementor-element-fd7d88a elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="fd7d88a" data-element_type="section"
                    data-settings='{"stretch_section":"section-stretched","background_background":"classic"}'>
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-85fc2c9"
                                data-id="85fc2c9" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-53d423ef elementor-absolute animated-slow elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image"
                                            data-id="53d423ef" data-element_type="widget"
                                            data-settings='{"_position":"absolute","_animation":"zoomIn"}'
                                            data-widget_type="image.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-image">
                                                    <img decoding="async" width="269" height="286"
                                                        src="wp-content/uploads/2022/06/element_25.png"
                                                        class="attachment-full size-full wp-image-482 wp-post-image"
                                                        alt="" loading="lazy" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-2c75bb52 elementor-widget elementor-widget-rt-ad-box"
                                            data-id="2c75bb52" data-element_type="widget"
                                            data-widget_type="rt-ad-box.default">
                                            <div class="elementor-widget-container">
                                                <div class="cta-section style-2 position-relative overflow-hidden">
                                                    <div class="row align-items-center gutter-30">
                                                        <div class="col-lg-8">
                                                            <div class="cta-content style-1">
                                                                <h2 class="cta-title mb--10">
                                                                    Medishop Pharmecy available as in chain
                                                                    stores.
                                                                </h2>
                                                                <p>
                                                                    Phasellus accumsan cursus velit. Sed
                                                                    aliquam ultrices mauris.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-lg-flex justify-content-lg-end">
                                                            {{-- <div class="btn-wrap">
                                                                <a href="http://medishopdev.local/shop/"
                                                                    class="rt-btn-8">See All Collection</a>
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
                    </div>
                </section>
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-6fe575eb elementor-section-stretched elementor-section-content-middle overflow-hidden elementor-reverse-tablet elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="6fe575eb" data-element_type="section"
                    data-settings='{"background_background":"classic","stretch_section":"section-stretched"}'>
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-70c7c69a"
                                data-id="70c7c69a" data-element_type="column" id="motion-effects-wrap">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-3f7d27df elementor-widget elementor-widget-rt-image-box"
                                            data-id="3f7d27df" data-element_type="widget"
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


                            <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-2ecdb5ff"
                                data-id="2ecdb5ff" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-4835ed4f elementor-widget elementor-widget-rt-testimonial"
                                            data-id="4835ed4f" data-element_type="widget"
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
                                                                data-carousel-options='{"col_xl":"4","autoplay":false,"speed":"5000","col_lg":"2","col_md":"2","col_sm":"1","col_xs":"1"}'>
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
            </div>
        </div>
    </div>
</div><!-- #content -->



@endsection
