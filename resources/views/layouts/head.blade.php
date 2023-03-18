<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('build/assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
@yield('css')
<!--- Style css -->
<link href="{{ URL::asset('build/assets/css/style.css') }}" rel="stylesheet">

<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('build/assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('build/assets/css/rtl.css') }}" rel="stylesheet">
@endif

<style>
    @font-face {
        font-family: cairo;
        src: url('{{url(asset('build/assets/fonts/cairo.ttf'))}}');
    }
    @font-face{
        font-family: tajawal;
        src: url('{{url(asset('build/assets/fonts/tajawal.ttf'))}}');
    }
    @font-face{
        font-family: changa;
        src: url('{{url(asset('build/assets/fonts/changa.ttf'))}}');

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
