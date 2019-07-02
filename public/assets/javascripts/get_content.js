$('#search').on('click', function () {
    var query = $('#query').val();
    var area = $('#area_option').val();
    console.log(query);
    console.log(area);
    if (area == "Area") {
        var request = $.ajax({
            type: 'GET',
            url: "/areas/get",
            cache: false,
            dataType: "json",
            data: {
                "query": query,
            },
            timeout: 3000
        });
        /* 成功時 */
        request.done(function (data) {
            $('.search_results').empty();
            if (Object.keys(data).length != 0) {
                console.log(data);
                data.forEach(d => {
                    var content = '<a href="/areas/' + d["id"] + '/places/0' + '">' + d["area_en"] + '</a><br>'
                    $('.search_results').append(content);
                });
            } else {
                var content = 'no area';
                $('.search_results').append(content);
            }

        });

        /* 失敗時 */
        request.fail(function () {
            alert("通信に失敗しました");
        });
    } else {
        var request = $.ajax({
            type: 'GET',
            url: "/areas/places/get",
            cache: false,
            dataType: "json",
            data: {
                "query": query,
                "area": area,
            },
            timeout: 3000
        });
        /* 成功時 */
        request.done(function (data) {
            $('.search_results').empty();
            if (Object.keys(data).length != 0) {
                data.forEach(d => {
                    var content = '<a href="/areas/' + d["area_id"] + '/places/' + d["id"] + '">' + d["place_en"] + '</a><br>'
                    $('.search_results').append(content);
                });
            } else {
                var content = 'no place';
                $('.search_results').append(content);
            }

        });

        /* 失敗時 */
        request.fail(function () {
            alert("通信に失敗しました");
        });
    }

});