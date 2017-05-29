<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 19:41:53
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/auctions/searchResults.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1782225541592c6b71278532-35447871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e15dc93fa5b903f4a15fa5efeddb5138a7e6cbb' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/auctions/searchResults.tpl',
      1 => 1496069889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1782225541592c6b71278532-35447871',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'rating' => 0,
    'category' => 0,
    'type' => 0,
    'date' => 0,
    'duration' => 0,
    'fullTextSearch' => 0,
    'hot' => 0,
    'lastMinute' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c6b7133caa1_91838488',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c6b7133caa1_91838488')) {function content_592c6b7133caa1_91838488($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="jumbotron">
    <div class="main">

        <input name="name" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
        <input name="rating" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['rating']->value;?>
">
        <input name="category" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
">
        <input name="type" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
        <input name="startingdate" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
">
        <input name="durationhours" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['duration']->value;?>
">
        <input name="fullTextSearch" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['fullTextSearch']->value;?>
">
        <input name="hot" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['hot']->value;?>
">
        <input name="lastMinute" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['lastMinute']->value;?>
">

        <div class="main-login main-center">

            <h2 class="text-center mytext">Search Result</h2>
            <div class="panel-body container">

                <div id="item0"></div>
                <div id="item1"></div>
                <div id="item2"></div>

            </div>
            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a onclick="previous()"><span aria-hidden="true">&larr;</span> Previous</a></li>
                    <li class="next"><a onclick="next()">Next <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/listAuctions.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/timeleft.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
