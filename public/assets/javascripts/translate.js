$('#translate').on('click', function () {
    var translate_into = $('#translate_option').val();
    console.log(translate_into);
    $('#infobox').empty();
});

function infoshow() {
    $('#infobox').empty();
    console.log("infobox deleted");
    info = "<p>" + info + "</p>"
    $('#infobox').append(info);
    console.log("infobox created");
}