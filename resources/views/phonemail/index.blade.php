@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ URL(asset('build/assets/sweetalert2/sweetalert2.min.css')) }}" />

@section('title')
{{ trans('main_trans.phone_email') }}
@stop
@endsection
@section('phonemail')
bg-success
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.phone_email') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.settings')
                        }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('main_trans.phone_email') }}</li>
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
                        @foreach ($data as $key)
                        @if($key->type == 'P')
                        <form
                            class="form_edit p-1 rounded bg-white m-4  border d-flex align-items-center justify-content-between"
                            action="{{url(App::getLocale() . '/admin/phonemail/edit')}}" method="POST">
                            @csrf
                            <div>


                                <a id="show_{{ $key->id }}" onclick="
                                document.getElementById('btn_{{ $key->id }}').style.display ='block';
                                document.getElementById('show_{{ $key->id }}').style.display ='none';
                                document.getElementById('hide_{{ $key->id }}').style.display ='block';
                                document.getElementById('inp_cont{{ $key->id }}').removeAttribute('readonly');
                                document.getElementById('inp_name{{ $key->id }}').removeAttribute('readonly');

                                " class="btn btn-success btn-sm m-1 text-white"><i class="fa fa-edit "></i></a>
                                <button id="btn_{{ $key->id }}" class="btn btn-primary btn-sm m-1"
                                    style="display: none"><i class="fa fa-save "></i></button>


                                <br>
                                <a id="hide_{{ $key->id }}" onclick="
                                document.getElementById('btn_{{ $key->id }}').style.display ='none';
                                document.getElementById('show_{{ $key->id }}').style.display ='block';
                                document.getElementById('hide_{{ $key->id }}').style.display ='none';
                                document.getElementById('inp_cont{{ $key->id }}').setAttribute('readonly',true);
                                document.getElementById('inp_name{{ $key->id }}').setAttribute('readonly',true);
                                " class="btn btn-danger btn-sm m-1" style="display: none"><i
                                        class="fa fa-times "></i></a>
                            </div>
                            <input class="form-control" type="hidden" name="id" value="{{ $key->id }}" readonly
                                required />


                            <input id="inp_name{{ $key->id }}" class="form-control" type="text" name="name"
                                value="{{ $key->name }}" readonly />
                            <input id="inp_cont{{ $key->id }}" class="form-control" type="text" name="content"
                                value="{{ $key->content }}" readonly />






                            <div>
                                <label class="switch">
                                    <input type="checkbox" id="state_check" name="state_check" value="{{ $key->id }}"
                                        @if ($key->state == 1) checked @endif
                                    onclick="change_state('{{ url(App::getLocale() . '/admin/phonemail/state/' .
                                    $key->id) }}' , {{ $key->id }})">
                                    <span class="slider round"></span>
                                </label>
                                <i class="fa   fa-phone bg-info   m-4 text-white  p-2 rounded"></i>
                            </div>




                        </form>
                        @endif

                        @endforeach

                    </div>
                    <div class="col-md-6">
                        @foreach ($data as $key)
                        @if($key->type == 'M')
                        <form
                            class="form_edit p-1 rounded bg-white m-4  border d-flex align-items-center justify-content-between"
                            action="{{ url(App::getLocale() . '/admin/phonemail/edit')}}" method="POST">
                            @csrf
                            <div>


                                <a id="show_{{ $key->id }}" onclick="
                                document.getElementById('btn_{{ $key->id }}').style.display ='block';
                                document.getElementById('show_{{ $key->id }}').style.display ='none';
                                document.getElementById('hide_{{ $key->id }}').style.display ='block';
                                document.getElementById('inp_cont{{ $key->id }}').removeAttribute('readonly');
                                document.getElementById('inp_name{{ $key->id }}').removeAttribute('readonly');

                                " class="btn btn-success btn-sm m-1 text-white"><i class="fa fa-edit "></i></a>
                                <button id="btn_{{ $key->id }}" class="btn btn-primary btn-sm m-1"
                                    style="display: none"><i class="fa fa-save "></i></button>


                                <br>
                                <a id="hide_{{ $key->id }}" onclick="
                                document.getElementById('btn_{{ $key->id }}').style.display ='none';
                                document.getElementById('show_{{ $key->id }}').style.display ='block';
                                document.getElementById('hide_{{ $key->id }}').style.display ='none';
                                document.getElementById('inp_cont{{ $key->id }}').setAttribute('readonly',true);
                                document.getElementById('inp_name{{ $key->id }}').setAttribute('readonly',true);
                                " class="btn btn-danger btn-sm m-1" style="display: none"><i
                                        class="fa fa-times "></i></a>
                            </div>
                            <input class="form-control" type="hidden" name="id" value="{{ $key->id }}" readonly
                                required />
                            <input id="inp_name{{ $key->id }}" class="form-control" type="text" name="name" required
                                value="{{ $key->name }}" readonly />
                            <span class="name-error text-danger"></span>

                            <input id="inp_cont{{ $key->id }}" class="form-control" type="text" name="content" required
                                value="{{ $key->content }}" readonly />
                            <span class="content-error text-danger"></span>




                            <div>
                                <label class="switch">
                                    <input type="checkbox" id="state_check" name="state_check" value="{{ $key->id }}"
                                        @if ($key->state == 1) checked @endif
                                    onclick="change_state('{{ url(App::getLocale() . '/admin/phonemail/state/' .
                                    $key->id) }}' , {{ $key->id }})">
                                    <span class="slider round"></span>
                                </label>
                                <i class="fa   fa-at bg-warning   m-4 text-white  p-2 rounded"></i>
                            </div>




                        </form>
                        @endif

                        @endforeach

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
<script src="{{ URL(asset('build/assets/js/page/phonemail.js')) }}"></script>



</html>
@endsection
