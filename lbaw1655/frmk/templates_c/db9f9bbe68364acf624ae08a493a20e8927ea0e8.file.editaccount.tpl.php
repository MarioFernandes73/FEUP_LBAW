<?php /* Smarty version Smarty-3.1.15, created on 2017-04-26 22:10:42
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/users/editaccount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1538759882590095d27a6726-93022784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db9f9bbe68364acf624ae08a493a20e8927ea0e8' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/users/editaccount.tpl',
      1 => 1493241039,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1538759882590095d27a6726-93022784',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_590095d28fa201_42704636',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590095d28fa201_42704636')) {function content_590095d28fa201_42704636($_smarty_tpl) {?>
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">


            <h2 class="text-center">Edit Account</h2>                                    <!-- Title -->
            <form name="editaccount" class="form-horizontal" style="padding: 0% 25%" method="get" action="../../actions/users/editaccount.php">
                <!-- attributes -->
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Name</label>
                    <div class="input-group" id="name">
                            <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                            </span>
                        <input name="name" type="text" class="form-control" placeholder="User's current name"
                               aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Address</label>
                    <div class="input-group" id="email">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </span>
                        <input name="address" type="email" class="form-control" placeholder="User's current email"
                               aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass" class="cols-sm-2 control-label">Password</label>
                    <div class="input-group" id="pass">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                        <input name="password" type="password" class="form-control" placeholder="User's current password"
                               pattern=".{5,}" title="Password must be at least 5 characters long!"
                               aria-describedby="basic-addon1">
                    </div>
                </div>

                <div id="form-group-ConfirmPassword" class="form-group">
                    <label for="pass2" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="input-group" id="pass2">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                        <input name="confirmPassword" type="password" class="form-control" placeholder="User's current Password"
                               aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="cols-sm-2 control-label">Phone Number</label>
                    <div class="input-group" id="number">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-earphone"></span>
                            </span>
                        <input name="phone" type="tel" class="form-control" placeholder="User's current number"
                               pattern="[0-9]{9}" title="insert number phone valid!!" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group row" style="padding: 1em 3em">
                    <div class="col-lg-6">
                        <input type="submit" value="edit"  name="acao" style="min-height: 10px; font-size: 3vmin"
                                class="btn btn-primary btn-lg btn-block">
                        </input>
                    </div>
                    <div class="col-lg-6">
                        <input type="submit" value="delete" name="acao" style="min-height: 10px; font-size: 3vmin"
                                class="btn btn-danger btn-lg btn-block">
                        </input>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/validations/validate.js"></script>
<?php }} ?>
