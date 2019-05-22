jQuery(function ($) {
    $('#published_date').datepicker({
        autoclose: true,
        container: '#published_date-container'
    });

    let _elementSort = '#sortable-photos';
    const sortPhoto = $('meta[name=linkSortPhoto]').attr('content');

    const validateRules = {
        type: {required: true},
        published_date: {required: true},
        url_video: {required: function () {
            return $('input[name=type]:checked').val() === 'VIDEOS';
        }},
    }


    $('input[name=type]').change(function() {
        if (this.value == 'VIDEOS') {
            $('#tab-video').removeClass('hidden');
            $('#tab-photos').addClass('hidden');
        }
        else if (this.value == 'IMAGES') {
            $('#tab-photos').removeClass('hidden');
            $('#tab-video').addClass('hidden');
        }
    });

    if(sortPhoto){
        $(_elementSort).sortable({
            placeholder: "sortable-placeholder",
            cancel: ".disable-sort-item",
            helper: 'clone',
            sort: function (e, ui) {
                position = Number($(_elementSort + " > li:visible").index(ui.placeholder));
                if (position == 0) position = 1;
                else position = position + 1;
                $(ui.placeholder).html("<div class='placeholder'> " + position + " </div>");
            },
            update: function (event, ui) {
                var positions = "";
                $(_elementSort).children().each(function (i) {
                    var li = $(this);
                    positions += "" + li.attr("data-id") + '=' + i + '&';
                });
                var str_lenght = positions.length;
                str_lenght = str_lenght - 1;
                positions = positions.substring(0, str_lenght);

                var data = {
                    _token: $('meta[name=csrf-token]').attr('content'),
                    positions: positions
                };
                $.ajax({
                    type: "PUT",
                    url: sortPhoto,
                    data: data,
                    success: function (data) {
                        console.log(positions);
                    }
                });
            },
            start: function (event, ui) {
                ui.item.startPos = ui.item.index();
            },
            stop: function (event, ui) {
                console.log("Start position: " + ui.item.startPos);
                console.log("New position: " + ui.item.index());
            }
        });
        $(_elementSort).disableSelection();
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