@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{URL(asset('build/assets/sweetalert2/sweetalert2.min.css'))}}" />

@section('title')
المستخدمين
@stop
@endsection
@section('user')
bg-success
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.users') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.user_manage') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('main_trans.users') }}</li>
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
                    {{ trans('users_trans.add_user') }}
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover  p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('main_trans.name') }}</th>
                                <th>{{ trans('main_trans.email') }}</th>
                                <th>{{ trans('main_trans.roll') }}</th>
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
                                <td>{{ $key->email }}</td>
                                <td>

                                    @switch($key->type)
                                    @case('S')
                                    {{ trans('users_trans.s_admin') }}
                                    @break

                                    @case('A')
                                    {{ trans('users_trans.admin') }}
                                    @break

                                    @case('U')
                                    {{ trans('users_trans.user') }}
                                    @break

                                    @default
                                    @endswitch()



                                </td>
                                <td>
                                    @if( $key->created != null)
                                    <label class="switch">
                                        <input type="checkbox" id="state_check" name="state_check"
                                            value="{{ $key->id }}" @if ($key->state == 1) checked @endif onclick="change_state('{{url(App::getLocale() . '/admin/users/state/'.$key->id)}}' , {{$key->id}})">
                                        <span class="slider round"></span>
                                    </label>
                                    @endif

                                </td>
                                <td>{{ $key->created_at }}</td>
                                <td>{{ $key->created }}</td>
                                <td>
                                    @if( $key->created != null)
                                    <button class="btn btn-danger btn-sm pt-2 bx-1"
                                        title="{{trans('main_trans.delete')}}" data-toggle="modal"
                                        data-target="#delete_modal" data-id="{{$key->id}}" data-name="{{$key->name}}">
                                        <i class="ti-trash"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm pt-2 bx-1" title="{{trans('main_trans.edit')}}"
                                        data-toggle="modal" data-target="#edit_modal" data-id="{{$key->id}}"
                                        data-name="{{$key->name}}" data-email="{{$key->email}}"
                                        data-roll="{{$key->type}}">
                                        <i class="ti-pencil-alt"></i>
                                    </button>
                                    @endif

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
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    data-keyboard="false" data-backdrop="static" aria-hidden="false">
    <div class="modal-dialog" role="document">
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
                <form action="{{ url(App::getLocale() . '/admin/users/create') }}" method="POST" id="form_add">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="mr-sm-2">{{ trans('users_trans.user_name') }}
                                :</label>
                            <input id="name" type="text" name="name" class="form-control">
                            <span class="name-error text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="mr-sm-2">{{ trans('main_trans.email') }}
                                :</label>
                            <input type="text" class="form-control" name="email" id="email">
                            <span class="email-error text-danger"></span>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="password" class="mr-sm-2">{{ trans('users_trans.password') }}
                                :</label>
                            <input id="password" type="text" name="password" class="form-control">
                            <span class="password-error text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="mr-sm-2">{{ trans('users_trans.re_password') }}
                                :</label>
                            <input type="text" class="form-control" name="password_confirmation"
                                id="password_confirmation">
                            <span class="password_confirmation-error text-danger"></span>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="roll" class="mr-sm-2">{{ trans('main_trans.roll') }}
                                :</label>
                            <select name="roll" id="roll" class="form-control form-control-sm py-1">
                                <option value="S">{{ trans('users_trans.s_admin') }}</option>
                                <option value="A">{{ trans('users_trans.admin') }}</option>
                                <option value="U">{{ trans('users_trans.user') }}</option>
                            </select>
                            <span class="roll-error text-danger"></span>

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
<script src="{{URL(asset('build/assets/sweetalert2/sweetalert2.min.js'))}}"></script>
<script src="{{URL(asset('build/assets/js/page/users.js'))}}"></script>



</html>
@endsection
