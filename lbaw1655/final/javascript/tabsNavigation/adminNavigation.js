var offsets = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

window.onload = function () {       //elementos mudam
    prepareNavigation($("#administrator-navigation > li"));        //prepare horizontal bar
    prepareSidebar($("#users-navigation > li"));                //prepare sidebar
    prepareSidebar($("#auctions-navigation > li"));                //prepare sidebar
    prepareSidebar($("#tickets-navigation > li"));                //prepare sidebar
    prepareTab("users-tab");
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
        usersAjax("adminUsers", "Administrator", 0);
    else if (myoffset == 1)
        usersAjax("activeUsers", "Active", 1);
    else if (myoffset == 2)
        usersAjax("bannedUsers", "Banned", 2);
    else if (myoffset == 3)
        auctionsAjax("scheduledAuctions", "Scheduled", 3);
    else if (myoffset == 4)
        auctionsAjax("activeAuctions", "Active", 4);
    else if (myoffset == 5)
        auctionsAjax("inConclusionAuctions", "inConclusion", 5);
    else if (myoffset == 6)
        auctionsAjax("historyAuctions", "Closed", 6);
    else if (myoffset == 7)
        auctionsAjax("bannedAuctions", "Banned", 7);
    else if (myoffset == 8)
        ticketsAjax(8, "reportsTickets", "Report", false);
    else if (myoffset == 9)
        ticketsAjax(9, "productsTickets", "Product", false);
    else if (myoffset == 10)
        ticketsAjax(10, "othersTickets", "Questions", false);
    else if (myoffset == 11)
        ticketsAjax(11, "questionsTickets", "Others", false);
    else if (myoffset == 12)
        ticketsAjax(12, "solvedTickets", null, true);
    else if (myoffset == 13)
        ticketsAjax(13, "allTickets");
}

//elementos mudaram
function prepareTab(id) {
    var element;
    if (id == "users-tab") {
        element = $(".users-content");
        usersAjax("adminUsers", "Administrator", 0);
        usersAjax("activeUsers", "Active", 1);
        usersAjax("bannedUsers", "Banned", 2);
    }
    else if (id == "auctions-tab") {
        element = $(".auctions-content");
        auctionsAjax("scheduledAuctions", "Scheduled", 3);
        auctionsAjax("activeAuctions", "Active", 4);
        auctionsAjax("inConclusionAuctions", "inConclusion", 5);
        auctionsAjax("historyAuctions", "Closed", 6);
        auctionsAjax("bannedAuctions", "Banned", 7);
    }
    else if (id == "tickets-tab") {
        element = $(".tickets-content");
        ticketsAjax(8, "reportsTickets", "Report", false);
        ticketsAjax(9, "productsTickets", "Product", false);
        ticketsAjax(10, "othersTickets", "Questions", false);
        ticketsAjax(11, "questionsTickets", "Others", false);
        ticketsAjax(12, "solvedTickets", null, true);
        ticketsAjax(13, "allTickets");
    }
    else if (id == "statistics-tab") {
        element = $(".statistics-content");
    }
    if (element != null) {
        element[0].classList.remove("hidden");
    }
}

function usersAjax(id, state, myoffset) {
    $.ajax({
        type: 'get',
        url: '../../api/administrator/searchUsers.php',
        data: {"state": state, "offset": offsets[myoffset]},
        success: function (data) {
            var users = JSON.parse(data);
            $('#' + id + 'Badge').empty().append(users.length);
            $('#' + id + 'Table').empty();
            for (var i = 0; i < users.length; i++) {
                if (state == "Administrator") {
                    addUserTable(id, state, users[i]);
                }
                else {
                    addUserTable(id, state, users[i]);
                }
            }
        }
    });
}

function auctionsAjax(id, state, myoffset) {
    $.ajax({
        type: 'get',
        url: '../../api/administrator/searchAuctions.php',
        data: {"state": state, "offset": offsets[myoffset]},
        success: function (data) {
            var auctions = JSON.parse(data);
            $('#' + id + 'Badge').empty().append(auctions.length);
            $('#' + id + 'Table').empty();
            for (var i = 0; i < auctions.length; i++) {
                addAuctionTable(id, state, auctions[i]);
            }
        }
    });
}

function ticketsAjax(myoffset, id, category=null, state=null) {
    $.ajax({
        type: 'get',
        url: '../../api/administrator/searchTickets.php',
        data: {"state": state, "category": '' + category + '', "offset": offsets[myoffset]},
        success: function (data) {
            var specificTickets = JSON.parse(data);
            $('#' + id + 'Badge').empty().append(specificTickets.length);
            $('#' + id + 'Table').empty();

            for (var i = 0; i < specificTickets.length; i++)
            {
                var text;
                if(category == "Product"){
                    text = '<tr> <td><a href="../../pages/auctions/viewAuction.php?idauction='+specificTickets[i].idauction+'">' + specificTickets[i].name + '</a></td>' +
                        '<td><a href=' + '../../pages/users/profile.php?iduser=' + specificTickets[i].iduser + '>' + specificTickets[i].username + '</a></td>';
                }
                else {
                    text = '<tr> <td><a href="" onclick="openTicket(' + specificTickets[i].idticket + '); return false;">' + specificTickets[i].title + '</a></td>' +
                        '<td><a href=' + '../../pages/users/profile.php?iduser=' + specificTickets[i].iduser + '>' + specificTickets[i].username + '</a></td>';
                }

                if (category == null) {
                    if (state != null) {
                        text += '<td>' + specificTickets[i].resolveddate + '</td>';
                    }
                }
                else{
                    text += '<td> <button type="button" onclick="solveTicket(' + specificTickets[i].idticket + ')" class="btn btn-success btn-sm"> ' +
                        '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button> </td> ';
                }

                text += '</tr>';

                $('#' + id + 'Table').append(text);
            }
        }
    });
}

function addUserTable(id, state, user) {

    var sessionid = $("#sessionid")[0].innerHTML;

    var text = '<tr id="user' + user.iduser + '">' +
        '<td><a href=' + '../../pages/users/profile.php?iduser=' + user.iduser + '>' + user.username + '</td>';
    if (state == "Administrator") {
        if (user.iduser != sessionid) {
            text += '<td><button type="button" onclick="demoteUser(' + user.iduser + ')" class="btn btn-danger btn-xs">' +
                '<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>' +
                '</button></td>';
        } else {
            text += '<td></td>';
        }


    } else if (state == "Active") {
        text += '<td> <button type="button" onclick="promoteUser(' + user.iduser + ')" class="btn btn-success btn-xs"> ' +
            '<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span> </button> </td> ' +
            '<td> <button type="button" onclick="demoteUser(' + user.iduser + ')" class="btn btn-danger btn-xs"> ' +
            '<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> </button> </td>';
    } else if (state == "Banned") {
        text += '<td><button type="button" onclick="promoteUser(' + user.iduser + ')" class="btn btn-success btn-xs"> ' +
            '<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span> ' +
            '</button> </td>';
    }
    text += '</tr>';
    $('#' + id + 'Table').append(text);
}

function addAuctionTable(id, state, auction) {

    var text = '<tr id="auction' + auction.idauction + '" > <td><a href=' + '../../pages/auctions/viewAuction.php?idauction=' + auction.idauction + '>' + auction.auctionName + '</a></td> ';
    if (state == "Scheduled") {
        text += '<td><a href=' + '../../pages/users/profile.php?iduser=' + auction.idowner + '>' + auction.username + '</a></td> ' +
            '<td>' + auction.startingdate + '</td>';
    }
    else if (state == "Active") {
        text += '<td><a  href=' + '../../pages/users/profile.php?iduser=' + auction.idowner + '>' + auction.username + '</a></td> ' +
            '<td> <button type="button" onclick="banAuction(' + auction.idauction + ')" class="btn btn-danger btn-xs"> ' +
            '<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> </button> </td>';
    }
    else if (state == "inConclusion") {
        if (auction.state == "Awaiting_delivery") {
            text += '<td>Waiting for <a href=' + '../../pages/users/profile.php?iduser=' + auction.idowner + '>' + auction.username + '</a> delivery</td>';
        }
        else if (auction.state == "Awaiting_payment") {
            text += '<td>Waiting for payment from buyer: <a href=' + '../../pages/users/profile.php?iduser=' + auction.idbidder + '>' + auction.idbidder + '</a></td>';
        }
    }
    else if (state == "Closed") {
        var monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];

        var startingDate = new Date(auction.startingdate);
        var endingDate = new Date(startingDate.setHours(startingDate.getHours() + auction.durationhours));

        text += '<td><a href=' + '../../pages/users/profile.php?iduser=' + auction.idowner + '>' + auction.username + '</a></td> ' +
            '<td>' + endingDate.getFullYear() + '-' + monthNames[endingDate.getMonth()] + '-' + endingDate.getDay() + '</td>';
    }
    else if (state == "Banned") {
        text += '<td>Need ticket</td> ' +
            '<td>Need ticket</td>';
    }
    text += '</tr>';
    $('#' + id + 'Table').append(text);
}

function demoteUser(id) {
    $.ajax({
        type: 'get',
        url: '../../api/administrator/searchUsers.php',
        data: {"iduser": id},
        success: function (data) {
            var user = JSON.parse(data);
            $.ajax({
                type: 'post',
                url: '../../api/administrator/alterUser.php',
                data: {"action": "demote", "state": user.state, "iduser": id},
                success: function (data) {
                    $("#user" + id).remove();
                    if (user.state == "Administrator") {
                        updateBadge("activeUsersBadge", "adminUsersBadge");
                        addUserTable("activeUsers", "Active", user);
                    } else if (user.state == "Validated" || user.state == "Registered") {
                        updateBadge("bannedUsersBadge", "activeUsersBadge");
                        addUserTable("bannedUsers", "Banned", user);
                    }
                }
            });
        }
    });
}

function promoteUser(id) {
    $.ajax({
        type: 'get',
        url: '../../api/administrator/searchUsers.php',
        data: {"iduser": id},
        success: function (data) {
            var user = JSON.parse(data);
            $.ajax({
                type: 'post',
                url: '../../api/administrator/alterUser.php',
                data: {"action": "promote", "state": user.state, "iduser": id},
                success: function (data) {
                    $("#user" + id).remove();
                    if (user.state == "Validated" || user.state == "Registered") {
                        updateBadge("adminUsersBadge", "activeUsersBadge");
                        addUserTable("adminUsers", "Administrator", user);
                    } else if (user.state == "Banned") {
                        updateBadge("activeUsersBadge", "bannedUsersBadge");
                        addUserTable("activeUsers", "Active", user);
                    }


                }
            });
        }
    });
}

function banAuction(id) {
    $.ajax({
        type: 'post',
        url: '../../api/administrator/banAuction.php',
        data: {"idauction": id},
        success: function (data) {
            $.ajax({
                type: 'get',
                url: '../../api/administrator/searchAuctions.php',
                data: {"state": "Banned", "idauction": id},
                success: function (data) {
                    var auction = JSON.parse(data);
                    updateBadge("bannedAuctionsBadge", "activeAuctionsBadge");
                    addAuctionTable("bannedAuctions", "Banned", auction);
                    $("#auction" + id).remove();
                }
            });
        }
    });
}

function updateBadge(id1, id2) {
    var currentBadgeNumber = Number($('#' + id1 + '')[0].innerHTML);
    $('#' + id1 + '')[0].innerHTML = currentBadgeNumber + 1;
    currentBadgeNumber = Number($('#' + id2 + '')[0].innerHTML);
    $('#' + id2 + '')[0].innerHTML = currentBadgeNumber - 1;
}

function solveTicket(idTicket) {
    $.ajax({
        type: 'post',
        url: '../../api/administrator/solveTicket.php',
        data: {"idticket": idTicket},
        success: function (data) {
            prepareTab("tickets-tab");
        }
    });
}
