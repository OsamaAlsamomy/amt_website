@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ URL(asset('build/assets/sweetalert2/sweetalert2.min.css')) }}" />

@section('title')
{{ trans('main_trans.section') }}
@stop
@endsection
@section('product')
bg-success
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.section') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.website_manage')
                        }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('main_trans.section') }}</li>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_modal">
                    {{ trans('sections_trans.add_sec') }}
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover  p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('main_trans.name') }}</th>
                                <th>{{ trans('main_trans.state') }}</th>

                                <th>{{ trans('main_trans.created_at') }}</th>
                                <th>{{ trans('main_trans.add_by') }}</th>
                                <th>{{ trans('main_trans.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody id="user_body">

                            @php $i = 1 @endphp
                            @foreach ($data as $key)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $key->name }}</td>


                                <td>
                                    <label class="switch">
                                        <input type="checkbox" id="state_check" name="state_check"
                                            value="{{ $key->id }}" @if ($key->state == 1) checked @endif
                                        onclick="change_state('{{ url(App::getLocale() . '/admin/sections/state/' .
                                        $key->id) }}' , {{ $key->id }})">
                                        <span class="slider round"></span>
                                    </label>

                                </td>

                                <td>{{ $key->created_at }}</td>
                                <td>{{ $key->created }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm pt-2 bx-1"
                                        title="{{ trans('main_trans.delete') }}" data-toggle="modal"
                                        data-target="#delete_modal" data-id="{{ $key->id }}"
                                        data-name="{{ $key->name }}">
                                        <i class="ti-trash"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm pt-2 bx-1" title="{{ trans('main_trans.edit') }}"
                                        data-toggle="modal" data-target="#edit_modal" data-id="{{ $key->id }}"
                                        data-name="{{ $key->name }}" data-desc="{{ $key->desc }}"
                                        data-image="{{ url(asset( $key->img)) }}">
                                        <i class="ti-pencil-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- Add new user Modale --}}
<div class="modal fade bd-example-modal-lg" id="add_modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('sections_trans.add_sec') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url(App::getLocale() . '/admin/sections/create') }}" method="POST" id="form_add"
                enctype="multipart/form-data">

                <div class="modal-body">

                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="mr-sm-2">{{ trans('sections_trans.sec_name') }}
                                :</label>
                            <input id="name" type="text" name="name" class="form-control">
                            <span class="name-error text-danger"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="desc" class="mr-sm-2">{{ trans('sections_trans.sec_desc') }}
                                :</label>
                            <textarea name="desc" id="ck-blog_content" cols="30" rows="2" class=" form-control">

                           </textarea>
                            <span class="desc-error text-danger"></span>

                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password" class="mr-sm-2">{{ trans('sections_trans.sec_img') }}
                                :</label>
                            <input id="image" type="file" name="image" class="form-control input_img">
                            <span class="image-error text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <img src="" alt="" class="blog_image img-fluid">

                        </div>
                    </div>
                    <br>
                    <div class="row">


                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main_trans.cancel')
                        }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('main_trans.save') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- Edit user Modale --}}
<div class="modal fade bd-example-modal-lg" id="edit_modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('sections_trans.edit_sec') }}
                    <span id="ed_title"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url(App::getLocale() . '/admin/sections/edit') }}" method="POST" id="form_edit">
                <div class="modal-body">

                    @csrf
                    <input type="hidden" name="id" id="ed_id">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="mr-sm-2">{{ trans('sections_trans.sec_name') }}
                                :</label>
                            <input id="ed_name" type="text" name="name" class="form-control">
                            <span class="name-error text-danger"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="desc" class="mr-sm-2">{{ trans('sections_trans.sec_desc') }}
                                :</label>
                            <textarea name="desc" id="ed_desc" cols="30" rows="2" class=" form-control">

                           </textarea>
                            <span class="desc-error text-danger"></span>

                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="image" class="mr-sm-2">{{ trans('sections_trans.sec_img') }}
                                :</label>
                            <input id="ed_image" type="file" name="image" class="form-control ed_input_img">
                            <span class="image-error text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <img src="" alt="" class="ed_blog_image img-fluid" id="image_photo">

                        </div>
                    </div>
                    <br>
                    <div class="row">


                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main_trans.cancel')
                        }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('main_trans.save') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- Delete user Modale --}}
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    data-keyboard="false" data-backdrop="static" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('service_trans.delete_serv') }}

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ url(App::getLocale() . '/admin/sections/delete') }}" method="POST" id="form_delete">
                    @csrf
                    <input type="hidden" name="id" id="de_id">
                    <span class="de_id-error text-danger"></span>

                    <h2 id="de_title"></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main_trans.cancel')
                    }}</button>
                <button type="submit" class="btn btn-danger">{{ trans('main_trans.delete') }}</button>
            </div>
            </form>

        </div>
    </div>
</div>


<!-- row closed -->
@endsection
@section('js')
<script src="{{ URL(asset('build/assets/sweetalert2/sweetalert2.min.js')) }}"></script>
<script src="{{ URL::asset('build/assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('build/assets/js/page/sections.js') }}"></script>




</html>
@endsection
