<!-- jquery -->
<script src="{{ URL::asset('build/assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('build/assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">
    var plugin_path = '{{asset('/build/assets/js')}}/';

</script>

<!-- chart -->
<script src="{{ URL::asset('build/assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('build/assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('build/assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('build/assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('build/assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('build/assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('build/assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('build/assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('build/assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('build/assets/js/custom.js') }}"></script>
<script>

$("#form_password").on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        data: new FormData(this),
        processData: false,
        dataType: 'json',
        contentType: false,
        success: function (data) {
            if (data.status == 0) {
                $.each(data.error, function (prefix, val) {
                    $('span.' + prefix + '-error').text('');
                    $('span.' + prefix + '-error').text(val[0]);
                });
            } else if (data.status == 1) {
                $('span.password-error').text('');
                $('span.old_pass-error').text('');
                $('span.password_confirmation-error').text('');
                document.getElementById("form_password").reset();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: data.success,

                    showConfirmButton: false,
                    timer: 2000
                })
            } else if (data.status == 2) {
                $('span.password-error').text('');
                $('span.old_pass-error').text('');
                $('span.password_confirmation-error').text('');


                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: data.error,
                    text: data.error,
                    showConfirmButton: true,

                })


            }
        }

    })
});
</script>
