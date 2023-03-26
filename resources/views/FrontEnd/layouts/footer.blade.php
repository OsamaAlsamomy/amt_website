
<script src="{{ URL::asset('build/assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->

<script src='{{url(asset('build/wp-includes/js/wp-util.min6a4d.js?ver=6.1.1' ))}}' id='wp-util-js'></script>
<script src='{{url(asset('build/wp-includes/js/imagesloaded.mineda1.js?ver=4.1.4' ))}}' id='imagesloaded-js'></script>
<script type='text/javascript' id='rtwpvg-js-extra'>
    /* <![CDATA[ */
    var rtwpvg = { "reset_on_variation_change": "1", "enable_zoom": "1", "enable_lightbox": "1", "lightbox_image_click": "", "enable_thumbnail_slide": "1", "thumbnails_columns": "4", "is_vertical": "", "thumbnail_position": "bottom", "is_mobile": "", "gallery_width": "100", "gallery_md_width": "0", "gallery_sm_width": "720", "gallery_xsm_width": "320" };
/* ]]> */
</script>





<script src='{{url(asset('build/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min9156.js?ver=7.3.0'))}}'
    id='wc-add-to-cart-variation-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/popper.min4963.js?ver=1.1'))}}' id='popper-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/bootstrap.min4963.js?ver=1.1'))}}' id='bootstrap-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/appear.min4963.js?ver=1.1'))}}' id='appear-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/slick.min4963.js?ver=1.1'))}}' id='slick-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/magnific-popup.min4963.js?ver=1.1'))}}'
    id='jquery-magnific-popup-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/theia-sticky-sidebar.min4963.js?ver=1.1'))}}'
    id='theia-sticky-sidebar-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/wow.min4963.js?ver=1.1'))}}' id='wow-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/main4963.js?ver=1.1'))}}' id='medimall-main-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/isotope.pkgd.min4963.js?ver=1.1'))}}' id='isotope-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/countdown.min4963.js?ver=1.1'))}}' id='jquery-countdown-js'></script>
<script src='{{url(asset('build/wp-content/plugins/elementor/assets/lib/swiper/swiper.min48f5.js?ver=5.3.6'))}}' id='swiper-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/swiper-func4963.js?ver=1.1'))}}' id='swiper-func-js'></script>
<script src='{{url(asset('build/wp-content/themes/medimall/assets/js/tween-max4963.js?ver=1.1'))}}' id='tween-max-js'></script>



<script src='{{url(asset('build/wp-content/plugins/fluentform/public/js/form-submission2a8a.js?ver=4.3.24'))}}'
    id='fluent-form-submission-js'></script>
<script src='{{url(asset('build/wp-content/plugins/woocommerce/assets/js/zoom/jquery.zoom.min355e.js?ver=1.7.21-wc.7.3.0'))}}'
    id='zoom-js'></script>
<script src='{{url(asset('build/wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe.min0eed.js?ver=4.1.1-wc.7.3.0'))}}'
    id='photoswipe-js'></script>
<script
    src='{{url(asset('build/wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe-ui-default.min0eed.js?ver=4.1.1-wc.7.3.0'))}}'
    id='photoswipe-ui-default-js'></script>



<script src='{{url(asset('build/wp-content/plugins/woocommerce/assets/js/frontend/single-product.min9156.js?ver=7.3.0'))}}'
    id='wc-single-product-js'></script>
<script src='{{url(asset('build/wp-content/plugins/elementor/assets/js/webpack.runtime.minf416.js?ver=3.11.0'))}}'
    id='elementor-webpack-runtime-js'></script>
<script src='{{url(asset('build/wp-content/plugins/elementor/assets/js/frontend-modules.minf416.js?ver=3.11.0'))}}'
    id='elementor-frontend-modules-js'></script>
<script src='{{url(asset('build/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js?ver=4.0.2'))}}'
    id='elementor-waypoints-js'></script>
<script src='{{url(asset('build/wp-includes/js/jquery/ui/core.min3f14.js?ver=1.13.2'))}}'  id='jquery-ui-core-js'></script>
<script src='{{url(asset('build/wp-content/plugins/elementor/assets/lib/share-link/share-link.minf416.js?ver=3.11.0'))}}'
    id='share-link-js'></script>
<script src='{{url(asset('build/wp-content/plugins/elementor/assets/lib/dialog/dialog.mind227.js?ver=4.9.0'))}}'
    id='elementor-dialog-js'></script>

<script src='{{url(asset('build/wp-content/plugins/elementor/assets/js/frontend.minf416.js?ver=3.11.0'))}}'
    id='elementor-frontend-js'></script>
<script src='{{url(asset('build/wp-content/plugins/elementor/assets/js/preloaded-modules.minf416.js?ver=3.11.0'))}}'
    id='preloaded-modules-js'></script>

    <script src="{{ URL(asset('build/assets/sweetalert2/sweetalert2.min.js')) }}"></script>
    <script>

        $("#form_sub").on('submit', function (e) {
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
                    var error = '';
                    $.each(data.error, function (prefix, val) {
                        error += val[0];

                    });
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: error,
                        showConfirmButton: false,
                        timer: 2000
                    })
                } else if (data.status == 1) {



                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.success,

                        showConfirmButton: false,
                        timer: 2000
                    })
                    document.getElementById("form_sub").reset();




                } else if (data.status == 2) {


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

    $("#form_message").on('submit', function (e) {
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
                    var error = '';
                    $.each(data.error, function (prefix, val) {
                        error += val[0];

                    });
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: error,
                        showConfirmButton: false,
                        timer: 2000
                    })
                } else if (data.status == 1) {



                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.success,

                        showConfirmButton: false,
                        timer: 2000
                    })
                    document.getElementById("form_message").reset();




                } else if (data.status == 2) {


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


    $("#form_comment").on('submit', function (e) {
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
                    var error = '';
                    $.each(data.error, function (prefix, val) {
                        error += val[0];

                    });
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: error,
                        showConfirmButton: false,
                        timer: 2000
                    })
                } else if (data.status == 1) {

setTimeout(function () {

                    location.reload(true);
                }, 2000);


                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.success,

                        showConfirmButton: false,
                        timer: 2000
                    })
                    document.getElementById("form_message").reset();




                } else if (data.status == 2) {


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

