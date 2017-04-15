<?php /* Smarty version Smarty-3.1.15, created on 2017-04-15 16:24:39
         compiled from "/opt/lbaw/lbaw1655/public_html/frmk/templates/authentication/signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60883016858f23b3788b923-06745384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3e516704fb87e15afd77a268bb673e26c410344' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/frmk/templates/authentication/signup.tpl',
      1 => 1492196429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60883016858f23b3788b923-06745384',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f23b37a02c39_78505102',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f23b37a02c39_78505102')) {function content_58f23b37a02c39_78505102($_smarty_tpl) {?><!-- REGISTER -->
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">

            <!-- Title -->
            <h2 align="center">Sign Up</h2>

            <form class="form-horizontal" style="padding: 0% 25%"  action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/signup.php" method="post">
                <!-- attributes -->
                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="input-group" id="username">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                        <input type="text" class="form-control" placeholder="Enter your account username" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Name</label>
                    <div class="input-group" id="name">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                                </span>
                        <input type="text" class="form-control" placeholder="Enter your name" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="date" class="cols-sm-2 control-label">Birth date</label>
                    <div class="input-group date" id="date" data-provide="datepicker">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Email</label>
                    <div class="input-group" id="email">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" class="form-control" placeholder="Enter your email" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass" class="cols-sm-2 control-label">Password</label>
                    <div class="input-group" id="pass">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" class="form-control" placeholder="Enter a secure password" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass2" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="input-group" id="pass2">
                                <span class="input-group-addon"><span
                                            class=" glyphicon glyphicon-lock"></span></span>
                        <input type="password" class="form-control" placeholder="Confirm Password" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="cols-sm-2 control-label">Phone Number</label>
                    <div class="input-group" id="number">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-earphone"></span></span>
                        <input type="tel" class="form-control" placeholder="Enter your phone number" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="checkbox">
                    <label><input type="checkbox" value="">I accept the terms and conditions.</label>
                </div>

                <div class="form-group" style="padding: 1em 3em">
                    <button type="submit" style="min-height: 10px; font-size: 3vmin" class="btn btn-primary btn-lg btn-block login-button">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<?php }} ?>
