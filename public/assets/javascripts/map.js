var MyLatLng = new google.maps.LatLng(latitude,longitude);
var infoWindow;
var cpinfoWindow;
var cplatlng;
var cpmarker;
var Options = {
  zoom: 16, //地図の縮尺値
  center: MyLatLng, //地図の中心座標
  mapTypeId: 'roadmap' //地図の種類
};
var map = new google.maps.Map(document.getElementById('map'), Options);

// var marker = new google.maps.Marker({
//   position: MyLatLng,
//   map: map,
//   animation: google.maps.Animation.DROP // マーカーを立つときのアニメーション
// });

// var contents1 = '<h2>' + place_en + '</h2><a href="/areas/'+ area_id +'/places/' + place_id + '/reviews/create">Write New Review</a>';

// var infoWindow1 = new google.maps.InfoWindow({ // 吹き出しの追加
//     content: contents1 // 吹き出しに表示する内容
//   });

// infoWindow1.open(map, marker); // 吹き出しの表示
  
// google.maps.event.addListener(marker, 'click', function (event) {
// 	infoWindow1.close();
//   cpinfoWindow.open(cpmarker.getMap(), cpmarker);
// });

map.addListener("click", function (e) {
  // コンソールで経度を表示
  console.log("lat: " + e.latLng.lat());
  // コンソールで緯度を表示
  console.log("lng: " + e.latLng.lng());
  // コンソールで{経度,緯度}を表示
  console.log("(lat,lng): " + e.latLng.toString());
  // this.setCenter(e.latLng); // クリックする場所をMapの中心にする(画面の移動速度が速い)
  this.panTo(e.latLng); //クリックする場所をMapの中心にする(画面の移動速度がゆっくり)
  // クリックする場所をマーカーを立てる
  /*
   var click_marker = new google.maps.Marker({
    position: e.latLng,
    map: map,
    title: e.latLng.toString(),
    animation: google.maps.Animation.DROP // マーカーを立つときのアニメーション
  });
  */

   // var contents = '<h2>' + place_en + '</h2><a href="/places/' + place_id + '/reviews/create">Write New Review</a><br><a href="/places/'+ place_id +'/reviews/">Get Information</a>';

  // infoWindow = new google.maps.InfoWindow({ // 吹き出しの追加
  // content: contents // 吹き出しに表示する内容
  // });

 // infoWindow.open(map, click_marker); // 吹き出しの表示

  // 上で立てたマーカーをもう一度クリックするとマーカーを削除
  marker.addListener("click", function () {
	  infoWindow1.close();
  });

});

function currentPosition(){
  if( navigator.geolocation )
{
  // 現在地を取得
    if (cpmarker) {
      cpmarker.setMap(null);
    }
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
      cplatlng = new google.maps.LatLng(lat, lng);
      map.panTo(cplatlng);
      cpmarker = new google.maps.Marker({
        position: cplatlng,
        map: map,
        icon: {
          url: "/assets/images/pin.png"
        },
        animation: google.maps.Animation.DROP // マーカーを立つときのアニメーション
      });
      cpinfoWindow = new google.maps.InfoWindow({ // 吹き出しの追加
        content: "<h2>Current Position</h2></p><a onclick=map_getaddress()>get address</a>" // 吹き出しに表示する内容
      });
      cpinfoWindow.open(map, cpmarker);
      cpmarker.addListener("click", function () {
				cpinfoWindow.open(cpmarker.getMap(), cpmarker);
			  }); // 吹き出しの表示
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

function map_getaddress() {
	var geocoder = new google.maps.Geocoder();
	geocoder.geocode({
		// 緯度経度を指定
		latLng: cplatlng
	}, function (results, status) {
		// 成功
		if (status == google.maps.GeocoderStatus.OK && results[0].geometry) {
			// 住所フル
			address = results[0].formatted_address.replace(/^日本、 /, '');
			var contents2 = '<h2>Current Position</h2>' + address;
			cpinfoWindow.setContent(contents2) ;
			console.log(address);
		}
	});
	
}