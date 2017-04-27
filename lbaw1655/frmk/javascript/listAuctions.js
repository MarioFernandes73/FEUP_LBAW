BASE_URL = '../../';

<<<<<<< HEAD
$(document).ready(function () {
    //setInterval(initAuctionList, 10000);
=======
$(document).ready(function() {
    //setInterval(checkForNewTweets, 5000);
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
    initAuctionList();
});

function initAuctionList() {
<<<<<<< HEAD
    $.getJSON(BASE_URL + "api/auctions/searchResults.php", {lastMinute: true}, function (data) {
        fillList(data, "lastMinute");
    });
    $.getJSON(BASE_URL + "api/auctions/searchResults.php", {hot: true}, function (data) {
        fillList(data, "hot");
    });
}

function fillList(data, type) {
    $.each(data, function (i, auction) {

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

        //alert(timeleft);

        var id = Math.floor(i / 3);
        if (i == 0) {
            $('#' + type + ' .carousel-inner').append('<div id="' + id + '" class="item active"></div>');
        }
        else if ((i % 3) == 0) {
            $('#' + type + ' .carousel-inner').append('<div id="' + id + '" class="item"></div>');
        }

        $('#' + type + ' .carousel-inner #' + id).append(
            '<div class="col-lg-4 col-xs-4 col-md-4 col-sm-4">' +
            '<div class="thumbnail" style="border: none">' +
            '<img src="' + BASE_URL + auction['photo'] + '" alt="auction image">' +
            '<div class= "caption" style="text-align: center; font-size: 3vmin">' +
            '<a href="' + BASE_URL + 'pages/auctions/viewAuction.php?idauction=' + auction.idauction + '">' + auction.name + '<br></a>' +
            '<label>' + auction.category + '' +
            '<br><div class="timeleft">'+timeleft+'</div>' +
            '<br>Last Price : ' + auction.currentprice +
=======
   $.getJSON(BASE_URL + "api/auctions/searchResults.php", {lastMinute: true}, function(data){
       fillList(data,"lastMinute");
   });
   $.getJSON(BASE_URL + "api/auctions/searchResults.php", {hot: true}, function(data){
       fillList(data,"hot");
   });
}

function fillList(data,type)
{
    $.each(data, function(i, auction) {
        var id = Math.floor(i/3);
        if(i  == 0)
        {
            $('#'+type+' .carousel-inner').append('<div id="'+id+'" class="item active"></div>');
        }
        else if ((i % 3) == 0)
        {
            $('#'+type+' .carousel-inner').append('<div id="'+id+'" class="item"></div>');
        }

        $('#'+type+' .carousel-inner #'+id).append(
            '<div class="col-lg-4 col-xs-4 col-md-4 col-sm-4">' +
            '<div class="thumbnail" style="border: none">' +
            '<img src="'+BASE_URL+auction['photo']+'" alt="auction image">' +
            '<div class= "caption" style="text-align: center; font-size: 3vmin">' +
            '<a href="'+BASE_URL +'pages/auctions/viewAuction.php?idauction='+auction.idauction+'">'+auction.name+'<br></a>' +
            '<label>'+auction.category+'' +
            '<br>timeleft' +
            '<br>Last Price : '+auction.currentprice +
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
            '</label>' +
            '</div>' +
            '</div>' +
            '</div>'
        );
    });
<<<<<<< HEAD
}

Date.prototype.addHours= function(h){
    this.setHours(this.getHours()+h);
    return this;
=======
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
}