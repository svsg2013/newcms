(function ($) {
    var CURRENT_STEP_INDEX;

    $(document).trigger('init');

    $('body').on('click', '.modal-area-content', function () {
        AREA_POINT_URL = null;
        CURRENT_STEP_INDEX = $(this).data('index');
        for (let key in COMPOSER_LOCALES) {
            let content = $(`textarea[name='${CURRENT_STEP_INDEX}[${key}content]']`).val();
            CKEDITOR.instances[`${key}content`].setData(content);
        }

        $('#modalArea').modal('show');
    });

    $('#btn-ok-content').click(function () {
        if (AREA_POINT_URL) {
            let url = AREA_POINT_URL;
            $('.page-loader-wrapper').show();
            let content = {};
            for (let key in COMPOSER_LOCALES) {
                content[key] = {};
                content[key]['content'] = CKEDITOR.instances[`${key}content`].getData();
            }
            setTimeout(function () {
                $.post(url, {content: content, _method: 'PUT'}, function (res) {
                    $('.page-loader-wrapper').fadeOut();
                    console.log('update point success');
                });
            }, 1000);
        }
        else {
            for (let key in COMPOSER_LOCALES) {

                let content = CKEDITOR.instances[`${key}content`].getData();

                $(`textarea[name='${CURRENT_STEP_INDEX}[${key}content]']`).val(content).trigger('change');
            }
        }
        $('#modalArea').modal('hide');
    });

    $('#btn-delete-content').click(function () {
        if (AREA_POINT_URL) {
            $('#svg-area-' + AREA_POINT_ID).remove();
            $('#form-img').append("<input type='hidden' name='delete_areas[]' value='" + AREA_POINT_ID + "'>");
            $('#modalArea').modal('hide');
        }
    });

    /*
     update AREA_POINT_URL when hide modal => disable update point
     */
    $('#modalArea').on('hidden.bs.modal', function (e) {
        AREA_POINT_URL = null;
        $('#btn-delete-content').addClass('hidden');
    });

    $('.btn_submit').click(function () {
        var _this = $(this);
        _this.prop('disabled', true);
        $("#image-map").imageMapper("asHTML");

        setTimeout(function () {
            if ($('#form-img').valid()) {
                if (IS_EDIT_PAGE) {
                    $('#form-img').submit();
                }
                else {
                    if ($('#id-output-area').html()) {
                        $('#form-img').submit();
                    }
                    else {
                        _this.prop('disabled', false);
                        toastr['error']('Form invalid!');
                        return false;
                    }
                }
            }
            else {
                _this.prop('disabled', false);
                toastr['error']('Form invalid!');
                return false;
            }
        }, 500);
    });

    var validateRules = {};
    for (let key in COMPOSER_LOCALES) {
        validateRules[`map[${key}][name]`] = {required: true};
    }

    $('#form-img').validate({
        focusInvalid: false,
        ignore: "",
        rules: validateRules,
        highlight: function (element) {
            $(element).closest('.tab-pane').addClass("tab-error");
            $(element).addClass("input-error");
            var tab_content = $(element).closest('form');
            if ($(".active.tab-error label.error").length == 0) {
                var _id = $(tab_content).find(".tab-error:not(.active)").attr("id");
                $('a[href="#' + _id + '"]').tab('show');
            }

            $(element).parents('.form-line').addClass('error');
        },
        unhighlight: function (element) {
            $(element).closest('.tab-pane').removeClass("tab-error");
            $(element).removeClass("input-error");

            $(element).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    /*Ẩn hoặc hiện các area trên map đã tạo*/
    $('#btn_show_hide').on('click', function (event) {
        let _this = $(this);
        event.preventDefault();

        let status = _this.attr('status');
        if (status == 'show') {
            _this.attr('status', 'hide');
            $('.svg-area').addClass('hidden');
            $('#image-map-areas .module-item').addClass('hidden');
        }
        else {
            _this.attr('status', 'show');
            $('.svg-area').removeClass('hidden');
            $('#image-map-areas .module-item').removeClass('hidden');
        }

        return false;
    });

    /*Hiện thị modal để cập nhật hoặc xóa area đẫ tạo*/
    $('.svg-area').on('click', function (event) {
        let _this = $(this);
        event.preventDefault();
        event.stopImmediatePropagation();
        event.stopPropagation();
        $('.page-loader-wrapper').show();
        let url = _this.data('url');
        let _id = _this.data('id');
        AREA_POINT_URL = url;
        AREA_POINT_ID = _id;
        $.get(url, function (res) {
            for (let key in COMPOSER_LOCALES) {
                if (res[key]['content'] !== 'undefined') {
                    CKEDITOR.instances[`${key}content`].setData(res[key]['content']);
                }
            }
            $('#btn-delete-content').removeClass('hidden');
            $('.page-loader-wrapper').fadeOut();
            $('#modalArea').modal('show');
        });
    });

    $('.btn_delete_areas').click(function (event) {
        event.stopPropagation();
        event.preventDefault();
        var _this = $(this);
        var name = _this.data("name");
        var svg = _this.data("svg");
        var value = _this.data("value");
        var parent = _this.data("parent");
        var _closest = _this.closest(parent);

        if (name && value) {
            _this.closest("form").append("<input type='hidden' name=" + name + " value='" + value + "'>");
        }

        _closest.animate({
            opacity: 0,
        }, 300, function () {
            _closest.remove();
            if (svg) {
                $(svg).remove();
            }
        });
        return false;
    });
})(jQuery);