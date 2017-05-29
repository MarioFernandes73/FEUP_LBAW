<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 19:45:00
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/administrator/administratorPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:962372798592c6c2cac6321-11141701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f390e7e276c4ba06066c27471112d8bf6dd698f' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/administrator/administratorPage.tpl',
      1 => 1496073972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '962372798592c6c2cac6321-11141701',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sessionid' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c6c2cc36fb5_53689596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c6c2cc36fb5_53689596')) {function content_592c6c2cc36fb5_53689596($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<span id="sessionid" class="hidden"><?php echo $_smarty_tpl->tpl_vars['sessionid']->value;?>
</span>
<!-- MAIN INTERACTION -->
<div class="jumbotron">
    <!-- Navs -->
    <div class="panel panel-primary" style="min-height: 1000px">
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
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/tabsNavigation/commonNavigation.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/tabsNavigation/adminNavigation.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
