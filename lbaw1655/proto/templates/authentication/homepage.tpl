{include file='common/header.tpl'}
{include file='common/navbar.tpl'}

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

    <div class="panel panel-primary" id="lastMinute">
        <div class="panel panel-default" style="background-color: #f5f5f5">
            <h3 class="text-center">Last Minute Opportunities</h3>
        </div>
        <div class="panel-body">
            <div class="carousel slide" id="myCarouselOpp">
                <div class="carousel-inner">
                </div>
                <a class="left carousel-control" href="#myCarouselOpp" data-slide="prev"><i
                            class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right carousel-control" href="#myCarouselOpp" data-slide="next"><i
                            class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>
        <div class="panel-footer"><a href="searchresult.html">See More</a></div>
    </div>

    <div class="panel panel-primary" id="hot">
        <div class="panel panel-default" style="background-color: #f5f5f5">
            <h3 class="text-center">Hot</h3>
        </div>
        <div class="panel-body">
            <div class="carousel slide" id="myCarouselHot">
                <div class="carousel-inner"></div>
                <a class="left carousel-control" href="#myCarouselHot" data-slide="prev"><i
                            class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right carousel-control" href="#myCarouselHot" data-slide="next"><i
                            class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>
        <div class="panel-footer"><a href="searchresult.html">See More</a></div>
    </div>

</div>

{include file='common/footer.tpl'}
<script src="{$BASE_URL}javascript/homepage.js"></script>
<script src="{$BASE_URL}javascript/timeleft.js"></script>