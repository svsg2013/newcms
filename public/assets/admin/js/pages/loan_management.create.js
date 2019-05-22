jQuery(function ($) {
    var validateRules = {
        name: {
            required: true
        },
    }

    var cleave = new Cleave('#amount', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    var cleave = new Cleave('#monthly_payment', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });


    $('#job_id').select2();

    $('#combo_id').select2();

    $('#city_id').select2();

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