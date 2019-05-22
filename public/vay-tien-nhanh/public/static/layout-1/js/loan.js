$(document).ready(function () {

   /*  // Domain testing
    const DOMAIN_TEST = 'portaluatr.easycredit.vn:8080/extranet_uatr';

    // Domain production
    const DOMAIN_PRODUCT = 'portal.easycredit.vn/extranet';

    // Status Đăng ký ngay
    const STATUS_API = 0;

    // Status Đặt lịch gọi ngay
    const STATUS_NOT_API = 1;

    var job = $('#inputJob');
    var doc = $('#inputDoc');
    var value_job = '';
    var value_combo = '';
    var coefficient = 0;
    var interest_rate = 0;

    var group = job.parents('.col-sm-10').next('.col-sm-10');

    $('#inputJob').change(function () {
        value_job = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "https://easycredit.vn/url-job",
            type: 'POST',
            data: {
                value_job: value_job,
                value_combo: value_combo
            }
        }).done(function (res) {
            if (!res.result && value_job && value_combo) {
                group.addClass('disabled');
                $('#warningChooseModal').modal('show');
            } else if (res.result) {
                $('#much-you-need').attr("data-max", parseFloat(res.result.max_money));
                $('#much-you-need').attr("data-min", parseFloat(res.result.min_money));
                $('#much-you-need').attr("data-step", parseFloat(res.result.step_money));

                $('#payment-term').attr("data-max", parseFloat(res.result.max_borrow_time));
                $('#payment-term').attr("data-min", parseFloat(res.result.min_borrow_time));

                $('#partner-code').val(res.result.partner_id);
                $('#template-id').val(res.result.template_id);

                // Cac bien de reset ket qua vay
                var money = parseFloat($('#much-you-need').val());
                var duration = parseFloat($('#payment-term').val());

                // Neu value hien tai > max_money
                if (parseFloat($('.much-you-need-span').text().replace(/\./g, "")) > parseFloat(res.result.max_money)) {
                    $('.much-you-need-span').text(parseFloat(res.result.max_money).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                }
                // Neu month hien tai > max month
                if (parseFloat($('.payment-term-span').text().replace(/\./g, "")) > parseFloat(res.result.max_borrow_time)) {
                    $('.much-you-need-span').text(parseFloat(res.result.max_borrow_time));
                }

                coefficient = parseFloat(res.result.coefficient); // Hệ số cho vay
                interest_rate = parseFloat(res.result.interest_rate); // Lãi suất

                // Reset ket qua vay
                var result = calculatorLoan(money, interest_rate, duration, coefficient);
                $('.result-loan').html(result + '<sup>đ</sup>');

                range();
            }
        }).fail(function (res) {
            //
        });
    }); */

    // Get document from job choose
    /* $('#inputJob').change(function () {
        $('.docsTable').html();
        let job_val_get_combo = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "https://easycredit.vn/url-get-combo",
            type: 'POST',
            data: {
                job_val_get_combo: job_val_get_combo
            }
        }).done(function (res) {
            $('.docsTable').html(res);
        }).fail(function (res) {
            //
        });
    });
 *//* 
    $(document).on('click', '.choose_doc', function () {
        value_combo = $(this).data('val');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: URL_JOB,
            type: 'POST',
            data: {
                value_job: value_job,
                value_combo: value_combo
            }
        }).done(function (res) {
            if (!res.result && value_job && value_combo) {
                group.addClass('disabled');
                $('#warningChooseModal').modal('show');
            } else if (res.result) {

                $('#much-you-need').attr("data-max", parseFloat(res.result.max_money));
                $('#much-you-need').attr("data-min", parseFloat(res.result.min_money));
                $('#much-you-need').attr("data-step", parseFloat(res.result.step_money));

                $('#payment-term').attr("data-max", parseFloat(res.result.max_borrow_time));
                $('#payment-term').attr("data-min", parseFloat(res.result.min_borrow_time));

                $('#partner-code').val(res.result.partner_id);
                $('#template-id').val(res.result.template_id);

                // Cac bien de reset ket qua vay
                var money = parseFloat($('#much-you-need').val());
                var duration = parseFloat($('#payment-term').val());

                // Neu value hien tai > max_money
                if (parseFloat($('.much-you-need-span').text().replace(/\./g, "")) > parseFloat(res.result.max_money)) {
                    $('.much-you-need-span').text(parseFloat(res.result.max_money).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                    money = parseFloat($('.much-you-need-span').text().replace(/\./g, ""));
                }
                // Neu month hien tai > max month
                if (parseFloat($('.payment-term-span').text().replace(/\./g, "")) > parseFloat(res.result.max_borrow_time)) {
                    $('.much-you-need-span').text(parseFloat(res.result.max_borrow_time));
                    duration = parseFloat($('.payment-term-span').text().replace(/\./g, ""));
                }


                coefficient = parseFloat(res.result.coefficient); // Hệ số cho vay
                interest_rate = parseFloat(res.result.interest_rate); // Lãi suất

                // Reset ket qua vay
                var result = calculatorLoan(money, interest_rate, duration, coefficient);
                $('.result-loan').html(result + '<sup>đ</sup>');

                range();
            }
        }).fail(function (res) {
            //
        });
    });

    function range() {

        var $range = $('.form-range');
        if ($range.length) {
            function _muchYouNeed() {
                var $muchYouNeed = $('#much-you-need');
                var dataPrefix = $muchYouNeed.data('prefix'),
                    dataMin = parseFloat($muchYouNeed.attr('data-min')),
                    dataMax = parseFloat($muchYouNeed.attr("data-max")),
                    // dataFrom = parseFloat($muchYouNeed.attr('data-min')),
                    dataFrom = parseFloat($muchYouNeed.val()),
                    dataStep = parseFloat($muchYouNeed.attr("data-step"));
                if (typeof dataPrefix === 'undefined') {
                    dataPrefix = ''
                }
                if (typeof dataMin === 'undefined') {
                    dataMin = 0
                }
                if (typeof dataMax === 'undefined') {
                    dataMax = 10
                }
                if (typeof dataFrom === 'undefined') {
                    dataFrom = 0
                }
                if (typeof dataStep === 'undefined') {
                    dataStep = 1
                }
                _ionRangeSlider($muchYouNeed, dataMin, dataMax, dataFrom, dataStep, dataPrefix)
            }

            function _paymentTerms() {
                var $paymentTerms = $('#payment-term');
                var dataPrefix = $paymentTerms.data('prefix'),
                    dataMin = parseFloat($paymentTerms.attr('data-min')),
                    dataMax = parseFloat($paymentTerms.attr("data-max")),
                    // dataFrom = parseFloat($paymentTerms.attr('data-min')),
                    dataFrom = parseFloat($paymentTerms.val()),
                    dataStep = parseFloat($paymentTerms.attr("data-step"));
                if (typeof dataPrefix === 'undefined') {
                    dataPrefix = ''
                }
                if (typeof dataMin === 'undefined') {
                    dataMin = 3
                }
                if (typeof dataMax === 'undefined') {
                    dataMax = 24
                }
                if (typeof dataFrom === 'undefined') {
                    dataFrom = 3
                }
                if (typeof dataStep === 'undefined') {
                    dataStep = 1
                }
                _ionRangeSlider($paymentTerms, dataMin, dataMax, dataFrom, dataStep, dataPrefix)
            }

            function _ionRangeSlider($el, dataMin, dataMax, dataFrom, dataStep, dataPrefix) {
                var slider = $el.data("ionRangeSlider");

                slider.update({
                    min: dataMin,
                    max: dataMax,
                    from: dataFrom,
                    step: dataStep,
                });
            }

            function prettify(num) {
                var n = num.toString();
                return n.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, '$1' + '.')
            }

            function _checkRange() {
                var month = $('#payment-term').val();
                var money = $('#much-you-need').val(); // Gọi hàm tính lãi
            }

            function _calc(money, month) {
                var result = $('.fiSolution__divider b');
                var interest = 0.01; // Danh sách lãi xuất theo tháng: ở đây cũng là ví dụ
                switch (parseInt(month)) {
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                    case 10:
                        interest = 0.01;
                        break;
                    case 11:
                    case 12:
                    case 13:
                    case 14:
                    case 15:
                        interest = 0.0115;
                        break;
                    case 16:
                    case 17:
                    case 18:
                    case 19:
                    case 20:
                        interest = 0.025;
                        break;
                    case 21:
                    case 22:
                    case 23:
                    case 24:
                    case 25:
                        interest = 0.035;
                        break;
                    case 26:
                    case 27:
                    case 28:
                    case 29:
                    case 30:
                        interest = 0.05;
                        break;
                    default:
                        interest = 0.07;
                } // Công thức tính khoản vay. tạm thời ví dụ là vậy
                var recipe = interest * money; // Xử lý để render ra HTML
                var temp = Number(recipe).toFixed(0);
                result.html(prettify(temp) + '<sup>\u0111</b>')
            }
            _muchYouNeed();
            _paymentTerms()
        }
    }
 */
    

    /* 
        Công thức tính khoản tiền trả hàng tháng
        c: Tổng số tiền vay
        r: Lãi suất hàng tháng
        duration: Số tháng vay
        x: Hệ số công thức
    */
    

    // $(document).on('click', '.btn-submit-popup-loan', function (e) {
    //     e.preventDefault();
    //     showLoanPopupTest('successModal');
    // });

    /* $(document).on('click', '.btn-loan', function (e) {
        e.preventDefault();

        var job = $('#inputJob').val(), // Công việc hiện tại
            documents = $('#inputDoc').val(), // Giấy tờ cung cấp
            money = $('#much-you-need').val(), // Khoản vay
            month = $('#payment-term').val(), // Thời hạn vay
            name = $('#finame').val(), // Tên
            phone = $('#fiphone').val(), // Số điện thoại
            email = $('#fiemail').val(), // Email
            city = $('#ficity').val(), // Thành phố
            pay = $('.result-loan').text(), // Khoản trả hàng tháng
            partner_code = $('#partner-code').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "https://easycredit.vn/url-loan",
            type: 'POST',
            data: {
                job: job,
                documents: documents,
                money: money,
                month: month,
                name: name,
                phone: phone,
                email: email,
                city: city,
                pay: pay,
                coefficient: coefficient,
                interest_rate: interest_rate,
                partner_code: partner_code,
                status: STATUS_API
            }
        }).done(function (res) {
            if (res.status_code === 200) {
                countdownClosePopup('successModalLoan', 7);
            }
        }).fail(function (res) {
            console.log(res);
            $('.error-sign-up').empty();

            var errorsHtml = '';
            var checkDuplicatePhone = '';

            if (res.status === 422) {
                if (jQuery.type(res.responseJSON.message) == 'object') {
                    errorsHtml += '<div style="padding-left: 15px;">';
                    $.each(res.responseJSON.message, function (key, value) {
                        errorsHtml += '<h3 style="list-style-type: none;text-align: left;">' + value[0] + '</h3>';
                    });
                    errorsHtml += '</div>';
                }
                if (res.responseJSON.message && jQuery.type(res.responseJSON.message) == 'string') {
                    checkDuplicatePhone += res.responseJSON.message;
                }
            } else {
                // do something else
            }

            if (checkDuplicatePhone) {
                countdownClosePopup('telephoneDulicete', 7);
            }

            if (errorsHtml) {
                $('.error-sign-up').html(errorsHtml);
                $('#errorsModal').modal('show');
            }
        });
    }); */

/*     $(document).on('click', '.btn-loan-stop', function (e) {
        if(COMPOSER_ACTIVE_POPUP) {
            e.preventDefault();
            countdownClosePopup('modalLoanStop', 7);
        }
    }); */
/* 
    $(document).on('click', '.btn-loan-not-api', function (e) {
        e.preventDefault();

        var job = $('#inputJob').val(), // Công việc hiện tại
            documents = $('#inputDoc').val(), // Giấy tờ cung cấp
            money = $('#much-you-need').val(), // Khoản vay
            month = $('#payment-term').val(), // Thời hạn vay
            name = $('#finame').val(), // Tên
            phone = $('#fiphone').val(), // Số điện thoại
            email = $('#fiemail').val(), // Email
            city = $('#ficity').val(), // Thành phố
            pay = $('.result-loan').text(), // Khoản trả hàng tháng
            partner_code = $('#partner-code').val();

        var url = $(this).attr('href');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "https://easycredit.vn/url-loan-without-api",
            type: 'POST',
            data: {
                job: job,
                documents: documents,
                money: money,
                month: month,
                name: name,
                phone: phone,
                email: email,
                city: city,
                pay: pay,
                coefficient: coefficient,
                interest_rate: interest_rate,
                partner_code: partner_code,
                status: STATUS_NOT_API
            }
        }).done(function (res) {
            window.location.href = url;
        }).fail(function (res) {

            $('.error-sign-up').empty();
            var errorsHtml = '<div style="padding-left: 15px;">';

            if (res.status === 422) {
                if (jQuery.type(res.responseJSON.message) == 'object') {
                    $.each(res.responseJSON.message, function (key, value) {
                        errorsHtml += '<h3 style="list-style-type: none;text-align: left;">' + value[0] + '</h3>';
                    });
                }
            } else {
                // do something else
            }

            errorsHtml += '</div>';
            $('.error-sign-up').html(errorsHtml);
            $('#errorsModal').modal('show');
        });
    }); */
/* 
    $('#newsletter').submit(function (e) {
        e.preventDefault();

        var $inputs = $('#newsletter :input');

        // not sure if you wanted this, but I thought I'd add it.
        // get an associative array of just the values.
        var values = {};
        $inputs.each(function () {
            values[this.name] = $(this).val();
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "https://easycredit.vn/url-subcribe",
            type: 'POST',
            data: values,
            beforeSend: function () {
                $(".nhan-loading").stop().fadeIn(100);
            },
        }).done(function (res) {
            if (res.status_code === 200) {
                $('.error-subscribe').empty();
                $('#successSubscribeModal').modal('show');
                $('#newsletter')[0].reset();
                $(".nhan-loading").stop().fadeOut(100);
            }
        }).fail(function (res) {
            $('.error-subscribe').empty();
            if (res.status === 422) {

                var errorsHtml = '<div>';

                $.each(res.responseJSON.message, function (key, value) {
                    errorsHtml += '<p>' + value[0] + '</p>';
                });
                errorsHtml += '</div>';

                $('.error-subscribe').html(errorsHtml);
            } else {
                // do some thing else
            }
            $(".nhan-loading").stop().fadeOut(100);
        });

    });

    $('.click-go-to-footer-input').click(function () {
        $('#subcribe').focus();
    });
    
    // Subcriber
    $('.btn-subcribe-news').click(function(e){
        e.preventDefault();

        var formData = $('#cta').serialize();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "https://easycredit.vn/url-subcribe-news",
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $(".nhan-loading").stop().fadeIn(100);
            },
        }).done(function (res) {
            if (res.status_code === 200) {
                $('#successSubscribeModal').modal('show');
                $('#cta')[0].reset();
                $(".nhan-loading").stop().fadeOut(100);
            }
        }).fail(function (res) {
            $('.error-subscribe').empty();
            if (res.status === 422) {

                var errorsHtml = '<div>';

                $.each(res.responseJSON.message, function (key, value) {
                    errorsHtml += '<p>' + value[0] + '</p>';
                });
                errorsHtml += '</div>';

                $('.error-subscribe').html(errorsHtml);
            } else {
                // do some thing else
            }
            $(".nhan-loading").stop().fadeOut(100);
        });
    });

    // The async keyword will automatically create a new Promise and return it.
    function countdownClosePopup(id_modal, time) {
        // The await keyword saves us from having to write a .then() block.
        var popup = $('#' + id_modal).modal('show');

        var time_standard = 7;
        
        if(!$('#' + id_modal).is(':visible')) {

            var timer = setInterval(function () {

                time = time - 1;

                if (!$('#' + id_modal).is(':visible')) {
                    $('.countdown-reload').html(time_standard);
                    clearInterval(timer);
                }

                $('.countdown-reload').html(time);
                if (time === 0) {
                    clearInterval(timer);
                    location.reload();
                }
            }, 1000);

        }

        return popup;
    }
 */
    // The async keyword will automatically create a new Promise and return it.
    // async function showLoanPopupTest(id_modal) {
    //     // The await keyword saves us from having to write a .then() block.
    //     let popup = await $('#' + id_modal).modal('show');

    //     var money = $('#much-you-need').val(), // Khoản vay
    //         month = $('#payment-term').val(), // Thời hạn vay
    //         name = $('#finame').val(), // Tên
    //         phone = $('#fiphone').val(), // Số điện thoại
    //         email = $('#fiemail').val(), // Email
    //         city = $("#ficity option:selected").text(), // Thành phố
    //         partner_code = $('#partner-code').val(),
    //         template_id = $('#template-id').val();

    //     var url_redirect = 'https://' + DOMAIN_PRODUCT + '/loanRequest.do?partner=' + partner_code + '&offer=' + template_id + '&amount=' + money + '&tenor=' + month + '&name=' + name + '&mPhone=' + phone + '&email=' + email + '&province=' + city + '&thirdParty=true';
    //     $('.btn-url-redirect').attr("href", url_redirect);

    //     return popup;
    // }
});