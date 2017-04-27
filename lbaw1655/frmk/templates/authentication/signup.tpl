{include file='common/header.tpl'}
{include file='common/navbar.tpl'}
<!-- REGISTER -->
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">

            <!-- Title -->
            <h2 align="center">Sign Up</h2>

<<<<<<< HEAD
            <form name="signup" class="form-horizontal" style="padding: 0% 25%"
                  action="../../actions/authentication/signup.php"  method="post">
=======
            <form  name="signup" class="form-horizontal" style="padding: 0% 25%"  action="../../actions/authentication/signup.php" onsubmit="return validatePassword()" method="post">
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
                <!-- attributes -->
                <div id="form-group-Username" class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="input-group" id="username">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
<<<<<<< HEAD
                        <input name="username" type="text" class="form-control"
                               placeholder="Enter your account username" aria-describedby="basic-addon1">
                    </div>
=======
                            <input name="username" type="text" class="form-control" placeholder="Enter your account username" aria-describedby="basic-addon1">
                    </div>

>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
                </div>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Name</label>
                    <div class="input-group" id="name">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                                </span>
<<<<<<< HEAD
                        <input name="name" type="text" class="form-control" placeholder="Enter your name"
                               required="required" aria-describedby="basic-addon1">
=======
                        <input name="name" type="text" class="form-control" placeholder="Enter your name" required="required" aria-describedby="basic-addon1">
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
                    </div>
                </div>

                <div class="form-group">
                    <label for="date" class="cols-sm-2 control-label">Birth date</label>
                    <div class="input-group date" id="date" data-provide="datepicker">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <input name="birthDate" type="date" class="form-control" required="required">
                    </div>
                </div>

                <div id="form-group-Address" class="form-group">
                    <label for="address" class="cols-sm-2 control-label">Address</label>
                    <div class="input-group" id="address">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-envelope"></span></span>
<<<<<<< HEAD
                        <input name="address" type="email" class="form-control" placeholder="Enter your email"
                               required="required" aria-describedby="basic-addon1">
=======
                        <input name="address" type="email" class="form-control" placeholder="Enter your email"  required="required" aria-describedby="basic-addon1"> 
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="cols-sm-2 control-label">Password</label>
                    <div class="input-group" id="pass2">
                                <span class="input-group-addon"><span
                                            class=" glyphicon glyphicon-lock"></span></span>
<<<<<<< HEAD
                        <input name="password" type="password" class="form-control" pattern=".{literal}{5,}{/literal}"
                               title="Password must be at least 5 characters long!"
                               placeholder="Enter a secure password" required="required"
                               aria-describedby="basic-addon1">
                    </div>
                </div>

                <div id="form-group-ConfirmPassword" class="form-group">
=======
                        <input name="password" type="password" class="form-control" pattern=".{literal}{5,}{/literal}" title="Password must be at least 5 characters long!" placeholder="Enter a secure password" required="required" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
                    <label for="pass2" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="input-group" id="pass2">
                                <span class="input-group-addon"><span
                                            class=" glyphicon glyphicon-lock"></span></span>
<<<<<<< HEAD
                        <input name="confirmPassword" type="password" class="form-control" placeholder="Confirm Password"
                               required="required" aria-describedby="basic-addon1">
=======
                        <input name="confirPassword" type="password" class="form-control" placeholder="Confirm Password" required="required" aria-describedby="basic-addon1">
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="cols-sm-2 control-label">Phone Number</label>
<<<<<<< HEAD
                    <div class="input-group" >
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-earphone"></span></span>
                        <input name="phoneNumber" type="tel" class="form-control" pattern="[0-9]{literal}{9}{/literal}"
                               placeholder="Enter your phone number" title="insert number phone valid!!"
                               required="required" aria-describedby="basic-addon1">
=======
                    <div class="input-group" id="number">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-earphone"></span></span>
                        <input name="phoneNumber" type="tel" class="form-control" pattern="[0-9]{literal}{9}{/literal}" placeholder="Enter your phone number" title="insert number phone valid!!" required="required" aria-describedby="basic-addon1">
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
                    </div>
                </div>

                <div class="checkbox">
                    <label><input name="signupTerms" required type="checkbox">I accept the terms and conditions.</label>
                </div>

                <div class="form-group" style="padding: 1em 3em">
<<<<<<< HEAD
                    <button name="submit" type="submit" style="min-height: 10px; font-size: 3vmin"
                            class="btn btn-primary btn-lg btn-block login-button">
=======
                    <button name="submit" type="submit" style="min-height: 10px; font-size: 3vmin" class="btn btn-primary btn-lg btn-block login-button">
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
                        Register
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

<<<<<<< HEAD
<script src="{$BASE_URL}javascript/validations/validate.js"></script>

=======
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
{include file='common/footer.tpl'}