var map, marker;
var defaultLocation = {lat: 14.058324, lng: 108.277199}; //Viet nam
var _location = null;
var defaultLocationZoom = 5;
var google_map = "google_map";
var output = {
    'elementId': 'address',
    "options": {
        "country": "VN"
    }
};
var _date = new Date();

var urlJsonLocation = 'https://maps.googleapis.com/maps/api/geocode/json?key=' + window.google_map_key + '&components=country:vn&address=';

function initMap(centerMap) {
    if (!centerMap) {
        return false;
    }
    map = new google.maps.Map(document.getElementById(google_map), {
        zoom: defaultLocationZoom,
        zoomControl: true,
        scaleControl: false,
        // scrollwheel: false,
        center: centerMap,
        mapTypeControl: false,
        panControl: false,
        streetViewControl: false,
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP
        }
    });

    marker = new google.maps.Marker({
        position: centerMap,
        draggable: true,
        map: map
    });

    google.maps.event.addListener(marker, 'drag', function () {
        $("#branch_lat").val(marker.getPosition().lat());
        $("#branch_lng").val(marker.getPosition().lng());
    });
}

function setDataAddress(dataLocation) {
    if (typeof dataLocation != "undefined"
        && ( dataLocation === null || typeof dataLocation.lat == "undefined" || !dataLocation.lat  )) {

        var _address = $.trim($("#address").val());

        if (_address) {
            getJsonLocationFromGoogle(urlJsonLocation + _address, function (res) {
                if (typeof res != "undefined" && res && typeof res.status != "undefined" && res.status == "OK") {
                    var data = res.results[0];
                    $("#branch_lat").val(data.geometry.location.lat);
                    $("#branch_lng").val(data.geometry.location.lng);

                    var centerMap = {lat: data.geometry.location.lat, lng: data.geometry.location.lng};
                    _location = centerMap;
                    defaultLocationZoom = 14;
                    if (marker) {
                        marker.setMap(null);
                        initMap(centerMap);
                    }
                    else {
                        initGMap(centerMap);
                    }
                }
                else {
                    $("#branch_lng").val("");
                    $("#branch_lng").val("");
                    var centerMap = defaultLocation;
                    defaultLocationZoom = 5;
                    initMap(centerMap);
                    alert("Invalid address!");
                }
            });
        }
    }
    else {
        if (dataLocation.lat) {
            $("#branch_lat").val(dataLocation.lat);
            $("#branch_lng").val(dataLocation.lng);

            var centerMap = {lat: dataLocation.lat, lng: dataLocation.lng};
            _location = centerMap;
            defaultLocationZoom = dataLocation.zoom;
            if (marker) {
                marker.setMap(null);
                initMap(centerMap);
            }
            else {
                initMap(centerMap);
            }
        }
        else {
            setDataAddress(null);
        }
    }

}


jQuery(function ($) {
    $('#city_id').select2({
        placeholder: "---"
    });

    $('#parent_id').select2({
        placeholder: "---"
    });

    $("#type").change(function () {
        initFunction.init(false);
    });

    var initFunction = {
        init: function select2District(_default) {
            var _type = $('#type').val();
            // var _city = $('#city_id').val();

            $("#parent_id").html("<option selected disabled>---<option>").trigger("change");
            if (_type) {
                $.ajax({
                    url: LINK_BRANCH_PARENT + '?type=' + _type,
                    type: "GET"
                }).done(function (res) {
                    $("#parent_id").select2('destroy').empty().select2({
                        data: res.result
                    });

                    if (_default) {
                        if (typeof BRANCH_PARENT_DEFAULT !== 'undefined' && BRANCH_PARENT_DEFAULT !== '') {
                            setTimeout(function () {
                                $("#parent_id").val(BRANCH_PARENT_DEFAULT).trigger("change");
                            }, 1000);
                        }
                    }
                });
            }
        }
    }

    initFunction.init(true);

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
            'type': {required: true},
            'parent_id': {required: true},
            'city_id': {required: true},
            'en[name]': {required: true},
            'vi[name]': {required: true},
            //'vi[address]': {required: true},
            //'en[address]': {required: true},
            'email' : {email:true},
            'phone' : {minlength:8, maxlength: 15},
            'fax' : {minlength:8, maxlength: 15},
            // lat: {
            //     required: function () {
            //         if ($.trim($("#address").val())) {
            //             return true;
            //         }
            //         else {
            //             return false;
            //         }
            //     }
            // }
        }
    });

    $('a[href="#location"]').on('shown.bs.tab', function (e) {
        e.target // newly activated tab
        e.relatedTarget // previous active tab

        var center = _location ? _location : defaultLocation;
        initMap(center);
    });

    $(window).load(function () {
        googleAutoComplete(output, setDataAddress);
        var lat = $("#branch_lat").val();
        var lng = $("#branch_lng").val();
        if (lat && lng) {
            _location = {
                lat: parseFloat(lat),
                lng: parseFloat(lng)
            };
            defaultLocationZoom = 13;
        }
    });
});