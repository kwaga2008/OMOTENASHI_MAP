var currentWindow = null;
var i = 0;
var open = 0;
var windowList = [];
var markerList = [];
function createMarker(data) {
    //        マーカの作成
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(data["latitude"], data["longitude"]),
        map: map,
        animation: google.maps.Animation.DROP 
    });
    markerList.push(marker);
    markerInfo(marker, data);
}

function markerInfo(marker, data) {

    var content = '<h2>' + data["place_en"] + '</h2><img src="/assets/images/'+ data["img_src"]+'"/ width=150px><br><br><a href="/areas/' + data["area_id"] + '/places/' + data["id"] + '">Get Information</a><a href="/areas/'+ data["area_id"] +'/places/' + data["id"] + '/reviews/create">Write New Review</a>';
    var infowindow = new google.maps.InfoWindow({
        content: content,
        maxWidth: "250px"
    })
    windowList.push(infowindow);
    google.maps.event.addListener(marker, 'click', function (event) {
        for (var j=0; j<windowList.length; j++) {
            windowList[j].close();
          }
        infowindow.open(marker.getMap(), marker);
        
    });
}
    

jQuery(function ($) {
    var area_flag = "false";
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
        console.log(response);
        var data = response;
        if (Object.keys(data).length != 0) {
            i = 0;
            //console.log(data);
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