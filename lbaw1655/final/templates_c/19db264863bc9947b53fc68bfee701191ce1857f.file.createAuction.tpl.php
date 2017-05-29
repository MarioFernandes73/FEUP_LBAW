<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 22:52:14
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/auctions/createAuction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1302620004592c7a114b9ff1-77016694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19db264863bc9947b53fc68bfee701191ce1857f' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/auctions/createAuction.tpl',
      1 => 1496094732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1302620004592c7a114b9ff1-77016694',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c7a1167be78_23530976',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'categories' => 0,
    'category' => 0,
    'types' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c7a1167be78_23530976')) {function content_592c7a1167be78_23530976($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/opt/lbaw/lbaw1655/public_html/final/lib/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="jumbotron">
            <div class="row main">
                <div class="main-login main-center">
                    <h2 class="text-center mytext">Create Auction
                        <button type="button" class="btn btn-link btn-xs center-left" data-toggle="tooltip"
                                title="To create a new auction please insert the information bellow.">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </button>
                    </h2>
                    <form class="form-horizontal my-style" method="POST" enctype="multipart/form-data"
                          action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/auctions/createAuction.php">

                        <!-- Name -->
                        <div class="form-group">
                            <label class="cols-sm-2 control-label">Auction Name
                                <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                        title="Required field">*</button>
                            </label>
                            <div class="input-group" id="name">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lamp"></span>
                                </span>
                                <input title="name" type="text" name="name" pattern="([\w\_\?\.\,\!\+\-\s\n\\])*" required="required" class="form-control" placeholder="Enter auction's name" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="category" class="cols-sm-2 control-label">Category
                                <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                        title="Required field">*</button>
                                <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                        title="Category where your auction fits in.">
                                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                </button>
                            </label>
                            <div class="input-group" id="category">
                                <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-list-alt"></span></span>
                                <select title="category" name="category" class="form-control form-control-lg">
                                    <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['category']->value["unnest"];?>
</option>
                                    <?php } ?>
                                 </select>
                            </div>
                        </div>

                        <!-- Base Price -->
                        <div class="form-group">
                            <label for="price" class="cols-sm-2 control-label">Base Price
                                <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                        title="Required field">*</button>
                                <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                        title="Minimum price of the starting bid.">
                                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                </button>
                            </label>
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
                            <label for="type" class="cols-sm-2 control-label">Type of auction
                                <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                        title="Required field">*</button>
                                <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                        title="Here you can chose which type of auction to create. The differences between
                                    each type can be found at our FAQ page.">
                                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                </button>
                            </label>
                            <div class="input-group" id="type">
                                <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-glass"></span></span>
                                <select title="type of auction" name="type" class="form-control form-control-lg">
                                    <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['type']->value["unnest"];?>
</option>
                                    <?php } ?>
                            </select>
                            </div>
                        </div>

                        <!-- Start Date -->
                        <div class="form-group">
                            <label for="date" class="cols-sm-2 control-label">Starting time & date
                                <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                        title="Required field">*</button>
                                <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                        title="The auction will start in this date. It is also possible to schedule an auction.">
                                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                </button>
                            </label>
                            <div class="input-group date" id="date" data-provide="datepicker">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <input title="starting date" type="datetime-local"  name="startingdate" required="required" class="form-control"
                                       value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
T<?php echo smarty_modifier_date_format(time(),"%H:%M");?>
"
                                       min="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
T<?php echo smarty_modifier_date_format(time(),"%H:%M");?>
"/>
                            </div>
                        </div>

                        <!-- Time of the Auction -->
                        <div class="form-group">
                            <label for="time" class="cols-sm-2 control-label">Auction Duration in Hours
                                <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                        title="Required field">*</button>
                                <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                        title="Number of hours that the auction will be active.">
                                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                </button>
                            </label>
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
                        </div>

                        <div class="form-group">
                            <label class="btn btn-default btn-file pull-left" style="margin-top: 5px;">
                                Auction Photos
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
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<?php }} ?>
