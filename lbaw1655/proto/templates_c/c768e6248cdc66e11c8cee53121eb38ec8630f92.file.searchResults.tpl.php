<?php /* Smarty version Smarty-3.1.15, created on 2017-05-25 19:05:29
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/auctions/searchResults.tpl" */ ?>
<?php /*%%SmartyHeaderCode:344806812591d638f28d3e1-79990396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c768e6248cdc66e11c8cee53121eb38ec8630f92' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/auctions/searchResults.tpl',
      1 => 1495734994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '344806812591d638f28d3e1-79990396',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_591d638f3f3c03_96870026',
  'variables' => 
  array (
    'name' => 0,
    'rating' => 0,
    'category' => 0,
    'type' => 0,
    'date' => 0,
    'duration' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591d638f3f3c03_96870026')) {function content_591d638f3f3c03_96870026($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="jumbotron">
    <div class="row main">

        <input name="name" type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
>
        <input name="rating" type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['rating']->value;?>
>
        <input name="category" type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
>
        <input name="type" type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
>
        <input name="startingdate" type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
>
        <input name="durationhours" type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['duration']->value;?>
>

        <div class="main-login main-center">

            <h2 class="text-center">Search Result</h2>
            <div class="panel-body">

                <div id="item0" class="item" style="display: inline-block; margin: 0%"></div>
                <div id="item1" class="item" style="display: inline-table; margin: 0%"></div>
                <div id="item2" class="item" style="display: inline-table; margin: 0%"></div>

            </div>
            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
                    <li class="next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

        <?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/listAuctions.js"></script>
<?php }} ?>
