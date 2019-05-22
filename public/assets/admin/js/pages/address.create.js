jQuery(function ($) {
    
    $('#address_category_id, #city_id').select2();

    var validateRules = {
        address_category_id: {required: true}
    }

    for (let key in COMPOSER_LOCALES) {
        if(LOCALES_REQUIRE.indexOf(key) !== -1){
            validateRules[`${key}[title]`] = {required: true};
        }
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

var map, marker;
var defaultLocation = {
    lat: 14.058324,
    lng: 108.277199
}; //Viet nam
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
        $("#lat").val(marker.getPosition().lat());
        $("#lng").val(marker.getPosition().lng());
    });
}

function setDataAddress(dataLocation) {
    if (typeof dataLocation != "undefined" &&
        (dataLocation === null || typeof dataLocation.lat == "undefined" || !dataLocation.lat)) {

        var _address = $.trim($("#address").val());

        if (_address) {
            getJsonLocationFromGoogle(urlJsonLocation + _address, function (res) {
                if (typeof res != "undefined" && res && typeof res.status != "undefined" && res.status == "OK") {
                    var data = res.results[0];
                    $("#lat").val(data.geometry.location.lat);
                    $("#lng").val(data.geometry.location.lng);

                    var centerMap = {
                        lat: data.geometry.location.lat,
                        lng: data.geometry.location.lng
                    };
                    _location = centerMap;
                    defaultLocationZoom = 14;
                    if (marker) {
                        marker.setMap(null);
                        initMap(centerMap);
                    } else {
                        // initGMap(centerMap);
                        initMap(centerMap);
                    }
                } else {
                    $("#lng").val("");
                    $("#lng").val("");
                    var centerMap = defaultLocation;
                    defaultLocationZoom = 5;
                    initMap(centerMap);
                    alert("Invalid address!");
                }
            });
        }
    } else {
        if (dataLocation.lat) {
            $("#lat").val(dataLocation.lat);
            $("#lng").val(dataLocation.lng);

            var centerMap = {
                lat: dataLocation.lat,
                lng: dataLocation.lng
            };
            _location = centerMap;
            defaultLocationZoom = dataLocation.zoom;
            if (marker) {
                marker.setMap(null);
                initMap(centerMap);
            } else {
                initMap(centerMap);
            }
        } else {
            setDataAddress(null);
        }
    }

}


jQuery(function ($) {

    $('a[href="#location"]').on('shown.bs.tab', function (e) {
        e.target // newly activated tab
        e.relatedTarget // previous active tab

        var center = _location ? _location : defaultLocation;
        initMap(center);
    });

    $(window).load(function () {
        googleAutoComplete(output, setDataAddress);
        var lat = $("#lat").val();
        var lng = $("#lng").val();
        if (lat && lng) {
            _location = {
                lat: parseFloat(lat),
                lng: parseFloat(lng)
            };
            defaultLocationZoom = 13;
            initMap(_location);
        }
    });
});