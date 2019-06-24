function translate(str,translate_into) {
    
        
}


$('#translate').on('click', function () {
    var translate_into = $('#translate_option').val();
    console.log(translate_into);
    var request = $.ajax({
        type: 'GET',
        url: "/areas/places/infos",
        cache: false,
        dataType: "json",
        data: {
            "place_id": place_id,
        },
        timeout: 3000
    });

    /* 成功時 */
    request.done(function (data) {
        $('#infobox').empty();
        if (Object.keys(data).length != 0) {
            var s = '<p>'+ value +'</p>';
            console.log(s);
            $('#infobox').append(s);    
    } else {
        console.log("failed");
        var content = 'Translate failed';
            $('#infobox').append(content);
    }
   
});

/* 失敗時 */
request.fail(function(){
    alert("Info取得失敗");
    $('#infobox').empty();
    var content = 'Translate failed';
    $('#infobox').append(content);
});

});

function infoshow() {
    var request = $.ajax({
        type: 'GET',
        url: "/areas/places/infos",
        cache: false,
        dataType: "json",
        data: {
            "place_id": place_id,
        },
        timeout: 3000
    });
    
    /* 成功時 */
    request.done(function (data) {
        $('#infobox').empty();
        if (Object.keys(data).length != 0) {
            console.log(data);
                $('#infobox').append("<p>"+data["information"]+"</p>");
        } else {
            console.log("failed");
            var content = 'Translate failed';
                $('#infobox').append(content);
        }
       
    });
    
    /* 失敗時 */
    request.fail(function(){
        alert("Info取得失敗");
        $('#infobox').empty();
        var content = 'Translate failed';
        $('#infobox').append(content);
    });
}