<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 19:43:47
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/users/profileTickets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1159548540592c6be38fdeb3-19982703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a7d399947012262ebb0d10882275489a7d06a68' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/users/profileTickets.tpl',
      1 => 1495896275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1159548540592c6be38fdeb3-19982703',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c6be3904ad0_55436244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c6be3904ad0_55436244')) {function content_592c6be3904ad0_55436244($_smarty_tpl) {?><!-- 3 : Tickets -->
<div class="row">
    <div id="ticket-container" class="tickets-content hidden">
        <div class="col-sm-2 sidebar">
            <ul id="myTickets-navigation" class="nav nav-sidebar">
                <li class="active activeTickets"><a>Active <span id="activeTicketsBadge" class="badge"></span></a></li>
                <li class="solvedTickets"><a>Solved <span id="solvedTicketsBadge" class="badge"></span></a></li>
                <li class="allTickets"><a>All <span id="allTicketsBadge" class="badge"></span></a></li>
            </ul>
        </div>
        <!-- ACTIVE -->
        <div class="tickets-content activeTickets tickets-list">
            <div class="col-sm-10">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Identification</th>
                            <th>My ticket is solved</th>
                        </tr>
                        </thead>
                        <tbody id="activeTicketsTable">
                            <!-- active tickets table -->
                        </tbody>
                    </table>
                    <nav aria-label="...">
                        <ul class="pager">
                            <li class="previous"><a onclick="previous(3)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                            <li class="next"><a onclick="next(3)">Next <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- SOLVED -->
        <div class="tickets-content solvedTickets tickets-list hidden">
            <div class="col-sm-10">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Identification</th>
                        </tr>
                        </thead>
                        <tbody id="solvedTicketsTable">
                            <!-- solved tickets table -->
                        </tbody>
                    </table>
                    <nav aria-label="...">
                        <ul class="pager">
                            <li class="previous"><a onclick="previous(4)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                            <li class="next"><a onclick="next(4)">Next <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- ALL -->
        <div class="tickets-content allTickets tickets-list hidden">
            <div class="col-sm-10">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Identification</th>
                        </tr>
                        </thead>
                        <tbody id="allTicketsTable">
                            <!-- all tickets table -->
                        </tbody>
                    </table>
                    <nav aria-label="...">
                        <ul class="pager">
                            <li class="previous"><a onclick="previous(5)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                            <li class="next"><a onclick="next(5)">Next <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div> <!-- termina a row 3 --><?php }} ?>
