{include file='common/header.tpl'}
{include file='common/navbar.tpl'}

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">


            <!-- reportComment -->
            {if $msg != "" }
                <form class="form-horizontal my-style" method="POST"
                      action="{$BASE_URL}actions/tickets/reportComment.php">

                    <div class="row inline">
                        <div class="col-md-3 col-md-offset-5">
                            <h2 class="text-center mytext" style="margin: 0px">Ticket</h2>
                        </div>
                        <button type="button" class="btn btn-link btn-xs pull-left" data-toggle="tooltip"
                                title="Fill the following form if you have any problem or question">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </button>
                    </div>
                    <input name="iduser" type="hidden" value="{$idUser}">
                    <input name="idcomment" type="hidden" value="{$idComment}">
                    <input name="idauction" type="hidden" value="{$idAuction}"> 

                    <div class="form-group">
                        <label for="Title">Title
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button>
                        </label>
                        <textarea name="title" class="form-control" rows="1"
                                  placeholder="{$msg}" readonly></textarea>

                    </div>

                    <div class="form-group">
                        <label for="category">Category
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button></label><label>
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Choose ticket category according to your problem.'Report' for site problems,
                                    'Product' for auction payment and delivery problems, 'Questions' for more info.
                                    If none of the default categories fit your problem, choose the 'Other' option.">
                                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            </button>
                        </label>
                        <select id="category" class="form-control form-control-lg">
                            <option>Report</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Message
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button>
                        </label>
                        <textarea title="ticket message" required="required" name="message" class="form-control"
                                  rows="5" id="comment"
                                  placeholder="Write your ticket..."></textarea>

                    </div>

                    <div class="form-group" style="padding: 1em 3em">
                        <button type="submit" style="min-height: 10px; font-size: 3vmin"
                                class="btn btn-primary btn-lg btn-block login-button">
                            Send
                        </button>
                    </div>
                </form>
            {else}
                <!-- report -->
                <form class="form-horizontal" style="padding: 0% 25%" method="POST"
                      action="{$BASE_URL}actions/tickets/createTicket.php">


                    <div class="row inline">
                        <div class="col-md-3 col-md-offset-5">
                            <h2 class="text-center mytext" style="margin: 0px">Ticket</h2>
                        </div>
                        <button type="button" class="btn btn-link btn-xs pull-left" data-toggle="tooltip"
                                title="Fill the following form if you have any problem or question">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </button>
                    </div>


                    <div class="form-group">
                        <label for="Title">Title
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button>
                        </label>
                        <textarea title="title" name="title" class="form-control" rows="1"
                                  required="required" placeholder="Title of ticket"></textarea>


                    </div>

                    <div class="form-group">
                        <label for="category">Category
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button></label><label>
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Choose ticket category according to your problem.'Report' for site problems,
                                    'Product' for auction payment and delivery problems, 'Questions' for more info.
                                    If none of the default categories fit your problem, choose the 'Other' option.">
                                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            </button>
                        </label>
                        <select name="category" id="category" class="form-control form-control-lg">
                            <option>Report</option>
                            <option>Product</option>
                            <option>Questions</option>
                            <option>Others</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">
                            Message
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button>
                        </label>
                        <textarea required="required" name="message" class="form-control" rows="5" id="comment"
                                  placeholder="Write your ticket..."></textarea>

                    </div>

                    <div class="form-group" style="padding: 1em 3em">
                        <button type="submit" style="min-height:20px;"
                                class="btn btn-primary btn-lg btn-block login-button">
                            Send
                        </button>
                    </div>
                </form>
            {/if}
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
{include file='common/footer.tpl'}
