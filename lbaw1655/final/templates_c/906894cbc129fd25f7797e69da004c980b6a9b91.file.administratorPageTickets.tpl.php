<?php /* Smarty version Smarty-3.1.15, created on 2017-05-27 21:21:57
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/administrator/administratorPageTickets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:924505719590c37a65bfe61-77032051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '906894cbc129fd25f7797e69da004c980b6a9b91' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/administrator/administratorPageTickets.tpl',
      1 => 1495916488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '924505719590c37a65bfe61-77032051',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_590c37a65cade4_59927985',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590c37a65cade4_59927985')) {function content_590c37a65cade4_59927985($_smarty_tpl) {?><!-- TICKETS -->
          <div class="row">
              <div id="ticket-container" class="tickets-content hidden">
              <div class="col-sm-2 sidebar">
                  <ul id="tickets-navigation" class="nav nav-sidebar">
                      <li class="active reportsTickets"><a>Reports <span id="reportsTicketsBadge" class="badge"></span></a></li>
                      <li class="productsTickets"><a>Product <span id="productsTicketsBadge" class="badge"></span></a></li>
                      <li class="othersTickets"><a>Others <span id="othersTicketsBadge" class="badge"></span></a></li>
                      <li class="questionsTickets"><a>Questions <span id="questionsTicketsBadge" class="badge"></span></a></li>
                      <li class="solvedTickets"><a>Solved <span id="solvedTicketsBadge" class="badge"></span></a></li>
                      <li class="allTickets"><a>All <span id="allTicketsBadge" class="badge"></span></a></li>
                  </ul>
              </div>
              <!-- Reports -->
              <div class="col-sm-10 tickets-content reportsTickets tickets-list" >
                  <table class="table table-responsive pre">
                      <thead>
                      <tr>
                          <th>Ticket</th>
                          <th>Username</th>
                          <th>Solved</th>
                      </tr>
                      </thead>
                      <tbody id="reportsTicketsTable">

                      </tbody>
                  </table>
                  <nav aria-label="...">
                      <ul class="pager">
                          <li class="previous"><a onclick="previous(8)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                          <li class="next"><a onclick="next(8)">Next <span aria-hidden="true">&rarr;</span></a></li>
                      </ul>
                  </nav>
              </div>
              <!-- Products -->
              <div class="col-sm-10 tickets-content productsTickets hidden tickets-list" >
                  <table class="table table-responsive pre">
                      <thead>
                      <tr>
                          <th>Ticket</th>
                          <th>Username</th>
                          <th>Solved</th>
                      </tr>
                      </thead>
                      <tbody id="productsTicketsTable">

                      </tbody>
                  </table>
                  <nav aria-label="...">
                      <ul class="pager">
                          <li class="previous"><a onclick="previous(9)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                          <li class="next"><a onclick="next(9)">Next <span aria-hidden="true">&rarr;</span></a></li>
                      </ul>
                  </nav>
              </div>
              <!-- Others-->
                  <div class="col-sm-10 tickets-content othersTickets hidden tickets-list" >
                      <table class="table table-responsive pre">
                          <thead>
                          <tr>
                              <th>Ticket</th>
                              <th>Username</th>
                              <th>Solved</th>
                          </tr>
                          </thead>
                          <tbody id="othersTicketsTable">

                          </tbody>
                      </table>
                      <nav aria-label="...">
                          <ul class="pager">
                              <li class="previous"><a onclick="previous(10)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                              <li class="next"><a onclick="next(10)">Next <span aria-hidden="true">&rarr;</span></a></li>
                          </ul>
                      </nav>
                  </div>
                  <!--Questions -->
                  <div class="col-sm-10 tickets-content questionsTickets hidden tickets-list" >
                      <table class="table table-responsive pre">
                          <thead>
                          <tr>
                              <th>Ticket</th>
                              <th>Username</th>
                              <th>Solved</th>
                          </tr>
                          </thead>
                          <tbody id="questionsTicketsTable">

                          </tbody>
                      </table>
                      <nav aria-label="...">
                          <ul class="pager">
                              <li class="previous"><a onclick="previous(11)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                              <li class="next"><a onclick="next(11)">Next <span aria-hidden="true">&rarr;</span></a></li>
                          </ul>
                      </nav>
                  </div>

          <!-- Solved -->
          <div class="col-sm-10 tickets-content solvedTickets hidden tickets-list">
              <table class="table table-responsive pre">
                  <thead>
                  <tr>
                      <th>Ticket</th>
                      <th>Username</th>
                      <th>Resolved Date</th>
                  </tr>
                  </thead>
                  <tbody id="solvedTicketsTable">

                  </tbody>
              </table>
              <nav aria-label="...">
                  <ul class="pager">
                      <li class="previous"><a onclick="previous(12)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                      <li class="next"><a onclick="next(12)">Next <span aria-hidden="true">&rarr;</span></a></li>
                  </ul>
              </nav>
          </div>

                  <!-- ALL -->
                  <div class="col-sm-10 tickets-content allTickets hidden tickets-list" >
                      <table class="table table-responsive pre">
                          <thead>
                          <tr>
                              <th>Ticket</th>
                              <th>Username</th>
                          </tr>
                          </thead>
                          <tbody id="allTicketsTable">

                          </tbody>
                      </table>
                      <nav aria-label="...">
                          <ul class="pager">
                              <li class="previous"><a onclick="previous(13)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                              <li class="next"><a onclick="next(13)">Next <span aria-hidden="true">&rarr;</span></a></li>
                          </ul>
                      </nav>
                  </div>
          </div>
          </div>
          <!-- fim da row dos tickets --><?php }} ?>
