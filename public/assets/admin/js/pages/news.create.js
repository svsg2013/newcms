jQuery(function ($) {
    $('#publish_at').datepicker({
       autoclose: true,
       container: '#publish_at-container'
    });

    var validateRules = {
        image: {required: true},
        publish_at: {required: true},
        // news_category_id: {required: true},
    }

    for (let key in COMPOSER_LOCALES) {
        if(LOCALES_REQUIRE.indexOf(key) !== -1){
            validateRules[`${key}[title]`] = {required: true};
        }
    }

    $('#form-form').validate({
        focusInvalid: true,
        ignore: "",
        highlight: function(element) {
            $(element).closest('.tab-pane').addClass("tab-error");
            $(element).addClass("input-error");
            var tab_content= $(element).closest('form');
            if($(".active.tab-error label.error").length == 0){
                var _id = $(tab_content).find(".tab-error:not(.active)").attr("id");
                $('a[href="#' + _id + '"]').tab('show');
            }

            $(element).parents('.form-line').addClass('error');
        },
        unhighlight: function(element) {
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