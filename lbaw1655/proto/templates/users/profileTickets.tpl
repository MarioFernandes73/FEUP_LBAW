<!-- 3 : Tickets -->
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
</div> <!-- termina a row 3 -->