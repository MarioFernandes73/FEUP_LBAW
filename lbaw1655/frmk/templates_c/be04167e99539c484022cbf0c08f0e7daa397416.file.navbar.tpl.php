<?php /* Smarty version Smarty-3.1.15, created on 2017-04-16 14:04:43
         compiled from "C:\xampp\htdocs\FEUP_LBAW\lbaw1655\frmk\templates\common\navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151988594858f35ddb3a2f46-66656223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be04167e99539c484022cbf0c08f0e7daa397416' => 
    array (
      0 => 'C:\\xampp\\htdocs\\FEUP_LBAW\\lbaw1655\\frmk\\templates\\common\\navbar.tpl',
      1 => 1492339837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151988594858f35ddb3a2f46-66656223',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f35ddb3fda53_91120869',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f35ddb3fda53_91120869')) {function content_58f35ddb3fda53_91120869($_smarty_tpl) {?><div class="container">

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
                            <li><a href="#">Antiquities</a></li>
                            <li><a href="#">Clothes</a></li>
                            <li><a href="#">Decoration</a></li>
                            <li><a href="#">Indoor</a></li>
                            <li><a href="#">Jewelery</a></li>
                            <li><a href="#">Outside</a></li>
                            <li><a href="#">Others</a></li>
                            <li><a href="#">Tools</a></li>
                        </ul>
                    </li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <!-- Search -->

                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="button" class="btn btn-default">Submit</button>
                    <button type="button" onclick="location.href='Search.html'" class="btn btn-default">Advanced
                        Search
                    </button>
                </form>

                <!-- Account -->

                    <?php if ($_smarty_tpl->tpl_vars['username']->value) {?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="profile.html">Profile</a></li>
                                    <li><a href="admin.html">Administration Options</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>

                        <!-- Login e SignUp -->

                        <?php } else { ?>
                        <form class="navbar-form navbar-right">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/authentication/signup.php">Sign Up</a>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#loginDialog">Login</button>
                        </form>
                    <?php }?>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Modal title
                    </h4>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label"
                                    for="inputEmail3">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control"
                                       id="inputEmail3" placeholder="Email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"
                                   for="inputPassword3" >Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control"
                                       id="inputPassword3" placeholder="Password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"/> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Form -->
    <div class="modal fade" id="loginDialog" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Body -->
                <div class="modal-body">
                    <form role="form" method="post" action="../../actions/authentication/login.php">
                        <div class="form-group">
                            <input name="user" class="form-control input-lg" placeholder="Username" type="text" required="required">
                        </div>
                        <div class="form-group">
                            <input name="pass" class="form-control input-lg" placeholder="Password" type="password" required="required">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>







<?php }} ?>
