{include file='common/header.tpl'}
{include file='common/navbar.tpl'}
<div class="jumbotron">
            <div class="row main">
                <div class="main-login main-center">
                    <h2 class="text-center mytext">Create Auction</h2>
                    <form class="form-horizontal my-style" method="POST" enctype="multipart/form-data"
                          action="{$BASE_URL}actions/auctions/createAuction.php">

                        <!-- Name -->
                        <div class="form-group">
                            <label class="cols-sm-2 control-label">Name*</label>
                            <div class="input-group" id="name">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lamp"></span>
                                </span>
                                <input title="name" type="text" name="name" pattern="([\w\_\?\.\,\!\+\-\s\n\\])*" required="required" class="form-control" placeholder="Enter auction's name" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="category" class="cols-sm-2 control-label">Category*</label>
                            <div class="input-group" id="category">
                                <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-list-alt"></span></span>
                                <select title="category" name="category" class="form-control form-control-lg">
                                    {foreach $categories as $category}
                                        <option>{$category["unnest"]}</option>
                                    {/foreach}
                                 </select>
                            </div>
                        </div>

                        <!-- Base Price -->
                        <div class="form-group">
                            <label for="price" class="cols-sm-2 control-label">Base Price*</label>
                            <div class="input-group" id="price">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-euro"></span>
                                </div>
                                <input title="base price" type="number"  min="1" max="2 100 000 000"
                                       name="baseprice" required="required" step="0.01" class="form-control" value ="0.00">

                            </div>
                        </div>

                        <!-- Type of auction -->
                        <div class="form-group">
                            <label for="type" class="cols-sm-2 control-label">Type of auction*</label>
                            <div class="input-group" id="type">
                                <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-glass"></span></span>
                                <select title="type of auction" name="type" class="form-control form-control-lg">
                                    {foreach $types as $type}
                                        <option>{$type["unnest"]}</option>
                                    {/foreach}
                            </select>
                            </div>
                        </div>

                        <!-- Start Date -->
                        <div class="form-group">
                            <label for="date" class="cols-sm-2 control-label">Starting time & date*</label>
                            <div class="input-group date" id="date" data-provide="datepicker">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <input title="starting date" type="datetime-local"  name="startingdate" required="required" class="form-control"
                                       value="{$smarty.now|date_format:"%Y-%m-%d"}T{$smarty.now|date_format: "%H:%M"}"
                                       min="{$smarty.now|date_format:"%Y-%m-%d"}T{$smarty.now|date_format: "%H:%M"}"/>
                            </div>
                        </div>

                        <!-- Time of the Auction -->
                        <div class="form-group">
                            <label for="time" class="cols-sm-2 control-label">Time in Hours*</label>
                            <div class="input-group" id="time">
                                <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-time"></span></span>
                                <select title="duration hours" name="durationhours" class="form-control form-control-lg">
                                    <option>6</option>
                                    <option>12</option>
                                    <option>24</option>
                                    <option>48</option>
                            </select>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="comment">Item description</label>
                            <textarea name="description" pattern="([\w\_\?\.\,\!\+\-\s\n\\])*" class="form-control" rows="5" id="comment" placeholder="Write your description..."></textarea>
                            <label class="btn btn-default btn-file pull-right" style="margin-top: 5px;">
                            <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                            <input title="description" type="file" name="upload[]" style="display: none; "/>
                        </label>
                        </div>

                        <!-- Submission -->
                        <div class="form-group" style="padding: 1em 3em">
                            <button type="submit" style="min-height: 20px" class="btn btn-primary btn-lg btn-block login-button">
                            Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
{include file='common/footer.tpl'}

