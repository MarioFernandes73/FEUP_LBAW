<!-- TICKETS -->
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
          <!-- fim da row dos tickets -->