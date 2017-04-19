<?php /* Smarty version Smarty-3.1.15, created on 2017-04-18 23:18:24
         compiled from "/opt/lbaw/lbaw1655/public_html/frmk/templates/auctions/viewAuction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184668945758f2367d5ec176-19265609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bba75b2ba3df1ebddac6132d5c1e48fca747fd2' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/frmk/templates/auctions/viewAuction.tpl',
      1 => 1492553900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184668945758f2367d5ec176-19265609',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f2367d748c75_29104820',
  'variables' => 
  array (
    'currentAuction' => 0,
    'timeLeft' => 0,
    'currentAuctionOwner' => 0,
    'notifications' => 0,
    'notification' => 0,
    'currentAuctionComments' => 0,
    'comment' => 0,
    'STATE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f2367d748c75_29104820')) {function content_58f2367d748c75_29104820($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="jumbotron">
    <div class="row">
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
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-info btn-block">Follow</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-danger btn-block">Report</button>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-block btn-lg">Bid</button>
            <div class='well col-sm-12'>
                <form>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Your price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" ng-pattern="/^[0-9]+(\.[0-9][0-9]?)?$/" step="0.01" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-body" style="min-height: 515px">
                    <dl class="row col-sm-12 text-center h3">
                        <strong><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['name'];?>
</strong>
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
                    <?php if ($_smarty_tpl->tpl_vars['currentAuction']->value['type']=="English") {?>
                        <dl class="row">
                            <dt class="col-sm-2">Base Price</dt>
                            <dd class="col-sm-5"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['baseprice'];?>
€</dd>
                            <dt class="col-sm-2">Current Bid</dt>
                            <dd class="col-sm-3"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['currentprice'];?>
€</dd>
                        </dl>
                    <?php } elseif ($_smarty_tpl->tpl_vars['currentAuction']->value['type']=="Dutch") {?>
                        <dl class="row">
                            <dt class="col-sm-2">Base Price</dt>
                            <dd class="col-sm-5"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['baseprice'];?>
€</dd>
                            <dt class="col-sm-2">Current Price</dt>
                            <dd class="col-sm-3"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['currentprice'];?>
€</dd>
                        </dl>
                    <?php } elseif ($_smarty_tpl->tpl_vars['currentAuction']->value['type']=="Blind") {?>
                        <dl class="row col-sm-12 text-center">
                            <dt>Minimum Price</dt>
                            <dd><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['baseprice'];?>
€</dd>
                        </dl>
                    <?php }?>
                    <dl class="row">
                        <dt class="col-sm-2">Begin Date</dt>
                        <dd class="col-sm-5"><?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['startingdate'];?>
</dd>
                        <dt class="col-sm-2">Time Left</dt>
                        <dd class="col-sm-3" id="timeleft"><?php echo $_smarty_tpl->tpl_vars['timeLeft']->value;?>
</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Seller Rating</dt>
                        <dd class="col-sm-9">
                            <input id="rate" value="<?php echo $_smarty_tpl->tpl_vars['currentAuctionOwner']->value['rating'];?>
" class="rating-loading" data-size="xs" data-disabled="true">
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
                    <dl class="row">
                        <dt class="col-sm-2">Description</dt>
                        <dd class="col-sm-10 pre-scrollable text-center" style="max-height: 230px">
                            <?php echo $_smarty_tpl->tpl_vars['currentAuction']->value['description'];?>

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
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary ">
                <div class="panel-body pre-scrollable" style="min-height: 460px">
                    <div class="table-responsive">
                        <ul class="list-group">
                            <?php  $_smarty_tpl->tpl_vars['notification'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notification']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notification']->key => $_smarty_tpl->tpl_vars['notification']->value) {
$_smarty_tpl->tpl_vars['notification']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['notification']->value['idbidder']==true) {?>
                                    <li class="list-group-item">
                                        <h4>New bid!! - Current price <?php echo $_smarty_tpl->tpl_vars['notification']->value['ammount'];?>
€</h4>
                                    </li>
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
                <div class="panel-body pre-scrollable" style="max-height: 340px">
                    <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currentAuctionComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Anonymous</strong>
                                <span class="text-muted">Commented on <?php echo $_smarty_tpl->tpl_vars['comment']->value['date'];?>
</span>
                                <button style="margin-left: 5px;" type="button" class="btn btn-danger btn-xs pull-right">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                </button>
                                <!-- Admin remove button -->
                                <?php if ($_smarty_tpl->tpl_vars['STATE']->value=="Administrator") {?>
                                <button type="button" class="btn btn-warning btn-xs pull-right">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                                <?php }?>
                            </div>
                            <div class="panel-body">
                                <?php echo $_smarty_tpl->tpl_vars['comment']->value['message'];?>

                            </div>
                        </div>
                    <?php } ?>
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

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
