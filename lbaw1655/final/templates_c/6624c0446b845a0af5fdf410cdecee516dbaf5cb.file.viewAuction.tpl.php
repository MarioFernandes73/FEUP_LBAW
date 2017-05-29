<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 23:30:10
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/auctions/viewAuction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:714138401592c6eefe86106-64347599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6624c0446b845a0af5fdf410cdecee516dbaf5cb' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/auctions/viewAuction.tpl',
      1 => 1496097008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '714138401592c6eefe86106-64347599',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c6ef02e4186_39707112',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'currentAuction' => 0,
    'currentAuctionPhotos' => 0,
    'currentAuctionOwner' => 0,
    'iduser' => 0,
    'timeLeft' => 0,
    'userState' => 0,
    'notifications' => 0,
    'notification' => 0,
    'currentAuctionComments' => 0,
    'i' => 0,
    'countComment' => 0,
    'comment' => 0,
    'idcomment' => 0,
    'STATE' => 0,
    'idnext' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c6ef02e4186_39707112')) {function content_592c6ef02e4186_39707112($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/timeleft.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/auction.js"></script>

<input name="idauction" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['idauction'];?>
"/>
<input name="currentprice" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['currentprice']/100;?>
"/>

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
                                    <img src="../../<?php echo $_smarty_tpl->tpl_vars['currentAuctionPhotos']->value[0]['path'];?>
" alt="auction image">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                <a href="#" class="thumbnail">
                                    <img src="../../<?php echo $_smarty_tpl->tpl_vars['currentAuctionPhotos']->value[0]['path'];?>
" alt="auction image">
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
            <?php if ($_smarty_tpl->tpl_vars['currentAuction']->value['type']=="English"&&$_smarty_tpl->tpl_vars['currentAuctionOwner']->value['iduser']!=$_smarty_tpl->tpl_vars['iduser']->value) {?>
                <div class='well col-sm-12'>
                    <div class="form-group">
                        <label class=" control-label">Your price</label>
                        <input title="bid value" name="bidvalue" type="number" class="form-control" value="0.00" step="0.01"/>
                    </div>
                    <button type="button" name="makebid" style="min-height: 20px;" class="btn btn-primary btn-lg btn-block login-button">Bid</button>
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['currentAuction']->value['type']=="Dutch") {?>
                <?php if ($_smarty_tpl->tpl_vars['currentAuctionOwner']->value['iduser']!=$_smarty_tpl->tpl_vars['iduser']->value) {?>
                    <div class='well col-sm-12'>
                        <button type="button" name="buynow" style="min-height: 20px"
                                class="btn btn-primary btn-lg btn-block login-button">Buy Now
                        </button>
                    </div>
                <?php } else { ?>
                    <div class='well col-sm-12'>
                        <div class="form-group">
                            <label class="control-label">New Price</label>
                            <input name="newprice" type="number" class="form-control"
                                   value="<?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['currentprice']/100;?>
" step="0.01"/>
                        </div>
                        <button type="button" name="alterprice" style="min-height: 20px"
                                class="btn btn-primary btn-lg btn-block login-button">Alter price
                        </button>
                    </div>
                <?php }?>
            <?php } elseif ($_smarty_tpl->tpl_vars['currentAuction']->value['type']=="Blind"&&$_smarty_tpl->tpl_vars['currentAuctionOwner']->value['iduser']!=$_smarty_tpl->tpl_vars['iduser']->value) {?>
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
            <?php }?>
        </div>

        <!-- Right Section: Auction Info -->
        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-body" style="min-height: 515px">
                    <dl class="row col-sm-12 text-center h3">
                        <dt></dt><dd><strong><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['name'];?>
</strong></dd>
                    </dl>
                    <dl class="row"></dl>
                    <dl class="row"></dl>
                    <dl class="row">
                        <dt class="col-sm-2">Category</dt>
                        <dd class="col-sm-5"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['category'];?>
</dd>
                        <dt class="col-sm-2">Type</dt>
                        <dd class="col-sm-3"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['type'];?>
</dd>
                    </dl>

                    <!--type-->
                    <?php if ($_smarty_tpl->tpl_vars['currentAuction']->value['type']=="English") {?>
                        <dl class="row">
                            <dt class="col-sm-2">Base Price</dt>
                            <dd class="col-sm-5"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['baseprice']/100;?>
€</dd>
                            <dt class="col-sm-2">Current Bid</dt>
                            <dd id="currentPriceEnglish" class="col-sm-3"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['currentprice']/100;?>
€</dd>
                        </dl>
                    <?php } elseif ($_smarty_tpl->tpl_vars['currentAuction']->value['type']=="Dutch") {?>
                        <dl class="row">
                            <dt class="col-sm-2">Base Price</dt>
                            <dd class="col-sm-5"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['baseprice']/100;?>
€</dd>
                            <dt class="col-sm-2">Current Price</dt>
                            <dd id="currentPriceDutch" class="col-sm-3"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['currentprice']/100;?>
€</dd>
                        </dl>
                    <?php } elseif ($_smarty_tpl->tpl_vars['currentAuction']->value['type']=="Blind") {?>
                        <dl class="row col-sm-12 text-center">
                            <dt>Minimum Price</dt>
                            <dd><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['baseprice']/100;?>
€</dd>
                        </dl>
                    <?php }?>

                    <!-- dates -->
                    <dl class="row">
                        <dt class="col-sm-2">Begin Date</dt>
                        <dd class="col-sm-5"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['startingdate'];?>
</dd>
                        <dt class="col-sm-2">Time Left</dt>
                        <dd class="col-sm-3 timeleft"><?php echo $_smarty_tpl->tpl_vars['timeLeft']->value;?>
</dd>
                    </dl>

                    <!-- rating -->
                    <dl class="row">
                        <dt class="col-sm-3">Seller Rating</dt>
                        <dd class="col-sm-9">
                            <input title="rating" id="rate" value="<?php echo $_smarty_tpl->tpl_vars['currentAuctionOwner']->value['rating'];?>
" class="rating-loading"
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
                            <?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['description'];?>

                        </dd>
                    </dl>
                    <!-- Admin edit button -->
                    <?php if ($_smarty_tpl->tpl_vars['userState']->value=="Administrator") {?>
                        <a href="../../pages/auctions/editAuction.php?idauction=<?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['idauction'];?>
"
                           class="btn btn-info btn-xs pull-right" role="button">
                            <span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        <button type="button" onclick="banAuction(<?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['idauction'];?>
)" class="btn btn-danger btn-xs pull-right">
                            <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                        </button>
                    <?php }?>
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
                            <?php  $_smarty_tpl->tpl_vars['notification'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notification']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notification']->key => $_smarty_tpl->tpl_vars['notification']->value) {
$_smarty_tpl->tpl_vars['notification']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['notification']->value['idbidder']==true) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['currentAuction']->value['type']!="Blind") {?>
                                        <li class="list-group-item">
                                            <h4>New bid!! - Current price <?php echo $_smarty_tpl->tpl_vars['notification']->value['ammount']/100;?>
€</h4>
                                        </li>
                                    <?php } else { ?>
                                        <li class="list-group-item">
                                            <h4>New bid!!</h4>
                                        </li>
                                    <?php }?>
                                <?php } else { ?>
                                    <li class="list-group-item">
                                        <h4>New comment</h4>
                                    </li>
                                <?php }?>
                            <?php } ?>
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
                <!-- new comment -->
                <div id="createComment" class="panel-footer" style="min-height: 120px">
                    <form name="commentForm" method="POST" enctype="multipart/form-data">
                        <input name="idauction" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['idauction'];?>
"/>
                        <textarea title="comment message" name="message" required="required" class="col-sm-12" rows="3"
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
                <div class="panel-body">



                    <!--comments-->
                    <div id="auctionMessages" class = "pre-scrollable" style="max-height: 600px">
                        <?php $_smarty_tpl->tpl_vars['countComment'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['currentAuctionComments']->value), null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 0;
  if ($_smarty_tpl->tpl_vars['i']->value<$_smarty_tpl->tpl_vars['countComment']->value) { for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value<$_smarty_tpl->tpl_vars['countComment']->value; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                            <?php $_smarty_tpl->tpl_vars['comment'] = new Smarty_variable($_smarty_tpl->tpl_vars['currentAuctionComments']->value[$_smarty_tpl->tpl_vars['i']->value], null, 0);?>

                            <?php if ($_smarty_tpl->tpl_vars['comment']->value['idcomment']!=$_smarty_tpl->tpl_vars['idcomment']->value) {?>
                                <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/tickets/tickets.php">
                                <div class="panel panel-default">
                                <div  class="panel-heading">
                                    <strong>Anonymous</strong>
                                    <span class="text-muted">Commented on <?php echo $_smarty_tpl->tpl_vars['comment']->value['date'];?>
</span>

                                    <input name="idcomment" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['comment']->value['idcomment'];?>
"/>
                                    <input name="idauction" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['idauction'];?>
"/>
                                    <input name="msg" type="hidden" value="Report Comment"/>

                                    <button type="submit" class="btn btn-danger btn-xs pull-right">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    </button>

                                    <!-- Admin remove button -->
                                    <?php if ($_smarty_tpl->tpl_vars['STATE']->value=="Administrator") {?>
                                        <button name="removecomment" type="button" class="btn btn-warning btn-xs pull-right">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    <?php }?>
                                </div>
                                <div class="panel-body">
                                    <?php echo $_smarty_tpl->tpl_vars['comment']->value['message'];?>

                                </div>
                                <?php $_smarty_tpl->tpl_vars['idcomment'] = new Smarty_variable($_smarty_tpl->tpl_vars['comment']->value['idcomment'], null, 0);?>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['comment']->value['path']!=null) {?>
                                <div class="thumbnail" style="border: none">
                                    <img src="../../<?php echo $_smarty_tpl->tpl_vars['comment']->value['path'];?>
" alt="comment image">
                                </div>
                            <?php }?>
                            <?php $_smarty_tpl->tpl_vars['idnext'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                            <?php if ($_smarty_tpl->tpl_vars['currentAuctionComments']->value[$_smarty_tpl->tpl_vars['idnext']->value]['idcomment']!=$_smarty_tpl->tpl_vars['idcomment']->value) {?>
                                </div>
                                </form>
                            <?php }?>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
