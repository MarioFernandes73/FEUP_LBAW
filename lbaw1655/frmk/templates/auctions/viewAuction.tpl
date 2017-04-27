{include file='common/header.tpl'}
{include file='common/navbar.tpl'}
<script src="{$BASE_URL}javascript/timeleft.js"></script>
<div class="jumbotron">
    <div class="row">

        <!-- Left Section: FOLLOW BID REPORT -->

        <div class="col-sm-4">
            <div class="panel-body">
                <div class="carousel slide" id="myCarousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                <a href="#" class="thumbnail">
                                    <img src="http://lorempixel.com/400/400/" alt="...">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                <a href="#" class="thumbnail">
                                    <img src="http://lorempixel.com/400/400/" alt="...">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i
                                class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><i
                                class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>

            <div class="btn-group btn-group-justified" role="group" aria-label="..." style="min-height: 60px">

                <!-- Follow -->
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-info btn-block">Follow</button>
                </div>

                <!-- Report -->
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-danger btn-block">Report</button>
                </div>
            </div>

            <!-- Bid -->
            <div class='well col-sm-12'>
                <form method="POST" action="{$BASE_URL}actions/auctions/makeBid.php">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Your price</label>
                        <div class="col-sm-10">
                            <input name="bidvalue" type="number" class="form-control" value="0.00" ng-pattern="/^[0-9]+(\.[0-9][0-9]?)?$/" step="0.01" />
                        </div>
                    </div>
                    <input name="idauction" type="hidden" value="{$currentAuction.idauction}"> </input>
                    <input name="currentprice" type="hidden" value="{$currentAuction.currentprice}"> </input>
                    <input name="baseprice" type="hidden" value="{$currentAuction.baseprice}"> </input>
                    <button type="submit" style="min-height: 10px; font-size: 3vmin" class="btn btn-primary btn-lg btn-block login-button">
                        Bid
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Section: Auction Info -->

        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-body" style="min-height: 515px">
                    <dl class="row col-sm-12 text-center h3">
                        <strong>{$currentAuction.name}</strong>
                    </dl>
                    <dl class="row"></dl>
                    <dl class="row"></dl>
                    <dl class="row">
                        <dt class="col-sm-2">Category</dt>
                        <dd class="col-sm-5">{$currentAuction.category}</dd>
                        <dt class="col-sm-2">Type</dt>
                        <dd class="col-sm-3">{$currentAuction.type}</dd>
                    </dl>

                    <!--type-->

                    {if $currentAuction.type == "English"}
                        <dl class="row">
                            <dt class="col-sm-2">Base Price</dt>
                            <dd class="col-sm-5">{$currentAuction.baseprice/100}€</dd>
                            <dt class="col-sm-2">Current Bid</dt>
                            <dd class="col-sm-3">{$currentAuction.currentprice/100}€</dd>
                        </dl>
                    {elseif $currentAuction.type == "Dutch"}
                        <dl class="row">
                            <dt class="col-sm-2">Base Price</dt>
                            <dd class="col-sm-5">{$currentAuction.baseprice/100}€</dd>
                            <dt class="col-sm-2">Current Price</dt>
                            <dd class="col-sm-3">{$currentAuction.currentprice/100}€</dd>
                        </dl>
                    {elseif $currentAuction.type == "Blind"}
                        <dl class="row col-sm-12 text-center">
                            <dt>Minimum Price</dt>
                            <dd>{$currentAuction.baseprice/100}€</dd>
                        </dl>
                    {/if}

                    <!-- dates --->

                    <dl class="row">
                        <dt class="col-sm-2">Begin Date</dt>
                        <dd class="col-sm-5">{$currentAuction.startingdate}</dd>
                        <dt class="col-sm-2">Time Left</dt>
                        <dd class="col-sm-3 timeleft">{$timeLeft}</dd>
                    </dl>

                    <!-- rating -->

                    <dl class="row">
                        <dt class="col-sm-3">Seller Rating</dt>
                        <dd class="col-sm-9">
                            <input id="rate" value="{$currentAuctionOwner.rating}" class="rating-loading" data-size="xs" data-disabled="true">
                        </dd>
                        <script>
                            $(document).on('ready', function() {
                                $('#rate').rating({
                                    displayOnly: true,
                                    step: 0.5
                                });
                            });
                        </script>
                    </dl>

                    <!-- description -->

                    <dl class="row">
                        <dt class="col-sm-2">Description</dt>
                        <dd class="col-sm-10 pre-scrollable text-center" style="max-height: 230px">
                            {$currentAuction.description}
                        </dd>
                    </dl>
                    <!-- Admin edit button -->
                    <a href="editauction.html" class="btn btn-info btn-xs pull-right" role="button">
                        <span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- notifications -->

    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary ">
                <div class="panel-body pre-scrollable" style="min-height: 460px">
                    <div class="table-responsive">
                        <ul class="list-group">
                            {foreach $notifications as $notification}
                                {if $notification['idbidder'] == true}
                                    <li class="list-group-item">
                                        <h4>New bid!! - Current price {$notification['ammount']/100}€</h4>
                                    </li>
                                {else}
                                    <li class="list-group-item">
                                        <h4>New comment</h4>
                                    </li>
                                {/if}
                            {/foreach}
                            <li class="list-group-item">
                                <h4>Auction Started!</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- comment section -->
        <div class="col-sm-8">
            <div class="panel panel-primary ">
                <div class="panel-body pre-scrollable" style="max-height: 340px">
                    {foreach $currentAuctionComments as $comment}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Anonymous</strong>
                                <span class="text-muted">Commented on {$comment.date}</span>
                                <button style="margin-left: 5px;" type="button" class="btn btn-danger btn-xs pull-right">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                </button>
                                <!-- Admin remove button -->
                                {if $STATE == "Administrator"}
                                <button type="button" class="btn btn-warning btn-xs pull-right">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                                {/if}
                            </div>
                            <div class="panel-body">
                                {$comment.message}
                            </div>
                        </div>
                    {/foreach}
                <!-- new comment -->
                <div class="panel-footer" style="min-height: 120px">
                    <form>
                        <textarea class="col-sm-12" rows="3" placeholder="Do you have some question?"></textarea>
                        <button type="submit" class="btn btn-success pull-right" style="margin: 5px;">
                            <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                        </button>
                        <label class="btn btn-success btn-file pull-right" style="margin-top: 5px;">
                            <span class=" glyphicon glyphicon-paperclip " aria-hidden="true "></span>
                            <input type="file " style="display: none; ">
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

{include file='common/footer.tpl'}