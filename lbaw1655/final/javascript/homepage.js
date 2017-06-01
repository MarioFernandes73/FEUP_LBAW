BASE_URL = '../../';

$(document).ready(function () {
    var width = $(window).width();
    var n = 3;

    if(width <= 320)
        n = 1;
    else if(width > 320 && width < 1024)
        n = 2;

    initAuctionList(n);
});

function reload() {
    $(".carousel-inner").empty();
    initAuctionList(3);
}

function initAuctionList(n) {
    $.getJSON(BASE_URL + "api/auctions/searchResults.php", {lastMinute: true}, function (data) {
        fillList(data, "lastMinute",n);
    });
    $.getJSON(BASE_URL + "api/auctions/searchResults.php", {hot: true}, function (data) {
        fillList(data, "hot",n);
    });
}

function fillList(data, type,n) {
    $.each(data, function (i, auction) {

        //get timeLeft
        var startingDate = new Date(auction.startingdate);
        var endingDate = startingDate.addHours(auction.durationhours);
        var mili = endingDate - new Date();

        var d = Math.floor(mili / (24*60*60*1000));
        mili = mili - d*(24*60*60*1000);
        var h = Math.floor(mili / (60*60*1000));
        mili = mili - h*(60*60*1000);
        var m = Math.floor(mili / (60*1000));
        mili = mili - m*(60*1000);
        var s = Math.floor(mili / 1000);
        mili = mili - s*1000;

        var timeleft = d + " days " + h + ":" + m + ":" + s;
        if(timeleft[0] == '-'){
            timeleft = "0 days 00:00:00";
        }

        var id = Math.floor(i / n);
        if (i == 0) {
            $('#' + type + ' .carousel-inner').append('<div id="'+type + id + '" class="item active"></div>');
        }
        else if ((i % n) == 0) {
            $('#' + type + ' .carousel-inner').append('<div id="'+type + id + '" class="item"></div>');
        }

        if(n == 1){
            $('#' + type + ' .carousel-inner #'+type + id).append(
                '<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">'+
                '<div class="thumbnail" style="border: none">' +
                '<div style="border: 1px" class="text-center">'+
                '<img src="' + BASE_URL + auction['photo'] + '" class="img" alt="auction image">' +
                '</div>'+
                '<div class= "captiion" style="text-align: center; font-size: 3vmin">' +
                '<a href="' + BASE_URL + 'pages/auctions/viewAuction.php?idauction=' + auction.idauction + '">' + auction.name + '<br></a>' +
                '<label>' + auction.category + '</label>' +
                '<br><div class="timeleft">'+timeleft+'</div>' +
                '<br>Last Price : ' + auction.currentprice/100 +
                '</div>' +
                '</div>' +
                '</div>'
            );
        }
        else if(n == 2)
        {
            $('#' + type + ' .carousel-inner #'+type + id).append(
                '<div class="col-lg-6 col-xs-6 col-md-6 col-sm-6">'+
                '<div class="thumbnail" style="border: none">' +
                '<div style="border: 1px" class="text-center">'+
                '<img src="' + BASE_URL + auction['photo'] + '" class="img" alt="auction image">' +
                '</div>'+
                '<div class= "caption" style="text-align: center; font-size: 3vmin">' +
                '<a href="' + BASE_URL + 'pages/auctions/viewAuction.php?idauction=' + auction.idauction + '">' + auction.name + '<br></a>' +
                '<label>' + auction.category + '</label>' +
                '<br><div class="timeleft">'+timeleft+'</div>' +
                '<br>Last Price : ' + auction.currentprice/100 +
                '</div>' +
                '</div>' +
                '</div>'
            );
        }
        else
        {
            $('#' + type + ' .carousel-inner #'+type + id).append(
                '<div class="col-lg-4 col-xs-4 col-md-4 col-sm-4">'+
                '<div class="thumbnail" style="border: none">' +
                '<div style="border: 1px" class="text-center">'+
                '<img src="' + BASE_URL + auction['photo'] + '" class="img" alt="auction image">' +
                '</div>'+
                '<div class= "caption" style="text-align: center; font-size: 3vmin">' +
                '<a href="' + BASE_URL + 'pages/auctions/viewAuction.php?idauction=' + auction.idauction + '">' + auction.name + '<br></a>' +
                '<label>' + auction.category + '</label>' +
                '<br><div class="timeleft">'+timeleft+'</div>' +
                '<br>Last Price : ' + auction.currentprice/100 +
                '</div>' +
                '</div>' +
                '</div>'
            );
        }
    });
}

Date.prototype.addHours= function(h){
    this.setHours(this.getHours()+h);
    return this;
}