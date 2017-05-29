<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 15:10:03
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/auctions/advancedSearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2120156233591d575c9f3a30-98433239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07ad2bb9d6d80bc1aa2ff72d1d9db7d2c6005c11' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/auctions/advancedSearch.tpl',
      1 => 1496067001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2120156233591d575c9f3a30-98433239',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_591d575cbc95a3_77436115',
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
<?php if ($_valid && !is_callable('content_591d575cbc95a3_77436115')) {function content_591d575cbc95a3_77436115($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="row main">
            <div class="main-login main-center">

                <!-- Title -->
                <h2 class="text-center mytext">Search</h2>

                <form class="form-horizontal my-style"
                      method="GET" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/auctions/searchResults.php">

                    <!-- Auction -->
                    <div class="form-group">
                        <label class="cols-sm-2 control-label">Name</label>
                        <div class="input-group" id="name">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lamp"></span></span>
                            <input name="name" title="name of auction" type="text" class="form-control" placeholder="Enter auction's name">
                        </div>
                    </div>

                    <!-- rating-->
                    <div class="form-group">
                        <label class="cols-sm-2 control-label">Rating</label>
                        <div class="input-group" id="rating">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-star"></span></span>
                            <input name="rating" title="rating" type="number" min="1" max="5" class="form-control" placeholder="Rating">
                        </div>
                    </div>

                    <!-- categories-->
                    <div class="form-group">
                        <label class="cols-sm-2 control-label">Auction Category</label>
                        <div class="input-group" id="category">
                            <span class="input-group-addon">@</span>
                            <select title="category of auction" name="category" class="form-control form-control-lg">
                                <option label=" "> </option>
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

                    <!-- Type of auction -->
                    <div class="form-group">
                        <label class="cols-sm-2 control-label">
                            Type of auction
                            <!--  <button type="button" class="btn btn-link btn-xs pull-right">
                                 <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                             </button> -->
                        </label>
                        <div class="input-group" id="type">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-glass"></span></span>
                            <select title="type of auction" name="type" class="form-control form-control-lg">
                                <option label=" "> </option>
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
                        <label class="cols-sm-2 control-label">Time in Hours</label>
                        <div class="input-group" id="time">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-time"></span></span>
                            <select title="duration hours" name="durationhours" class="form-control form-control-lg">
                                <option label=" "> </option>
                                <option>6</option>
                                <option>12</option>
                                <option>24</option>
                                <option>48</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" style="min-height: 20px" class="btn btn-primary btn-lg btn-block login-button">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
