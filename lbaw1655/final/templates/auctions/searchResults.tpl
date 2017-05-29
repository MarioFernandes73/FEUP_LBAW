{include file='common/header.tpl'}
{include file='common/navbar.tpl'}

<div class="jumbotron">
    <div class="main">

        <input name="name" type="hidden" value="{$name}">
        <input name="rating" type="hidden" value="{$rating}">
        <input name="category" type="hidden" value="{$category}">
        <input name="type" type="hidden" value="{$type}">
        <input name="startingdate" type="hidden" value="{$date}">
        <input name="durationhours" type="hidden" value="{$duration}">
        <input name="fullTextSearch" type="hidden" value="{$fullTextSearch}">
        <input name="hot" type="hidden" value="{$hot}">
        <input name="lastMinute" type="hidden" value="{$lastMinute}">

        <div class="main-login main-center">

            <h2 class="text-center mytext">Search Result</h2>
            <div class="panel-body container">

                <div id="item0"></div>
                <div id="item1"></div>
                <div id="item2"></div>

            </div>
            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a onclick="previous()"><span aria-hidden="true">&larr;</span> Previous</a></li>
                    <li class="next"><a onclick="next()">Next <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script src="{$BASE_URL}javascript/listAuctions.js"></script>
<script src="{$BASE_URL}javascript/timeleft.js"></script>
{include file='common/footer.tpl'}

