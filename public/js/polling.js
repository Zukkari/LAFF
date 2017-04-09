function getContent(timestamp)
{
    var queryString = {'timestamp' : timestamp};

    $.ajax(
        {
            type: 'GET',
            url: 'getmsg',
            /*
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },*/
            data: queryString,
            success: function(data){


                // put result data into "obj"
                var obj = jQuery.parseJSON(data);
                if (obj.pealkiri !=null) {
                    $('#uus').show();
                // put the data_from_file into #response
                    //document.getElementsByClassName("pealkiri")[0].setAttribute("value", "yolo");;
                    $('#pealkiri').html(obj.pealkiri);
                    $('#text').html(obj.info);
                    $('#peatag').html(obj.tag);
                    $('#kasutaja').html(obj.kasutaja);
                    $('#aeg').html(obj.aeg);

                document.getElementById("pildilink").src = obj.pildilink;}
                $('#arv').html(obj.arv);

                //uus väljakutse aga koos ajalise muutujaga
                getContent(obj.timestamp);

            }

        }
    );

}

// initialize jQuery
$(function() {
    getContent();
});
