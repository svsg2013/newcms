jQuery(function ($) {
    var validateRules = {
        interest_rate: {required: true},
        min_money: {required: true},
        max_money: {required: true},
        min_borrow_time: {required: true},
        max_borrow_time: {required: true},
        loan_job_id: {required: true},
        loan_income_type_id: {required: true}
    }

    var cleave = new Cleave('.step_money', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    var cleave = new Cleave('.min_money', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    var cleave = new Cleave('.max_money', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    $('#loan_job_id').select2();

    $('#loan_income_type_id').select2();

    // var cleave = new Cleave('.electric_bill', {
    //     numeral: true,
    //     numeralThousandsGroupStyle: 'thousand'
    // });
    // var cleave = new Cleave('.water_bill', {
    //     numeral: true,
    //     numeralThousandsGroupStyle: 'thousand'
    // });

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