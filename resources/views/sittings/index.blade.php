@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ URL(asset('build/assets/sweetalert2/sweetalert2.min.css')) }}" />

@section('title')
empty
@stop
@endsection
@section('sittings')
bg-success
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.company_details') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.settings')
                        }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('main_trans.company_details') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100 p-3">
            <div>
                <i class="fa   fa-phone bg-info   m-2 text-white  p-2 rounded"></i>
                <span class="m-2">تشغيل الموقع</span>
                <label class="switch m-2">
                    <input type="checkbox" id="state_check" name="state_check"
                        @if ($data->site_run == 1) checked @endif
                    onclick="change_state('{{ url(App::getLocale() . '/admin/phonemail/state/' .
                    $data->site_run) }}' , {{ $data->site_run }})">
                    <span class="slider round"></span>
                </label>

            </div>

            <div>
                <i class="fa   fa-phone bg-info   m-2 text-white  p-2 rounded"></i>
                <span class="m-2">تشغيل الموقع</span>

                <label class="switch m-2">
                    <input type="checkbox" id="state_check" name="state_check"
                        @if ($data->site_run == 1) checked @endif
                    onclick="change_state('{{ url(App::getLocale() . '/admin/phonemail/state/' .
                    $data->site_run) }}' , {{ $data->site_run }})">
                    <span class="slider round"></span>
                </label>

            </div>

        </div>
    </div>
</div>






<!-- row closed -->
@endsection
@section('js')
<script src="{{ URL(asset('build/assets/sweetalert2/sweetalert2.min.js')) }}"></script>
<script src="{{ URL::asset('build/assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('build/assets/js/page/company.js') }}"></script>


</html>
@endsection
