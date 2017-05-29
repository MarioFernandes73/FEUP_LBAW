{include file='common/header.tpl'}
{include file='common/navbar.tpl'}

<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">

            <h2 class="text-center">Edit Auction</h2>
            <!-- Title -->

            <form class="form-horizontal" style="padding: 0% 25%" method="post"   action="{$BASE_URL}actions/auctions/editAuction.php">

                <input title="auction id" name="idauction" type="hidden" value="{$idAuction}"> </input>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Name</label>
                    <div class="input-group" id="name">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lamp">
                                    </span></span>
                        <input title="name of auction" name="name" type="text" class="form-control" placeholder="Enter the auction's name"
                               aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="category" class="cols-sm-2 control-label">Category</label>
                    <div class="input-group" id="category">
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-list-alt"></span></span>
                        <select title="category" name="category" class="form-control form-control-lg">
                            <option>Antiquities</option>
                            <option>Clothes</option>
                            <option>Decoration</option>
                            <option>Indoor</option>
                            <option>Jewelery</option>
                            <option>Outside</option>
                            <option>Others</option>
                            <option>Tools</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="comment">Item description</label>
                    <textarea title="description" name="description" class="form-control" rows="5"
                              placeholder="Write your description..."></textarea>
                </div>

                <div class="form-group" style="padding: 1em 3em">
                    <button type="submit" style="min-height: 10px; font-size: 3vmin"
                            class="btn btn-primary btn-lg btn-block login-button">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{include file='common/footer.tpl'}

