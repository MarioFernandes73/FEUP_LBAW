{include file='common/header.tpl'}
{include file='common/navbar.tpl'}
<script src="{$BASE_URL}javascript/timeleft.js"></script>
<script>
    $(document).on('ready', function() {
        $('#rate').rating({
            displayOnly: true,
            step: 0.5
        });
    });
</script>
<script src="{$BASE_URL}javascript/tabsNavigation/commonNavigation.js"></script>
<script src="{$BASE_URL}javascript/tabsNavigation/profileNavigation.js"></script>
<span id="iduser" class="hidden">{$iduser}</span>
    <!-- MAIN INTERACTION -->
    <div class="jumbotron">
        <!-- navs -->
        <div class="panel panel-primary" style="min-height: 600px">
            <div class="panel">
                <ul id="profile-navigation" class="nav nav-pills nav-justified" role="tablist">
                    <li id="profile-tab" class="active" role="presentation"><a>My Profile</a></li>
                    <li id="auctions-tab" role="presentation"><a>Auctions</a></li>
                    <li id="tickets-tab" role="presentation"><a>Tickets</a></li>
                </ul>
            </div>
            {include file='users/profileAccount.tpl'}
            {include file='users/profileAuctions.tpl'}
            {include file='users/profileTickets.tpl'}
        </div>
    </div>
{include file='common/footer.tpl'}