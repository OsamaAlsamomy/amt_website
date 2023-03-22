@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ URL(asset('build/assets/sweetalert2/sweetalert2.min.css')) }}" />

@section('title')
{{ trans('main_trans.mail') }}
@stop
@endsection
@section('message')
bg-success
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.mail') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.website_manage')
                        }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('main_trans.mail') }}</li>
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
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>{{ trans('main_trans.date') }} :  {{$data->created_at}}</h6>

                        <h6>{{ trans('main_trans.name') }} :  {{$data->name}}</h6>
                        <br>
                        <h6>{{ trans('main_trans.email') }} :  {{$data->email}}</h6>
                        <br>
                        <h6>{{ trans('main_trans.subject') }} :  {{$data->subject}}</h6>
                        <br>
                        <h6>{{ trans('main_trans.message') }} : </h6>
                        <p> {{$data->message}}</p>
                        <br>
                        <br>
                        <a href="mailto:{{$data->email}}" class="btn btn-success">{{ trans('main_trans.replay_msg') }}</a>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>






<!-- row closed -->
@endsection
@section('js')
<script src="{{ URL(asset('build/assets/sweetalert2/sweetalert2.min.js')) }}"></script>
<script src="{{ URL::asset('build/assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('build/assets/js/page/services.js') }}"></script>




</html>
@endsection
