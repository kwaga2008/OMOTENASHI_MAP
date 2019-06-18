var MyLatLng = new google.maps.LatLng(36.723185159717005,137.85103713265494);
var infoWindow;
var Options = {
  zoom: 5, //地図の縮尺値
  center: MyLatLng, //地図の中心座標
  mapTypeId: 'roadmap' //地図の種類
};
var map = new google.maps.Map(document.getElementById('map'), Options);

var markerLatLng = new google.maps.LatLng(35.84646737625077, 137.898415672694);
var marker = new google.maps.Marker({
  position: markerLatLng,
  map: map,
  animation: google.maps.Animation.DROP // マーカーを立つときのアニメーション
});

var contents1 = '<h2>Japan</h2>';

var infoWindow1 = new google.maps.InfoWindow({ // 吹き出しの追加
    content: contents1 // 吹き出しに表示する内容
  });

  infoWindow1.open(map,marker); // 吹き出しの表示

map.addListener("click", function (e) {
  // コンソールで経度を表示
  console.log("lat: " + e.latLng.lat());
  // コンソールで緯度を表示
  console.log("lng: " + e.latLng.lng());
  // コンソールで{経度,緯度}を表示
  console.log("(lat,lng): " + e.latLng.toString());
  // this.setCenter(e.latLng); // クリックする場所をMapの中心にする(画面の移動速度が速い)
  this.panTo(e.latLng); //クリックする場所をMapの中心にする(画面の移動速度がゆっくり)
  
});
