jQuery(function ($) {

    $('#start').datetimepicker({
        autoclose: true,
        format: 'yyyy-mm-dd hh:ii:ss'
    });
    $('#end').datetimepicker({
        autoclose: true,
        format: 'yyyy-mm-dd hh:ii:ss',
        useCurrent: false
    });
   
    // custom code for greater than
    jQuery.validator.addMethod('greaterThan', function (value, element, param) {
        //alert(value + " - " + element.value + " - " + param[0]);
        return (value >= jQuery(param).val());
    }, 'Must be greater than start date');

    // custom code for lesser than
    jQuery.validator.addMethod('lesserThan', function (value, element, param) {
        //alert(value + " - " + element.value + " - " + param[0]);
        return (value <= jQuery(param).val());
    }, 'Must be less than end date');

    $('#form-form').validate({
        focusInvalid: false,
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
        ignore: "",
        rules: {
            'code': {
                required: true
            },
            'start': {
                required: true,
                lesserThan: $("#end")
            },
            'end': {
                required: true,
                greaterThan: $("#start")
            },
        }
    });

});
