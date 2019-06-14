var MyLatLng = new google.maps.LatLng(35.0153491, 135.6766999);
var infoWindow;
var Options = {
    zoom: 15,      //地図の縮尺値
    center: MyLatLng,    //地図の中心座標
    mapTypeId: 'roadmap'   //地図の種類
};
var map = new google.maps.Map(document.getElementById('map'), Options);

map.addListener("click",function(e){
    // コンソールで経度を表示
    console.log("lat: " + e.latLng.lat());
    // コンソールで緯度を表示
    console.log("lng: " + e.latLng.lng());
    // コンソールで{経度,緯度}を表示
    console.log("(lat,lng): " + e.latLng.toString());
    // this.setCenter(e.latLng); // クリックする場所をMapの中心にする(画面の移動速度が速い)
    this.panTo(e.latLng); //クリックする場所をMapの中心にする(画面の移動速度がゆっくり)
    // クリックする場所をマーカーを立てる
    var click_marker = new google.maps.Marker({
      position: e.latLng,
      map: map,
      title: e.latLng.toString(),
      animation: google.maps.Animation.DROP // マーカーを立つときのアニメーション
    });

    var contents = '<h2>清水寺</h2><a href="/">レビューを書く</a><br><button class="get">コンテンツ取得</button>';

    infoWindow = new google.maps.InfoWindow({ // 吹き出しの追加
        content: contents // 吹き出しに表示する内容
    });
    
    infoWindow.open(map, click_marker); // 吹き出しの表示
    
    // 上で立てたマーカーをもう一度クリックするとマーカーを削除
    click_marker.addListener("click",function(){
      this.setMap(null);
    });

});
  
