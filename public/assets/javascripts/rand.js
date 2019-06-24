var arr = [ "<img src="{{ asset('assets/images/nashiko.png') }}" width="600" height="300"alt="" class="nashiko">", "<img src="{{ asset('assets/images/nashio.png') }}" width="600" height="300"alt="" class="nashio">"] ;

// 配列からランダムで値を選択
var a = arr[ Math.floor( Math.random() * arr.length ) ] ;