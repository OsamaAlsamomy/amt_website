@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ URL(asset('build/assets/sweetalert2/sweetalert2.min.css')) }}" />

@section('title')
empty
@stop
@endsection
@section('company')
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
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn_add" onclick="edit_company()">
                    {{ trans('comp_trans.edit_comp') }}
                </button>
                <form action="{{ url(App::getLocale() . '/admin/company/edit') }}" method="POST" id="form_edit"
                    enctype="multipart/form-data">
                    <button type="submit" class="btn btn-success btn_edit" >
                        {{ trans('main_trans.save') }}
                    </button>
                    <button type="button" class="btn btn-secondary btn_edit" onclick="refresh()">
                        {{ trans('main_trans.cancel') }}
                    </button>

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="{{url(asset($data->logo))}}" alt=""
                                        class="logo_image img-fluid mb-3 mt-3 w-50">

                                    <div>
                                        <label for="logo" class="mr-sm-2">{{ trans('comp_trans.comp_logo') }}
                                            :</label>
                                        <input id="logo" type="file" name="logo" class=" input_img">
                                        <span class="logo-error text-danger"></span>
                                    </div>


                                </div>

                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="{{url(asset($data->icon))}}" alt=""
                                        class="icon_image img-fluid mb-3 w-25">
                                    <div>
                                        <label for="icon" class="mr-sm-2">{{ trans('comp_trans.comp_icon') }}
                                            :</label>
                                        <input id="icon" type="file" name="icon" class="input_img">
                                        <span class="icon-error text-danger"></span>
                                    </div>


                                </div>

                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="name" class="mr-sm-2">{{ trans('comp_trans.comp_name') }}
                                        :</label>
                                    <input id="name" type="text" name="name" value="{{$data->name}}"
                                        class="form-control">
                                    <span class="name-error text-danger"></span>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="desc" class="mr-sm-2">{{ trans('comp_trans.comp_desc') }}
                                        :</label>
                                    <input id="desc" type="text" name="desc" value="{{$data->desc}}"
                                        class="form-control">
                                    <span class="desc-error text-danger"></span>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="address" class="mr-sm-2">{{ trans('comp_trans.comp_address') }}
                                        :</label>
                                    <input id="address" type="text" name="address" value="{{$data->address}}"
                                        class="form-control">
                                    <span class="address-error text-danger"></span>
                                </div>
                            </div>
                            <br>
                            <label for="location" class="mr-sm-2 mb-2">{{ trans('comp_trans.comp_loc') }}</label>

                            <div class="row">

                                <div class="col-md-4">
                                    <label for="long" class="mr-sm-2">{{ trans('comp_trans.comp_long') }}
                                        :</label>
                                    <input id="long" type="text" name="long" value="{{$data->long}}"
                                        class="form-control">
                                    <span class="long-error text-danger"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="lat" class="mr-sm-2">{{ trans('comp_trans.comp_lat') }}
                                        :</label>
                                    <input id="lat" type="text" name="lat" value="{{$data->lat}}" class="form-control">
                                    <span class="lat-error text-danger"></span>
                                </div>
                            </div>
                            <br>



                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="about" class="mr-sm-2">{{ trans('comp_trans.comp_about') }}
                                :</label>
                            <textarea name="about" id="ck_about" cols="30" rows="10" class=" form-control">
                                {!! $data->about !!}
                            </textarea>
                            <div class="about_view">
                                {!! $data->about !!}
                            </div>

                            <span class="about-error text-danger"></span>
                        </div>
                    </div>


                </form>
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
