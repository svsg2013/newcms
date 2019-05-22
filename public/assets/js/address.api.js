$(function () {
    $('#bh-sl-map-container').storeLocator({
        geocodeID: 'bh-sl-mylocation',
        dragSearch: true,
        fullMapStart: true,
        slideMap: false,
        nameSearch: true,
        defaultLoc: true,
        defaultLat: '10.778266',
        defaultLng: '106.696464',
        dataLocation: '/assets/locator/bank.json',
        infowindowTemplatePath: '/assets/locator/infowindow-description.html',
        listTemplatePath: '/assets/locator/location-list-description.html',
        markerImg: '/assets/images/ic-marker.png',
        markerDim: { width: '37', height: '40' },
        taxonomyFilters: { 'category': 'category-filters-container1' },
        exclusiveFiltering: true,
        addressErrorAlert: 'Yêu cầu đến google server quá nhiều. Xin chờ trong giây lát',
        // distanceErrorAlert: 'Thật không may, vị trí gần nhất của chúng tôi là lớn hơn ',
        mapSettings: { mapTypeId: google.maps.MapTypeId.ROADMAP, zoom: 14, gestureHandling: 'greedy' },
    });
});