BASE_URL = '../../';

var offset = 0;
var n = 3;
var num = 0;

$(document).ready(function () {
    var width = $(window).width();

    if(width <= 320)
        n = 1;
    else if(width > 320 && width < 1024)
        n = 2;

    initAuctionList(n,offset);
});

function next()
{
    if(num < 8)
        return false;

    offset++;

    initAuctionList();
}

function previous()
{
    if(offset <= 0)
        return false;

    offset--;

    initAuctionList();
}

function initAuctionList() {

    $.getJSON(BASE_URL + "api/auctions/searchResults.php",
        {
            name:$("input:hidden[name=name]").val(),rating:$("input:hidden[name=rating]").val(),category:$("input:hidden[name=category]").val(),
            type:$("input:hidden[name=type]").val(),date:$("input:hidden[name=date]").val(),duration:$("input:hidden[name=duration]").val(),
            fullTextSearch:$("input:hidden[name=fullTextSearch]").val(),
            offset:offset,hot:$("input:hidden[name=hot]").val(),lastMinute:$("input:hidden[name=lastMinute]").val()
        },
        function (data) {
            fillList(data);
        });
}

function fillList(data) {

    $('#item0').empty();
    $('#item1').empty();
    $('#item2').empty();

    $.each(data, function (i, auction) {

        timeleft = initTimeletft(auction);

        var id = Math.floor(i / n);

        if(n == 1){
            $('#item'+id).append(
                '<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">'+
                '<div class="thumbnail" style="border: none">' +
                '<div style="border: 1px" align="center">'+
                '<img src="' + BASE_URL + auction['photo'] + '" class="img" alt="auction image">' +
                '</div>'+
                '<div class= "caption" style="text-align: center; font-size: 3vmin">' +
                '<a href="' + BASE_URL + 'pages/auctions/viewAuction.php?idauction=' + auction.idauction + '">' + auction.name + '<br></a>' +
                '<label>' + auction.category + '' +
                '<br><div class="timeleft">'+timeleft+'</div>' +
                '<br>Last Price : ' + auction.currentprice/100 +
                '</label>' +
                '</div>' +
                '</div>' +
                '</div>'
            );
        }
        else if(n == 2)
        {
            $('#item'+id).append(
                '<div class="col-lg-6 col-xs-6 col-md-6 col-sm-6">'+
                '<div class="thumbnail" style="border: none">' +
                '<div style="border: 1px" align="center">'+
                '<img src="' + BASE_URL + auction['photo'] + '" class="img" alt="auction image">' +
                '</div>'+
                '<div class= "caption" style="text-align: center; font-size: 3vmin">' +
                '<a href="' + BASE_URL + 'pages/auctions/viewAuction.php?idauction=' + auction.idauction + '">' + auction.name + '<br></a>' +
                '<label>' + auction.category + '' +
                '<br><div class="timeleft">'+timeleft+'</div>' +
                '<br>Last Price : ' + auction.currentprice/100 +
                '</label>' +
                '</div>' +
                '</div>' +
                '</div>'
            );
        }
        else
        {
            $('#item'+id).append(
                '<div class="col-lg-4 col-xs-4 col-md-4 col-sm-4">'+
                '<div class="thumbnail" style="border: none">' +
                '<div style="border: 1px" align="center">'+
                '<img src="' + BASE_URL + auction['photo'] + '" class="img" alt="auction image">' +
                '</div>'+
                '<div class= "caption" style="text-align: center; font-size: 3vmin">' +
                '<a href="' + BASE_URL + 'pages/auctions/viewAuction.php?idauction=' + auction.idauction + '">' + auction.name + '<br></a>' +
                '<label>' + auction.category + '' +
                '<br><div class="timeleft">'+timeleft+'</div>' +
                '<br>Last Price : ' + auction.currentprice/100 +
                '</label>' +
                '</div>' +
                '</div>' +
                '</div>'
            );
        }
        num = i;
    });
}

function initTimeletft(auction)
{
    //get timeLeft
    var startingDate = new Date(auction.startingdate);
    var endingDate = startingDate.addHours(auction.durationhours);
    var mili = endingDate - new Date();

    //alert(mili + " ; " + auction.durationhours + " ; " + endingDate);
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
    return timeleft;
}

Date.prototype.addHours= function(h){
    this.setHours(this.getHours()+h);
    return this;
}