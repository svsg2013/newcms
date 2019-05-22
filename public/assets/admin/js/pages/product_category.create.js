jQuery(function ($) {
    $('#slider_key').select2();

    $('#form-form').validate({
        ignore: "",
        rules: {
            category_id: {required: true},
            'en[name]': {
                required: true,
                minlength: 2
            },
            'vi[name]': {
                required: true,
                minlength: 2
            }
        },
        highlight: function (input) {
            $(input).closest('.tab-pane').addClass("tab-error");
            $(input).addClass("input-error");
            var tab_content= $(input).closest('form');
            if($(".active.tab-error label.error").length == 0){
                var _id = $(tab_content).find(".tab-error:not(.active)").attr("id");
                $('a[href="#' + _id + '"]').tab('show');
            }

            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).closest('.tab-pane').removeClass("tab-error");
            $(input).removeClass("input-error");

            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, input) {
            $(input).parents('.form-group').append(error);
        }
    });
});