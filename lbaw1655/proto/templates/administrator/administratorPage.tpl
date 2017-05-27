{include file='common/header.tpl'}
{include file='common/navbar.tpl'}
<span id="sessionid" class="hidden">{$sessionid}</span>
<!-- MAIN INTERACTION -->
<div class="jumbotron">
    <!-- Navs -->
    <div class="panel panel-primary" style="min-height: 600px">
        <div class="panel panel-default">
            <ul id="administrator-navigation" class="nav nav-pills nav-justified" role="tablist">
                <li id="users-tab" role="presentation" class="active"><a>Users</a></li>
                <li id="auctions-tab" role="presentation" ><a>Auctions</a></li>
                <li id="tickets-tab" role="presentation" ><a>Tickets</a></li>
                <li id="statistics-tab" role="presentation" ><a>Statistics</a></li>
            </ul>
        </div>
        {include file='administrator/administratorPageUsers.tpl'}
        {include file='administrator/administratorPageAuctions.tpl'}
        {include file='administrator/administratorPageTickets.tpl'}
        {include file='administrator/administratorPageStatistics.tpl'}
    </div>
    <!-- fim do panel -->
</div>
<!-- fim do jumbotron -->

{include file='common/footer.tpl'}
<script src="{$BASE_URL}javascript/tabsNavigation/commonNavigation.js"></script>
<script src="{$BASE_URL}javascript/tabsNavigation/adminNavigation.js"></script>