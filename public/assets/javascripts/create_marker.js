function createMarker(data){
    //        マーカの作成
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(data["latitude"], data["longitude"]),
        map: map,
        animation: google.maps.Animation.DROP 
    });
    markerInfo(marker, data);
}

function markerInfo(marker, data) {

    var content = '<h2>' + data["place_en"] + '</h2><br><br><a href="/areas/' + data["area_id"] + '/places/'+ data["id"] + '">Get Information</a>';
    google.maps.event.addListener(marker, 'click', function (event) {
         new google.maps.InfoWindow({
            content: content
        }).open(marker.getMap(), marker);
    });
}
    
var currentInfoWindow = null;
jQuery(function ($) {
    var request = $.ajax({
        type: 'GET',
        url: "/areas/places/marker",
        cache: false,
        dataType: "json",
        timeout: 3000
    });


/* 成功時 */
    request.done(function (response) {
        console.log(response);
        var data = response;
        if (Object.keys(data).length != 0) {
            data.forEach(d => {
                createMarker(d);
            });
        } 
    });

/* 失敗時 */
    request.fail(function(){
        alert("通信に失敗しました");
    });

});