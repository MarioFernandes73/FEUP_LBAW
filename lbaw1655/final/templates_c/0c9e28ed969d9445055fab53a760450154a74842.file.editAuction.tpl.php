<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 19:56:58
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/auctions/editAuction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:252643510592c6efa2ec900-55909167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c9e28ed969d9445055fab53a760450154a74842' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/auctions/editAuction.tpl',
      1 => 1496023210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '252643510592c6efa2ec900-55909167',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'idAuction' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c6efa4b8b36_48641780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c6efa4b8b36_48641780')) {function content_592c6efa4b8b36_48641780($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">

            <h2 class="text-center">Edit Auction</h2>
            <!-- Title -->

            <form class="form-horizontal" style="padding: 0% 25%" method="post"   action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/auctions/editAuction.php">

                <input title="auction id" name="idauction" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idAuction']->value;?>
"> </input>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Name</label>
                    <div class="input-group" id="name">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lamp">
                                    </span></span>
                        <input title="name of auction" name="name" type="text" class="form-control" placeholder="Enter the auction's name"
                               aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="category" class="cols-sm-2 control-label">Category</label>
                    <div class="input-group" id="category">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-list-alt"></span></span>
                        <select title="category" name="category" class="form-control form-control-lg">
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
                    <textarea title="description" name="description" class="form-control" rows="5"
                              placeholder="Write your description..."></textarea>
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
