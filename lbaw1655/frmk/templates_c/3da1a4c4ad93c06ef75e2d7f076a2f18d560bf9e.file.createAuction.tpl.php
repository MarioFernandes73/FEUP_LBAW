<?php /* Smarty version Smarty-3.1.15, created on 2017-04-26 12:30:01
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/auctions/createAuction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25909525658f7d96b535cd0-95567910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3da1a4c4ad93c06ef75e2d7f076a2f18d560bf9e' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/auctions/createAuction.tpl',
      1 => 1493206198,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25909525658f7d96b535cd0-95567910',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f7d96b6c2cc8_14612725',
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
<?php if ($_valid && !is_callable('content_58f7d96b6c2cc8_14612725')) {function content_58f7d96b6c2cc8_14612725($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/opt/lbaw/lbaw1655/public_html/proto/lib/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="jumbotron">
            <div class="row main">
                <div class="main-login main-center">
                    <h2 class="text-center">Create Auction</h2>
                    <form class="form-horizontal" style="padding: 0% 25%" method="POST" enctype="multipart/form-data"
                          action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/auctions/createAuction.php">

                        <!-- Name -->

                        <div class="form-group">
                            <label class="cols-sm-2 control-label">Name</label>
                            <div class="input-group" id="name">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lamp"></span>
                                </span>
                                <input type="text" name="name" pattern="([\w\_\?\.\,\!\+\-\s\n\\])*" required="required" class="form-control" placeholder="Enter auction's name" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <!-- Category -->

                        <div class="form-group">
                            <label for="category" class="cols-sm-2 control-label">Category</label>
                            <div class="input-group" id="category">
                                <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-list-alt"></span></span>
                                <select name="category" class="form-control form-control-lg">
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
                            <label for="price" class="cols-sm-2 control-label">Base Price</label>
                            <div class="input-group" id="price">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-euro"></span>
                                </div>
                                <input type="number"  min="1" max="2 100 000 000"
                                       name="baseprice" required="required" step="0.01" class="form-control" value ="0.00">

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
                            <label for="date" class="cols-sm-2 control-label">Starting time & date</label>
                            <div class="input-group date" id="date" data-provide="datepicker">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <input type="datetime-local"  name="startingdate" required="required" class="form-control"
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
                            <label for="time" class="cols-sm-2 control-label">Time in Hours</label>
                            <div class="input-group" id="time">
                                <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-time"></span></span>
                                <select name="durationhours" class="form-control form-control-lg">
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
                            <input type="file" name="upload[]" style="display: none; "/>
                        </label>
                        </div>

                        <!-- Submission -->

                        <div class="form-group" style="padding: 1em 3em">
                            <button type="submit" style="min-height: 10px; font-size: 3vmin" class="btn btn-primary btn-lg btn-block login-button">
                            Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
