var files;

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
    files = event.files;
}

function addTicketComment(event,idTicket) {

    alert(idTicket);
    alert($(event.target).prev().html());

        /*$idauction = $("input[name='idauction']").val();
        $message = $("textarea[name='message']").val();*/

        // Create a formdata object and add the files
        var info = new FormData();
       /* info.append('idauction',$idauction);
        info.append('message',$message);*/
       info.append('idticket',idTicket);
        $.each(files, function (key, value) {
            info.append(key, value);
            alert(value);
        });

/*
        $.ajax({
            url: '../../api/auctions/commentAuction.php?files',
            type: 'POST',
            data: info,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function (data) {
                data = JSON.parse(data);

                $('textarea[name="message"]').val("");
                $('input[name="upload"]').files = null;
                files =null;

                if (data.result != 0){
                    newNotification('panel-danger', data.result);
                    $(document).scrollTop(0);
                }
                else if (data.result == 0) {

                    var content = "<div class='panel panel-default'>" +
                        "<div class='panel-heading'>" +
                        "<strong>Anonymous</strong>" +
                        "<span class='text-muted'> Commented on " + data.date;

                    if(data.state == "Administrator"){
                        content +=      "<button type='button' class='btn btn-warning btn-xs pull-right'>" +
                            "<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>" +
                            "</button>";
                    }

                    content += "</div>";

                    //Load all files of the comment
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

                    content +=    "<div class='panel-body'>" +
                        $message + "</div></div>";

                    $(content).insertAfter(("#createComment"));

                    newNotification('panel-success', "Commented auction with success.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('ERRORS: ' + textStatus);
            }
        });
    });
*/
}


function openTicket(idticket){
    $('.tickets-list').each(function(i, obj) {
        obj.classList.add("hidden");
    });

    $.ajax({
        type: 'get',
        url: '../../api/tickets/getTicket.php',
        data: {"idticket": idticket},
        success: function (data) {
            var ticketComments = JSON.parse(data);

            if(ticketComments.length <= 0)
                return;

            var text = '<div id="openedTicket" class="col-sm-10" > ' +
                '<h3 class="sub-header text-center">'+ticketComments[0].title+'</h3> ' +
                '<div class="panel panel-default" style="min-height: 420px"> ' +
                '<div class="panel-heading" style="min-height:80px"> ' +
                '<strong>'+ticketComments[0].username+'   </strong>'+ticketComments[0].message+'</div> ' +
                '<div class="panel-body pre-scrollable" style="height:220px">';


            for (var i = 1; i < ticketComments.length; i++){
                text +=
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading">' +
                    '<strong>'+ticketComments[i].username+'</strong>' +
                    '</div>' +
                    '<div class="panel-body">' +
                    ''+ticketComments[i].message+'</div> </div>';
            }

            text += '</div><div class="panel-footer" style="min-height: 120px;">'+
                '<form id="ticketForm"> ' +
                '<textarea id="ticketComment" class="col-sm-12" rows="3" placeholder="New answer"></textarea> ' +
                '<button style="margin-top: 5px;" type="button" class="btn btn-success pull-right" onclick="addTicketComment(this,' + idticket + ')"> ' +
                '<span class="glyphicon glyphicon-send" aria-hidden="true"></span> ' +
                '</button> ' +
                '<label style="margin: 5px;" class="btn btn-success btn-file pull-right"> ' +
                '<span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> ' +
                '<input type="file" style="display: none;" onchange="saveFiles(this)"> ' +
                '</label> ' +
                '</form> ' +
                '</div> ' +
                '</div> ' +
                '</div>';

            $("#ticket-container").append(text);

        }
    });
}