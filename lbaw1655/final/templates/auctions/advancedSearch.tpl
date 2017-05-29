{include file='common/header.tpl'}
{include file='common/navbar.tpl'}


<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">
            <!-- Title -->
            <div class="row inline">
                <div class="col-md-2 col-md-offset-5">
                    <h2 class="text-center mytext" style="margin: 0px">Search</h2>
                </div>
                <button type="button" class="btn btn-link btn-xs center-left" data-toggle="tooltip"
                        title="Go ahead and search using one or more criteria.
                            If no criteria is specified, all auctions will be returned.">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                </button>
            </div>

            <form class="form-horizontal my-style"
                  method="GET" action="{$BASE_URL}pages/auctions/searchResults.php">

                <!-- Auction -->
                <div class="form-group">
                    <label class="cols-sm-2 control-label">
                        Auction Name
                    </label>
                    <div class="input-group" id="name">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lamp"></span></span>
                        <input name="name" title="name of auction" type="text" class="form-control"
                               placeholder="Enter auction's name">
                    </div>
                </div>

                <!-- rating-->
                <div class="form-group">
                    <label class="cols-sm-2 control-label">
                        Rating
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Selects auctions where the seller's rating is the specified.">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </button>
                    </label>
                    <div class="input-group" id="rating">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-star"></span></span>
                        <input name="rating" title="rating" type="number" min="1" max="5" class="form-control"
                               placeholder="Rating">
                    </div>
                </div>

                <!-- categories-->
                <div class="form-group">
                    <label class="cols-sm-2 control-label">
                        Auction Category
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Category where your auction fits in.">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </button>
                    </label>
                    <div class="input-group" id="category">
                        <span class="input-group-addon">@</span>
                        <select title="category of auction" name="category" class="form-control form-control-lg">
                            <option label=" "></option>
                            {foreach $categories as $category}
                                <option>{$category["unnest"]}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>

                <!-- Type of auction -->
                <div class="form-group">
                    <label class="cols-sm-2 control-label">
                        Type of auction
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Here you can chose which type of auction to search. The differences between
                                    each type can be found at our FAQ page.">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </button>
                    </label>
                    <div class="input-group" id="type">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-glass"></span></span>
                        <select title="type of auction" name="type" class="form-control form-control-lg">
                            <option label=" "></option>
                            {foreach $types as $type}
                                <option>{$type["unnest"]}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>

                <!-- Start Date -->
                <div class="form-group">
                    <label class="cols-sm-2 control-label">Starting time & date</label>
                    <div class="input-group date" id="date" data-provide="datepicker">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <input title="starting date" type="datetime-local" name="startingdate" class="form-control"/>
                    </div>
                </div>

                <!-- Time of the Auction -->
                <div class="form-group">
                    <label class="cols-sm-2 control-label">Auction Duration in Hours</label>
                    <div class="input-group" id="time">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-time"></span></span>
                        <select title="duration hours" name="durationhours" class="form-control form-control-lg">
                            <option label=" "></option>
                            <option>6</option>
                            <option>12</option>
                            <option>24</option>
                            <option>48</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" style="min-height: 20px"
                            class="btn btn-primary btn-lg btn-block login-button">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
{include file='common/footer.tpl'}
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>