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
'no_content' => 'ليس هناك منتجات لعرضها',




];
@endphp
@else
@php
$lang = [
'home' => 'Home',
'products' => 'Our Products',
'quik_view' => 'Quick View',
'mor_info' => 'More Informations',
'no_content' => 'There are no products to display',












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
            <li><img width='458' height='150' src='{{url(asset('
                    build/wp-content/themes/medimall/assets/img/element_13.png'))}}' alt='Medimall'>
            </li>
            <li><img width='653' height='150' src='{{url(asset('
                    build/wp-content/themes/medimall/assets/img/element_14.png'))}}' alt='Medimall'>
            </li>

        </ul>
        <div class="container">
            <h2 class="banner-title">{{$lang['products']}}</h2>
            <div class="main-breadcrumb">
                <!-- Breadcrumb NavXT 7.2.0 -->
                <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                        title="Go to Medimall." href="{{url('/')}}" class="home"><span
                            property="name">{{$lang['home']}}</span></a>

                </span>
                <span class="dvdr"> <i class="fas fa-angle-left"></i> </span>
                <span property="itemListElement" typeof="ListItem"><span property="name"
                        class="post post-page current-item">{{$lang['products']}}</span>

                </span>

                <span class="dvdr"> <i class="fas fa-angle-left"></i> </span>
                <span property="itemListElement" typeof="ListItem"><span property="name"
                        class="post post-page current-item">{{$section->name}}</span>

                </span>


                <span class="dvdr"> <i class="fas fa-angle-left"></i> </span>
                <span property="itemListElement" typeof="ListItem"><span property="name"
                        class="post post-page current-item">({{$products->count()}})</span>

                </span>

            </div>
        </div>
    </div>

    <div id="primary" class="content-area shop-section style-1 section-padding overflow-hidden">
        <div class="container">

            <div class="container section_heade">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{url(asset($section->img))}}" width="150px" alt="">
                        <br>
                        <br>
                        <p >
                            <span class="px-4" style="    border: 2px solid #0a5682;
                            border-radius: 14px;">
                                {{$section->name}}
                            </span>

                        </p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$section->desc}}</p>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row sticky-coloum-wrap">
                <div class="col-sm-12 col-12">
                    @if($products->count() <= 0 ) <p class="section_heade text-center">
                        <i class="fa fa-info"></i>
                        {{$lang['no_content']}}
                        </p>
                        @else
                        <div class="rt-main-content-2">
                            <header class="woocommerce-products-header">

                            </header>



                            <div
                                class="section_heade products rdtheme-archive-products row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 gutter-24">


                                @foreach ($products as $key)
                                <div style="height:430px"
                                    class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 167814963848-{{$key->sec_id}}  product type-product post-136 status-publish first instock product_cat-accessories product_cat-equipments has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                                    <div style="height: 100%"
                                        class="rt-product-box layout-1 layout-2 position-relative overflow-hidden">
                                        <div style="height: 60%"
                                            class="item-img mx-auto position-relative overflow-hidden">
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
                            <div style="display: flex;
                        justify-content: center;">
                                {{ $products->links() }}
                            </div>

                            <style>
                                .pagination {
                                    margin-top: 30px;
                                    text-align: center;
                                }

                                .pagination li {
                                    display: flex;
                                }
                            </style>

                        </div>
                        @endif


                </div>
            </div><!-- .row -->
        </div><!-- container -->
    </div><!-- #primary -->
</div><!-- #content -->



@endsection
