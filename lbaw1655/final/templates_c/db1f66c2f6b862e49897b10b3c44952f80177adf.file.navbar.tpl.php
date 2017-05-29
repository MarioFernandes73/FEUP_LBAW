<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 19:14:27
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/common/navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187426155858f75b26bc6115-85522859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db1f66c2f6b862e49897b10b3c44952f80177adf' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/common/navbar.tpl',
      1 => 1496081665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187426155858f75b26bc6115-85522859',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f75b26c35863_24358401',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'categories' => 0,
    'category' => 0,
    'USERNAME' => 0,
    'IDUSER' => 0,
    'STATE' => 0,
    'ERROR_MESSAGES' => 0,
    'error' => 0,
    'SUCCESS_MESSAGES' => 0,
    'success' => 0,
    'FIELD_ERRORS' => 0,
    'field_errors' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f75b26c35863_24358401')) {function content_58f75b26c35863_24358401($_smarty_tpl) {?><div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <!-- Home Button -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/authentication/homepage.php">Home</a>
            </div>

            <!-- Categories -->
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Categories<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/auctions/searchResults.php?category=<?php echo $_smarty_tpl->tpl_vars['category']->value["unnest"];?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['category']->value["unnest"];?>
</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/auctions/createAuction.php">Create Auction</a></li>
                    <?php }?>
                    <li><a href="#">FAQ</a></li>
                    <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/tickets/tickets.php">Tickets</a></li>
                    <?php }?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/authentication/contacts.php">Contact</a></li>
                </ul>

                <!-- Search -->
                <form class="navbar-form navbar-left"
                      method="GET" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/auctions/searchResults.php">
                    <div class="form-group">
                        <input name="fullTextSearch" title="search bar" type="text" class="form-control" placeholder="Search">
                        <button type="submit" class="btn btn-default">Search</button>
                    </div>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/auctions/advancedSearch.php" class="btn btn-default">Advanced Search</a>
                </form>

                <!-- Account -->
                <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?iduser=<?php echo $_smarty_tpl->tpl_vars['IDUSER']->value;?>
">Profile</a></li>
                                <?php if (($_smarty_tpl->tpl_vars['STATE']->value=="Administrator")) {?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/administrator/administratorPage.php">Administration
                                            Options</a></li>
                                <?php }?>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/authentication/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Login e SignUp -->

                <?php } else { ?>
                    <form class="navbar-form navbar-right">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/authentication/signup.php" class="btn btn-default">Sign Up</a>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#loginDialog">
                            Login
                        </button>
                    </form>
                <?php }?>
            </div>
        </div>
    </nav>
    <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
        <div class="panel panel-danger">
            <div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
        </div>
    <?php } ?>
    <?php  $_smarty_tpl->tpl_vars['success'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['success']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SUCCESS_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['success']->key => $_smarty_tpl->tpl_vars['success']->value) {
$_smarty_tpl->tpl_vars['success']->_loop = true;
?>
        <div class="panel panel-success">
            <div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
        </div>
    <?php } ?>
    <?php  $_smarty_tpl->tpl_vars['field_errors'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_errors']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['FIELD_ERRORS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_errors']->key => $_smarty_tpl->tpl_vars['field_errors']->value) {
$_smarty_tpl->tpl_vars['field_errors']->_loop = true;
?>
        <div class="panel panel-danger">
            <div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['field_errors']->value;?>
</div>
        </div>
    <?php } ?>
    <!-- Login Form -->
    <div class="modal fade" id="loginDialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Body -->
                <div class="modal-body">
                    <form method="post" action="../../actions/authentication/login.php">
                        <div class="form-group">*
                            <input name="user" class="form-control input-lg" placeholder="Username" title="username" type="text"
                                   required="required">
                        </div>
                        <div class="form-group">*
                            <input name="pass" class="form-control input-lg" placeholder="Password" title="password" type="password"
                                   required="required">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }} ?>
