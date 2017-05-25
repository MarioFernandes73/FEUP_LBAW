{include file='common/header.tpl'}
{include file='common/navbar.tpl'}

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="row main">
            <div class="main-login main-center">

                <!-- Title -->
                <h2 align="center">Search</h2>

                <form class="form-horizontal" style="padding: 0% 25%"
                      method="GET" action="{$BASE_URL}pages/auctions/searchResults.php">

                    <!-- Auction -->
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Name</label>
                        <div class="input-group" id="name">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lamp"></span></span>
                            <input name="name" type="text" class="form-control" placeholder="Enter auction's name" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <!-- rating-->
                    <div class="form-group">
                        <label for="rating" class="cols-sm-2 control-label">Rating</label>
                        <div class="input-group" id="rating">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-star"></span></span>
                            <input name="rating" type="number" min="1" max="5" class="form-control" placeholder="Rating" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <!-- categories-->
                    <div class="form-group">
                        <label for="category" class="cols-sm-2 control-label">Auction Category</label>
                        <div class="input-group" id="category">
                            <span class="input-group-addon">@</span>
                            <select name="category" class="form-control form-control-lg">
                                <option> </option>
                                {foreach $categories as $category}
                                    <option>{$category["unnest"]}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>

                    <!-- Type of auction -->
                    <div class="form-group">
                        <label for="type" class="cols-sm-2 control-label">
                            Type of auction
                            <!--  <button type="button" class="btn btn-link btn-xs pull-right">
                                 <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                             </button> -->
                        </label>
                        <div class="input-group" id="type">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-glass"></span></span>
                            <select name="type" class="form-control form-control-lg">
                                <option> </option>
                                {foreach $types as $type}
                                    <option>{$type["unnest"]}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>

                    <!-- Start Date -->
                    <div class="form-group">
                        <label for="date" class="cols-sm-2 control-label">Starting time & date</label>
                        <div class="input-group date" id="date" data-provide="datepicker">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                            <input type="datetime-local" name="startingdate" class="form-control"/>
                        </div>
                    </div>

                    <!-- Time of the Auction -->
                    <div class="form-group">
                        <label for="time" class="cols-sm-2 control-label">Time in Hours</label>
                        <div class="input-group" id="time">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-time"></span></span>
                            <select name="durationhours" class="form-control form-control-lg">
                                <option> </option>
                                <option>6</option>
                                <option>12</option>
                                <option>24</option>
                                <option>48</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="padding: 1em 3em">
                        <button type="submit" style="min-height: 10px; font-size: 3vmin" class="btn btn-primary btn-lg btn-block login-button">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{include file='common/footer.tpl'}
