(function($) {

    /* Color Picker */

    $(document).ready(function() {
        $('#cookielay-container .colorpicker').wpColorPicker();
    });

    /* Code Editor */

    $(document).ready(function() {
        if($('#cookielay-container .codeeditor-css').length) {
            $('#cookielay-container .codeeditor-css').each(function() {
                wp.codeEditor.initialize($(this), codeeditor_settings_css);
            });
        }
        if($('#cookielay-container .codeeditor-html').length) {
            $('#cookielay-container .codeeditor-html').each(function() {
                wp.codeEditor.initialize($(this), codeeditor_settings_html);
            });
        }
    })

    /* Menu */

    $('#cookielay-container .cookielay-menu .cookielay-menu__toggle').click(function() {
        $(this).toggleClass('open');
        $('#cookielay-container .cookielay-menu ul').slideToggle(300);
    });

    /* Toggle Status */

    $('#cookielay-container .toggle-cookielay .switch input').change(function() {
        var checked = $(this).is(":checked"),
            active = 0;
        if(checked == true) {
            active = 1;
        }
        var data = {"action":"toggle_cookielay","active":active};
        $('#cookielay-container .cl-alert').removeClass('visible');
        $.post(ajaxurl, data, function(data) {
            if(data == 1) {
                if(active == 1) {
                    $('#cookielay-container .cl-alert[data-cl-alert="cookielay-active"]').addClass('visible');
                    $('#cookielay-container .cookielay-content .status .value .active').show();
                    $('#cookielay-container .cookielay-content .status .value .inactive').hide();
                    $('#cookielay-container .cookielay-header .info .status.active').show();
                    $('#cookielay-container .cookielay-header .info .status.inactive').hide();
                } else {
                    $('.cl-alert[data-cl-alert="cookielay-inactive"]').addClass('visible');
                    $('#cookielay-container .cookielay-content .status .value .active').hide();
                    $('#cookielay-container .cookielay-content .status .value .inactive').show();
                    $('#cookielay-container .cookielay-header .info .status.active').hide();
                    $('#cookielay-container .cookielay-header .info .status.inactive').show();
                }
            } else {
                $('#cookielay-container .cl-alert[data-cl-alert="cookielay-failed"]').addClass('visible');
            }
        });
    });

    /* Delete Modal */

    $('#cookielay-container [data-cl-action="delete"]').click(function(e) {
        e.preventDefault();
        var id = $(this).data('cl-modal'),
            url = $(this).data('cl-url'),
            name = $(this).data('cl-name');
        $('#cookielay-container .cl-modal[data-cl-id="' + id + '"] .cl-modal__box .cl-box-text span').text(name);
        $('#cookielay-container .cl-modal[data-cl-id="' + id + '"] .cl-modal__box .cl-box-buttons .submit').attr('href', url);
        $('#cookielay-container .cl-modal[data-cl-id="' + id + '"]').fadeIn(200, function() {
            $(this).find('.cl-modal__box').fadeIn(200);
        });
    });

    $('#cookielay-container .cl-modal .cl-modal__box .cl-box-text .cl-box-close').click(function(e) {
        e.preventDefault();
        cl_close_modal($(this));
    });

    $('#cookielay-container .cl-modal .cl-modal__box .cl-box-buttons .cancel').click(function(e) {
        e.preventDefault();
        cl_close_modal($(this));
    });

    function cl_close_modal(element) {
        element.parents('.cl-modal__box').fadeOut(200, function() {
            element.parents('.cl-modal').fadeOut(200);
        });
    }

    /* Activate Cookie */

    $('#cookielay-container .cookie .switch-wrapper .switch input').change(function() {
        var checked = $(this).is(":checked"),
            id = $(this).parents(".cookie").data("id"),
            active = 0;
        if(checked == true) {
            active = 1;
        }
        var data = {"action":"toggle_cookie_status","id":id,"active":active};
        $('#cookielay-container .cl-alert').removeClass('visible');
        $.post(ajaxurl, data, function(data) {
            if(data == 1) {
                if(active == 1) {
                    $('#cookielay-container .cl-alert[data-cl-alert="cookie-active"]').addClass('visible');
                } else {
                    $('#cookielay-container .cl-alert[data-cl-alert="cookie-inactive"]').addClass('visible');
                }
            } else {
                $('#cookielay-container .cl-alert[data-cl-alert="cookie-failed"]').addClass('visible');
            }
        });
    });

    /* Preset Select */

    $(document).ready(function() {
        $('#cookielay-container .select-color button').each(function() {
            var color = $(this).css("background-color");
            $(this).attr("style", "background-color:" + color + "!important;");
        });
        $('.select-color button').attr('disabled', true);
    });

    /* Lang Select */

    $('#cookielay-container .cookielay-header .lang .lang__menu span').click(function() {
        $(this).parent().toggleClass('open');
    });

    /* Accordion */

    $('#cookielay-container .cl-accordion .cl-accordion__header').click(function() {
        $(this).parent().toggleClass('open');
        $accordion_content = $(this).next('.cl-accordion__content');
        $('.cl-accordion__content').not($accordion_content).slideUp();
        $('.cl-accordion__content').not($accordion_content).parent().removeClass('open');
        $accordion_content.stop(true, true).slideToggle(400);
    });

    /* Shortcode */

    $('#cookielay-container [data-cookielay="shortcode"]').click(function() {
        $(this).select();
    });

    $('#cookielay-container [data-cookielay="shortcode-copy"]').click(function() {
        var button = $(this),
            shortcode = $(this).prev('[data-cookielay="shortcode"]').select(),
            text = button.text(),
            alt = button.data("cookielay-alt");
        console.log(text);
        document.execCommand('copy');
        button.text(alt);
        window.setTimeout(function () {
            button.text(text);
        }, 800);
    });

    $('#cookielay-container #delete-cookie-select').change(function() {
        var shortcode = $(this).val();
        $('#delete-cookie-shortcode').val(shortcode);
    });

    /* Reset Token */

    $('#reset-form').find('input[type="checkbox"]').change(function() {
        var button = $(this).parents('form').find('button');
        if($(this).is(':checked')) {
            button.prop("disabled", false);
        } else {
            button.prop("disabled", true);
        }
    });

    $('#reset-form').submit(function(e) {
        e.preventDefault();
        var checkbox = $(this).find('input[type="checkbox"]'),
            button = $(this).find('button');
        var data = {"action": "reset_cookie"};
        $.post(ajaxurl, data, function(data) {
            if(data == 1) {
                $(checkbox).prop("checked", false);
                $(button).prop("disabled", true);
                $('.cl-alert[data-cl-alert="token-reset"]').addClass('visible');
            } else {
                $('.cl-alert[data-cl-alert="token-failed"]').addClass('visible');
            }
        });
    });

    /* Select Preset (Cookies) */

    $('#select-preset').change(function() {
        var value = $(this).val(),
            data = {"action": "get_preset", "preset": value};
        if(value == "custom") {
            $('input[name="title"]').val("");
            $('input[name="name"]').val("");
            $('input[name="provider"]').val("");
            $('input[name="description"]').val("");
            $('input[name="lifetime"]').val("");
            $('input[name="privacy"]').val("");
            $('input[name="imprint"]').val("");
            $('input[name="execute_header"]').prop("checked", false);
            $('.CodeMirror').get(0).CodeMirror.setValue("");
            $('.CodeMirror').get(1).CodeMirror.setValue("");
        } else {
            $.post(ajaxurl, data, function(data) {
                var preset = JSON.parse(data);
                $('input[name="title"]').val(preset["title"]);
                $('input[name="name"]').val(preset["name"]);
                $('input[name="provider"]').val(preset["provider"]);
                $('input[name="description"]').val(preset["description"]);
                $('input[name="lifetime"]').val(preset["lifetime"]);
                $('input[name="privacy"]').val(preset["privacy"]);
                $('input[name="imprint"]').val(preset["imprint"]);
                if(preset["execute_header"]) {
                    $('input[name="execute_header"]').prop("checked", true);
                }
                $('.CodeMirror').get(0).CodeMirror.setValue(preset["allow_script"]);
                $('.CodeMirror').get(1).CodeMirror.setValue(preset["disallow_script"]);
            });
        }
    });

})(jQuery);