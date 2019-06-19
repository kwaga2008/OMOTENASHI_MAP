$('#narrow_down').on('click', function(){
    var country = $('#country').val();
    // var good = document.form_feeling.good.checked;
    // var bad = document.form_feeling.bad.checked;
    // var good = document.form_feeling.bad.checked;

    console.log(country);
    var request = $.ajax({
        type: 'GET',
        url: "/areas/places/reviews",
        cache: false,
        dataType: "json",
        data: {
            "country": country,
            "place_id": place_id,
            // "good_flag": good,
            // "bad_flag": bad,
            // "omotenashi_flag": omotenashi,
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