var currentWindow_a = null;
var i_a = 0;
var open_a = 0;
var windowList_a = [];
var markerList_a = [];
function createMarker(data) {
    //        マーカの作成
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(data["area_latitude"], data["area_longitude"]),
        map: map,
        animation: google.maps.Animation.DROP 
    });
    markerList_a.push(marker);
    markerInfo(marker, data);
}

function markerInfo(marker, data) {

    var content = '<h2>' + data["area_en"] + '</h2><a href="/areas/' + data["id"] + '/places/0">Spot List</a>';
    var infowindow = new google.maps.InfoWindow({
        content: content,
        maxWidth: "250px"
    })
    windowList_a.push(infowindow);
    google.maps.event.addListener(marker, 'click', function (event) {
        for (var j=0; j<windowList_a.length; j++) {
            windowList_a[j].close();
          }
        infowindow.open(marker.getMap(), marker);
        console.log(window);
        
    });
}
    

jQuery(function ($) {
    var area_flag = "true";
    var request = $.ajax({
        type: 'GET',
        url: "/areas/places/marker",
        cache: false,
        data: {
            "area": area_flag,
        },
        dataType: "json",
        timeout: 3000
    });


/* 成功時 */
    request.done(function (response) {
        //console.log(response);
        var data = response;
        if (Object.keys(data).length != 0) {
            i = 0;
            data.forEach(d => {
                createMarker(d);
                i++;
            });
        } 
    });

/* 失敗時 */
    request.fail(function(){
        alert("通信に失敗しました");
    });

});