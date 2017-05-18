<?php /* Smarty version Smarty-3.1.15, created on 2017-05-10 15:42:28
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/administrator/administratorPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:439535008590b52a6b09c57-54148011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33a5d5e565dbae69f6d0b8c3d17bbcb4668847d6' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/administrator/administratorPage.tpl',
      1 => 1494427345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '439535008590b52a6b09c57-54148011',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_590b52a6c76eb7_33043509',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590b52a6c76eb7_33043509')) {function content_590b52a6c76eb7_33043509($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- MAIN INTERACTION -->
<div class="jumbotron">
    <!-- Navs -->
    <div class="panel panel-primary" style="min-height: 600px">
        <div class="panel panel-default">
            <ul id="administrator-navigation" class="nav nav-pills nav-justified" role="tablist">
                <li id="users-tab" role="presentation" class="active"><a>Users</a></li>
                <li id="auctions-tab" role="presentation" ><a>Auctions</a></li>
                <li id="tickets-tab" role="presentation" ><a>Tickets</a></li>
                <li id="statistics-tab" role="presentation" ><a>Statistics</a></li>
            </ul>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ('administrator/administratorPageUsers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('administrator/administratorPageAuctions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('administrator/administratorPageTickets.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('administrator/administratorPageStatistics.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <!-- fim do panel -->
</div>
<!-- fim do jumbotron -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/tabsNavigation/commonNavigation.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/tabsNavigation/adminNavigation.js"></script><?php }} ?>
