{include file='common/header.tpl'}
{include file='common/navbar.tpl'}

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

    <div class="panel panel-primary responsive" id="lastMinute">
        <div class="panel panel-default" style="background-color: #f5f5f5">
            <h3 class="text-center mytext">
                Last Minute Opportunities
                <button type="button" class="btn btn-link btn-xs center-left" data-toggle="tooltip"
                        title="Top auctions with ending date near.">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                </button>
            </h3>
        </div>
        <div class="panel-body">
            <div class="carousel slide" id="myCarouselOpp">
                <div class="carousel-inner">
                </div>
                <a class="left carousel-control" href="#myCarouselOpp" data-slide="prev"><em
                            class="glyphicon glyphicon-chevron-left"></em></a>
                <a class="right carousel-control" href="#myCarouselOpp" data-slide="next"><em
                            class="glyphicon glyphicon-chevron-right"></em></a>
            </div>
        </div>
        <div class="panel-footer"><a href="{$BASE_URL}pages/auctions/searchResults.php?lastMinute=true">See More</a></div>
    </div>

    <div class="panel panel-primary" id="hot">
        <div class="panel panel-default" style="background-color: #f5f5f5">
            <h3 class="text-center mytext">
                Hot
                <button type="button" class="btn btn-link btn-xs center-left" data-toggle="tooltip"
                        title="Top popular auctions with the most bids.">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                </button>
            </h3>
        </div>
        <div class="panel-body">
            <div class="carousel slide" id="myCarouselHot">
                <div class="carousel-inner"></div>
                <a class="left carousel-control" href="#myCarouselHot" data-slide="prev"><em
                            class="glyphicon glyphicon-chevron-left"></em></a>
                <a class="right carousel-control" href="#myCarouselHot" data-slide="next"><em
                            class="glyphicon glyphicon-chevron-right"></em></a>
            </div>
        </div>
        <div class="panel-footer"><a href="{$BASE_URL}pages/auctions/searchResults.php?hot=true">See More</a></div>
    </div>

</div>
<script src="{$BASE_URL}javascript/homepage.js"></script>
<script src="{$BASE_URL}javascript/timeleft.js"></script>
{include file='common/footer.tpl'}
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
