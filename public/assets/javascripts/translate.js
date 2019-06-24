function translate(str,translate_into) {
    AWS.config.region = 'ap-northeast-1'; // Region
    AWS.config.credentials = new AWS.Credentials();
    var translate = new AWS.Translate({
        region: AWS.config.region,
        credentials: AWS.config.credentials,
    });
     
    var params = {
        SourceLanguageCode: "en", /* required */
        TargetLanguageCode: translate_into, /* required */
        Text: str, /* required */
      };
      translate.translateText(params, function(err, data) {
          if (err) {
                console.log(err, err.stack); // an error occurred
                return "error";  
          } else {
                console.log(data["TranslatedText"]); 
                return data["TranslatedText"];         
        }          
      });
        
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
            var s1;
            var promise1 = new Promise(function (resolve, reject){
                s1 = translate(data["information"], translate_into);  
                console.log("s1:"+s1);
                setTimeout(function () {
                       resolve(s1);
                }, 20000);
                
             });
        
        promise1.then(function (value) {
            var s = '<p>'+ value +'</p>';
            console.log(s);
            $('#infobox').append(s);
        }).catch(function (error) {
            // 非同期処理失敗。呼ばれない
            console.log(error);
        });
           
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