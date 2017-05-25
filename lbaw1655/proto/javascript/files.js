function uploadFiles(input) {

    var files = input.files;
    var newDoc = "</div><img class='fileImage' src='' width='200' style='display:none;' />";
    for (var i = 0; i < files.length; i++) {

        var path = URL.createObjectURL(input.files[i])
        var tmppath = path;
        var name = files[i]['name'];

        tmppath = tmppath.replace('blob:','');
        /*  tmppath = tmppath.toString();*/
        //  tmppath = tmppath.replace('\\' , '');


        console.log('path',path + "/" + name);

        $("#uploadfiles").after(newDoc);
        $("#uploadfiles").after().fadeIn("fast").attr('src',path);
/*
        $.ajax({
            type: 'POST',
            url: '../../api/files/uploadFiles.php',
            data: {
                "filename": name,
                "filepath": tmppath
            },
            success: function (data) {

                data = JSON.parse(data);
                newNotification('panel-danger', data.result);
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });*/
    }
}