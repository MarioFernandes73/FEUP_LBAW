<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 22:12:47
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/authentication/signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:263533997592c8dc0247446-63508512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '630d88d2d15ee947d586f3cd4a4135250a625e8f' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/authentication/signup.tpl',
      1 => 1496092362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '263533997592c8dc0247446-63508512',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c8dc03dd4c7_13696353',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c8dc03dd4c7_13696353')) {function content_592c8dc03dd4c7_13696353($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- REGISTER -->
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">

            <!-- Title -->
            <h2 class="text-center">Sign Up</h2>

            <form name="signup" class="form-horizontal my-style"
                  action="../../actions/authentication/signup.php"  method="post">
                <!-- attributes -->
                <div id="form-group-Username" class="form-group">
                    <label class="cols-sm-2 control-label">
                        Username
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" id="username">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                        <input name="username" title="username" type="text" class="form-control"
                               placeholder="Enter your account username" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="cols-sm-2 control-label">Name
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" id="name">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                                </span>
                        <input name="name" title="name" type="text" class="form-control" placeholder="Enter your name"
                               required="required">
                    </div>
                </div>

                <div id="form-group-Birthdate" class="form-group">
                    <label class="cols-sm-2 control-label">Birth date
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group date" id="date" data-provide="datepicker">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <input name="birthDate" title="birthdate" type="date" class="form-control" required="required">
                    </div>
                </div>

                <div id="form-group-Address" class="form-group">
                    <label class="cols-sm-2 control-label">Address
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" id="address">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-envelope"></span></span>
                        <input name="address" title="email" type="email" class="form-control" placeholder="Enter your email"
                               required="required" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="cols-sm-2 control-label">Password
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" id="pass1">
                                <span class="input-group-addon"><span
                                            class=" glyphicon glyphicon-lock"></span></span>
                        <input name="password" type="password" class="form-control" pattern=".{5,}"
                               title="Password must be at least 5 characters long!"
                               placeholder="Enter a secure password" required="required"
                               >
                    </div>
                </div>

                <div id="form-group-ConfirmPassword" class="form-group">
                    <label class="cols-sm-2 control-label">Confirm Password
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" id="pass2">
                                <span class="input-group-addon"><span
                                            class=" glyphicon glyphicon-lock"></span></span>
                        <input name="confirmPassword" title="confirm password" type="password" class="form-control" placeholder="Confirm Password"
                               required="required" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="cols-sm-2 control-label">Phone Number
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" >
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-earphone"></span></span>
                        <input name="phoneNumber" type="tel" class="form-control" pattern="[0-9]{9}"
                               placeholder="Enter your phone number" title="Phone number must be valid!"
                               required="required" >
                    </div>
                </div>

                <div class="checkbox">
                    <label><input name="signupTerms" title="accept terms" required type="checkbox">I accept the terms and conditions.
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                </div>

                <div class="form-group" style="padding: 1em 0em">
                    <button name="submit" type="submit" style="min-height: 20px"
                            class="btn btn-primary btn-lg btn-block login-button">
                        Register
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/validate.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
