var files = [];

$(document).ready(function () {
    initiationFollow();
    clickFollowAuction();
    reportAuction();
    buyAuction();
    alterPrice();
    bidAuction();
    bidBlindAuction()
    makeComment();
    removeComment();
});



function saveFiles(event) {
    newNotification('panel-success', "Files uploaded with success.");

    $.each(event.files, function (key, value) {
        files.push(value);
    });

}

function clickFollowAuction() {
    $("button[name='follow']").click(function () {

        $.ajax({
            type: 'POST',
            url: '../../api/auctions/followAuction.php',
            data: {"idauction": $("input[name='idauction']").val()},

            success: function (data) {

                data = JSON.parse(data);
                if (data.result != 0) {
                    newNotification('panel-danger', data.msg);
                }
                else if (data.result == 0) {
                    $("button[name='follow']").text(data.follow);
                    newNotification('panel-success', data.msg);
                }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    });
};

function initiationFollow() {
    $.ajax({
        type: 'POST',
        url: '../../api/auctions/isUserFollowing.php',
        data: {"idauction": $("input[name='idauction']").val()},
        success: function (data) {
            data = JSON.parse(data);

            if (data.result==1)
                $("button[name='follow']").text("Unfollow");
            else
                $("button[name='follow']").text("Follow");
        }
    });
};

function removeComment() {
    $("button[name='removecomment']").click(function () {

        $parent = $(this).parent();
        $idcomment = $parent.children("input[name='idcomment']").val();
        $.ajax({
            type: 'POST',
            url: '../../api/auctions/removeComment.php',
            data: {"idcomment": $idcomment},
            success: function (data) {

                data = JSON.parse(data);

                if (data.result != "")
                    newNotification('panel-danger', data.result);
                else if (data.result == "")
                    newNotification('panel-success', "Comment removed with success.");
                $parent.parent().remove();
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    });
};

function reportAuction() {
    $(document).on('click', 'button[name=report]', function () {
        $.ajax({
            type: 'POST',
            url: '../../api/auctions/reportAuction.php',
            data: {"idauction": $("input[name='idauction']").val()},
            success: function (data) {
                data = JSON.parse(data);
                if (data.result != 0)
                    newNotification('panel-danger', data.result);
                else if (data.result == 0)
                    newNotification('panel-success', "Auction reported with success.");
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    });
};

function banAuction(id) {
    $.ajax({
        type: 'post',
        url: '../../api/administrator/banAuction.php',
        data: {"idauction": id},
        success: function (data) {

            data = JSON.parse(data);
            if (data.result != 0) {
                newNotification('panel-danger', data.msg);
            }
            else if (data.result == 0) {
                newNotification('panel-success', data.msg);
            }
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });
}

function buyAuction() {
    $("button[name='buynow']").click(function () {
        $.ajax({
            type: 'POST',
            url: '../../api/auctions/buyAuction.php',
            data: {
                "idauction": $("input[name='idauction']").val(),
                "bidvalue": $("input[name='currentprice']").val()
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.result != 0)
                    newNotification('panel-danger', data.result);
                else if (data.result == 0) {
                    newNotification('panel-success', "Successfully won the auction.");
                }

            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    });
};

function bidAuction() {
    $("button[name='makebid']").click(function () {
        $.ajax({
            type: 'POST',
            url: '../../api/auctions/bidAuction.php',
            data: {
                "idauction": $("input[name='idauction']").val(),
                "bidvalue": $("input[name='bidvalue']").val()
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.result != 0)
                    newNotification('panel-danger', data.result);
                else if (data.result == 0) {
                    var value = $("input[name='bidvalue']").val() + '€';
                    $("#currentPriceEnglish").text(value);
                    $("#notifications").prepend("<li class='list-group-item'><h4>New bid!! - Current price " + value + "</h4></li>");
                    newNotification('panel-success', "Bidded auction with success.");
                }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    });
};

function bidBlindAuction() {
    $("button[name='makeblindbid']").click(function () {
        $.ajax({
            type: 'POST',
            url: '../../api/auctions/bidAuction.php',
            data: {
                "idauction": $("input[name='idauction']").val(),
                "bidvalue": $("input[name='blindbidvalue']").val()
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.result != 0)
                    newNotification('panel-danger', data.result);
                else if (data.result == 0) {
                    $("#notifications").prepend("<li class='list-group-item'><h4>New bid!!</h4></li>");
                    newNotification('panel-success', "Bidded auction with success.");
                }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    });
};

function makeComment() {
    $('#makeComment').on('click', function () {
        $idauction = $("input[name='idauction']").val();
        $message = $("textarea[name='message']").val();

        // Create a formdata object and add the files
        var info = new FormData();
        info.append('idauction', $idauction);
        info.append('message', $message);
        $.each(files, function (key, value) {
            info.append(key, value);
        });


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
                files = [];

                if (data.result != 0) {
                    newNotification('panel-danger', data.result);
                    $(document).scrollTop(0);
                }
                else if (data.result == 0) {

                    var content ="<form class='form-horizontal' method='POST' action='../../pages/tickets/tickets.php'>" +
                        "<div class='panel panel-default'>" +
                        "<div class='panel-heading'>" +
                        "<strong>Anonymous</strong>" +
                        "<span class='text-muted'> Commented on " + data.date +"</span>"+
                        "<button style='margin-left: 5px;' type='submit' class='btn btn-danger btn-xs pull-right'>"+
                        "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>"+
                        "</button>";

                    if (data.state == "Administrator") {
                        content += "<button type='button' class='btn btn-warning btn-xs pull-right'>" +
                            "<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>" +
                            "</button>";
                    }

                    content += "</div><div class='panel-body'>" + $message + "</div>";

                    //Load all files of the comment
                    for (var i = 0; i < data.photos.length; i++) {

                        var photo = data.photos[i];

                        if (photo.path != "") {
                            content += "<div class='thumbnail' style='border: none'>" +
                                "<img src='../../" + photo.path + "' alt='comment image'>" +
                                "</div>";
                        }
                    }

                    content += "</div></form>";

                    $("#auctionMessages").prepend(content);
                    $("#notifications").prepend("<li class='list-group-item'><h4>New comment</h4></li>");
                    newNotification('panel-success', "Commented auction with success.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('ERRORS: ' + textStatus);
            }
        });
    });
};

function alterPrice() {
    $("button[name='alterprice']").click(function () {
        $.ajax({
            type: 'POST',
            url: '../../api/auctions/alterAuctionPrice.php',
            data: {
                "idauction": $("input[name='idauction']").val(),
                "altervalue": $("input[name='newprice']").val()
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.result != 0)
                    newNotification('panel-danger', data.result);
                else if (data.result == 0) {
                    var value = $("input[name='newprice']").val() + '€';
                    $("#currentPriceDutch").text(value);
                    newNotification('panel-success', "Success! Price has been altered.");
                }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    });
}