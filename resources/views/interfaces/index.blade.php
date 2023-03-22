@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ URL(asset('build/assets/sweetalert2/sweetalert2.min.css')) }}" />

@section('title')
{{ trans('main_trans.mail') }}
@stop
@endsection
@section('interfaces')
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
                <h5 class="mb-3">{{trans('main_trans.anim_slid')}}</h5>
                <div class="row">
                    <div class="col-md-4">

                        <button class="modal-effect btn btn-outline-primary btn-sm" data-toggle="modal"
                            data-target="#add_modal" data-whatever="@mdo"> {{trans('main_trans.add_slids')}} <i
                                class=" mr-2 fa fa-plus"></i> </button>

                    </div>
                    <div class="col-md-8 row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 p-3">
                            <span class=" rounded-circle bg-primary px-3 py-1"></span>
                            <span class="mr-2"> {{trans('main_trans.slids')}} : 10 / {{ $data->count() }}</span>
                        </div>


                    </div>
                </div>


                <div class="row">
                    @foreach ($data as $key)
                    <div class="col-md-11 col-lg-5 m-2 col-sm-11 ">
                        <div class="rounded border  py-1 px-0  row">
                            <img data-toggle="modal" class="col-2" data-target=".bd-example-modal-lg" title="حذف"
                                data-img="{{ url(asset($key->img)) }}" class="rounded" width="100px"
                                src="{{  url(asset($key->img)) }}" alt="">
                            <div class="col-8">
                                <p>{{ $key->title }}</p>
                                <div class="row">
                                    <p class="col-md-6">{{ $key->created_at }}</p>
                                    <p class="col-md-6">{{ $key->created }}</p>
                                </div>

                            </div>

                            <div class="btn-control col-2  ">
                                <label class="switch ">
                                    <input type="checkbox" id="state_check" name="state_check" value="{{ $key->id }}"
                                        @if ($key->state == 1) checked @endif
                                    onclick="change_state('{{ url(App::getLocale() . '/admin/slid/state/' . $key->id)
                                    }}' , {{ $key->id }})">
                                    <span class="slider round"></span>
                                </label>
                                <button class="modal-effect btn btn-sm btn-success m-1" data-toggle="modal"
                                    data-target="#edit_modal" title="تعديل" data-id="{{ $key->id }}"
                                    data-name="{{ $key->title }}" data-desc="{{ $key->content }}"
                                    data-image="{{url(asset($key->img))  }}" data-url="{{ $key->url }}">
                                    <i class="ti-pencil-alt"></i>
                                </button>


                                <button class="modal-effect btn btn-sm  btn-danger m-1" data-toggle="modal"
                                    data-target="#delete_modal" title="حذف" data-id="{{ $key->id }}"
                                    data-name="{{$key->title}}"><i class="ti-trash"></i>
                                </button>

                            </div>
                            {{-- <div class="dropdown  " style="position: absolute;left:0 ;top:0">
                                <a class="modal-effect btn btn-info btn-sm text-white rounded-circle " type="button"
                                    data-toggle="dropdown"> <i class="fa fa-info px-1"></i></a>
                                <div class="dropdown-menu rounded card " style="width: 250px">
                                    <div class="card-header bg-info text-white p-2">
                                        آخر التحديثات
                                    </div>
                                    <div class="card-body">
                                        الإضافة:
                                        <span>{{ $key->created_at }}</span><br>
                                        التعديل:
                                        <span> {{ $key->updated_at }}</span>
                                        المضيف:
                                        <span>{{ $key->created_by }}</span><br>
                                        المعدل:
                                        <span> {{ $key->updated_by }}</span>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                    @endforeach
                </div>


                <hr>
                <h5 class="mb-3">{{trans('main_trans.adds')}}</h5>
                <form action="{{ url(App::getLocale() . '/admin/slid/adds') }}" method="POST" id="form_adds"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="add1" class="mr-sm-2">{{ trans('main_trans.add1') }}
                                :</label>
                            <input id="add1" type="file" name="add1" class="form-control add1"
                                accept=".png, .jpg, .jpeg , .svg , .gif" >
                            <span class="add1-error text-danger"></span>
                            <img src="{{url(asset($add->add1))}}" alt=""
                                class="add1_image img-fluid img-thumbnail rounded">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-6 text-center">
                            <img src="{{url(asset('build/assets/images/adds/add1.png'))}}" alt=""
                                class="img-fluid img-thumbnail rounded">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="add2" class="mr-sm-2">{{ trans('main_trans.add2') }}
                                :</label>
                            <input id="add2" type="file" name="add2" class="form-control add2"
                                accept=".png, .jpg, .jpeg , .svg , .gif" >
                            <span class="add2-error text-danger"></span>
                            <img src="{{url(asset($add->add2))}}" alt=""
                                class="add2_image img-fluid img-thumbnail rounded">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-6 text-center">
                            <img src="{{url(asset('build/assets/images/adds/add2.png'))}}" alt=""
                                class="img-fluid img-thumbnail rounded">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="add3" class="mr-sm-2">{{ trans('main_trans.add3') }}
                                :</label>
                            <input id="add3" type="file" name="add3" class="form-control add3"
                                accept=".png, .jpg, .jpeg , .svg , .gif" >
                            <span class="add3-error text-danger"></span>
                            <img src="{{url(asset($add->add3))}}" alt=""
                                class="add3_image img-fluid img-thumbnail rounded">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-6 text-center">
                            <img src="{{url(asset('build/assets/images/adds/add3.png'))}}" alt=""
                                class="img-fluid img-thumbnail rounded">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <label for="add4" class="mr-sm-2">{{ trans('main_trans.add4') }}
                                :</label>
                            <input id="add4" type="file" name="add4" class="form-control add4"
                                accept=".png, .jpg, .jpeg , .svg , .gif" >
                            <span class="add4-error text-danger"></span>
                            <img src="{{url(asset($add->add4))}}" alt=""
                                class="add4_image img-fluid img-thumbnail rounded">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-6 text-center">
                            <img src="{{url(asset('build/assets/images/adds/add4.png'))}}" alt=""
                                class="img-fluid img-thumbnail rounded">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <label for="add5" class="mr-sm-2">{{ trans('main_trans.add5') }}
                                :</label>
                            <input id="add5" type="file" name="add5" class="form-control add5"
                                accept=".png, .jpg, .jpeg , .svg , .gif" >
                            <span class="add5-error text-danger"></span>
                            <img src="{{url(asset($add->add5))}}" alt=""
                                class="add5_image img-fluid img-thumbnail rounded">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-6 text-center">
                            <img src="{{url(asset('build/assets/images/adds/add5.png'))}}" alt=""
                                class="img-fluid img-thumbnail rounded">
                        </div>
                    </div>








                    <div class="row px-4">

                        <button type="submit" class="btn btn-success">{{ trans('main_trans.save') }}</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<!-- show image Slide Model -->
<div id="show_img_model" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-content-demo">

            <div class="modal-body_ p-0">
                <img class="rounded" width="100%" id="img_show" src="" alt="">
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
                    {{ trans('main_trans.add_slids') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url(App::getLocale() . '/admin/slid/create') }}" method="POST" id="form_add"
                enctype="multipart/form-data">

                <div class="modal-body">

                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <label for="title" class="mr-sm-2">{{ trans('main_trans.title') }}
                                :</label>
                            <input id="title" type="text" name="title" class="form-control" required>
                            <span class="title-error text-danger"></span>
                            <br>
                            <label for="desc" class="mr-sm-2">{{ trans('main_trans.slid_content') }}
                                :</label>
                            <input id="desc" type="text" name="desc" class="form-control" required>
                            <span class="desc-error text-danger"></span>
                            <label for="url" class="mr-sm-2">{{ trans('main_trans.url') }}
                                :</label>
                            <input id="url" type="text" name="url" class="form-control" required>
                            <span class="desc-error text-danger"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="image" class="mr-sm-2">{{ trans('main_trans.slid_img') }}
                                :</label>
                            <input id="image" type="file" name="image" class="form-control input_img"
                                accept=".png, .jpg, .jpeg , .svg , .gif" required>
                            <span class="image-error text-danger"></span>
                            <img src="" alt="" class="blog_image img-fluid img-thumbnail rounded">
                        </div>
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
                    {{ trans('main_trans.edit_slid') }}
                    <span id="ed_title"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url(App::getLocale() . '/admin/slid/edit') }}" method="POST" id="form_edit">
                <div class="modal-body">

                    @csrf
                    <input type="hidden" name="id" id="ed_id" readonly required>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="title" class="mr-sm-2">{{ trans('main_trans.title') }}
                                :</label>
                            <input id="ed_name" type="text" name="title" class="form-control" required>
                            <span class="ed_title-error text-danger"></span>

                            <label for="desc" class="mr-sm-2">{{ trans('main_trans.slid_content') }}
                                :</label>
                            <input id="ed_desc" type="text" name="desc" class="form-control" required>
                            <span class="ed_desc-error text-danger"></span>

                            <label for="url" class="mr-sm-2">{{ trans('main_trans.url') }}
                                :</label>
                            <input id="ed_url" type="text" name="url" class="form-control" required>
                            <span class="ed_url-error text-danger"></span>



                        </div>

                        <div class="col-md-6">
                            <label for="image" class="mr-sm-2">{{ trans('main_trans.slid_img') }}
                                :</label>
                            <input id="ed_image" type="file" name="image" class="form-control ed_input_img"
                                accept=".png, .jpg, .jpeg , .svg , .gif">
                            <span class="ed_image-error text-danger"></span>
                            <img src="" alt="" class="ed_blog_image img-fluid img-thumbnail rounded" id="image_photo">

                        </div>

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
                    {{ trans('main_trans.delete_slid') }}

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ url(App::getLocale() . '/admin/slid/delete') }}" method="POST" id="form_delete">
                    @csrf
                    <input type="hidden" name="id" id="de_id" readonly required>
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
<script src="{{ URL::asset('build/assets/js/page/slid.js') }}"></script>




</html>
@endsection
