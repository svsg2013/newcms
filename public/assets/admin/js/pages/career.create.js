jQuery(function ($) {
    var validateRules = {
        published_date: {required: true},
        expired_date: {required: true},
        employer: {required: true},
        category_id: {required: true},
        level_id: {required: true},
        city_id: {required: true},
        status: {required: true},
        accept_aplly: {required: true},
    }

    for (let key in COMPOSER_LOCALES) {
        if(LOCALES_REQUIRE.indexOf(key) !== -1){
            validateRules[`${key}[name]`] = {required: true};
            validateRules[`${key}[content]`] = {required: true};
        }
    }

    $('#published_date').datepicker({
        autoclose: true,
        container: '#published_date-container'
    });

    $('#expired_date').datepicker({
        autoclose: true,
        container: '#expired_date-container'
    });

    $('#form-form').validate({
        focusInvalid: true,
        ignore: "",
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
        },
        rules: validateRules
    });
});