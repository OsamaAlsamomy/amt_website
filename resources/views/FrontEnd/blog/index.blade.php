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
'blogs' => 'المدونة',
'read_more' => 'اقرأ المزيد',
'new_blogs' => 'احدث منشوراتنا',

'mor_info' => 'مزيد من المعلومات',
'no_content' => 'ليس هناك منتجات لعرضها',




];
@endphp
@else
@php
$lang = [
'home' => 'Home',
'blogs' => 'BLOGS',
'read_more' => 'Read more',
'new_blogs' => 'Our latest publications',

'mor_info' => 'More Informations',
'no_content' => 'There are no products to display',












];
@endphp
@endif


@section('title')
{{$lang['blogs']}}
@endsection
@section('blogs')
bg-info px-4
@endsection
@section('blogs_')
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
            <h2 class="banner-title">{{$lang['blogs']}}</h2>
            <div class="main-breadcrumb">
                <!-- Breadcrumb NavXT 7.2.0 -->
                <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                        title="Go to Medimall." href="{{url('/')}}" class="home"><span
                            property="name">{{$lang['home']}}</span></a>

                </span>
                <span class="dvdr"> <i class="fas fa-angle-left"></i> </span>
                <span property="itemListElement" typeof="ListItem"><span property="name"
                        class="post post-page current-item">{{$lang['blogs']}}</span>

                </span>


            </div>
        </div>
    </div>

    <div id="primary" class="content-area section-padding overflow-hidden">
        <div class="container">
            <div class="row gutter-40 sticky-coloum-wrap">
                <div class="col-xl-3 col-lg-5 sticky-coloum-item">
                    <div class="rt-sidebar style-2">
                        <div id="search-2" class="sidebar-wrap mb--30 widget_search">
                            <div class="rt-card-box style-1">
                                <div class="search-box style-1">
                                    <form role="search" method="get" class="form search-form-box style-1"
                                        action="{{url('blogs/search')}}">

                                        <div class="form-group">
                                            <input type="text" id="search" class="text-center form-control rt-search-control"
                                                placeholder="Search here" value="" name="search" required/>
                                            <button type="submit" class="search-submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="categories-2" class="section_heade sidebar-wrap mb--30 widget_categories">
                            <div class="rt-card-box style-1">
                                <div class="rt-section-heading-wrapper position-relative">
                                    <div class="rt-section-heading">
                                        <h4 class="section-title">{{$lang['new_blogs']}}</h4>
                                    </div>
                                </div>
                                <ul>
                                    @foreach ($blogs_last as $key)
                                    <li class="cat-item cat-item-22"><a
                                            href="{{url('blogs/blog/'.$key->id)}}">{{$key->name}}</a>
                                    </li>
                                    @endforeach

                                </ul>

                            </div>
                        </div>
                        <div id="media_image-3" class="sidebar-wrap mb--30 widget_media_image">
                            <div class="rt-card-box style-1"><img width="370" height="470"
                                    src="{{url(asset($add->add1))}}"
                                    class="image wp-image-683  attachment-full size-full wp-post-image" alt="" /></div>
                        </div>

                    </div>
                </div>

                @if($blogs->count() <= 0 ) <p class="section_heade text-center">
                    <i class="fa fa-info"></i>
                    {{$lang['no_content']}}
                    </p>
                    @else
                    <div class="section_heade col-xl-9 sticky-coloum-item">
                        <div id="main-content" class="main-content">
                            <div class="rt-main-content-2">
                                <div class="row gutter-30">
                                    @foreach ($blogs as $key)
                                    <div style="height: 500px"
                                        class="section_heade col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <article style="height: 100%" id="post-54"
                                            class="rt-blog-box layout-1 style-2 position-relative overflow-hidden post-54 post type-post status-publish format-standard has-post-thumbnail hentry category-treatments tag-equipments tag-organic">
                                            <div style="height: 50%" class="blog-img position-relative overflow-hidden">
                                                <a style="height: 100%" href="{{url('/blogs/blog/'.$key->id)}}">
                                                    <img style="height: 100%" width="571" height="370"
                                                        src="{{url(asset($key->img))}}"
                                                        class="attachment-rdtheme-size2 size-rdtheme-size2 wp-post-image wp-post-image"
                                                        alt="" decoding="async" /> </a>
                                            </div>
                                            <div style="height: 50%" class="blog-content">
                                                <ul class="rt-post-meta-box">
                                                    <li><span class="rt-meta"><i
                                                                class="far fa-calendar-alt icon"></i>{{$key->created_at}}</span>
                                                    </li>
                                                    <li><span class="rt-meta">
                                                            <p class="by"> <i class="fa fa-user px-2"></i>
                                                                {{$key->auther}}
                                                            </p>
                                                </ul>
                                                <h5><a style="color:#0a5682"
                                                        href="{{url('/blogs/blog/'.$key->id)}}">{{$key->name}}</a></h5>
                                                <a href="{{url('/blogs/blog/'.$key->id)}}"
                                                    class=" btn btn-outline-primary btn-sm">{{$lang['read_more']}}
                                                </a>
                                            </div>
                                        </article>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                        <div style="display: flex;
                    justify-content: center;">
                            {{ $blogs->links() }}
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
        </div>
    </div>


</div><!-- #content -->



@endsection
