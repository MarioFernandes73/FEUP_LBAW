{include file='common/header.tpl'}
{include file='common/navbar.tpl'}

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">

            <!-- reportComment -->
            {if $msg != "" }
                <form class="form-horizontal" style="padding: 0% 25%" method="POST"
                      action="{$BASE_URL}actions/tickets/reportComment.php">
                    <h2 class="text-center">Ticket</h2>
                    <input name="iduser" type="hidden" value="{$idUser}"> </input>
                    <input name="idcomment" type="hidden" value="{$idComment}"> </input>
                    <input name="idauction" type="hidden" value="{$idAuction}"> </input>

                    <div class="form-group">
                        <label for="Title">Title</label>
                        <textarea name="title" class="form-control" rows="1"
                                  placeholder="{$msg}" readonly></textarea>

                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control form-control-lg">
                            <option>Report</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Message</label>
                        <textarea required="required" name="message" class="form-control" rows="5" id="comment"
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
                    <h2 class="text-center">Ticket</h2>

                    <div class="form-group">
                        <label for="Title">Title</label>
                        <textarea name="title" class="form-control" rows="1"
                                 required="required" placeholder="Title of ticket"></textarea>


                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control form-control-lg">
                            <option>Report</option>
                            <option>Product</option>
                            <option>Questions</option>
                            <option>Others</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Message</label>
                        <textarea required="required" name="message" class="form-control" rows="5" id="comment"
                                  placeholder="Write your ticket..."></textarea>

                    </div>

                    <div class="form-group" style="padding: 1em 3em">
                        <button type="submit" style="min-height: 10px; font-size: 3vmin"
                                class="btn btn-primary btn-lg btn-block login-button">
                            Send
                        </button>
                    </div>
                </form>
            {/if}
        </div>
    </div>
</div>

{include file='common/footer.tpl'}