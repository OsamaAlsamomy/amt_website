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
            <h4 class="mb-0"> {{trans('main_trans.users')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('main_trans.user_manage')}}</a>
                </li>
                <li class="breadcrumb-item active">{{trans('main_trans.users')}}</li>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
                                <th>{{ trans('main_trans.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($data as $key )
                            <th>{{$i++}}</th>
                            <th>{{ $key->name }}</th>
                            <th>{{ $key->email }}</th>
                            <th>
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

                            </th>
                            <th>
                                <label class="switch">
                                    <input type="checkbox" id="state_check" name="state_check" value="{{$key->id}}" @if($key->state == 1)

                                    checked
                                    @endif

                                    >
                                    <span class="slider round"></span>
                                </label>
                                <input type="text" id="uID" value="{{$key->id}}">


                            </th>
                            <th>{{ $key->created_at }}</th>
                            <th>{{ $key->created_by }}</th>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('users_trans.add_user') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="mr-sm-2">{{ trans('users_trans.user_name') }}
                                :</label>
                            <input id="name" type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="mr-sm-2">{{ trans('main_trans.email') }}
                                :</label>
                            <input type="text" class="form-control" name="emil" id="email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="password" class="mr-sm-2">{{ trans('users_trans.password') }}
                                :</label>
                            <input id="password" type="text" name="password" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="re_password" class="mr-sm-2">{{ trans('users_trans.re_password') }}
                                :</label>
                            <input type="text" class="form-control" name="re_password" id="re_password">
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


<!-- row closed -->
@endsection
@section('js')
<script>
$(document).ready(function(){


$('#state_check').on('change', function(event){
    var Uid = $(this).val();
    alert(Uid)

    $.ajax({
        url: '{{url(App::getLocale().'/admin/users/state')}}',
        method: 'GET',
        data: JSON.stringify({ id: Uid}),
        dataType: 'JSON',
        contentType: 'application/json',
        cache: false,
        processData: false,
        success:function(response)
        {

            alert(response.success)
        },
        error: function(response) {
        }
    });
});

});
</script>
@endsection
