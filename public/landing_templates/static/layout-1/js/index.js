/* global Swiper */
  // end main slide
  (function ($) {
  // main gallery

				
  $(function() {
    $('.main-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        //autoplay: true,
      //  autoplaySpeed: 10000
      });

      $('.low-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 10000
      });
            
  });
}(jQuery));

  
  // end gallery
  function careerDetail() {
    $('#careerDetail').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var title = button.data('title'),
            location = button.data('location'),
            link = button.data('link'),
            time = button.data('time'),
            salary = button.data('salary'),
            number = button.data('number'),
            form = button.data('form'),
            workingtime = button.data('workingtime'),
            experience = button.data('experience'),
            position = button.data('position'),
            desc = button.data('desc'),
            request = button.data('request'),
            benefit = button.data('benefit');
        var modal = $(this);
        modal.find('.careerDetail__title').text(title);
        modal.find('.careerDetail__location').text(location);
        modal.find('.careerDetail__time').text(time);
        modal.find('.careerDetail__salary').text(salary);
        modal.find('.careerDetail__number').text(number);
        modal.find('.careerDetail__form').text(form);
        modal.find('.careerDetail__workingtime').text(workingtime);
        modal.find('.careerDetail__experience').text(experience);
        modal.find('.careerDetail__position').text(position);
        modal.find('.careerDetail__desc').html(desc);
        modal.find('.careerDetail__request').html(request);
        modal.find('.careerDetail__benefit').html(benefit);
        modal.find('.careerDetail__footer a').attr({
            'href': link
        })
    })
}

  $expand = $('.expand');
  $expand.click(function() {
      el = $(this);
      elContent = el.next('ul'), allContent = el.parent('li').parent('ul').children('li').children('ul'), allExpand = allContent.prev('.expand');
      if (el.hasClass('active')) {
          el.removeClass('active');
          elContent.stop().slideUp(200)
      } else {
          allContent.stop().slideUp(200);
          allExpand.removeClass('active');
          el.addClass('active');
          elContent.stop().slideDown(200)
      }
  }); 

// Select Form
function select() {
    var chosenE = $('select.select');
    if (chosenE.length > 0) {
        chosenE.chosen({
            'disable_search': true
        });
        chosenE.each(function() {
            if ($(this).attr('required') !== undefined) {
                $(this).on('change', function() {
                    $(this).valid()
                })
            }
        })
    }
    $('.chosen-results, .list').niceScroll({
        cursorcolor: 'rgba(177,180,193,0.5)',
        cursorwidth: '4px',
        background: 'rgba(226,226,226,0.5)',
        cursorborder: 'none',
        cursorborderradius: '2px'
    })
}

function valiForm() {
    $.validator.setDefaults({
        ignore: ':hidden:not(select)'
    });
    $valiForm = $('form.validate');
    if ($valiForm.length > 0) {
        $valiForm.each(function() {
            var el = $(this),
                id = el.attr('id');
            $('#' + id).validate({
                errorPlacement: function(error, element) {
                    if (element.is('select.select')) { // placement for chosen
                        error.insertAfter(element.next('div.chosen-container'))
                    } else { // standard placement
                        error.insertAfter(element)
                    }
                }
            })
        })
    }
    var subject = $('#subject');
    subject.change(function() {
        var el = $(this),
            val = el.val();
        console.log(val);
        if (val == 'other') {
            el.parents('.form-group').find('input.form-control').show();
            el.parents('.form-group').find('.form-group__back').show()
        }
    });
    $(document).on('click', '.form-group__back', function(e) {
        var el = $(this);
        e.preventDefault();
        subject.val($('#subject option:first').val());
        subject.trigger('chosen:updated');
        el.parents('.form-group').find('input.form-control').hide();
        el.parents('.form-group').find('.form-group__back').hide()
    })
}

function labelForm() {
    var fGroup = $('.form-group');
    fGroup.each(function() {
        var el = $(this),
            input = el.find('.form-control'),
            value = input.val();
        if (value) {
            input.attr('data-value', 'true')
        } else {
            input.attr('data-value', 'false')
        }
        input.on('input', function() {
            var _el = $(this),
                _value = _el.val();
            if (_value) {
                _el.attr('data-value', 'true')
            } else {
                _el.attr('data-value', 'false')
            }
        })
    });
    var fileGroup = $('.file-group');
    fileGroup.each(function() {
        var el = $(this);
        el.find('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            el.find('.form-control > label').text(fileName)
        })
    })
}

function date() {
    var fGroups = $('.form-groups');
    fGroups.each(function() {
        var el = $(this),
            inputs = el.find('.form-controls'),
            value = input.val();
        if (value) {
            inputs.attr('data-value', 'true')
        } else {
            inputs.attr('data-value', 'false')
        }
        input.on('input', function() {
            var _el = $(this),
                _value = _el.val();
            if (_value) {
                _el.attr('data-value', 'true')
            } else {
                _el.attr('data-value', 'false')
            }
        })
    });
    var fileGroup = $('.file-group');
    fileGroup.each(function() {
        var el = $(this);
        el.find('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            el.find('.form-control > label').text(fileName)
        })
    })
}

/*
  $(document).on('click', '.btn-loan', function (e) {
    e.preventDefault();

    var salary = $('#inputSalary').val(), // Thu nhập hàng tháng
        id = $('#inputId').val(), // Số CMND
        name = $('#inputName').val(), // Tên
        phone = $('#inputPhone').val(), // Số điện thoại
        city = $('#inputCity').val(); // Thành phố sinh sống

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: URL_LOAN,
        type: 'POST',
        data: {
            salary: salary,
            name: name,
            phone: phone,
            email: email,
            city: city,
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
});
*/


  

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
function form() {
    var job = $('#inputJob');
    var doc = $('#inputDoc');
    var modalWarning01 = $('#warningFirstModal');
    var modalWarning02 = $('#warningModal');
    if (job.val() === '') {
        doc.prop('disabled', true);
        doc.trigger('chosen:updated')
    } else {
        doc.prop('disabled', false);
        doc.trigger('chosen:updated')
    } // Chọn combo giấy tờ
    var btn = $('.docs-modal'); // Hiển thị box chọn combo giấy tờ
    $('body').on('click', '.docs-modal + .chosen-container, .docs-modal', function(e) {
        e.preventDefault();
        if (job.val()) {
            $('#docsModal').modal('show')
        } else {
            modalWarning01.modal('show')
        }
    }); // Chọn combo
    $(document).on('click', '.docsTable .btn', function() {
        var el = $(this);
        var _val = el.data('val');
        btn.val(_val);
        btn.attr('data-value', 'true');
        btn.trigger('chosen:updated');
        $('.docsTable .btn').removeClass('active');
        el.addClass('active');
        if (el.hasClass('active')) {
            $('#docsModal').modal('hide')
        } // Kiểm tra select box giấy tờ
        vJob = job.val();
        if (vJob) {
            group.removeClass('disabled')
        } else {
            if (!group.hasClass('disabled')) {
                group.addClass('disabled')
            }
        }
    }); // Kiểm tra bước 1 để kích hoạt bước 2
    var group = job.parents('.col-sm-10').next('.col-sm-10');
    job.change(function() {
        var el = $(this);
        vJob = el.val();
        vDoc = doc.val();
        if (vJob && vDoc) {
            group.removeClass('disabled')
        } else {
            if (!group.hasClass('disabled')) {
                group.addClass('disabled')
            }
        }
    }); // Hiện thông báo nếu client chọn bước 2 trước bước 1
    $('div#moreDescription3').click(function() {
        if ($(this).hasClass('disabled')) {
            modalWarning02.modal('show')
        }
    }); // Gọi hàm xử lý chọn khoản vay và thời hạn vay
    range()
} // Range Form

function updateRange(){
	function _muchYouNeedUpdate() {
            var $muchYouNeed = $('#much-you-need'),
                dataPrefix = $muchYouNeed.data('prefix'),
                dataMin = $muchYouNeed.data('min'),
                dataMax = $muchYouNeed.data('max'),
                dataFrom = $muchYouNeed.data('from'),
                dataStep = $muchYouNeed.data('step');
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
            _ionRangeSliderUpdate($muchYouNeed, dataMin, dataMax, dataFrom, dataStep, dataPrefix)
        }
        function _paymentTermsUpdate() {
            var $paymentTerms = $('#payment-term'),
                dataPrefix = $paymentTerms.data('prefix'),
                dataMin = $paymentTerms.data('min'),
                dataMax = $paymentTerms.data('max'),
                dataFrom = $paymentTerms.data('from'),
                dataStep = $paymentTerms.data('step');
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
            _ionRangeSliderUpdate($paymentTerms, dataMin, dataMax, dataFrom, dataStep, dataPrefix)
        }

	function _ionRangeSliderUpdate(el, dataMin, dataMax, dataFrom, dataStep, dataPrefix){
		el.data("ionRangeSlider").update({
			min: dataMin,
			max: dataMax,
			from: dataFrom,
			step: dataStep
		});
	}
	
	function _checkRangeUpdate() {
		var month = $('#payment-term').val();
		var money = $('#much-you-need').val(); // Gá»i hĂ m tĂ­nh lĂ£i
		// _calc(money, month);
	}
	
	_muchYouNeedUpdate();
	_paymentTermsUpdate();
}

function range() {
    var $range = $('.form-range');
    if ($range.length) {
        function _muchYouNeed() {
            var $muchYouNeed = $('#much-you-need'),
                dataPrefix = $muchYouNeed.data('prefix'),
                dataMin = $muchYouNeed.data('min'),
                dataMax = $muchYouNeed.data('max'),
                dataFrom = $muchYouNeed.data('from'),
                dataStep = $muchYouNeed.data('step');
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
            var $paymentTerms = $('#payment-term'),
                dataPrefix = $paymentTerms.data('prefix'),
                dataMin = $paymentTerms.data('min'),
                dataMax = $paymentTerms.data('max'),
                dataFrom = $paymentTerms.data('from'),
                dataStep = $paymentTerms.data('step');
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
            $el.ionRangeSlider({
                min: dataMin,
                max: dataMax,
                from: dataFrom,
                step: dataStep,
                type: 'single',
                prefix: dataPrefix,
                hide_min_max: true,
                hide_from_to: true,
                force_edges: false,
                grid: false,
                onStart: function() {
                    var text = $el.parent('.form-range').find('.irs-slider.single');
                    text.text(dataPrefix);
                    _checkRange()
                },
                onChange: function(data) {
                    var val = $el.parent('.form-range').find('ins span');
                    val.text(prettify(data.from));
                    _checkRange()
                }
            })
        }
        function prettify(num) {
            var n = num.toString();
            return n.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, '$1' + '.')
        }
        function _checkRange() {
            var month = $('#payment-term').val();
            var money = $('#much-you-need').val(); // Gá»i hĂ m tĂ­nh lĂ£i
            // _calc(money, month);
        }
        function _calc(money, month) {
            var result = $('.divider b');
            var interest = 0.01; // Danh sĂ¡ch lĂ£i xuáº¥t theo thĂ¡ng: á»Ÿ Ä‘Ă¢y cÅ©ng lĂ  vĂ­ dá»¥
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
            } // CĂ´ng thá»©c tĂ­nh khoáº£n vay. táº¡m thá»i vĂ­ dá»¥ lĂ  váº­y
            var recipe = interest * money; // Xá»­ lĂ½ Ä‘á»ƒ render ra HTML
            var temp = Number(recipe).toFixed(0);
            result.html(prettify(temp) + '<sup>\u0111</b>')
        }
        _muchYouNeed();
        _paymentTerms()
    }
}
    careerDetail();
    select();
    valiForm();
    labelForm();
    form();
	coefficient = 1.06; 
$('#much-you-need').change(function () {
	var money = parseFloat($(this).val());
	var duration = parseFloat($('#payment-term').val());
	var result = calculatorLoan(money, interest_rate, duration, coefficient);
	//console.log(money, interest_rate, duration, coefficient,result);
	$('.result-loan').html(result + '<sup>đ</sup>');
});

$('#payment-term').change(function () {
	var duration = parseFloat($(this).val());
	var money = parseFloat($('#much-you-need').val());
	var result = calculatorLoan(money, interest_rate, duration, coefficient);
	$('.result-loan').html(result + '<sup>đ</sup>');
});
	function calculatorLoan(c, r, duration, x) {
        var mauso = 1 - 1 / (Math.pow((1 + (r / 12) * 0.01), duration));
        var result_loan = x * c * (((r / 12) * 0.01) / mauso);
        result_loan = Math.round(result_loan / 1000) * 1000;
        return result_loan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
	

