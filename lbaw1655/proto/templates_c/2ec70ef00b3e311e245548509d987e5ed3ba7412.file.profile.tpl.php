<?php /* Smarty version Smarty-3.1.15, created on 2017-05-18 10:36:37
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/users/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6879110895900b5904231a0-39164325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ec70ef00b3e311e245548509d987e5ed3ba7412' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/users/profile.tpl',
      1 => 1495100159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6879110895900b5904231a0-39164325',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5900b5904c8d36_77763561',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'iduser' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5900b5904c8d36_77763561')) {function content_5900b5904c8d36_77763561($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
        <div class="panel panel-primary" style="min-height: 600px">
            <div class="panel">
                <ul id="profile-navigation" class="nav nav-pills nav-justified" role="tablist">
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
