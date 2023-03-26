<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>برنامج إدارة المدارس</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    @if (App::getLocale() == 'en')
    <link href="{{ URL::asset('build/assets/css/ltr.css') }}" rel="stylesheet">
    @else
    <link href="{{ URL::asset('build/assets/css/rtl.css') }}" rel="stylesheet">
    @endif

    <style>
        @font-face {
            font-family: cairo;
            src: url('{{url(asset(' build/assets/fonts/cairo.ttf'))}}');
        }

        @font-face {
            font-family: tajawal;
            src: url('{{url(asset(' build/assets/fonts/tajawal.ttf'))}}');
        }

        @font-face {
            font-family: changa;
            src: url('{{url(asset(' build/assets/fonts/changa.ttf'))}}');

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

</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        <!--=================================
 login-->

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            style="background-image: url({{url(asset('/buildassets/images/login-bg.jpg'))}});">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">
                    <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                        style="background-image: url(images/login-inner-bg.jpg);">
                        <div class="login-fancy" style="background: #0a5682;">
                            <h2 class="text-white mb-20">{{trans('main_trans.welcome')}}</h2>
                            @php
                            $company = DB::table('company')->select('logo')->first();
                            @endphp
                            <img src="{{url(asset($company->logo))}}" class="w-100 image-fluid" alt="">
                            <div style="    position: absolute;
                            bottom: 10px;
                            left: 0;
                            right: 0;" class=" wow fadeInUp text-center" data-wow-delay="200ms"
                                data-wow-duration="800ms">
                                <p class="text-white copy-text mb-0">2023 &copy; all right reserved by <a
                                        target="_blank" rel="nofollow" href="#">New Space Technology</a></p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 class="mb-30">{{trans('main_trans.login')}}</h3>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">{{trans('main_trans.email')}}*</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="Password">{{trans('main_trans.password')}} * </label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif


                                <button class="button"><span>{{trans('main_trans.enter')}}</span><i
                                        class="fa fa-check"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
 login-->

    </div>
    <!-- jquery -->
    <script src="{{ URL::asset('build/assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{ URL::asset('build/assets/js/plugins-jquery.js') }}"></script>
    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';

    </script>

    <!-- chart -->
    <script src="{{ URL::asset('build/assets/js/chart-init.js') }}"></script>
    <!-- calendar -->
    <script src="{{ URL::asset('build/assets/js/calendar.init.js') }}"></script>
    <!-- charts sparkline -->
    <script src="{{ URL::asset('build/assets/js/sparkline.init.js') }}"></script>
    <!-- charts morris -->
    <script src="{{ URL::asset('build/assets/js/morris.init.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ URL::asset('build/assets/js/datepicker.js') }}"></script>
    <!-- sweetalert2 -->
    <script src="{{ URL::asset('build/assets/js/sweetalert2.js') }}"></script>
    <!-- toastr -->
    @yield('js')
    <script src="{{ URL::asset('build/assets/js/toastr.js') }}"></script>
    <!-- validation -->
    <script src="{{ URL::asset('build/assets/js/validation.js') }}"></script>
    <!-- lobilist -->
    <script src="{{ URL::asset('build/assets/js/lobilist.js') }}"></script>
    <!-- custom -->
    <script src="{{ URL::asset('build/assets/js/custom.js') }}"></script>

</body>

</html>
