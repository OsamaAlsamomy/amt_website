@extends('FrontEnd.layouts.master')

@section('content')



@php
$company = DB::table('company')->first();
$setting = DB::table('sittings')->first();

@endphp


<!-- sliders sections -->
<div id="content" class="site-content">
    <div class="section_heade inner-page-banner overflow-hidden">
        <ul class="element-list d-none d-lg-block">
            <li><img width='458' height='150' src='{{url(asset('build/wp-content/themes/medimall/assets/img/element_13.png'))}}' alt='Medimall'></li>
            <li><img width='653' height='150' src='{{url(asset('build/wp-content/themes/medimall/assets/img/element_14.png'))}}' alt='Medimall'></li>

        </ul>
        <div class="container">
            <h2 class="banner-title">Contact</h2>
            <div class="main-breadcrumb">
                <!-- Breadcrumb NavXT 7.2.0 -->
                <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                        title="Go to Medimall." href="https://radiustheme.com/demo/wordpress/themes/medimall"
                        class="home"><span property="name">Home</span></a>
                    <meta property="position" content="1">
                </span><span class="dvdr"> - </span><span property="itemListElement" typeof="ListItem"><span
                        property="name" class="post post-page current-item">Contact</span>
                    <meta property="url" content="https://radiustheme.com/demo/wordpress/themes/medimall/contact/">
                    <meta property="position" content="2">
                </span>
            </div>
        </div>
    </div>
    <div data-elementor-type="wp-page" data-elementor-id="486" class="section_heade elementor elementor-486">
        <div class="elementor-inner">
            <div class="elementor-section-wrap">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-26647424 elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="26647424" data-element_type="section"
                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-49a92cd8"
                                data-id="49a92cd8" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap  ">
                                        <div class="elementor-element elementor-element-4cfa4f1 elementor-widget elementor-widget-google_maps"
                                            data-id="4cfa4f1" data-element_type="widget"
                                            data-widget_type="google_maps.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-custom-embed">
                                                    <iframe
                                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123100.03280013517!2d44.28132064312515!3d15.38319911720853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1603dbd54684f731%3A0xa46b957a1482ac73!2z2LXZhti52KfYoeKAjtiMINin2YTZitmO2YXZjtmG!5e0!3m2!1sar!2s!4v1678888254969!5m2!1sar!2s"
                                                        width="600" height="450" style="border:0;" allowfullscreen=""
                                                        loading="lazy"
                                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-776094dd"
                                data-id="776094dd" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap p-3">
                                        <div class="elementor-element elementor-element-1e77b69d elementor-widget elementor-widget-heading"
                                            data-id="1e77b69d" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">
                                                    Contact Information</h2>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-6e60f6df elementor-widget elementor-widget-text-editor"
                                            data-id="6e60f6df" data-element_type="widget"
                                            data-widget_type="text-editor.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-text-editor elementor-clearfix">
                                                    <p>Mestibulum libero nisl, porta vel, scelerisque eget,
                                                        malesuada at neque. wivamus eget nibhm cursleo vel
                                                        metus.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="elementor-element elementor-element-23ddbb24 elementor-widget elementor-widget-rt-contact"
                                            data-id="23ddbb24" data-element_type="widget"
                                            data-widget_type="rt-contact.default">
                                            <div class="elementor-widget-container">

                                                <div class="contact-list style-1">
                                                    <div class="single-item">
                                                        <h4 class="title">New York City</h4>
                                                        <div
                                                            class="between-box d-flex align-items-center justify-content-between gap-2 gap-md-5 flex-wrap">
                                                            <div class="con-info-1">
                                                                <span>{{$company->address}}</span>
                                                            </div>
                                                            <div class="con-info-2">
                                                                <span>
                                                                    <a class="d-block"
                                                                        href="mailto:{{$setting->contact_mail}}">{{$setting->contact_mail}}</a>
                                                                    <a class="d-block" href="tel:{{$setting->contact_phone}}">{{$setting->contact_phone}}</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-7d6c2ade elementor-absolute animated-slow elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image"
                                            data-id="7d6c2ade" data-element_type="widget"
                                            data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;zoomIn&quot;}"
                                            data-widget_type="image.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-image">
                                                    <img decoding="async" width="265" height="265"
                                                        src="wp-content/uploads/2022/06/element_26.png"
                                                        class="attachment-full size-full wp-image-494 wp-post-image"
                                                        alt="" loading="lazy"
                                                        srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_26.png 265w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_26-150x150.png 150w"
                                                        sizes="(max-width: 265px) 100vw, 265px" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-75b4342b elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="75b4342b" data-element_type="section"
                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-167fd0c1"
                                data-id="167fd0c1" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-2b316716 elementor-widget elementor-widget-heading"
                                            data-id="2b316716" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Have
                                                    You any Suggestion or Queries?</h2>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-cc07394 elementor-widget elementor-widget-text-editor"
                                            data-id="cc07394" data-element_type="widget"
                                            data-widget_type="text-editor.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-text-editor elementor-clearfix">
                                                    <p>Mestibulum libero nisl, porta vel, scelerisque eget,
                                                        malesuada at neque wivamus eget nibhm cursleo vel metus.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-2070ba35 contact-form style-1 rt-contact-form fluentform-widget-submit-button-custom elementor-widget elementor-widget-fluent-form-widget"
                                            data-id="2070ba35" data-element_type="widget"
                                            data-widget_type="fluent-form-widget.default">
                                            <div class="elementor-widget-container">

                                                <div
                                                    class="fluentform-widget-wrapper hide-fluent-form-labels fluentform-widget-align-default">


                                                    <div class='fluentform fluentform_wrapper_1'>
                                                        <form data-form_id="1" id="fluentform_1"
                                                            class="frm-fluent-form fluent_form_1 ff-el-form-top ff_form_instance_1_1 ff-form-loading"
                                                            data-form_instance="ff_form_instance_1_1" method="POST">
                                                            <fieldset style="border: none!important;margin: 0!important;padding: 0!important;background-color: transparent!important;
                             box-shadow: none!important;outline: none!important;">
                                                                <legend class="ff_screen_reader_title"
                                                                    style="margin: 0!important;padding: 0!important;height: 0!important;text-indent: -999999px;width: 0!important;">
                                                                    Contact Form</legend><input type='hidden'
                                                                    name='__fluent_form_embded_post_id'
                                                                    value='486' /><input type="hidden"
                                                                    id="_fluentform_1_fluentformnonce"
                                                                    name="_fluentform_1_fluentformnonce"
                                                                    value="c7625a62ad" /><input type="hidden"
                                                                    name="_wp_http_referer"
                                                                    value="/demo/wordpress/themes/medimall/contact/" />
                                                                <div data-name="ff_cn_id_1"
                                                                    class='ff-t-container ff-column-container ff_columns_total_2  '>
                                                                    <div class='ff-t-cell ff-t-column-1'
                                                                        style='flex-basis: 50%;'>
                                                                        <div class='ff-el-group form-group'>
                                                                            <div class='ff-el-input--content'>
                                                                                <input type="text" name="name"
                                                                                    class="ff-el-form-control form-control rt-form-control"
                                                                                    placeholder="Name" data-name="name"
                                                                                    id="ff_1_name" aria-invalid="false"
                                                                                    aria-required=true>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class='ff-t-cell ff-t-column-2'
                                                                        style='flex-basis: 50%;'>
                                                                        <div class='ff-el-group form-group'>
                                                                            <div class='ff-el-input--content'>
                                                                                <input type="email" name="email"
                                                                                    id="ff_1_email"
                                                                                    class="ff-el-form-control form-control rt-form-control"
                                                                                    placeholder="E-mail"
                                                                                    data-name="email"
                                                                                    aria-invalid="false"
                                                                                    aria-required=true>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div data-name="ff_cn_id_2"
                                                                    class='ff-t-container ff-column-container ff_columns_total_2  '>
                                                                    <div class='ff-t-cell ff-t-column-1'
                                                                        style='flex-basis: 50%;'>
                                                                        <div class='ff-el-group form-group'>
                                                                            <div class='ff-el-input--content'>
                                                                                <input type="text" name="phone"
                                                                                    class="ff-el-form-control form-control rt-form-control"
                                                                                    placeholder="Phone"
                                                                                    data-name="phone" id="ff_1_phone"
                                                                                    aria-invalid="false"
                                                                                    aria-required=true>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class='ff-t-cell ff-t-column-2'
                                                                        style='flex-basis: 50%;'>
                                                                        <div class='ff-el-group form-group'>
                                                                            <div class='ff-el-input--content'>
                                                                                <input type="text" name="subject"
                                                                                    class="ff-el-form-control form-control rt-form-control"
                                                                                    placeholder="Subject"
                                                                                    data-name="subject"
                                                                                    id="ff_1_subject"
                                                                                    aria-invalid="false"
                                                                                    aria-required=true>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class='ff-el-group form-group'>
                                                                    <div class='ff-el-input--content'><textarea
                                                                            aria-invalid="false" aria-required=true
                                                                            name="message" id="ff_1_message"
                                                                            class="ff-el-form-control form-control rt-form-control rt-textarea"
                                                                            placeholder="Comment" rows="4" cols="2"
                                                                            data-name="message"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class='ff-el-group ff-text-left ff_submit_btn_wrapper'>
                                                                    <button type="submit"
                                                                        class="ff-btn ff-btn-submit ff-btn-md submit-btn ff_btn_style wpf_has_custom_css">Submit
                                                                        Now</button>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                        <div id='fluentform_1_errors'
                                                            class='ff-errors-in-stack ff_form_instance_1_1 ff-form-loading_errors ff_form_instance_1_1_errors'>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        window.fluent_form_ff_form_instance_1_1 = { "id": "1", "settings": { "layout": { "labelPlacement": "top", "helpMessagePlacement": "with_label", "errorMessagePlacement": "inline", "cssClassName": "", "asteriskPlacement": "asterisk-right" }, "restrictions": { "denyEmptySubmission": { "enabled": false } } }, "form_instance": "ff_form_instance_1_1", "form_id_selector": "fluentform_1", "rules": { "name": { "required": { "value": true, "message": "This field is required" } }, "email": { "required": { "value": true, "message": "This field is required" }, "email": { "value": true, "message": "This field must contain a valid email" } }, "phone": { "required": { "value": true, "message": "This field is required" } }, "subject": { "required": { "value": true, "message": "This field is required" } }, "message": { "required": { "value": true, "message": "This field is required" } } } };
                                                    </script>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-76d17067 elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-image"
                                            data-id="76d17067" data-element_type="widget"
                                            data-settings="{&quot;_position&quot;:&quot;absolute&quot;}"
                                            data-widget_type="image.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-image">
                                                    <img decoding="async" width="380" height="242"
                                                        src="wp-content/uploads/2022/06/element_27.png"
                                                        class="attachment-full size-full wp-image-495 wp-post-image"
                                                        alt="" loading="lazy"
                                                        srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_27.png 380w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_27-300x191.png 300w"
                                                        sizes="(max-width: 380px) 100vw, 380px" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-3bd5021a"
                                data-id="3bd5021a" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-1f3debc4 elementor-widget elementor-widget-image"
                                            data-id="1f3debc4" data-element_type="widget"
                                            data-widget_type="image.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-image">
                                                    <img decoding="async" width="426" height="673"
                                                        src="wp-content/uploads/2022/06/contact-img_1.png"
                                                        class="attachment-full size-full wp-image-497 wp-post-image"
                                                        alt="" loading="lazy"
                                                        srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/contact-img_1.png 426w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/contact-img_1-190x300.png 190w"
                                                        sizes="(max-width: 426px) 100vw, 426px" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-2c85a5c6 elementor-absolute animated-slow elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image"
                                            data-id="2c85a5c6" data-element_type="widget"
                                            data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;zoomIn&quot;}"
                                            data-widget_type="image.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-image">
                                                    <img decoding="async" width="687" height="617"
                                                        src="wp-content/uploads/2022/06/element_29.png"
                                                        class="attachment-full size-full wp-image-501 wp-post-image"
                                                        alt="" loading="lazy"
                                                        srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_29.png 687w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_29-570x512.png 570w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_29-300x269.png 300w"
                                                        sizes="(max-width: 687px) 100vw, 687px" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-3a3ec7ec elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-image"
                                            data-id="3a3ec7ec" data-element_type="widget"
                                            data-settings="{&quot;_position&quot;:&quot;absolute&quot;}"
                                            data-widget_type="image.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-image">
                                                    <img decoding="async" width="969" height="216"
                                                        src="wp-content/uploads/2022/06/element_28.png"
                                                        class="attachment-full size-full wp-image-502 wp-post-image"
                                                        alt="" loading="lazy"
                                                        srcset="https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_28.png 969w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_28-570x127.png 570w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_28-300x67.png 300w, https://radiustheme.com/demo/wordpress/themes/medimall/wp-content/uploads/2022/06/element_28-768x171.png 768w"
                                                        sizes="(max-width: 969px) 100vw, 969px" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

</div><!-- #content -->



@endsection
