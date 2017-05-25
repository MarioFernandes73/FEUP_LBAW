{include file='common/header.tpl'}
{include file='common/navbar.tpl'}

<div class="jumbotron">
    <div class="row main">

        <input name="name" type="hidden" value={$name}>
        <input name="rating" type="hidden" value={$rating}>
        <input name="category" type="hidden" value={$category}>
        <input name="type" type="hidden" value={$type}>
        <input name="startingdate" type="hidden" value={$date}>
        <input name="durationhours" type="hidden" value={$duration}>

        <div class="main-login main-center">

            <h2 class="text-center">Search Result</h2>
            <div class="panel-body">

                <div id="item0" class="item" style="display: inline-block; margin: 0%"></div>
                <div id="item1" class="item" style="display: inline-table; margin: 0%"></div>
                <div id="item2" class="item" style="display: inline-table; margin: 0%"></div>

            </div>
            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
                    <li class="next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

        {include file='common/footer.tpl'}
        <script src="{$BASE_URL}javascript/listAuctions.js"></script>
