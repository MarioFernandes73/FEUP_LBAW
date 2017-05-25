<?php /* Smarty version Smarty-3.1.15, created on 2017-05-18 10:51:14
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/users/profileAccount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8322472785901beab28d604-15119152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc178538021cb15f90d7c5dbf9e214c13d05a0e0' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/users/profileAccount.tpl',
      1 => 1495101071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8322472785901beab28d604-15119152',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5901beab295256_55657327',
  'variables' => 
  array (
    'username' => 0,
    'name' => 0,
    'age' => 0,
    'address' => 0,
    'phone' => 0,
    'currentAuctionOwner' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901beab295256_55657327')) {function content_5901beab295256_55657327($_smarty_tpl) {?><!-- 1 : Profile -->
<div class="row">
    <div class="profile-content">
        <div class="col-sm-2 sidebar">
                <ul  id="myProfile-navigation" class="nav nav-sidebar">
                    <li class="active myAccount"><a>My Account</a></li>
                    <li class="statistics"><a>Statistics</a></li>
                    <li class="editAccount"><a>Edit Account</a></li>
                    <li><a>Delete Account</a></li>
                </ul>
        </div>
        <!-- MY ACCOUNT -->
        <div class="profile-content myAccount">
            <div class="col-sm-10">
                <table class="table responsive">
                    <thead>
                    <tr>
                        <td class="col-sm-2"><span class="glyphicon glyphicon-user" aria-hidden="true"/> Username</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-briefcase" aria-hidden="true"/> Name</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-calendar" aria-hidden="true"/> Age</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['age']->value;?>
 years</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-envelope" aria-hidden="true"/> Address</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-earphone" aria-hidden="true"/> Phone</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-star" aria-hidden="true"/> Rating</td>
                        <td> <input id="rate" value="<?php echo $_smarty_tpl->tpl_vars['currentAuctionOwner']->value['rating'];?>
" class="rating-loading" data-size="xs" data-disabled="true"></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <!-- STATISTICS -->
        <div class="profile-content statistics hidden">
            <div class="col-sm-10">
             </div>
        </div>
        <!-- EDIT ACCOUNT -->
        <div class="profile-content hidden editAccount">
            <div class="col-sm-10">
                <form   name="editaccount" class="form-horizontal" style="padding: 2% 25%" method="post" action="../../actions/users/editaccount.php">
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

                    <div class="form-group" style="padding: 1em 3em">
                        <button name="edit" type="submit" style="min-height: 10px; font-size: 2vmin"
                                class="btn btn-primary btn-md btn-block">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- termina a row 1 -->
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/validate.js"></script>

<?php }} ?>
