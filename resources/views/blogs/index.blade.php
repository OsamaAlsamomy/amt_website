@extends('layouts.master')
@section('css')

@section('title')
empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.blog') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.website_manage')
                        }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('main_trans.blog') }}</li>
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
                    {{ trans('blogs_trans.add_blog') }}
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
                                            value="{{ $key->id }}" @if ($key->state == 1) checked @endif>
                                        <span class="slider round"></span>
                                    </label>


                                </td>
                                <td>{{ $key->created_at }}</td>
                                <td>{{ $key->created }}</td>
                                <td>
                                    </th>
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
                    {{ trans('users_trans.add_user') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ url(App::getLocale() . '/admin/blogs/create') }}" method="POST" id="form_add">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="mr-sm-2">{{ trans('blogs_trans.blog_title') }}
                                :</label>
                            <input id="name" type="text" name="name" class="form-control">
                            <span class="name-error text-danger"></span>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="password" class="mr-sm-2">{{ trans('blogs_trans.blog_title') }}
                                :</label>
                            <input id="image" type="file" name="image" class="form-control input_img">
                            <span class="image-error text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <img src="" alt="" class="blog_image img-fluid">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="desc" class="mr-sm-2">{{ trans('blogs_trans.blog_title') }}
                                :</label>
                            <textarea name="desc" id="ck-blog_content" cols="30" rows="10" class=" form-control"  data-parsley-class-handler="#lnWrapper">

                           </textarea>
                            <span class="desc-error text-danger"></span>

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
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    data-keyboard="false" data-backdrop="static" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('users_trans.edit_use') }}
                    <span id="ed_title"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ url(App::getLocale() . '/admin/users/edit') }}" method="POST" id="form_edit">
                    @csrf
                    <input type="hidden" name="id" id="ed_id">
                    <span class="ed_id-error text-danger"></span>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="mr-sm-2">{{ trans('users_trans.user_name') }}
                                :</label>
                            <input id="ed_name" type="text" name="name" class="form-control">
                            <span class="ed_name-error text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="mr-sm-2">{{ trans('main_trans.email') }}
                                :</label>
                            <input type="text" class="form-control" name="email" id="ed_email">
                            <span class="ed_email-error text-danger"></span>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="password" class="mr-sm-2">{{ trans('users_trans.password') }}
                                :</label>
                            <input id="ed_password" type="text" name="password" class="form-control">
                            <span class="ed_password-error text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="mr-sm-2">{{ trans('users_trans.re_password') }}
                                :</label>
                            <input type="text" class="form-control" name="password_confirmation"
                                id="ed_password_confirmation">
                            <span class="ed_password_confirmation-error text-danger"></span>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="roll" class="mr-sm-2">{{ trans('main_trans.roll') }}
                                :</label>
                            <select name="roll" id="ed_roll" class="form-control form-control-sm py-1">
                                <option value="S">{{ trans('users_trans.s_admin') }}</option>
                                <option value="A">{{ trans('users_trans.admin') }}</option>
                                <option value="U">{{ trans('users_trans.user') }}</option>
                            </select>
                            <span class="ed_roll-error text-danger"></span>

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
                    {{ trans('users_trans.delete_user') }}

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ url(App::getLocale() . '/admin/users/delete') }}" method="POST" id="form_delete">
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
<script src="{{URL::asset('build/assets/ckeditor/ckeditor.js')}}"></script>
<script src="{{URL::asset('build/assets/js/page/blogs.js')}}"></script>

<script>


            CKEDITOR.replace( 'ck-blog_content' );
</script>
<script>
    const image_input = document.querySelector(".input_img");
    image_input.addEventListener("change", function() {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            const uploaded_image = reader.result;
            document.querySelector(".blog_image").src = uploaded_image;


        })
        reader.readAsDataURL(this.files[0]);
    })
</script>

</html>
@endsection
