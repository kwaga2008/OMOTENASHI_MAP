function test1() {
    
}
$('#search').on('click', function(){
    var postal_code = $('#query').val();
    var request = $.ajax({
        type: 'GET',
        url: '/user/' + postal_code + '/address',
        cache: false,
        dataType: 'json',
        timeout: 3000
    });

/* 成功時 */
    request.done(function(data){
        alert("通信に成功しました");
    });

/* 失敗時 */
    request.fail(function(){
        alert("通信に失敗しました");
    });

});