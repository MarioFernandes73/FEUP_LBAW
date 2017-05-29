<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 19:45:00
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/administrator/administratorPageUsers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1928418455592c6c2cc4aba7-60384372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22278e184c86f16cd5848c395da909f7d32b2333' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/administrator/administratorPageUsers.tpl',
      1 => 1495888541,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1928418455592c6c2cc4aba7-60384372',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c6c2cc50671_20513308',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c6c2cc50671_20513308')) {function content_592c6c2cc50671_20513308($_smarty_tpl) {?><!-- USERS -->
<div class="row">
    <div class="users-content">
        <div class="col-sm-2 sidebar">
            <ul id="users-navigation" class="nav nav-sidebar">
                <li class="active adminUsers"><a>Admins<span id="adminUsersBadge" class="badge"></span></a></li>
                <li class="activeUsers"><a>Active<span id="activeUsersBadge" class="badge"></span></a></li>
                <li class="bannedUsers"><a>Banned<span id="bannedUsersBadge" class="badge"></span></a></li>
            </ul>
        </div>
        <!-- Admins -->
        <div class="col-sm-10 users-content adminUsers">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Demote</th>
                </tr>
                </thead>
                <tbody id="adminUsersTable">
                <!-- Admin Users Table Body -->
                </tbody>
            </table>
            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a onclick="previous(0)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                    <li class="next"><a onclick="next(0)">Next <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </nav>
        </div>
        <!-- Users -->
        <div class="col-sm-10 users-content activeUsers hidden">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Promote</th>
                    <th>Ban</th>
                </tr>
                </thead>
                <tbody id="activeUsersTable">
                <!-- Active Users Table Body-->
                </tbody>
            </table>
            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a onclick="previous(1)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                    <li class="next"><a onclick="next(1)">Next <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </nav>
        </div>
        <!-- Banned Users -->
        <div class="col-sm-10 users-content bannedUsers hidden">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Unban</th>
                </tr>
                </thead>
                <tbody id="bannedUsersTable">
                <!--Banned Users Table Body-->
                </tbody>
            </table>
            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a onclick="previous(2)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                    <li class="next"><a onclick="next(2)">Next <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div> <!-- fim da row do user --><?php }} ?>
