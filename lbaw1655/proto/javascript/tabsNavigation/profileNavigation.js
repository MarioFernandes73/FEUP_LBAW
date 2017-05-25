window.onload = function () {
    prepareNavigation($("#profile-navigation > li"));        //prepare horizontal bar
    prepareSidebar($("#myProfile-navigation > li"));                //prepare sidebar
    prepareSidebar($("#myAuctions-navigation > li"));                //prepare sidebar
    prepareSidebar($("#myTickets-navigation > li"));                //prepare sidebar
}


function prepareTab(id){
    var element;
    if(id == "profile-tab"){
        element = $(".profile-content");
    }
    else if(id == "auctions-tab"){
        element = $(".auctions-content");
        auctionsAjax("followedAuctions", "followed");
        auctionsAjax("inConclusionAuctions","inConclusion");
        auctionsAjax("historyAuctions","history");
    }
    else if(id == "tickets-tab"){
        element = $(".tickets-content");
        activeTicketsAjax();
        solvedTicketsAjax();
        allTicketsAjax();
    }
    element[0].classList.remove("hidden");
}

function activeTicketsAjax() {
    $.ajax({
        type: 'get',
        url: '../../api/tickets/searchTickets.php',
        data: {"solved": false},
        success: function(data){
            var activeTickets = JSON.parse(data);
            $("#activeTicketsBadge").empty().append(activeTickets.length);
            $("#activeTicketsTable").empty();
            for (var i = 0; i < activeTickets.length; i++) {
                    $("#activeTicketsTable").append('<td><a>' + activeTickets[i].title + '</a></td>'+
                    '<td>'+
                    '<button type="submit" class="btn btn-success btn-xs">'+
                    '<span class="glyphicon glyphicon-ok" aria-hidden="false"></span>'+
                    '</button>'+
                    '</td>'
                );
            }
        }
    });
}

function solvedTicketsAjax(){
    $.ajax({
        type: 'get',
        url: '../../api/tickets/searchTickets.php',
        data: {"solved": true},
        success: function(data){
            var activeTickets = JSON.parse(data);
            $("#solvedTicketsBadge").empty().append(activeTickets.length);
            $("#solvedTicketsTable").empty();
            for (var i = 0; i < activeTickets.length; i++) {
                $("#solvedTicketsTable").append('<td><a>' + activeTickets[i].title + '</a></td>'
                );
            }
        }
    });
}

function allTicketsAjax(){
    $.ajax({
        type: 'get',
        url: '../../api/tickets/searchTickets.php',
        success: function(data){
            var activeTickets = JSON.parse(data);
            $("#allTicketsBadge").empty().append(activeTickets.length);
            $("#allTicketsTable").empty();
            for (var i = 0; i < activeTickets.length; i++) {
                $("#allTicketsTable").append('<td><a>' + activeTickets[i].title + '</a></td>'
                );
            }
        }
    });
}

function auctionsAjax(id, type){
    $.ajax({
        type: 'get',
        url: '../../api/auctions/searchAuctions.php',
        data: {"type": type},
        success: function (data) {
            var auctions = JSON.parse(data);
            $('#'+id+'Badge').empty().append(auctions.length);
            $('#'+id+'Table').empty();
            for (var i = 0; i < auctions.length; i++) {

                var text = '<tr><td><a>'+auctions[i].name+'</a></td>';
                if(type == "followed"){

                    var startingDate = new Date(auctions[i].startingdate);
                    var endingDate = startingDate.setHours(startingDate.getHours() + auctions[i].durationhours);
                    var timeleft = new Date(endingDate - new Date());

                    text += '<td class="timeleft">'+timeleft.getDay()+' days '+timeleft.getHours()+':'+timeleft.getMinutes()+':'+timeleft.getSeconds()+'</td>'
                } else if(type == "inConclusion") {
                    if(iduser == auctions[i].idowner){
                        //OWNER
                        text += '<td>Delivery</td>';
                        if(auctions[i].state == 'Awaiting_payment'){
                            text += '<td class="text-center">'+
                                '<button type="button" class="btn btn-success">Payment received</button></td>'+
                                '<td class="text-center"><button type="button" class="btn btn-danger">Report Problem</button></td>';
                        }
                        else{
                            text += '<td class="text-center"><strong>Waiting for buyer</strong></td>'+
                                '<td class="text-center"><button type="button" class="btn btn-danger">Report Problem</button></td>';
                        }
                    }
                    else {
                        //BUYER
                        text += '<td>Reception</td>';
                        if(auctions[i].state == 'Awaiting_payment'){

                            /*    text += '<td><div id="paypal-button-container"></div>'+
                                    '<div id="confirm" class="hidden">' +
                                    '<div>Ship to:</div> ' +
                                    '<div><span id="recipient">olaolaoaloalao</span>, <span id="line1"></span>, <span id="city"></span></div> ' +
                                    '<div><span id="state"></span>, <span id="zip"></span>, <span id="country"></span></div> ' +
                                    '<button id="confirmButton">Complete Payment</button> ' +
                                    '</div> ' +
                                    '<div id="thanks" class="hidden"> Thanks, <span id="thanksname"></span>! </div></td>';*/
                            //text += '<td><div id="paypal-button-container"></div></td>';
                            text += '<td><div class="paypal-button-container"></div></td>';



                            /*else{
                                text += '<td><button type="button" class="btn btn-success">Make Payment</button></td>';
                                counter ++;
                                alert(counter);
                            }*/

                              // text += '<td><button type="button" class="btn btn-success">Make Payment</button></td>';
                        }
                        else{
                            text += '<td class="text-center"><button type="button" class="btn btn-danger">Report Problem</button></td>'+
                                '<td class="text-center">'+
                                '<button type="button" class="btn btn-success">Confirm Delivery</button></td>';
                        }
                    }
                } else if(type == "history") {

                    var monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];

                    var startingDate = new Date(auctions[i].startingdate);
                    var endingDate = startingDate.setHours(startingDate.getHours() + auctions[i].durationhours);
                    var endingDate = new Date(endingDate);

                    var text = '<tr><td><a>'+auctions[i].name+'</a></td><td>'+endingDate.getFullYear()+'-'+monthNames[endingDate.getMonth()]+'-'+endingDate.getDay()+'</td><td>'+auctions[i].ammount+'</td>';

                    if(auctions[i].idowner == iduser){
                        //BUYER
                        if(auctions[i].sellerrating == null){

                            text += '<td><input  class="rateperson" data-size="xs" data-min="0" data-max="5" data-step="0.5"/></td>';
                        }
                        else
                            text += '<td><input  class="showrate" value="'+auctions[i].sellerrating+'" data-size="xs" data-min="0" data-max="5" data-step="0.5"/></td>';
                    }
                    else{
                        //SELLER
                        if(auctions[i].buyerrating == null){
                            text += '<td><input  class="rateperson" data-size="xs" data-min="0" data-max="5" data-step="0.5"/></td>';
                        }
                        else{
                            text += '<td><input  class="showrate" value="'+auctions[i].sellerrating+'" data-size="xs" data-min="0" data-max="5" data-step="0.5"/></td>';
                        }
                    }
                    text += '</tr>';

                }
                text += '</tr>';
                $('#'+id+'Table').append(text);
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
            paypalfunc();

        }
    });





}
