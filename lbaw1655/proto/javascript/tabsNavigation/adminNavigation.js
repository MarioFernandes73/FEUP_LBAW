window.onload = function () {       //elementos mudam
    prepareNavigation($("#administrator-navigation > li"));        //prepare horizontal bar
    prepareSidebar($("#users-navigation > li"));                //prepare sidebar
    prepareSidebar($("#auctions-navigation > li"));                //prepare sidebar
    prepareSidebar($("#tickets-navigation > li"));                //prepare sidebar
    prepareTab("users-tab");
}

//elementos mudaram
function prepareTab(id){
    var element;
    if(id == "users-tab"){
        element = $(".users-content");
        usersAjax("adminUsers","Administrator");
        usersAjax("activeUsers","Active");
        usersAjax("bannedUsers","Banned");
    }
    else if(id == "auctions-tab"){
        element = $(".auctions-content");
        auctionsAjax("scheduledAuctions", "Scheduled");
        auctionsAjax("activeAuctions", "Active");
        auctionsAjax("inConclusionAuctions","inConclusion");
        auctionsAjax("historyAuctions","Closed");
        auctionsAjax("bannedAuctions","Banned");
    }
    else if(id == "tickets-tab"){
        element = $(".tickets-content");
        ticketsAjax("reportsTickets", "Report", false);
        ticketsAjax("productsTickets", "Product", false);
        ticketsAjax("othersTickets", "Questions", false);
        ticketsAjax("questionsTickets", "Others", false);
        ticketsAjax("solvedTickets",null,true);
        ticketsAjax("allTickets");
    }
    else if(id == "statistics-tab"){
        element = $(".statistics-content");
    }
    if(element != null){
        element[0].classList.remove("hidden");
    }
}


function usersAjax(id, state) {
    $.ajax({
        type: 'get',
        url: '../../api/administrator/searchUsers.php',
        data: {"state": state},
        success: function(data){
            var users = JSON.parse(data);
            $('#'+id+'Badge').empty().append(users.length);
            $('#'+id+'Table').empty();
            for (var i = 0; i < users.length; i++) {
                if(state == "Administrator"){
                    addUserTable(id, state, users[i], users.length);
                }
                else{
                    addUserTable(id, state, users[i]);
                }
            }
        }
    });
}


function auctionsAjax(id, state){

    $.ajax({
        type: 'get',
        url: '../../api/administrator/searchAuctions.php',
        data: {"state": state},
        success: function(data){
            var auctions = JSON.parse(data);
            $('#'+id+'Badge').empty().append(auctions.length);
            $('#'+id+'Table').empty();
            for (var i = 0; i < auctions.length; i++) {
                addAuctionTable(id, state, auctions[i]);
            }
        }
    });
}

function ticketsAjax(id, category=null, state=null){
    $.ajax({
        type: 'get',
        url: '../../api/administrator/searchTickets.php',
        data: {"state": state, "category": ''+category+''},
        success: function(data){
            var specificTickets = JSON.parse(data);
            $('#'+id+'Badge').empty().append(specificTickets.length);
            $('#'+id+'Table').empty();

            for (var i = 0; i < specificTickets.length; i++) {
                var text = '<tr> <td><a>'+specificTickets[i].title+'</a></td> <td><a>'+specificTickets[i].username+'</a></td><td>CREATION DATE</td>';
                if(category == null){
                    if(state != null){
                        text += '<td>SOLVED DATE</td>';
                    }
                }
                else{
                    text +='<td> <button type="submit" class="btn btn-success btn-sm"> ' +
                        '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button> </td> ';
                }
                text += '</tr>';

                $('#'+id+'Table').append(text);
            }
        }
    });
}

function addUserTable(id, state, user, length){
    var text = '<tr id="user'+user.iduser+'">'+
        '<td><a href='+'../../pages/users/profile.php?iduser='+user.iduser+'>'+user.username+'</td>';
    if(state == "Administrator"){
        if(length == null && length != 1){
            text += '<td><button type="button" onclick="demoteUser('+user.iduser+')" class="btn btn-danger btn-xs">'+
                '<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>'+
                '</button></td>';
        }
    }else if(state == "Active"){
        text += '<td> <button type="button" onclick="promoteUser('+user.iduser+')" class="btn btn-success btn-xs"> ' +
            '<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span> </button> </td> ' +
            '<td> <button type="button" onclick="demoteUser('+user.iduser+')" class="btn btn-danger btn-xs"> ' +
            '<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> </button> </td>';
    }else if(state == "Banned"){
        text += '<td><button type="button" onclick="promoteUser('+user.iduser+')" class="btn btn-success btn-xs"> ' +
            '<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span> ' +
            '</button> </td>';
    }
    text += '</tr>';
    $('#'+id+'Table').append(text);
}

function addAuctionTable(id, state, auction){

    var text = '<tr id="auction'+auction.idauction+'" > <td><a href='+'../../pages/auctions/viewAuction.php?idauction='+auction.idauction+'>'+auction.auctionName+'</a></td> ';
    if(state == "Scheduled"){
        text += '<td><a href='+'../../pages/users/profile.php?iduser='+auction.idowner+'>'+auction.userName+'</a></td> ' +
            '<td>'+auction.startingdate+'</td>';
    }
    else if(state == "Active"){
        text += '<td><a  href='+'../../pages/users/profile.php?iduser='+auction.idowner+'>'+auction.userName+'</a></td> ' +
            '<td> <button type="button" onclick="banAuction('+auction.idauction+')" class="btn btn-danger btn-xs"> ' +
            '<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> </button> </td>';
    }
    else if (state == "inConclusion"){
        if(auction.state == "Awaiting_delivery"){
            text += '<td>Waiting for <a href='+'../../pages/users/profile.php?iduser='+auction.idowner+'>inConclusionAuction.owner</a> delivery</td>';
        }
        else if(auction.state == "Awaiting_payment"){
            text += '<td>Waiting for payment from buyer: <a href='+'../../pages/users/profile.php?iduser='+auction.idbidder+'>'+auction.idbidder+'</a></td>';
        }
    }
    else if(state == "Closed"){
        var monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];

        var startingDate = new Date(auction.startingdate);
        var endingDate = new Date(startingDate.setHours(startingDate.getHours() + auction.durationhours));

        text += '<td><a href='+'../../pages/users/profile.php?iduser='+auction.idowner+'>'+auction.userName+'</a></td> ' +
            '<td>'+endingDate.getFullYear()+'-'+monthNames[endingDate.getMonth()]+'-'+endingDate.getDay()+'</td>';
    }
    else if(state == "Banned"){
        text += '<td>Need ticket</td> ' +
            '<td>Need ticket</td>';
    }
    text += '</tr>';
    $('#'+id+'Table').append(text);
}


function demoteUser(id){
    $.ajax({
        type: 'get',
        url: '../../api/administrator/searchUsers.php',
        data: {"iduser": id},
        success: function(data){
            var user = JSON.parse(data);
            $.ajax({
                type: 'post',
                url: '../../api/administrator/alterUser.php',
                data: {"action":"demote", "state": user.state, "iduser": id},
                success: function(data){
                    $("#user"+id).remove();
                    if(user.state == "Administrator"){
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

function promoteUser(id){
    $.ajax({
        type: 'get',
        url: '../../api/administrator/searchUsers.php',
        data: {"iduser": id},
        success: function(data){
            var user = JSON.parse(data);
            $.ajax({
                type: 'post',
                url: '../../api/administrator/alterUser.php',
                data: {"action":"promote", "state": user.state, "iduser": id},
                success: function(data){
                    $("#user"+id).remove();
                    if(user.state == "Validated" || user.state == "Registered"){
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


function banAuction(id){
    $.ajax({
        type: 'post',
        url: '../../api/administrator/banAuction.php',
        data: {"idauction": id},
        success: function(data){
            $.ajax({
                type: 'get',
                url: '../../api/administrator/searchAuctions.php',
                data: {"state": "Banned", "idauction": id},
                success: function(data){
                    var auction = JSON.parse(data);
                    updateBadge("bannedAuctionsBadge", "activeAuctionsBadge");
                    addAuctionTable("bannedAuctions", "Banned", auction);
                    $("#auction"+id).remove();
                }
            });
        }
    });
}

function updateBadge(id1, id2){
    var currentBadgeNumber = Number($('#'+id1+'')[0].innerHTML);
    $('#'+id1+'')[0].innerHTML = currentBadgeNumber+1;
    currentBadgeNumber = Number($('#'+id2+'')[0].innerHTML);
    $('#'+id2+'')[0].innerHTML = currentBadgeNumber-1;
}

