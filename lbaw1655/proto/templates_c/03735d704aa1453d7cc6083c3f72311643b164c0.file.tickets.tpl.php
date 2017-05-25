<?php /* Smarty version Smarty-3.1.15, created on 2017-05-18 08:45:51
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/tickets/tickets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82082210959141fcae98480-40841909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03735d704aa1453d7cc6083c3f72311643b164c0' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/tickets/tickets.tpl',
      1 => 1495093484,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82082210959141fcae98480-40841909',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59141fcb0ef150_60103011',
  'variables' => 
  array (
    'msg' => 0,
    'BASE_URL' => 0,
    'idComment' => 0,
    'idAuction' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59141fcb0ef150_60103011')) {function content_59141fcb0ef150_60103011($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">

            <!-- reportComment -->
            <?php if ($_smarty_tpl->tpl_vars['msg']->value=="Report Comment") {?>
                <form class="form-horizontal" style="padding: 0% 25%" method="POST"
                      action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/tickets/reportComment.php">
                    <h2 class="text-center">Ticket</h2>
                    <input name="idcomment" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idComment']->value;?>
"> </input>
                    <input name="idauction" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idAuction']->value;?>
"> </input>

                    <div class="form-group">
                        <label for="Title">Title</label>
                        <textarea name="title" class="form-control" rows="1"
                                  placeholder="<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
" readonly></textarea>

                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control form-control-lg">
                            <option>Report</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Message</label>
                        <textarea required="required" name="message" class="form-control" rows="5" id="comment"
                                  placeholder="Write your ticket..."></textarea>

                    </div>

                    <div class="form-group" style="padding: 1em 3em">
                        <button type="submit" style="min-height: 10px; font-size: 3vmin"
                                class="btn btn-primary btn-lg btn-block login-button">
                            Send
                        </button>
                    </div>
                </form>
            <?php } else { ?>
                <!-- report -->
                <form class="form-horizontal" style="padding: 0% 25%" method="POST"
                      action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/tickets/createTicket.php">
                    <h2 class="text-center">Ticket</h2>

                    <div class="form-group">
                        <label for="Title">Title</label>
                        <textarea name="title" class="form-control" rows="1"
                                 required="required" placeholder="Title of ticket"></textarea>


                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control form-control-lg">
                            <option>Report</option>
                            <option>Product</option>
                            <option>Questions</option>
                            <option>Others</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Message</label>
                        <textarea required="required" name="message" class="form-control" rows="5" id="comment"
                                  placeholder="Write your ticket..."></textarea>

                    </div>

                    <div class="form-group" style="padding: 1em 3em">
                        <button type="submit" style="min-height: 10px; font-size: 3vmin"
                                class="btn btn-primary btn-lg btn-block login-button">
                            Send
                        </button>
                    </div>
                </form>
            <?php }?>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
