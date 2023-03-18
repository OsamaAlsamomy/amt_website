@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ URL(asset('build/assets/sweetalert2/sweetalert2.min.css')) }}" />

@section('title')
    {{ trans('main_trans.product') }}
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
            <h4 class="mb-0"> {{ trans('main_trans.product') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('main_trans.website_manage') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('main_trans.product') }}</li>
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
                    {{ trans('product_trans.add_product') }}
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
                                <th>{{ trans('main_trans.top') }}</th>
                                <th>{{ trans('main_trans.price') }}</th>
                                <th>{{ trans('main_trans.discount') }}</th>
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
                                                value="{{ $key->id }}"
                                                @if ($key->state == 1) checked @endif
                                                onclick="change_state('{{ url(App::getLocale() . '/admin/products/state/' . $key->id) }}' , {{ $key->id }})">
                                            <span class="slider round"></span>
                                        </label>

                                    </td>
                                    <td>
                                        <input type="checkbox" id="state_check" name="state_check" class="form-control"
                                            value="{{ $key->id }}"
                                            @if ($key->top == 1) checked @endif
                                            onclick="change_state('{{ url(App::getLocale() . '/admin/products/top/' . $key->id) }}','{{$key->id}}')">

                                    </td>
                                    <td>${{ $key->price }}</td>
                                    <td>%{{ $key->discount }}</td>



                                    <td>{{ $key->created_at }}</td>
                                    <td>{{ $key->created }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm pt-2 bx-1"
                                            title="{{ trans('main_trans.delete') }}" data-toggle="modal"
                                            data-target="#delete_modal" data-id="{{ $key->id }}"
                                            data-name="{{ $key->name }}">
                                            <i class="ti-trash"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm pt-2 bx-1"
                                            title="{{ trans('main_trans.edit') }}" data-toggle="modal"
                                            data-target="#edit_modal" data-id="{{ $key->id }}"
                                            data-name="{{ $key->name }}" data-desc="{{ $key->desc }}"
                                            data-image="{{ url(asset($key->img)) }}"
                                            data-section="{{ $key->sec_id }}" data-price="{{ $key->price }}"
                                            data-discount="{{ $key->discount }}">
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
                    {{ trans('product_trans.add_product') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url(App::getLocale() . '/admin/products/create') }}" method="POST" id="form_add"
                enctype="multipart/form-data" class="dropzone">

                <div class="modal-body">

                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="mr-sm-2">{{ trans('product_trans.product_name') }}
                                :</label>
                            <input id="name" type="text" name="name" class="form-control" required>
                            <span class="name-error text-danger"></span>
                        </div>
                    </div>
                    <br>

                    <div class="col-md-12 row">
                        <div class="col-md-6">
                            <label for="password" class="mr-sm-2">{{ trans('product_trans.product_img') }}
                                :</label>
                            <input id="image" type="file" name="image" class="form-control input_img" required>
                            <span class="image-error text-danger"></span>
                            <img src="" alt="" class="blog_image img-fluid">

                        </div>

                        <div class="col-md-6">
                            <label for="password" class="mr-sm-2">{{ trans('sections_trans.sec') }}
                                :</label>
                            <select name="section" id="section" class="form-control form-control-sm py-1">
                                <option value="">-- --</option>
                                @php
                                    $sec = DB::table('sections')
                                        ->where('state', 1)
                                        ->get();
                                @endphp
                                @foreach ($sec as $key)
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                @endforeach
                            </select>

                            <span class="section-error text-danger"></span>
                            <br>
                            <div class=" row">
                                <div class="col-md-6">
                                    <label for="price" class="mr-sm-2">{{ trans('main_trans.price') }}
                                        :</label>
                                    <input id="price" type="number" name="price"
                                        class="form-control " required>
                                    <span class="price-error text-danger"></span>

                                </div>

                                <div class="col-md-6">
                                    <label for="discount" class="mr-sm-2">{{ trans('main_trans.discount') }}
                                        :</label>
                                    <p>%<output id="value"></output></p>
                                    <input id="discount" type="range" value="0" min="0"
                                        max="70" step="5" class="form-control" name="discount" />
                                    <span class="discount-error text-danger"></span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <br>






                    <div class="col-md-12">
                        <label for="desc" class="mr-sm-2">{{ trans('product_trans.product_desc') }}
                            :</label>
                        <textarea name="desc" id="ck-product_content" cols="30" rows="2" class=" form-control" required>

                       </textarea>
                        <span class="desc-error text-danger"></span>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('main_trans.cancel') }}</button>
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
                    {{ trans('product_trans.edit_product') }}
                    <span id="ed_title"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url(App::getLocale() . '/admin/products/edit') }}" method="POST" id="form_edit">
                <div class="modal-body">

                    @csrf
                    <input type="hidden" name="id" id="ed_id">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="mr-sm-2">{{ trans('product_trans.product_name') }}
                                :</label>
                            <input id="ed_name" type="text" name="name" class="form-control" required>
                            <span class="ed_name-error text-danger"></span>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="image" class="mr-sm-2">{{ trans('product_trans.product_img') }}
                                :</label>
                            <input id="ed_image" type="file" name="image" class="form-control ed_input_img">
                            <span class="ed_image-error text-danger"></span>
                            <img src="" alt="" class="ed_blog_image img-fluid" id="image_photo">

                        </div>
                        <div class="col-md-6">

                            <label for="password" class="mr-sm-2">{{ trans('sections_trans.sec') }}
                                :</label>
                            <select name="section" id="ed_section" class="form-control form-control-sm py-1">

                                @php
                                    $sec = DB::table('sections')
                                        ->where('state', 1)
                                        ->get();
                                @endphp
                                @foreach ($sec as $key)
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                @endforeach
                            </select>

                            <span class="ed_section-error text-danger"></span>
                            <br>
                            <div class=" row">
                                <div class="col-md-6">
                                    <label for="price" class="mr-sm-2">{{ trans('main_trans.price') }}
                                        :</label>
                                    <input id="ed_price" type="number" name="price"
                                        class="form-control " required>
                                    <span class="price-error text-danger"></span>

                                </div>

                                <div class="col-md-6">
                                    <label for="discount" class="mr-sm-2">{{ trans('main_trans.discount') }}
                                        :</label>
                                    <p>%<output id="ed_value"></output></p>
                                    <input id="ed_discount" type="range" min="0" max="70"
                                        step="5" class="form-control" name="discount" />
                                    <span class="discount-error text-danger"></span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="desc" class="mr-sm-2">{{ trans('product_trans.product_desc') }}
                                :</label>
                            <textarea name="desc" id="ed_desc" cols="30" rows="2" class=" form-control">

                           </textarea>
                            <span class="ed_desc-error text-danger"></span>

                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('main_trans.cancel') }}</button>
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
                <form action="{{ url(App::getLocale() . '/admin/products/delete') }}" method="POST"
                    id="form_delete">
                    @csrf
                    <input type="hidden" name="id" id="de_id">
                    <span class="de_id-error text-danger"></span>

                    <h2 id="de_title"></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('main_trans.cancel') }}</button>
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
<script src="{{ URL::asset('build/assets/js/page/products.js') }}"></script>


</html>
@endsection
