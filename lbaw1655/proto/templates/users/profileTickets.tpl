<!-- 3 : Tickets -->
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
</div> <!-- termina a row 3 -->