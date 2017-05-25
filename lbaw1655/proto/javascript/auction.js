$(document).ready(function () {
    followAuction();
    reportAuction();
    bidAuction();
    commentAuction();
    removeComment();
});

function followAuction() {
    $("button[name='follow']").click(function () {
        $.ajax({
            type: 'POST',
            url: '../../api/auctions/followAuction.php',
            data: {"idauction": $("input[name='idauction']").val()},
            success: function (data) {
                data = JSON.parse(data);
                if (data.result != 0)
                    newNotification('panel-danger', data.result);
                else if (data.result == 0)
                    newNotification('panel-success', "User is following the auction.");
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    });
};

function removeComment() {
    $("button[name='removecomment']").click(function () {
        $parent = $(this).parent();
        $idcomment = $parent.children("input[name='idcomment']").val();
        console.log($idcomment);
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
    $("button[name='report']").click(function () {
        $.ajax({
            type: 'POST',
            url: '../../api/tickets/reportAuction.php',
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
                    $("dd[name='currentprice']").text(value);
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

function commentAuction() {
    $("button[name='commentAuction']").click(function () {
        $idauction = $("input[name='idauction']").val();
        $message = $("textarea[name='message']").val();
        $file = $("input[name='upload']");
        $filepath = $file.val();

        $.ajax({
            type: 'POST',
            url: '../../api/auctions/commentAuction.php',
            data: {
                "idauction": $idauction,
                "message": $message,
                "filepath": $filepath
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.result != 0)
                    newNotification('panel-danger', data.result);
                else if (data.result == 0) {
                    /*$("#createComment").after(
                        "<div class='panel panel-default'>" +
                        "<div class='panel-heading'>" +
                        "<strong>Anonymous</strong>" +
                        "<span class='text-muted'>Commented on {$comment.date}</span>" +
                        "<button style='margin-left: 5px;' type='button' class='btn btn-danger btn-xs pull-right'>" +
                        "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" +
                        "</button>" +
                        "{if $STATE == 'Administrator'}" +
                        "<button type='button' class='btn btn-warning btn-xs pull-right'>" +
                        "<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>" +
                        "</button>" +
                        "{/if}" +
                        "</div>" +
                        "{if $comment.path != null}" +
                        "<div class='thumbnail' style='border: none'>" +
                        "<img src='../../{$comment.path}' alt='comment image'>" +
                        "</div>" +
                        "{/if}" +
                        "<div class='panel-body'>" +
                        "{$comment.message}" +
                        "</div>" +
                        "</div>"
                    );*/
                    newNotification('panel-success', "Commented auction with success.");
                }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    });
};
