@extends('FrontEnd.layouts.master')
@php
$company = DB::table('company')->first();
$setting = DB::table('sittings')->first();
$add = DB::table('adds')->first();


@endphp

@if($setting->view_lang == 'ar')

@php
$lang = [
'home' => 'الرئيسية',
'serv' => 'خدماتنا',
'read_more' => 'اقرأ المزيد',
'new_blogs' => 'احدث منشوراتنا',
'mor_learn' => 'اعرف المزيد',
'mor_info' => 'مزيد من المعلومات',
'no_content' => 'ليس هناك منتجات لعرضها',




];
@endphp
@else
@php
$lang = [
'home' => 'Home',
'serv' => 'Our Services',
'read_more' => 'Read more',
'new_blogs' => 'Our latest publications',
'mor_learn' => 'Learn More',
'mor_info' => 'More Informations',
'no_content' => 'There are no products to display',












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
            <li>
                <img width='458' height='150' src='{{url(asset('build/wp-content/themes/medimall/assets/img/element_13.png'))}}' alt='Medimall'>
            </li>
            <li>
                <img width='653' height='150' src='{{url(asset('build/wp-content/themes/medimall/assets/img/element_14.png'))}}' alt='Medimall'>
            </li>

        </ul>
        <div class="container">
            <h2 class="banner-title">{{$lang['serv']}}</h2>
            <div class="main-breadcrumb">
                <!-- Breadcrumb NavXT 7.2.0 -->
                <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                        title="Go to Medimall." href="{{url('/')}}" class="home"><span
                            property="name">{{$lang['home']}}</span></a>

                </span>
                <span class="dvdr"> <i class="fas fa-angle-left"></i> </span>
                <span property="itemListElement" typeof="ListItem"><span property="name"
                        class="post post-page current-item">{{$lang['serv']}}</span>

                </span>


            </div>
        </div>
    </div>

    <div id="primary" class="content-area section-padding overflow-hidden">
        <div class="container">
            <div class="row gutter-40 sticky-coloum-wrap">


                @if($services->count() <= 0 ) <p class="section_heade text-center">
                    <i class="fa fa-info"></i>
                    {{$lang['no_content']}}
                    </p>
                    @else
                    <div class="elementor-container elementor-column-gap-default">

                        <div class="elementor-row">

                            @foreach ($services as $key)

                            <div class=" border rounded mx-1 elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-36de68b4"
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

                                                            <h3 class="title ">{{$key->name}}</h3>
                                                            <div class="btn-area">
                                                                <a href="{{url('services/service/'.$key->id)}}"
                                                                    class="rt-btn-1">{{$lang['mor_learn']}}<i
                                                                        class="fas  fa-angle-right icon icon"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="{{url('services/service/'.$key->id)}}">
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
                        </div>
                    </div>
                    @endif


            </div>
        </div>
    </div>


</div><!-- #content -->



@endsection
