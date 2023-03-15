<footer class="footer style-1 position-relative overflow-hidden">
    <div class="footer-top style-1 position-relative overflow-hidden">
        <div class="container">
            <div class="row gutter-30">
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="800ms">
                    <div id="medimall_about-4" class="footer-widget widget_medimall_about">
                        <div class="logo logo-light"><a href="index.html"><img width="227" height="51"
                                    src="{{url(asset($company->logo))}}" class="attachment-full size-full wp-post-image"
                                    alt="" loading="lazy" /></a>
                        </div>
                        <div class="logo logo-dark"><a href="index.html"></a></div>
                        <p class="text-1">{{$company->desc}}</p>
                        <div class="schedule-info-box">
                            <ul class="schedule-list-1">
                                @php
                                    $phones = DB::table('phnemail')->where('state',1)->where('type','P')->get();
                                @endphp
                                @foreach ($phones as $key)
                                <li>{{$key->name}} : <span> {{$key->content}}</span></li>
                                @endforeach

                            </ul>
                            <ul class="schedule-list-1">
                                @php
                                    $phones = DB::table('phnemail')->where('state',1)->where('type','M')->get();
                                @endphp
                                @foreach ($phones as $key)
                                <li>{{$key->name}} : <span> {{$key->content}}</span></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-2 col-md-6 wow fadeInUp d-flex justify-content-xl-center justify-content-start"
                    data-wow-delay="400ms" data-wow-duration="800ms">
                    <div id="nav_menu-6" class="footer-widget widget_nav_menu">
                        <h3 class="footer-widget-title">Information</h3>
                        <div class="menu-information-container">
                            <ul id="menu-information" class="menu">
                                <li id="menu-item-82"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-82">
                                    <a href="#">Delivery</a>
                                </li>
                                <li id="menu-item-83"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-83">
                                    <a href="#">About Us</a>
                                </li>
                                <li id="menu-item-84"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-84">
                                    <a href="#">Secure Payment</a>
                                </li>
                                <li id="menu-item-85"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-85">
                                    <a href="#">Contact Us</a>
                                </li>
                                <li id="menu-item-86"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-86">
                                    <a href="#">Sitemap</a>
                                </li>
                                <li id="menu-item-87"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-87">
                                    <a href="#">Stores</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 wow fadeInUp d-flex justify-content-xl-center justify-content-start"
                    data-wow-delay="600ms" data-wow-duration="800ms">
                    <div id="nav_menu-8" class="footer-widget widget_nav_menu">
                        <h3 class="footer-widget-title">Custom Links</h3>
                        <div class="menu-custom-links-container">
                            <ul id="menu-custom-links" class="menu">
                                <li id="menu-item-88"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-88">
                                    <a href="#">Legal Notice</a>
                                </li>
                                <li id="menu-item-89"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-89">
                                    <a href="#">Prices Drop</a>
                                </li>
                                <li id="menu-item-90"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-90">
                                    <a href="#">New Products</a>
                                </li>
                                <li id="menu-item-91"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-91">
                                    <a href="#">Best Sales</a>
                                </li>
                                <li id="menu-item-92"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-92">
                                    <a href="#">Login</a>
                                </li>
                                <li id="menu-item-93"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-93">
                                    <a href="my-account/index.html">My account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="800ms" data-wow-duration="800ms">
                    <div id="text-4" class="footer-widget widget_text">
                        <h3 class="footer-widget-title">Newsletter</h3>
                        <div class="textwidget">
                            <p>You may unsubscribe at any moment. For that purpose, please find our contact.</p>
                        </div>
                    </div>
                    <div id="text-5" class="footer-widget widget_text">
                        <div class="textwidget">
                            <div class='fluentform fluentform_wrapper_2'>
                                <form data-form_id="2" id="fluentform_2"
                                    class="frm-fluent-form fluent_form_2 ff-el-form-top ff_form_instance_2_1 ff-form-loading"
                                    data-form_instance="ff_form_instance_2_1" method="POST">
                                    <fieldset style="border: none!important;margin: 0!important;padding: 0!important;background-color: transparent!important;
                         box-shadow: none!important;outline: none!important;">
                                        <legend class="ff_screen_reader_title"
                                            style="margin: 0!important;padding: 0!important;height: 0!important;text-indent: -999999px;width: 0!important;">
                                            Footer Newsletter</legend><input type='hidden'
                                            name='__fluent_form_embded_post_id' value='63' /><input type="hidden"
                                            id="_fluentform_2_fluentformnonce" name="_fluentform_2_fluentformnonce"
                                            value="c7625a62ad" /><input type="hidden" name="_wp_http_referer"
                                            value="/demo/wordpress/themes/medimall/" />
                                        <div data-name="ff_cn_id_1"
                                            class='ff-t-container ff-column-container ff_columns_total_2  '>
                                            <div class='ff-t-cell ff-t-column-1' style='flex-basis: 50%;'></div>
                                            <div class='ff-t-cell ff-t-column-2' style='flex-basis: 50%;'></div>
                                        </div>
                                        <div data-name="ff_cn_id_2"
                                            class='ff-t-container ff-column-container ff_columns_total_1  '>
                                            <div class='ff-t-cell ff-t-column-1' style='flex-basis: 100%;'>
                                                <div class='ff-el-group rt-subs-group'>
                                                    <div class='ff-el-input--content'><input type="email" name="email"
                                                            id="ff_2_email" class="ff-el-form-control rt-form-control"
                                                            placeholder="Enter your mail" data-name="email"
                                                            aria-invalid="false" aria-required=true></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-name="ff_cn_id_3"
                                            class='ff-t-container ff-column-container ff_columns_total_1  '>
                                            <div class='ff-t-cell ff-t-column-1' style='flex-basis: 100%;'>
                                                <div
                                                    class='ff-el-group ff-text-left ff_submit_btn_wrapper ff_submit_btn_wrapper_custom'>
                                                    <button
                                                        class="ff-btn ff-btn-submit ff-btn-md rt-submit-btn-1 ff_btn_style wpf_has_custom_css"
                                                        type="submit" name="custom_submit_button-2_1"
                                                        data-name="custom_submit_button-2_1">Submit Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                                <div id='fluentform_2_errors'
                                    class='ff-errors-in-stack ff_form_instance_2_1 ff-form-loading_errors ff_form_instance_2_1_errors'>
                                </div>
                            </div>
                            <script>
                                window.fluent_form_ff_form_instance_2_1 = { "id": "2", "settings": { "layout": { "labelPlacement": "top", "helpMessagePlacement": "with_label", "errorMessagePlacement": "inline", "asteriskPlacement": "asterisk-right" }, "restrictions": { "denyEmptySubmission": { "enabled": false } } }, "form_instance": "ff_form_instance_2_1", "form_id_selector": "fluentform_2", "rules": { "email": { "required": { "value": true, "message": "This field is required" }, "email": { "value": true, "message": "This field must contain a valid email" } } } };
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom style-1">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7">
                    <div class="row gutter-15">
                        <div class="col-md-6 wow fadeInUp text-center" data-wow-delay="200ms" data-wow-duration="800ms">
                            <p class="copy-text mb-0">2023 &copy; all right reserved by <a target="_blank"
                                    rel="nofollow" href="#">RadiusTheme</a></p>
                        </div>
                        <div class="col-md-6 wow fadeInUp text-center text-xl-end" data-wow-delay="400ms"
                            data-wow-duration="800ms">
                            <div class="payments">
                                <img width='286' height='23' src='wp-content/themes/medimall/assets/img/payments.png'
                                    alt='Medimall'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
