<!-- TICKETS -->
          <div class="row">
              <div class="tickets-content hidden">
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
              <div class="col-sm-10 tickets-content reportsTickets" >
                  <table class="table table-responsive pre">
                      <thead>
                      <tr>
                          <th>Ticket</th>
                          <th>Username</th>
                          <th>Sent Date</th>
                          <th>Solved</th>
                      </tr>
                      </thead>
                      <tbody id="reportsTicketsTable">
                      <!--<tr>
                          <td><a href="#info">Report Username</a></td>
                          <td><a href="#profile.html">auctionLover</a></td>
                          <td>27/02/2017</td>
                          <td>
                              <button type="submit" class="btn btn-success btn-sm">
                                  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                              </button>
                          </td>
                      </tr>
                      <tr>
                          <td><a href="#info">Report Auction</a></td>
                          <td><a href="#profile.html">liza</a></td>
                          <td>05/03/2017</td>
                          <td>
                              <button type="submit" class="btn btn-success btn-sm">
                                  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                              </button>
                          </td>
                      </tr><!-->
                      </tbody>
                  </table>
              </div>
              <!-- Products -->
              <div class="col-sm-10 tickets-content productsTickets hidden" >
                  <table class="table table-responsive pre">
                      <thead>
                      <tr>
                          <th>Ticket</th>
                          <th>Username</th>
                          <th>Sent Date</th>
                          <th>Solved</th>
                      </tr>
                      </thead>
                      <tbody id="productsTicketsTable">
                     <!-- <tr>
                          <td><a href="#info">Bug found</a></td>
                          <td><a href="#profile.html">Xman99</a></td>
                          <td>03/03/2017</td>
                      </tr><!-->
                      </tbody>
                  </table>
              </div>
              <!-- Others-->
                  <div class="col-sm-10 tickets-content othersTickets hidden" >
                      <table class="table table-responsive pre">
                          <thead>
                          <tr>
                              <th>Ticket</th>
                              <th>Username</th>
                              <th>Sent Date</th>
                              <th>Solved</th>
                          </tr>
                          </thead>
                          <tbody id="othersTicketsTable">
                          <!-- <tr>
                               <td><a href="#info">Bug found</a></td>
                               <td><a href="#profile.html">Xman99</a></td>
                               <td>03/03/2017</td>
                           </tr><!-->
                          </tbody>
                      </table>
                  </div>
                  <!--Questions -->
                  <div class="col-sm-10 tickets-content questionsTickets hidden" >
                      <table class="table table-responsive pre">
                          <thead>
                          <tr>
                              <th>Ticket</th>
                              <th>Username</th>
                              <th>Sent Date</th>
                              <th>Solved</th>
                          </tr>
                          </thead>
                          <tbody id="questionsTicketsTable">
                          <!-- <tr>
                               <td><a href="#info">Bug found</a></td>
                               <td><a href="#profile.html">Xman99</a></td>
                               <td>03/03/2017</td>
                           </tr><!-->
                          </tbody>
                      </table>
                  </div>

          <!-- Solved -->
          <div class="col-sm-10 tickets-content solvedTickets hidden">
              <table class="table table-responsive pre">
                  <thead>
                  <tr>
                      <th>Ticket</th>
                      <th>Username</th>
                      <th>Sent Date</th>
                      <th>Resolved Date</th>
                  </tr>
                  </thead>
                  <tbody id="solvedTicketsTable">
                 <!-- <tr>
                      <td><a href="#info">My product is broken</a></td>
                      <td><a href="#profile.html">mike</a></td>
                      <td>14/02/2017</td>
                      <td>21/02/2017</td>
                  </tr>
                  <tr>
                      <td><a href="#info">Report Username</a></td>
                      <td><a href="#profile.html">sisi</a></td>
                      <td>5/02/2017</td>
                      <td>9/02/2017</td>
                  </tr>
                  <tr>
                      <td><a href="#info">Stupid Question</a></td>
                      <td><a href="#profile.html">auctionLover</a></td>
                      <td>31/01/2017</td>
                      <td>2/02/2017</td>
                  </tr><!-->
                  </tbody>
              </table>
          </div>

                  <!-- ALL -->
                  <div class="col-sm-10 tickets-content allTickets hidden" >
                      <table class="table table-responsive pre">
                          <thead>
                          <tr>
                              <th>Ticket</th>
                              <th>Username</th>
                              <th>Sent Date</th>
                          </tr>
                          </thead>
                          <tbody id="allTicketsTable">
                          <!-- <tr>
                               <td><a href="#info">Bug found</a></td>
                               <td><a href="#profile.html">Xman99</a></td>
                               <td>03/03/2017</td>
                           </tr><!-->
                          </tbody>
                      </table>
                  </div>
          <!-- My ticket -->
             <!-- <div class="col-sm-10" style="top: -17px">
                  <ul class="pager">
                      <li class="previous">
                          <a href="#"><span aria-hidden="true">&larr;</span> Previous</a>
                      </li>
                      <li class="next">
                          <a href="#">Next <span aria-hidden="true">&rarr;</span></a>
                      </li>
                  </ul>
                  <h3 class="sub-header text-center">Bug found</h3>
                  <div class="panel panel-default" style="min-height: 530px">
                      <div class="panel-heading" style="min-height: 80px">
                          <strong>Xman99</strong> Hi! Today I was navigating by your site and I found out that my "FAQ" section was not available!! I'm writing to you because I don't know if your section has some problem our just don't exist...
                          Thanks by your time.
                      </div>
                      <div class="panel-body pre-scrollable" style="height: 330px">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <strong>Admin</strong>
                              </div>
                              <div class="panel-body">
                                  Hi! Thanks by your time. It was our fault, the problem will be solved soon.
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <strong>Xman99</strong>
                              </div>
                              <div class="panel-body">
                                  ok :)
                              </div>
                          </div>
                      </div>
                      <div class="panel-footer" style="min-height: 120px">
                          <form>
                              <textarea class="col-sm-12" rows="3" placeholder="New answer"></textarea>
                              <button style="margin-top:5px" type="submit" class="btn btn-success pull-right">
                              <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                          </button>
                              <label style="margin: 5px;" class="btn btn-success btn-file pull-right">
                              <span   class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                              <input type="file" style="display: none;">
                          </label>
                          </form>
                      </div>
                  </div>
              </div><!-->
          </div>
          </div>
          <!-- fim da row dos tickets -->