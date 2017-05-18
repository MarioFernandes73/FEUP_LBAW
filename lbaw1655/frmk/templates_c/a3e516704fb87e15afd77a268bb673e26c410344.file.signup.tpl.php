<?php /* Smarty version Smarty-3.1.15, created on 2017-05-02 12:08:30
         compiled from "/opt/lbaw/lbaw1655/public_html/frmk/templates/authentication/signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60883016858f23b3788b923-06745384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3e516704fb87e15afd77a268bb673e26c410344' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/frmk/templates/authentication/signup.tpl',
      1 => 1493110260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60883016858f23b3788b923-06745384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f23b37a02c39_78505102',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f23b37a02c39_78505102')) {function content_58f23b37a02c39_78505102($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- REGISTER -->
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">

            <!-- Title -->
            <h2 align="center">Sign Up</h2>

            <form name="signup" class="form-horizontal" style="padding: 0% 25%"
                  action="../../actions/authentication/signup.php"  method="post">
                <!-- attributes -->
                <div id="form-group-Username" class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="input-group" id="username">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                        <input name="username" type="text" class="form-control"
                               placeholder="Enter your account username" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Name</label>
                    <div class="input-group" id="name">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                                </span>
                        <input name="name" type="text" class="form-control" placeholder="Enter your name"
                               required="required" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="date" class="cols-sm-2 control-label">Birth date</label>
                    <div class="input-group date" id="date" data-provide="datepicker">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <input name="birthDate" type="date" class="form-control" required="required">
                    </div>
                </div>

                <div id="form-group-Address" class="form-group">
                    <label for="address" class="cols-sm-2 control-label">Address</label>
                    <div class="input-group" id="address">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-envelope"></span></span>
                        <input name="address" type="email" class="form-control" placeholder="Enter your email"
                               required="required" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="cols-sm-2 control-label">Password</label>
                    <div class="input-group" id="pass2">
                                <span class="input-group-addon"><span
                                            class=" glyphicon glyphicon-lock"></span></span>
                        <input name="password" type="password" class="form-control" pattern=".{5,}"
                               title="Password must be at least 5 characters long!"
                               placeholder="Enter a secure password" required="required"
                               aria-describedby="basic-addon1">
                    </div>
                </div>

                <div id="form-group-ConfirmPassword" class="form-group">
                    <label for="pass2" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="input-group" id="pass2">
                                <span class="input-group-addon"><span
                                            class=" glyphicon glyphicon-lock"></span></span>
                        <input name="confirmPassword" type="password" class="form-control" placeholder="Confirm Password"
                               required="required" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="cols-sm-2 control-label">Phone Number</label>
                    <div class="input-group" >
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-earphone"></span></span>
                        <input name="phoneNumber" type="tel" class="form-control" pattern="[0-9]{9}"
                               placeholder="Enter your phone number" title="insert number phone valid!!"
                               required="required" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="checkbox">
                    <label><input name="signupTerms" required type="checkbox">I accept the terms and conditions.</label>
                </div>

                <div class="form-group" style="padding: 1em 3em">
                    <button name="submit" type="submit" style="min-height: 10px; font-size: 3vmin"
                            class="btn btn-primary btn-lg btn-block login-button">
                        Register
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/validations/validate.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
