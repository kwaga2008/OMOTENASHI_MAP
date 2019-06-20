$('#narrow_down').on('click', function(){
    var country = $('#country').val();
    var good = $("[name=checkbox01]:checked").val();
    var bad = $("[name=checkbox02]:checked").val();
    var omotenashi = $("[name=checkbox03]:checked").val();
    
    console.log(country);
    console.log(good);
    console.log(bad);
    console.log(omotenashi);

    var request = $.ajax({
        type: 'GET',
        url: "/areas/places/reviews",
        cache: false,
        dataType: "json",
        data: {
            "country": country,
            "place_id": place_id,
            "good": good,
            "bad": bad,
            "omotenashi": omotenashi,
        },
        timeout: 3000
    });

/* 成功時 */
    request.done(function (data) {
        $('.reviews').empty();
        if (Object.keys(data).length != 0) {
            data.forEach(d => {
                var content = '<div class="message clearfix"><div class="message_box"><p class="user_name_show"><b>Name:</b>' + d["nickname"]+ '</p><p class="country_show"><b>Country:</b>'+d["country"]+'</p><p class="feeling_show"><b>Feeling:</b>'+d["feeling"]+'</p><div class="bar_center"><p>-------------------------------------------------------------------------</p></div><p class="text_show"><b>Text:</b>'+d["text"]+'</p></div></div>';
                $('.reviews').append(content);
            });
        } else {
            var content = '<div class="message clearfix"><div class="message_box"><p><b>No Review</b></p></div></div>';
                $('.reviews').append(content);
        }
       
    });

/* 失敗時 */
    request.fail(function(){
        alert("絞り込み失敗");
    });

});