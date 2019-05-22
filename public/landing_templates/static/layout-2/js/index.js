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
        autoplay: true,
        autoplaySpeed: 10000
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
  // end gallery
            
  });
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


  
    select();
    valiForm();
    labelForm();
    //btnShadow();
}(jQuery));
