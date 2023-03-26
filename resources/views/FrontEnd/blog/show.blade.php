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
'submit' => 'أرسل الآن',
'cpmments' => 'التعليقات',
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
'submit' => 'Submit Now',
'cpmments' => 'Comments',
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
                                            <input type="text" id="search"
                                                class="text-center form-control rt-search-control"
                                                placeholder="Search here" value="" name="search" required />
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


                <div class="section_heade col-xl-9 sticky-coloum-item">
                    <div id="main-content" class="main-content">
                        <div class="rt-main-content-2">
                            <div class="row gutter-30">

                                <article id="post-24"
                                    class="single-item post-24 post type-post status-publish format-standard has-post-thumbnail hentry category-medical category-pharmacy tag-body tag-shop">
                                    <div class="rt-blog-box layout-2 style-xl-2 position-relative overflow-hidden">
                                        <div class="blog-img position-relative overflow-hidden">

                                            <img width="1050" height="512" src="{{url(asset($data->img))}}"
                                                class="attachment-rdtheme-size1 size-rdtheme-size1 wp-post-image wp-post-image"
                                                alt="" />
                                        </div>
                                        <div class="blog-content">
                                            <ul class="rt-post-meta-box">
                                                <li><span class="rt-meta"><i class="far fa-calendar-alt icon"></i>
                                                        {{$data->created_at->format('Y-m-d')}}</span></li>
                                                <li><span class="rt-meta"> <i
                                                            class="fa fa-user mx-2 text-primary"></i>{{$data->auther}}</span>
                                                </li>

                                            </ul>
                                            <h3 class="blog-title">{{$data->name}}</h3>
                                            <p>{!! $data->desc !!}</p>

                                        </div>
                                    </div>
                                </article>

                                @if($setting->comment_run == 1)
                                <article id="post-24"
                                    class="single-item post-24 post type-post status-publish format-standard has-post-thumbnail hentry category-medical category-pharmacy tag-body tag-shop">
                                    <div class="rt-blog-box layout-2 style-xl-2 position-relative overflow-hidden">

                                        <span class="h5 text-info">{{$lang['cpmments']}}</span>
                                        <span>({{$comments->count()}})</span>

                                       <hr>
                                        @foreach ($comments as $key)
                                        <div>
                                            <p class="h6 ">
                                                <i class="fa fa-user text-primary"></i>
                                                {{$key->name}}
                                            </p>

                                            <p>
                                                {{$key->comment}}
                                            </p>
                                            <p dir="ltr">
                                                <i class="far fa-calendar-alt icon text-primary"></i>
                                                {{$key->created_at}}
                                            </p>
                                        </div>
                                        <hr>
                                        @endforeach

                                    </div>
                                </article>



                                <form data-form_id="1" id="form_comment" style="z-index: 1000"
                                    class="frm-fluent-form fluent_form_1 ff-el-form-top ff_form_instance_1_1 ff-form-loading"
                                    action="{{url('send/comment')}}" method="POST">
                                    <fieldset style="border: none!important;margin: 0!important;padding: 0!important;background-color: transparent!important;
                                            box-shadow: none!important;outline: none!important;">

                                        <div data-name="ff_cn_id_1"
                                            class='ff-t-container ff-column-container ff_columns_total_2  '>
                                            @csrf
                                            <input type="hidden" name="id" id="id" value="{{$data->id}}">
                                            <div class="row">
                                                <input type="hidden" name="blog" id="" value="{{$data->id}}">
                                                <div class='col-md-6 ff-t-cell ff-t-column-1' style='flex-basis: 50%;'>
                                                    <div class='ff-el-group form-group'>
                                                        <div class='ff-el-input--content'>
                                                            <input type="text" name="name"
                                                                class="ff-el-form-control form-control rt-form-control"
                                                                placeholder="Name" required>
                                                            <span id="error-name" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class='col-md-6 ff-t-cell ff-t-column-2' style='flex-basis: 50%;'>
                                                    <div class='ff-el-group form-group'>
                                                        <div class='ff-el-input--content'>
                                                            <input type="email" name="email" id="ff_1_email"
                                                                class="ff-el-form-control form-control rt-form-control"
                                                                placeholder="E-mail" required>
                                                            <span id="error-email" class="text-danger"></span>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <br>

                                        <div class=' form-group'>
                                            <div class=''>
                                                <textarea name="comment" id="ff_1_message" class=" form-control"
                                                    placeholder="Comment" rows="10" cols="10"></textarea>
                                                <span id="error-message" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <br>

                                        <div class='ff-el-group ff-text-left ff_submit_btn_wrapper'>
                                            <button type="submit"
                                                class="btn btn-outline-primary">{{$lang['submit']}}</button>
                                        </div>
                                    </fieldset>
                                </form>


                                @endif




                            </div>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>


</div><!-- #content -->



@endsection
