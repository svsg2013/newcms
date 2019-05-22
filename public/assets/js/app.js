function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
jQuery(function ($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var initMaster = {
        subscribe: function () {
            $('#btn_subscribe').on('click', function (e) {
                e.preventDefault();
                let _this = $(this);
                _this.prop('disabled', true);
                let form = _this.closest('form');
                let action = form.attr('action');
                let input = form.find('input');
                let email = input.val();
                if (email && validateEmail(email)) {
                    $.ajax({
                        url: action,
                        type: 'POST',
                        data: {email: email},
                    }).done(function (res) {
                        alert(res.message);
                        input.val('');
                    }).fail(function () {
                        alert('Something went wrong!');
                        _this.prop('disabled', false);
                    });
                }
                else {
                    alert('Email invalid!');
                    _this.prop('disabled', false);
                }
                return false;
            })
        }
    };

    initMaster.subscribe();
});