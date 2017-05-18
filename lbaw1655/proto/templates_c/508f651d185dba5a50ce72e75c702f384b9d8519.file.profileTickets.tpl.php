<?php /* Smarty version Smarty-3.1.15, created on 2017-05-01 16:12:36
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/users/profileTickets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12703407485901beab2a5550-02965703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '508f651d185dba5a50ce72e75c702f384b9d8519' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/users/profileTickets.tpl',
      1 => 1493651546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12703407485901beab2a5550-02965703',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5901beab2acb08_51178975',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901beab2acb08_51178975')) {function content_5901beab2acb08_51178975($_smarty_tpl) {?><!-- 3 : Tickets -->
<div class="row">
    <div class="tickets-content hidden">
        <div class="col-sm-2 sidebar">
            <ul id="myTickets-navigation" class="nav nav-sidebar">
                <li class="active activeTickets"><a>Active <span id="activeTicketsBadge" class="badge"></span></a></li>
                <li class="solvedTickets"><a>Solved <span id="solvedTicketsBadge" class="badge"></span></a></li>
                <li class="allTickets"><a>All <span id="allTicketsBadge" class="badge"></span></a></li>
            </ul>
        </div>
        <!-- ACTIVE -->
        <div class="tickets-content activeTickets">
            <div class="col-sm-10">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Identification</th>
                            <th>My ticket is solved</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="activeTicketsTable">
                            <!-- active tickets table -->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- SOLVED -->
        <div class="tickets-content solvedTickets hidden">
            <div class="col-sm-10">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Identification</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="solvedTicketsTable">
                            <!-- solved tickets table -->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ALL -->
        <div class="tickets-content allTickets hidden">
            <div class="col-sm-10">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Identification</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="allTicketsTable">
                            <!-- all tickets table -->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> <!-- termina a row 3 --><?php }} ?>
