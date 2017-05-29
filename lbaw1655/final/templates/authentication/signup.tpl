{include file='common/header.tpl'}
{include file='common/navbar.tpl'}

<!-- REGISTER -->
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">

            <!-- Title -->
            <h2 class="text-center">Sign Up</h2>

            <form name="signup" class="form-horizontal my-style"
                  action="../../actions/authentication/signup.php"  method="post">
                <!-- attributes -->
                <div id="form-group-Username" class="form-group">
                    <label class="cols-sm-2 control-label">
                        Username
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" id="username">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                        <input name="username" title="username" type="text" class="form-control"
                               placeholder="Enter your account username" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="cols-sm-2 control-label">Name
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" id="name">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                                </span>
                        <input name="name" title="name" type="text" class="form-control" placeholder="Enter your name"
                               required="required">
                    </div>
                </div>

                <div id="form-group-Birthdate" class="form-group">
                    <label class="cols-sm-2 control-label">Birth date
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group date" id="date" data-provide="datepicker">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <input name="birthDate" title="birthdate" type="date" class="form-control" required="required">
                    </div>
                </div>

                <div id="form-group-Address" class="form-group">
                    <label class="cols-sm-2 control-label">Address
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" id="address">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-envelope"></span></span>
                        <input name="address" title="email" type="email" class="form-control" placeholder="Enter your email"
                               required="required" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="cols-sm-2 control-label">Password
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" id="pass1">
                                <span class="input-group-addon"><span
                                            class=" glyphicon glyphicon-lock"></span></span>
                        <input name="password" type="password" class="form-control" pattern=".{literal}{5,}{/literal}"
                               title="Password must be at least 5 characters long!"
                               placeholder="Enter a secure password" required="required"
                               >
                    </div>
                </div>

                <div id="form-group-ConfirmPassword" class="form-group">
                    <label class="cols-sm-2 control-label">Confirm Password
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" id="pass2">
                                <span class="input-group-addon"><span
                                            class=" glyphicon glyphicon-lock"></span></span>
                        <input name="confirmPassword" title="confirm password" type="password" class="form-control" placeholder="Confirm Password"
                               required="required" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="cols-sm-2 control-label">Phone Number
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                    <div class="input-group" >
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-earphone"></span></span>
                        <input name="phoneNumber" type="tel" class="form-control" pattern="[0-9]{literal}{9}{/literal}"
                               placeholder="Enter your phone number" title="Phone number must be valid!"
                               required="required" >
                    </div>
                </div>

                <div class="checkbox">
                    <label><input name="signupTerms" title="accept terms" required type="checkbox">I accept the terms and conditions.
                        <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                title="Required field">*</button>
                    </label>
                </div>

                <div class="form-group" style="padding: 1em 0em">
                    <button name="submit" type="submit" style="min-height: 20px"
                            class="btn btn-primary btn-lg btn-block login-button">
                        Register
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

<script src="{$BASE_URL}javascript/validate.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

{include file='common/footer.tpl'}