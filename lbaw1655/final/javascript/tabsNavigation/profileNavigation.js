var offsets = new Array(0, 0, 0, 0, 0, 0);

window.onload = function () {
    prepareNavigation($("#profile-navigation > li"));        //prepare horizontal bar
    prepareSidebar($("#myProfile-navigation > li"));                //prepare sidebar
    prepareSidebar($("#myAuctions-navigation > li"));                //prepare sidebar
    prepareSidebar($("#myTickets-navigation > li"));                //prepare sidebar
    prepareStatistics();
}

function next(myoffset) {
    offsets[myoffset]++;

    executeAjax(myoffset);
}

function previous(myoffset) {
    if (offsets[myoffset] <= 0)
        return false;

    offsets[myoffset]--;

    executeAjax(myoffset);
}

function executeAjax(myoffset) {
    if (myoffset == 0)
        auctionsAjax("followedAuctions", "followed", 0);
    else if (myoffset == 1)
        auctionsAjax("inConclusionAuctions", "inConclusion", 1);
    else if (myoffset == 2)
        auctionsAjax("historyAuctions", "history", 2);
    else if (myoffset == 3)
        ticketsAjax(3, "activeTickets", false);
    else if (myoffset == 4)
        ticketsAjax(4, "solvedTickets", true);
    else if (myoffset == 5)
        ticketsAjax(5, "allTickets");
}

function prepareTab(id) {
    var element;
    if (id == "profile-tab") {
        element = $(".profile-content");
    }
    else if (id == "auctions-tab") {
        element = $(".auctions-content");
        auctionsAjax("followedAuctions", "followed", 0);
        auctionsAjax("inConclusionAuctions", "inConclusion", 1);
        auctionsAjax("historyAuctions", "history", 2);
    }
    else if (id == "tickets-tab") {
        element = $(".tickets-content");
        ticketsAjax(3, "activeTickets", false);
        ticketsAjax(4, "solvedTickets", true);
        ticketsAjax(5, "allTickets");
    }
    element[0].classList.remove("hidden");
}

function ticketsAjax(myoffset, id, type) {
    $.ajax({
        type: 'get',
        url: '../../api/tickets/searchTickets.php',
        data: {"solved": type, "offset": offsets[myoffset]},
        success: function (data) {
            var tickets = JSON.parse(data);
            $('#' + id + 'Badge').empty().append(tickets.length);
            $('#' + id + 'Table').empty();
            allTickets = [];
            for (var i = 0; i < tickets.length; i++) {

                var text = '<tr><td><a href="" onclick="openTicket(' + tickets[i].idticket + '); return false;">' + tickets[i].title + '</a></td>';

                if (type == false) {
                    text += '<td id="ticket' + tickets[i].idticket + '">' +
                        '<button type="button" onclick="solveTicket(' + tickets[i].idticket + ')" class="btn btn-success btn-xs">' +
                        '<span class="glyphicon glyphicon-ok" aria-hidden="false"></span>' +
                        '</button>' +
                        '</td>';
                }

                text += '</tr>';

                $('#' + id + 'Table').append(text);
            }
        }
    });
}

function allTicketsAjax() {
    $.ajax({
        type: 'get',
        url: '../../api/tickets/searchTickets.php',
        success: function (data) {
            var activeTickets = JSON.parse(data);
            $("#allTicketsBadge").empty().append(activeTickets.length);
            $("#allTicketsTable").empty();
            for (var i = 0; i < activeTickets.length; i++) {
                $("#allTicketsTable").append('<td><a>' + activeTickets[i].title + '</a></td>');
            }
        }
    });
}

function auctionsAjax(id, type, myoffset) {
    $.ajax({
        type: 'get',
        url: '../../api/auctions/searchAuctions.php',
        data: {"type": type, "offset": offsets[myoffset]},
        success: function (data) {
            var auctions = JSON.parse(data);
            var iduser = $("#iduser")[0].innerHTML;
            $('#' + id + 'Badge').empty().append(auctions.length);
            $('#' + id + 'Table').empty();
            var runPaypal = [];
            for (var i = 0; i < auctions.length; i++) {

                var text = '<tr id="auction' + auctions[i].idauction + '"><td><a href=' + '../../pages/auctions/viewAuction.php?idauction=' + auctions[i].idauction + '>' + auctions[i].name + '</a></td>';
                if (type == "followed") {

                    var startingDate = new Date(auctions[i].startingdate);
                    var endingDate = startingDate.setHours(startingDate.getHours() + auctions[i].durationhours);
                    var timeleft = new Date(endingDate - new Date());

                    text += '<td class="timeleft">' + timeleft.getDay() + ' days ' + timeleft.getHours() + ':' + timeleft.getMinutes() + ':' + timeleft.getSeconds() + '</td>'
                } else if (type == "inConclusion") {
                    if (iduser == auctions[i].idowner) {
                        //OWNER
                        text += '<td>Delivery</td>';
                        if (auctions[i].state == 'Awaiting_payment') {
                            text += '<td class="text-center"><strong>Waiting for payment, please stand by.</strong></td>' +
                                '<td class="text-center"><button type="button" onclick="reportUserPayment(' + auctions[i].idauction + ')" class="btn btn-danger">Report Problem</button></td>';
                        }
                        else {
                            text += '<td class="text-center"><strong>Payment has been concluded. Please send your item.</strong></td>' +
                                '<td class="text-center"><button type="button" onclick="reportUserDelivery(' + auctions[i].idauction + ')" class="btn btn-danger">Report Problem</button></td>';
                        }
                    }
                    else {
                        //BUYER
                        text += '<td>Reception</td>';
                        if (auctions[i].state == 'Awaiting_payment') {
                            runPaypal.push(auctions[i]);
                            text += '<td><div id="paypal-button-container' + auctions[i].idauction + '"></div></td>';
                            text += '<td><button type="button" onclick="payAuction(' + auctions[i].idauction + ')" class="btn btn-success">Make Offline Payment</button></td>';

                        }
                        else {
                            text += '<td class="text-center"><button type="button" onclick="reportUserDelivery(' + auctions[i].idowner + ')" class="btn btn-danger">Report Problem</button></td>' +
                                '<td class="text-center">' +
                                '<button type="button" onclick="confirmDelivery(' + auctions[i].idauction + ')" class="btn btn-success">Confirm Delivery</button></td>';
                        }
                    }
                } else if (type == "history") {

                    var monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];

                    var startingDate = new Date(auctions[i].startingdate);
                    var endingDate = startingDate.setHours(startingDate.getHours() + auctions[i].durationhours);
                    var endingDate = new Date(endingDate);

                    var text = '<tr><td><a>' + auctions[i].name + '</a></td><td>' + endingDate.getFullYear() + '-' + monthNames[endingDate.getMonth()] + '-' + endingDate.getDay() + '</td><td>' + auctions[i].ammount + '</td>';

                    if (auctions[i].idowner == iduser) {

                        //SELLER
                        if (auctions[i].buyerrating == null) {
                            text += '<td><input title="rate auction" id="rateAuction' + auctions[i].id + '"  class="rateperson" data-size="xs" data-min="0" data-max="5" data-step="0.5"/></td>';
                            text += '<td><button type="button" onclick="rateBuyer(' + auctions[i].iduser + ',' + auctions[i].id + ')" class="btn btn-success">Rate other user</button></td>'
                        }
                        else {
                            text += '<td><input title="auction rate" class="showrate" value="' + auctions[i].buyerrating + '" data-size="xs" data-min="0" data-max="5" data-step="0.5"/></td>';
                            text += '<td><strong>Already rated</strong></td>'
                        }

                    }
                    else {

                        //BUYER
                        if (auctions[i].sellerrating == null) {

                            text += '<td><input title="rate auction" id="rateAuction' + auctions[i].id + '" class="rateperson" data-size="xs" data-min="0" data-max="5" data-step="0.5" value="0"/></td>';
                            text += '<td><button type="button" onclick="rateSeller(' + iduser + ',' + auctions[i].id + ')" class="btn btn-success">Rate other user</button></td>'
                        }
                        else
                            text += '<td><input title="auction rate" class="showrate" value="' + auctions[i].sellerrating + '" data-size="xs" data-min="0" data-max="5" data-step="0.5"/></td>';
                        text += '<td><strong>Already rated</strong></td>'

                    }
                    text += '</tr>';

                }
                text += '</tr>';
                $('#' + id + 'Table').append(text);
                $('.rateperson').rating({
                    showClear: false,
                    showCaption: false
                });
                $('.showrate').rating({
                    showClear: false,
                    showCaption: false,
                    displayOnly: true
                });

            }
            for (var i = 0; i < runPaypal.length; i++) {
                paypalfunc(runPaypal[i]);
            }


        }
    });

}

function payAuction(id) {
    advanceState(id);
    $("#auction" + id).remove();
    auctionsAjax("inConclusionAuctions", "inConclusion", 1);
}

function advanceState(id) {
    $.ajax({
        type: 'post',
        url: '../../api/auctions/advanceState.php',
        data: {"id": id},
        success: function (data) {
        }
    });
}

function confirmDelivery(id) {
    advanceState(id);
    $("#auction" + id).remove();
    auctionsAjax("inConclusionAuctions", "inConclusion", 1);
    auctionsAjax("historyAuctions", "history", 2);
}

function rateBuyer(iduser, id) {
    var val = ($("#rateAuction" + id)[0].value);
    rateAuction(iduser, id, val, "buyer");
}

function rateSeller(iduser, id) {
    var val = ($("#rateAuction" + id)[0].value);
    rateAuction(iduser, id, val, "seller");
}

function rateAuction(iduser, id, val, type) {

    if (val != "") {
        $.ajax({
            type: 'post',
            url: '../../api/auctions/rateAuction.php',
            data: {
                "iduser": iduser,
                "id": id,
                "val": val,
                "type": type
            },
            success: function (data) {

            }
        });
    }

    $("#auction" + id).remove();
    auctionsAjax("historyAuctions", "history", 2);

}

function reportUser(iduser, subject) {

    var form = $('<form name="report" class="hidden"' +
        'action="../../pages/tickets/tickets.php"  method="post"> ' +
        '<input title="report" name="idUser" value="' + iduser + '"/>' +
        '<input title="message" name="msg" value="' + subject + '"/>' +
        '</form>');

    $('body').append(form);
    form.submit();
}

function reportUserDelivery(iduser) {
    reportUser(iduser, "Item receivement");
}

function reportBuyer(idauction, subject) {
    $.ajax({
        type: 'post',
        url: '../../api/auctions/getIdUser.php',
        data: {"idauction": idauction},
        success: function (data) {
            data = JSON.parse(data);
            reportUser(data.iduser, subject);
        }
    });
}

function reportUserPayment(idauction) {
    reportBuyer(idauction, "Payment receivement");
}

function reportUserDelivery(idauction) {
    reportBuyer(idauction, "Item Delivery");
}

function solveTicket(idticket) {
    $.ajax({
        type: 'post',
        url: '../../api/tickets/solveTicket.php',
        data: {"idticket": idticket},
        success: function (data) {
            $("#ticket" + idticket).remove();
            ticketsAjax(3, "activeTickets", false);
            ticketsAjax(4, "solvedTickets", true);
            ticketsAjax(5, "allTickets");

        }
    });
}

function prepareStatistics(){


   $.ajax({
        type: 'get',
        url: '../../api/users/getStatistics.php',
       data: {userid: $("#iduser")[0].innerHTML},
        success: function (data) {
            data = JSON.parse(data);
            $("#totalBidsStats")[0].innerHTML = data.quantityBids;
            $("#totalWonAuctionsStats")[0].innerHTML = data.quantityWonAuctions;
        }
    });
}