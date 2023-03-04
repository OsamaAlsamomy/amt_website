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
            <h4 class="mb-0"> {{ trans('main_trans.users') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('main_trans.user_manage') }}</a>
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
                                <th>{{ trans('main_trans.add_by') }}</th>
                                <th>{{ trans('main_trans.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $i = 1 @endphp
                            @foreach ($data as $key)
                                <tr>
                                    <th>{{ $i++ }}</th>
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
                                            <input type="checkbox" id="state_check" name="state_check"
                                                value="{{ $key->id }}"
                                                @if ($key->state == 1) checked @endif>
                                            <span class="slider round"></span>
                                        </label>


                                    </th>
                                    <th>{{ $key->created_at }}</th>
                                    <th>{{ $key->created }}</th>
                                    <th></th>
                                </tr>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ url(App::getLocale() . '/admin/users/create') }}" method="POST" id="form_add">
                    @csrf
                    <div class="alert alret-sucsses">
                        <p id="alert_sucsses"></p>
                    </div>
                    <div class="alert alret-danger">
                        <p id="alert_error"></p>
                    </div>
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
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('main_trans.cancel') }}</button>
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
    $(document).ready(function() {


        $('#state_check').on('change', function(event) {
            var Uid = $(this).val();
            alert(Uid)

            $.ajax({
                url: '{{ url(App::getLocale() . '/admin/users/state') }}',
                method: 'GET',
                data: JSON.stringify({
                    id: Uid
                }),
                dataType: 'JSON',
                contentType: 'application/json',
                cache: false,
                processData: false,
                success: function(response) {

                    alert(response.success)
                },
                error: function(response) {
                    alert(response.error)

                }
            });
        });



    });
</script>

<script>
    // $("#form_add").on('submit', function (e) {

    //     e.preventDefault();

    //     $.ajax({
    //         url:$(this).attr('action'),
    //         method: $(this).attr('method'),
    //         data: new FormData(this),
    //         dataType: 'JSON',
    //         contentType: 'application/json',
    //         cache: false,
    //         processData: false,
    //         success:function(response)
    //         {
    //             alert(response.success)
    //         },
    //         error: function(response) {

    //         }
    //     });
    // });



    var i = 0;
    $("#form_add").on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            success: function(data) {
                if (data.status == 0) {

                    $('span.name-error').text('');
                    $('span.email-error').text('');
                    $('span.password-error').text('');
                    $('span.password_confirmation-error').text('');
                    $('span.rool-error').text('');


                    $.each(data.error, function(prefix, val) {
                        $('span.' + prefix + '-error').text('');
                        $('span.' + prefix + '-error').text(val[0]);
                    });
                } else if (data.status == 1) {

                    $('#alert_sucsses').text(data.success);
                    i++;
                    $('span.name-error').text('');
                    $('span.email-error').text('');
                    $('span.password-error').text('');
                    $('span.password_confirmation-error').text('');
                    $('span.rool-error').text('');
                    // setTimeout(function () {

                    //     location.reload(true);
                    //   }, 2000);
                    // console.log(data.data);

                    // Swal.fire({
                    //     position: 'center',
                    //     icon: 'success',
                    //     title: 'عملية ناجحة',
                    //     text: data.msg,
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })

                    // $('.swal2-container').css('z-index', '10000')
                } else if (data.status == 2) {
                    $('span.name-error').text('');
                    $('span.email-error').text('');
                    $('span.password-error').text('');
                    $('span.password_confirmation-error').text('');
                    $('span.rool-error').text('');

                    $('#alert_error').text(data.success);


                    // Swal.fire({
                    //     icon: 'error',
                    //     title: 'عملية فاشلة',
                    //     text: data.msg,

                    // })
                    // $('.swal2-container').css('z-index', '10000')

                }
            }

        })
    });

    $('#btn_close').on('click', function() {
        if (i != 0) {
            i = 0;
            setTimeout(function() {

                location.reload(true);
            }, 300);

        }
    });
</script>

</html>
@endsection
