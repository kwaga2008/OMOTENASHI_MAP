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

function currentPosition(){
  if( navigator.geolocation )
{
	// 現在地を取得
	navigator.geolocation.getCurrentPosition(
		// [第1引数] 取得に成功した場合の関数
		function( position )
		{
			// 取得したデータの整理
			var data = position.coords ;
			// データの整理
			var lat = data.latitude ;
			var lng = data.longitude ;
			// アラート表示
      // alert("あなたの現在位置は、\n[" + lat + "," + lng + "]\nです。");
      var cplatlng = new google.maps.LatLng(lat, lng);
      map.panTo(cplatlng);
      var cpmarker = new google.maps.Marker({
        position: cplatlng,
        map: map,
        icon: {
          url: "/assets/images/pin.png"
        },
        animation: google.maps.Animation.DROP // マーカーを立つときのアニメーション
      });
      var cpinfoWindow = new google.maps.InfoWindow({ // 吹き出しの追加
        content: "<h2>Current Position</h2>" // 吹き出しに表示する内容
      });
      cpinfoWindow.open(map, cpmarker); // 吹き出しの表示
		},

		// [第2引数] 取得に失敗した場合の関数
		function( error )
		{
			// エラーコード(error.code)の番号
			// 0:UNKNOWN_ERROR				原因不明のエラー
			// 1:PERMISSION_DENIED			利用者が位置情報の取得を許可しなかった
			// 2:POSITION_UNAVAILABLE		電波状況などで位置情報が取得できなかった
			// 3:TIMEOUT					位置情報の取得に時間がかかり過ぎた…

			// エラー番号に対応したメッセージ
			var errorInfo = [
				"原因不明のエラーが発生しました…。" ,
				"位置情報の取得が許可されませんでした…。" ,
				"電波状況などで位置情報が取得できませんでした…。" ,
				"位置情報の取得に時間がかかり過ぎてタイムアウトしました…。"
			] ;

			// エラー番号
			var errorNo = error.code ;
			// エラーメッセージ
			var errorMessage = "[エラー番号: " + errorNo + "]\n" + errorInfo[ errorNo ] ;
			// アラート表示
			alert( errorMessage ) ;
		} ,

		// [第3引数] オプション
		{
			"enableHighAccuracy": false,
			"timeout": 8000,
			"maximumAge": 2000,
		}

	) ;
}
// 対応していない場合
else
{	// エラーメッセージ
	var errorMessage = "お使いの端末は、GeoLacation APIに対応していません。" ;
	// アラート表示
	alert( errorMessage ) ;
 }
}
