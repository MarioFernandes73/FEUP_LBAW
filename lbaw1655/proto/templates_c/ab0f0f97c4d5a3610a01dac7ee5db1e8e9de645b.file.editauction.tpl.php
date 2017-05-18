<?php /* Smarty version Smarty-3.1.15, created on 2017-05-08 09:19:41
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/auctions/editauction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:101890055910295d6d7d72-50220479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab0f0f97c4d5a3610a01dac7ee5db1e8e9de645b' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/auctions/editauction.tpl',
      1 => 1494231534,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101890055910295d6d7d72-50220479',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5910295d827a28_28575031',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5910295d827a28_28575031')) {function content_5910295d827a28_28575031($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">

            <h2 class="text-center">Edit Auction</h2>
            <!-- Title -->

            <form class="form-horizontal" style="padding: 0% 25%" method="post"   action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/auctions/editauction.php">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Name</label>
                    <div class="input-group" id="name">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lamp">
                                    </span></span>
                        <input type="text" class="form-control" placeholder="Enter the auction's name"
                               aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="category" class="cols-sm-2 control-label">Category</label>
                    <div class="input-group" id="category">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-list-alt"></span></span>
                        <select class="form-control form-control-lg">
                            <option>Antiquities</option>
                            <option>Clothes</option>
                            <option>Decoration</option>
                            <option>Indoor</option>
                            <option>Jewelery</option>
                            <option>Outside</option>
                            <option>Others</option>
                            <option>Tools</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="comment">Item description</label>
                    <textarea class="form-control" rows="5" id="comment"
                              placeholder="Write your description..."></textarea>
                    <label class="btn btn-default btn-file pull-right" style="margin-top: 5px;">
                        <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                        <input type="file" style="display: none; ">
                    </label>
                </div>

                <div class="form-group" style="padding: 1em 3em">
                    <button type="submit" style="min-height: 10px; font-size: 3vmin"
                            class="btn btn-primary btn-lg btn-block login-button">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
