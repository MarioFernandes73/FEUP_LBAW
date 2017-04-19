BASE_URL = '../../';

$(document).ready(function() {
    //setInterval(checkForNewTweets, 5000);
    initAuctionList();
});

function initAuctionList() {
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
            '</label>' +
            '</div>' +
            '</div>' +
            '</div>'
        );
    });
}