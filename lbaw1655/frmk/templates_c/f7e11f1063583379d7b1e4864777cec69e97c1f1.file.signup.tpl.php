<?php /* Smarty version Smarty-3.1.15, created on 2017-04-16 16:32:29
         compiled from "C:\xampp\htdocs\FEUP_LBAW\lbaw1655\frmk\templates\authentication\signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177231329058f35ec8954713-21507134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7e11f1063583379d7b1e4864777cec69e97c1f1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\FEUP_LBAW\\lbaw1655\\frmk\\templates\\authentication\\signup.tpl',
      1 => 1492353104,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177231329058f35ec8954713-21507134',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f35ec89d4e82_69947786',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f35ec89d4e82_69947786')) {function content_58f35ec89d4e82_69947786($_smarty_tpl) {?><!-- REGISTER -->
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">

            <!-- Title -->
            <h2 align="center">Sign Up</h2>

            <form class="form-horizontal" style="padding: 0% 25%"  action="../../actions/authentication/signup.php" method="post">
                <!-- attributes -->
                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="input-group" id="username">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                        <input name="username" type="text" class="form-control" placeholder="Enter your account username" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Name</label>
                    <div class="input-group" id="name">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                                </span>
                        <input name="name" type="text" class="form-control" placeholder="Enter your name" required="required" aria-describedby="basic-addon1">
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

                <div class="form-group">
                    <label for="address" class="cols-sm-2 control-label">Email</label>
                    <div class="input-group" id="address">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-envelope"></span></span>
                        <input name="address" type="email" class="form-control" placeholder="Enter your email"  required="required" aria-describedby="basic-addon1"> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="cols-sm-2 control-label">Password</label>
                    <div class="input-group" id="pass2">
                                <span class="input-group-addon"><span
                                            class=" glyphicon glyphicon-lock"></span></span>
                        <input name="password" type="password" class="form-control" pattern=".{5,}" title="Password must be at least 5 characters long!" placeholder="Enter a secure password" required="required" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass2" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="input-group" id="pass2">
                                <span class="input-group-addon"><span
                                            class=" glyphicon glyphicon-lock"></span></span>
                        <input name="confirPassword" type="password" class="form-control" placeholder="Confirm Password" required="required" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="cols-sm-2 control-label">Phone Number</label>
                    <div class="input-group" id="number">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-earphone"></span></span>
                        <input name="phoneNumber" type="tel" class="form-control" pattern="[0-9]{9}" placeholder="Enter your phone number" title="insert number phone valid!!" required="required" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="checkbox">
                    <label><input name="signupTerms" required type="checkbox">I accept the terms and conditions.</label>
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
