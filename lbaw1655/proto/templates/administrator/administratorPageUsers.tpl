<!-- USERS -->
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
</div> <!-- fim da row do user -->