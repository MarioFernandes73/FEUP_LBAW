<!-- 1 : Profile -->
<div class="row">
    <div class="profile-content">
        <div class="col-sm-2 sidebar ">
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
                <table class="table responsive">
                    <thead>
                    <tr>
                        <td class="col-sm-2"><span class="glyphicon glyphicon-user" aria-hidden="true"/> Username</td>
                        <td>{$username}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-2"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"/> Name</td>
                        <td>{$name}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"/> UserAge</td>
                        <td>{$age} years</td>
                    </tr>
                    <tr>
                        <td class="col-sm-2"><span class="glyphicon glyphicon-envelope" aria-hidden="true"/> Address</td>
                        <td>{$address}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-2"><span class="glyphicon glyphicon-earphone" aria-hidden="true"/> Phone</td>
                        <td>{$phone}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-2"><span class="glyphicon glyphicon-star" aria-hidden="true"/> Rating</td>
                        <td><input title="rate" id="rate" value="{$rating}" class="rating-loading" data-size="xs"
                                   data-disabled="true"></td>
                    </tr>
                    </tbody>
                </table>
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
                    <form name="editaccount" class="form-horizontal my-style" method="post"
                          action="../../actions/users/editaccount.php">
                        <!-- attributes -->
                        <div class="form-group">
                            <label class="cols-sm-2 control-label">Name</label>
                            <div class="input-group" id="name">
                            <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                            </span>
                                <input title="new name" name="name" type="text" class="form-control" placeholder="User's current name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="cols-sm-2 control-label">Address</label>
                            <div class="input-group" id="email">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </span>
                                <input title="new email" name="address" type="email" class="form-control"
                                       placeholder="User's current email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="cols-sm-2 control-label">Password</label>
                            <div class="input-group" id="pass">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                                <input title="new password" name="password" type="password" class="form-control"
                                       placeholder="User's current password"
                                       pattern=".{literal}{5,}{/literal}"
                                       title="Password must be at least 5 characters long!">
                            </div>
                        </div>

                        <div id="form-group-ConfirmPassword" class="form-group">
                            <label class="cols-sm-2 control-label">Confirm Password</label>
                            <div class="input-group" id="pass1">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                                <input title="new password confirmation" name="confirmPassword" type="password" class="form-control"
                                       placeholder="User's current Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="cols-sm-2 control-label">Phone Number</label>
                            <div class="input-group" id="number">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-earphone"></span>
                            </span>
                                <input title="new phone number" name="phone" type="tel" class="form-control" placeholder="User's current number"
                                       pattern="[0-9]{literal}{9}{/literal}" title="insert number phone valid!!">
                            </div>
                        </div>
                        <input title="user id" name="iduser" type="hidden" value="{$IDUSER}">
                        <div class="form-group" style="padding: 1em 3em">
                            <button name="edit" type="submit" style="min-height: 20px;"
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
                <div class="form-group">
                    {if $owner == true}
                        <form name="deleteAccount" class="form-horizontal my-style" method="post"
                              action="../../actions/users/deleteaccount.php">

                            <div id="form-group-ConfirmPassword2" class="form-group">
                                <label class="cols-sm-2 control-label">Confirm Password</label>
                                <div class="input-group" id="pass2">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                                    <input title="password confirmation" name="confirmPassword" type="password" class="form-control"
                                           placeholder="User's current Password">
                                </div>
                            </div>

                            <button name="deleteAcount" type="submit" style="min-height: 20px;"
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

