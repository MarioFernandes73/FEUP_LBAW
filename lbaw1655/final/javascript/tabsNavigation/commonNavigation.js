var files = [];
var offset = 0;
var reloadMore = true;

function prepareSidebar(elements) {
    for (var i in elements)
        elements[i].onclick = function () {
            if(this.innerHTML){                     //checks for "undefined"
                removeAllActive(elements);          // removes all "active" class from all elements of sidebar
                var x = $(this).parent().parent().parent();
                addAllHidden($('.'+x[0].classList.toString()+':not(:first-child)'));      //add "hidden" to all of the content except the first one.
                removeAllHidden(document.getElementsByClassName(this.className.trim()));    //removes "hidden" from the element pressed
                this.classList.add("active");       //adds "active" to the one element pressed
                $("#openedTicket").remove();        //removes an opened ticket if such exists
            }
        }
}

function reloadMoreComments(event,idticket){

    //If scroll on top
    if($(document.getElementById("messages")).scrollTop() < 200 && reloadMore) {
        reloadMore = false;
        offset += 10;

        var scrollheight = document.getElementById("messages").scrollHeight;

        //Request More Comments
        $.ajax({
            type: 'get',
            url: '../../api/tickets/getTicket.php',
            data: {"idticket": idticket, "offset" : offset},
            success: function (data) {
                var ticketComments = JSON.parse(data);

                if (ticketComments.length < 10)     //After this do not have more comments to reload
                    reloadMore = false;
                else
                    reloadMore = true;

                if(ticketComments.length == 0)
                    return;

                var text = "";

                //comments
                for (var i = ticketComments.length - 1; i >= 0; i--) {

                    text +=
                        '<div class=" panel panel-default  ticketCommentBlock">' +
                        '<div class="panel-heading">' +
                        '<strong>' + ticketComments[i].username + '</strong>' +
                        "<span class='text-muted'> Commented on " + ticketComments[i].date + "</span>" +
                        '</div>' +
                        '<div class="panel-body">';

                    text += ticketComments[i].message;

                    //images
                    if (ticketComments[i].path != null) {
                        text += "<div class='thumbnail' style='border: none'><img src='../../" + ticketComments[i].path + "'alt='comment image'></div>";

                        //in case there is more than one
                        var tmp_id = ticketComments[i].idticketcomment;
                        while (i - 1 > 1) {
                            i--
                            if (ticketComments[i].idticketcomment == tmp_id) {
                                text += "<div class='thumbnail' style='border: none'><img src='../../" + ticketComments[i].path + "' alt='comment image'></div>";
                            }
                            else {
                                i++;
                                break;
                            }
                        }
                    }

                    text += '</div> </div>';
                }
                $(event).prepend(text);

            },
            error: function (textStatus) {
                console.log('ERRORS: ' + textStatus);
            }
        });

        var newHeight = document.getElementById("messages").scrollHeight;

        $(event).stopImmediatePropagation;
        setTimeout(function() {
            $(document.getElementById("messages")).scrollTop(newHeight - scrollheight + 200);
            },200
        );
    }
}

function removeAllHidden(elements){
    for(var j in elements){
        if(elements[j].innerHTML)
            elements[j].classList.remove("hidden");
    }
}

function addAllHidden(elements) {
    for(var j in elements){
        if(elements[j].innerHTML)
            elements[j].classList.add("hidden");
    }
}

function prepareNavigation(elements){
   for (var i in elements)
        elements[i].onclick = function () {
            if(this.innerHTML){
                removeAllActive(elements);
                addAllHidden($(".row").children());
                prepareTab(this.id);
                this.classList.add("active");
            }
        }
}

function removeAllActive(navigationElements) {
    for (var j in navigationElements) {
        if (hasClass(navigationElements[j], "active"))
            navigationElements[j].classList.remove("active");
    }
}

function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}

function saveFiles(event){
    newNotification('panel-success', "Files successfully uploaded.");

    $.each(event.files, function (key, value) {
        files.push(value);
    });
}

function addTicketComment(event,idTicket) {

    $message = $(document.getElementById("ticketComment")).val();


        // Create a formdata object and add the files
        var info = new FormData();
       info.append('idticket',idTicket);
       info.append('message',$message);
        $.each(files, function (key, value) {
            info.append(key, value);
        });

        $.ajax({
            url: '../../api/tickets/commentTicket.php?files',
            type: 'POST',
            data: info,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function (data) {
                data = JSON.parse(data);

                if(data.result == 0){

                    //prepare new content to insert in the DOM
                    var content = '<div class="ticketCommentBlock panel panel-default">' +
                        '<div class="panel-heading">' +
                        '<strong>'+data.username+'</strong>' +
                        "<span class='text-muted'> Commented on " + data.date +"</span>"+
                        '</div>' +
                        '<div class="panel-body">' + $message;

                    //photos
                    for(var i =0; i < data.photos.length; i++) {

                        var photo = data.photos[i];
                        console.log(photo);
                        console.log(photo.name);
                        console.log(photo.path);
                        console.log(photo.date);

                        if (photo.path != "") {
                            content += "<div class='thumbnail' style='border: none'>" +
                                "<img src='../../" + photo.path + "' alt='comment image'>" +
                                "</div>";
                        }
                    }

                    content += '</div>';

                    var nComments = document.getElementsByClassName('ticketCommentBlock').length;
                    if(nComments != 0){
                        $(content).insertAfter(document.getElementsByClassName('ticketCommentBlock')[nComments-1]);

                        //scroll down to the last comment
                        setTimeout(function() {
                                $(document.getElementById('messages')).scrollTop(document.getElementById('messages').scrollHeight)
                            },200
                        );
                    }
                    else
                        $(document.getElementById('messages')).append(content);


                }
                else
                    newNotification('panel-danger',data.result);

                //resetValues
                $('textarea').val("");
                files = [];
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('ERRORS: ' + textStatus);
            }
        });

}


function openTicket(idticket){
    $('.tickets-list').each(function(i, obj) {
        obj.classList.add("hidden");
    });

    $.ajax({
        type: 'get',
        url: '../../api/tickets/getTicket.php',
        data: {"idticket": idticket, "offset" : offset},
        success: function (data) {
            var ticketComments = JSON.parse(data);

            if(ticketComments.length <= 0)
                return;

            //ticket information
            var text = '<div id="openedTicket" class="col-sm-10" > ' +
                '<h3 class="sub-header text-center" >'+ticketComments[0].title+'</h3> ' +
                '<div class="panel panel-default" style="min-height: 420px"> ' +
                '<div class="panel-heading " style="min-height:80px"> ' +
                '<strong>'+ticketComments[0].username+'   </strong>'+ticketComments[0].message+'</div> ' +
                '<div id="messages" class="panel-body pre-scrollable" style="height:600px" onscroll="reloadMoreComments(this,' + idticket + ')">';


            //comments
            for (var i = ticketComments.length -1; i > 1; i--){

                text +=
                    '<div class=" panel panel-default  ticketCommentBlock">' +
                    '<div class="panel-heading">' +
                    '<strong>'+ticketComments[i].username+'</strong>' +
                    "<span class='text-muted'> Commented on " +ticketComments[i].date +"</span>"+
                    '</div>' +
                    '<div class="panel-body">';

                text += ticketComments[i].message;

                //images
                if(ticketComments[i].path != null){
                    text +=  "<div class='thumbnail' style='border: none'><img src='../../" + ticketComments[i].path + "'alt='comment image'></div>";

                    //in case there is more than one
                    var tmp_id = ticketComments[i].idticketcomment;
                    while(i-1 > 1){
                        i--
                        if(ticketComments[i].idticketcomment == tmp_id){
                            text += "<div class='thumbnail' style='border: none'><img src='../../" + ticketComments[i].path + "' alt='comment image'></div>";
                        }
                        else{
                            i++;
                            break;
                        }
                    }
                }

                text += '</div> </div>';
            }

            //new comment
            text += '</div><div class="panel-footer" style="min-height: 120px;">'+
                '<form id="ticketForm" enctype="multipart/form-data">  ' +
                '<textarea title="ticket answer" id="ticketComment" class="col-sm-12" rows="3" placeholder="New answer"></textarea> ' +
                '<button style="margin-top: 5px;" type="button" class="btn btn-success pull-right" onclick="addTicketComment(this,' + idticket + ')"> ' +
                '<span class="glyphicon glyphicon-send" aria-hidden="true"></span> ' +
                '</button> ' +
                '<label style="margin: 5px;" class="btn btn-success btn-file pull-right"> ' +
                '<span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> ' +
                '<input type="file" style="display: none;" onchange="saveFiles(this)" multiple="multiple"> ' +
                '</label> ' +
                '</form> ' +
                '</div> ' +
                '</div> ' +
                '</div>';

            $("#ticket-container").append(text);
            setTimeout(function() {
                $(document.getElementById('messages')).scrollTop(document.getElementById('messages').scrollHeight)
            },200
            );


        }
    });
}