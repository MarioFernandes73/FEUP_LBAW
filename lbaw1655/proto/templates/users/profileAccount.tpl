<!-- 1 : Profile -->
<div class="row">
    <div class="profile-content">
        <div class="col-sm-2 sidebar">
            <ul id="myProfile-navigation" class="nav nav-sidebar">
                <li class="active myAccount"><a>My Account</a></li>
                <li class="statistics"><a>Statistics</a></li>
                <li class="editAccount"><a>Edit Account</a></li>
                <li class="deleteAccount"><a>Delete Account</a></li>
            </ul>
        </div>
        <!-- MY ACCOUNT -->
        <div class="profile-content myAccount">
            <div class="col-sm-10">
                {if $view==true}
                <table class="table responsive">
                    <thead>
                    <tr>
                        <td class="col-sm-2"><span class="glyphicon glyphicon-user" aria-hidden="true"/> Username</td>
                        <td>{$username}</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-briefcase" aria-hidden="true"/> Name</td>
                        <td>{$name}</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-calendar" aria-hidden="true"/> Age</td>
                        <td>{$age} years</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-envelope" aria-hidden="true"/> Address</td>
                        <td>{$address}</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-earphone" aria-hidden="true"/> Phone</td>
                        <td>{$phone}</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-star" aria-hidden="true"/> Rating</td>
                        <td><input id="rate" value="{$currentAuctionOwner.rating}" class="rating-loading" data-size="xs"
                                   data-disabled="true"></td>
                    </tr>
                    </tbody>
                </table>
                {/if}

            </div>
        </div>
        <!-- STATISTICS -->
        <div class="profile-content statistics hidden">
            <div class="col-sm-10">
            </div>
        </div>
        <!-- EDIT ACCOUNT -->
        <div class="profile-content hidden editAccount">
            <div class="col-sm-10">
                {if $owner == true}
                    <form name="editaccount" class="form-horizontal" style="padding: 2% 25%" method="post"
                          action="../../actions/users/editaccount.php">
                        <!-- attributes -->
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Name</label>
                            <div class="input-group" id="name">
                            <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                            </span>
                                <input name="name" type="text" class="form-control" placeholder="User's current name"
                                       aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Address</label>
                            <div class="input-group" id="email">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </span>
                                <input name="address" type="email" class="form-control"
                                       placeholder="User's current email"
                                       aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pass" class="cols-sm-2 control-label">Password</label>
                            <div class="input-group" id="pass">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                                <input name="password" type="password" class="form-control"
                                       placeholder="User's current password"
                                       pattern=".{literal}{5,}{/literal}"
                                       title="Password must be at least 5 characters long!"
                                       aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div id="form-group-ConfirmPassword" class="form-group">
                            <label for="pass2" class="cols-sm-2 control-label">Confirm Password</label>
                            <div class="input-group" id="pass2">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                                <input name="confirmPassword" type="password" class="form-control"
                                       placeholder="User's current Password"
                                       aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="number" class="cols-sm-2 control-label">Phone Number</label>
                            <div class="input-group" id="number">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-earphone"></span>
                            </span>
                                <input name="phone" type="tel" class="form-control" placeholder="User's current number"
                                       pattern="[0-9]{literal}{9}{/literal}" title="insert number phone valid!!"
                                       aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="form-group" style="padding: 1em 3em">
                            <button name="edit" type="submit" style="min-height: 10px; font-size: 2vmin"
                                    class="btn btn-primary btn-md btn-block">
                                Edit
                            </button>
                        </div>
                    </form>
                {/if}
            </div>
        </div>
        <!-- DeleteAccount -->
        <div class="profile-content hidden deleteAccount">

            <div class="col-sm-10">
                <div class="form-group" style="padding: 1em 3em">
                    {if $owner == true}
                        <form name="deleteAccount" class="form-horizontal" style="padding: 2% 25%" method="post"
                              action="../../actions/users/deleteaccount.php">

                            <div id="form-group-ConfirmPassword" class="form-group">
                                <label for="pass2" class="cols-sm-2 control-label">Confirm Password</label>
                                <div class="input-group" id="pass2">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                                    <input name="confirmPassword" type="password" class="form-control"
                                           placeholder="User's current Password"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <button name="deleteAcount" type="submit" style="min-height: 10px; font-size: 2vmin"
                                    class="btn btn-danger btn-md btn-block">
                                Delete Account
                            </button>
                        </form>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div><!-- termina a row 1 -->
<script src="{$BASE_URL}javascript/validate.js"></script>

