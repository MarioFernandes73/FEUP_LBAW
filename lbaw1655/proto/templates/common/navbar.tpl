<div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <!-- Home Button -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{$BASE_URL}pages/authentication/homepage.php">Home</a>
            </div>

            <!-- Categories -->
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Categories<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            {foreach $categories as $category}
                                <li><a href="{$BASE_URL}pages/auctions/searchResults.php?category={$category["unnest"]}">
                                        {$category["unnest"]}</a>
                                </li>
                            {/foreach}
                        </ul>
                    </li>
                    {if $USERNAME}
                        <li><a href="{$BASE_URL}pages/auctions/createAuction.php">Create Auction</a></li>
                    {/if}
                    <li><a href="#">FAQ</a></li>
                    {if $USERNAME}
                        <li><a href="{$BASE_URL}pages/tickets/tickets.php">Tickets</a></li>
                    {/if}
                    <li><a href="#">Contact</a></li>
                </ul>

                <!-- Search -->
                <form class="navbar-form navbar-left"
                      method="GET" action="{$BASE_URL}pages/auctions/searchResults.php">
                    <div class="form-group">
                        <input name="fullTextSearch" type="text" class="form-control" placeholder="Search">
                        <button type="submit" class="btn btn-default">Search</button>
                    </div>
                    <a href="{$BASE_URL}pages/auctions/advancedSearch.php" class="btn btn-default">Advanced Search</a>
                </form>

                <!-- Account -->
                {if $USERNAME}
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{$BASE_URL}pages/users/profile.php?iduser={$IDUSER}">Profile</a></li>
                                {if ($STATE == "Administrator")}
                                    <li><a href="{$BASE_URL}pages/administrator/administratorPage.php">Administration
                                            Options</a></li>
                                {/if}
                                <li role="separator" class="divider"></li>
                                <li><a href="{$BASE_URL}actions/authentication/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Login e SignUp -->

                {else}
                    <form class="navbar-form navbar-right">
                        <a href="{$BASE_URL}pages/authentication/signup.php" class="btn btn-default">Sign Up</a>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#loginDialog">
                            Login
                        </button>
                    </form>
                {/if}
            </div>
        </div>
    </nav>
    {foreach $ERROR_MESSAGES as $error}
        <div class="panel panel-danger">
            <div class="panel-heading">{$error}</div>
        </div>
    {/foreach}
    {foreach $SUCCESS_MESSAGES as $success}
        <div class="panel panel-success">
            <div class="panel-heading">{$success}</div>
        </div>
    {/foreach}
    {foreach $FIELD_ERRORS as $field_errors}
        <div class="panel panel-danger">
            <div class="panel-heading">{$field_errors}</div>
        </div>
    {/foreach}
    <!-- Login Form -->
    <div class="modal fade" id="loginDialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Body -->
                <div class="modal-body">
                    <form role="form" method="post" action="../../actions/authentication/login.php">
                        <div class="form-group">
                            <input name="user" class="form-control input-lg" placeholder="Username" type="text"
                                   required="required">
                        </div>
                        <div class="form-group">
                            <input name="pass" class="form-control input-lg" placeholder="Password" type="password"
                                   required="required">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
