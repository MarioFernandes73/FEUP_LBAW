{include file='common/header.tpl'}
{include file='common/navbar.tpl'}

<script src="{$BASE_URL}javascript/timeleft.js"></script>
<script src="{$BASE_URL}javascript/auction.js"></script>
<script src="{$BASE_URL}javascript/files.js"></script>

<input name="idauction" type="hidden" value="{$currentAuction.idauction}"/>
<input name="currentprice" type="hidden" value="{$currentAuction.currentprice/100}"/>

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
                                    <img src="../../{$currentAuctionPhotos[0].path}" alt="auction image">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                <a href="#" class="thumbnail">
                                    <img src="../../{$currentAuctionPhotos[0].path}" alt="auction image">
                                </a>
                            </div>
                        </div>

                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><em
                                class="glyphicon glyphicon-chevron-left"></em></a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><em
                                class="glyphicon glyphicon-chevron-right"></em></a>
                </div>
            </div>

            <div class="btn-group btn-group-justified" role="group" aria-label="Follow and report"
                 style="min-height: 60px">

                <!-- Follow -->
                <div class="btn-group" role="group">
                    <button type="button" name="follow" class="btn btn-info btn-block">Follow</button>
                </div>

                <!-- Report -->
                <div class="btn-group" role="group">
                    <button type="button" name="report" class="btn btn-danger btn-block">Report</button>
                </div>
            </div>

            <!-- Bid -->
            {if $currentAuction.type == "English" && $currentAuctionOwner.iduser != $iduser}
                <div class='well col-sm-12'>
                    <div class="form-group">
                        <label class=" control-label">Your price</label>
                        <input title="bid value" name="bidvalue" type="number" class="form-control" value="0.00" step="0.01"/>
                    </div>
                    <button type="button" name="makebid" style="min-height: 20px;" class="btn btn-primary btn-lg btn-block login-button">Bid</button>
                </div>
            {elseif $currentAuction.type == "Dutch"}
                {if $currentAuctionOwner.iduser != $iduser}
                    <div class='well col-sm-12'>
                        <button type="button" name="buynow" style="min-height: 20px"
                                class="btn btn-primary btn-lg btn-block login-button">Buy Now
                        </button>
                    </div>
                {else}
                    <div class='well col-sm-12'>
                        <div class="form-group">
                            <label class="control-label">New Price</label>
                            <input name="newprice" type="number" class="form-control"
                                   value="{$currentAuction.currentprice/100}" step="0.01"/>
                        </div>
                        <button type="button" name="alterprice" style="min-height: 20px"
                                class="btn btn-primary btn-lg btn-block login-button">Alter price
                        </button>
                    </div>
                {/if}
            {elseif $currentAuction.type == "Blind" && $currentAuctionOwner.iduser != $iduser}
                <div class='well col-sm-12'>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Your price</label>
                        <div class="col-sm-10">
                            <input title="blind bid value" name="blindbidvalue" type="number" class="form-control"
                                   value="0.00"
                                   step="0.01"/>
                        </div>
                    </div>
                    <button type="button" name="makeblindbid" style="min-height: 10px; font-size: 3vmin"
                            class="btn btn-primary btn-lg btn-block login-button">Bid
                    </button>
                </div>
            {/if}
        </div>

        <!-- Right Section: Auction Info -->
        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-body" style="min-height: 515px">
                    <dl class="row col-sm-12 text-center h3">
                        <dt></dt><dd><strong>{$currentAuction.name}</strong></dd>
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
                            <dd id="currentPriceEnglish" class="col-sm-3">{$currentAuction.currentprice/100}€</dd>
                        </dl>
                    {elseif $currentAuction.type == "Dutch"}
                        <dl class="row">
                            <dt class="col-sm-2">Base Price</dt>
                            <dd class="col-sm-5">{$currentAuction.baseprice/100}€</dd>
                            <dt class="col-sm-2">Current Price</dt>
                            <dd id="currentPriceDutch" class="col-sm-3">{$currentAuction.currentprice/100}€</dd>
                        </dl>
                    {elseif $currentAuction.type == "Blind"}
                        <dl class="row col-sm-12 text-center">
                            <dt>Minimum Price</dt>
                            <dd>{$currentAuction.baseprice/100}€</dd>
                        </dl>
                    {/if}

                    <!-- dates -->
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
                            <input title="rating" id="rate" value="{$currentAuctionOwner.rating}" class="rating-loading"
                                   data-size="xs"
                                   data-disabled="true"/>
                        </dd>
                        <script>
                            $(document).on('ready', function () {
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
                    {if $userState == "Administrator"}
                        <a href="../../pages/auctions/editAuction.php?idauction={$currentAuction.idauction}"
                           class="btn btn-info btn-xs pull-right" role="button">
                            <span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        <button type="button" onclick="banAuction({$currentAuction.idauction})" class="btn btn-danger btn-xs pull-right">
                            <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                        </button>
                    {/if}
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
                        <ul id="notifications" class="list-group">
                            {foreach $notifications as $notification}
                                {if $notification['idbidder'] == true}
                                    {if $currentAuction.type != "Blind"}
                                        <li class="list-group-item">
                                            <h4>New bid!! - Current price {$notification['ammount']/100}€</h4>
                                        </li>
                                    {else}
                                        <li class="list-group-item">
                                            <h4>New bid!!</h4>
                                        </li>
                                    {/if}
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
                <div class="panel-body">

                    <!-- new comment -->
                    <div id="createComment" class="panel-footer" style="min-height: 120px">
                        <form name="commentForm" method="POST" enctype="multipart/form-data">
                            <input name="idauction" type="hidden" value="{$currentAuction.idauction}"/>
                            <textarea title="comment message" name="message" required="required" class="col-sm-12"
                                      rows="3"
                                      placeholder="Do you have some question?"></textarea>
                            <button id="makeComment" type="button" name="commentAuction"
                                    class="btn btn-success pull-right"
                                    style="margin: 5px;">
                                <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                            </button>
                            <label class="btn btn-default btn-file pull-right" style="margin-top: 5px;">
                                <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                                <input title="upload file input" type="file" name="upload[]" style="display: none; "
                                       multiple="multiple"
                                       onchange="saveFiles(this)"/>

                            </label>
                        </form>
                    </div>

                    <div id="auctionMessages" class = "pre-scrollable" style="max-height: 600px">
                        {$countComment = count($currentAuctionComments)}
                        {for $i = 0; $i < $countComment; $i++}
                            {$comment = $currentAuctionComments[$i]}

                            {if $comment.idcomment != $idcomment}
                                <form class="form-horizontal" method="POST" action="{$BASE_URL}pages/tickets/tickets.php">
                                <div class="panel panel-default">
                                <div  class="panel-heading">
                                    <strong>Anonymous</strong>
                                    <span class="text-muted">Commented on {$comment.date}</span>

                                    <input name="idcomment" type="hidden" value="{$comment.idcomment}"/>
                                    <input name="idauction" type="hidden" value="{$currentAuction.idauction}"/>
                                    <input name="msg" type="hidden" value="Report Comment"/>

                                    <button style="margin-left: 5px;" type="submit"
                                            class="btn btn-danger btn-xs pull-right">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    </button>

                                    <!-- Admin remove button -->
                                    {if $STATE == "Administrator"}
                                        <button name="removecomment" type="button"
                                                class="btn btn-warning btn-xs pull-right">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    {/if}
                                </div>
                                <div class="panel-body">
                                    {$comment.message}
                                </div>
                                {$idcomment = $comment.idcomment}
                            {/if}

                            {if $comment.path != null}
                                <div class="thumbnail" style="border: none">
                                    <img src="../../{$comment.path}" alt="comment image">
                                </div>
                            {/if}
                            {$idnext = $i +1}
                            {if  $currentAuctionComments[$idnext].idcomment!=$idcomment}
                                </div>
                                </form>
                            {/if}
                        {/for}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{include file='common/footer.tpl'}