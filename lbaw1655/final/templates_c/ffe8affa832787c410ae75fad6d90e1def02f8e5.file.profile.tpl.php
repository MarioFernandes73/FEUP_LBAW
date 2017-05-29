<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 19:43:47
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/users/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130896968592c6be36a0560-77982127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffe8affa832787c410ae75fad6d90e1def02f8e5' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/users/profile.tpl',
      1 => 1496078409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130896968592c6be36a0560-77982127',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'iduser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c6be387b4e9_31937580',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c6be387b4e9_31937580')) {function content_592c6be387b4e9_31937580($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/timeleft.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/paypalButton.js"></script>

<script>
    $(document).on('ready', function() {
        $('#rate').rating({
            displayOnly: true,
            step: 0.5
        });
    });
</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/tabsNavigation/commonNavigation.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/tabsNavigation/profileNavigation.js"></script>
<span id="iduser" class="hidden"><?php echo $_smarty_tpl->tpl_vars['iduser']->value;?>
</span>
    <!-- MAIN INTERACTION -->
    <div class="jumbotron">
        <!-- navs -->
        <div id="navigationContent" class="panel panel-primary" style="min-height: 600px">
            <div class="panel">
                <ul  id="profile-navigation" class="nav nav-pills nav-justified" role="tablist">
                    <li id="profile-tab" class="active" role="presentation"><a>My Profile</a></li>
                    <li id="auctions-tab" role="presentation"><a>Auctions</a></li>
                    <li id="tickets-tab" role="presentation"><a>Tickets</a></li>
                </ul>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('users/profileAccount.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate ('users/profileAuctions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate ('users/profileTickets.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
