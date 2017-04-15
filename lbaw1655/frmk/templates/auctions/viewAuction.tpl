<div class="jumbotron">

    <div class="row">
        <div class="col-sm-4">

            <div class="panel-body">
                <div class="carousel slide" id="myCarousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                <a href="#" class="thumbnail">
                                    <img src="http://lorempixel.com/400/400/" alt="...">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                <a href="#" class="thumbnail">
                                    <img src="http://lorempixel.com/400/400/" alt="...">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i
                                class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><i
                                class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>

            <div class="btn-group btn-group-justified" role="group" aria-label="..." style="min-height: 60px">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-info btn-block">Follow</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-danger btn-block">Report</button>
                </div>
            </div>

            <button type="button" class="btn btn-primary btn-block btn-lg">Bid</button>
            <div class='well col-sm-12'>



                <form>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Your price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" />
                        </div>
                    </div>
                </form>


            </div>
        </div>

        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-body" style="min-height: 515px">
                    <dl class="row col-sm-12 text-center h3">
                        <strong>Cute Little Pony</strong>
                    </dl>
                    <dl class="row"></dl>
                    <dl class="row"></dl>
                    <dl class="row">
                        <dt class="col-sm-2">Category</dt>
                        <dd class="col-sm-5">Others</dd>
                        <dt class="col-sm-2">Type</dt>
                        <dd class="col-sm-3">English</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Base Price</dt>
                        <dd class="col-sm-5">15€</dd>
                        <dt class="col-sm-2">Current Bid</dt>
                        <dd class="col-sm-3">25€</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Begin Date</dt>
                        <dd class="col-sm-5">02/03/2017</dd>
                        <dt class="col-sm-2">Time Left</dt>
                        <dd class="col-sm-3">12:05:41</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Seller Rating</dt>
                        <dd class="col-sm-9">
                            <input id="rate" value="4" class="rating-loading" data-size="xs" data-disabled="true">
                        </dd>
                        <script>
                            $(document).on('ready', function() {
                                $('#rate').rating({
                                    displayOnly: true,
                                    step: 0.5
                                });
                            });
                        </script>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Description</dt>
                        <dd class="col-sm-10 pre-scrollable text-center" style="max-height: 230px">
                            Cute Toy amazing for kids. Pink and flufy.
                        </dd>
                    </dl>
                    <!-- Admin edit button -->
                    <a href="editauction.html" class="btn btn-info btn-xs pull-right" role="button">
                        <span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary ">
                <div class="panel-body pre-scrollable" style="min-height: 460px">
                    <div class="table-responsive">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h4>New bid!! - Current price 25€</h4>
                            </li>
                            <li class="list-group-item">
                                <h4>New comment</h4>
                            </li>
                            <li class="list-group-item">
                                <h4>New bid!! - Current price 20€</h4>
                            </li>
                            <li class="list-group-item">
                                <h4>New bid!! - Current price 18€</h4>
                            </li>
                            <li class="list-group-item">
                                <h4>New comment</h4>
                            </li>
                            <li class="list-group-item">
                                <h4>Auction Started!</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- comment section -->
        <div class="col-sm-8">
            <div class="panel panel-primary ">
                <div class="panel-body pre-scrollable" style="max-height: 340px">
                    <!-- comment #1 -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Anonymous</strong>
                            <span class="text-muted">commented 1 day ago</span>
                            <button style="margin-left: 5px;" type="button" class="btn btn-danger btn-xs pull-right">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            </button>
                            <!-- Admin remove button -->
                            <button type="button" class="btn btn-warning btn-xs pull-right">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="panel-body">
                            Can someone tell me this pony height?
                        </div>
                    </div>
                    <!-- comment #2 -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Seller</strong>
                            <span class="text-muted">commented 12 hours ago</span>
                            <button style="margin-left: 5px;" type="button" class="btn btn-danger btn-xs pull-right">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            </button>
                            <!-- Admin remove button -->
                            <button type="button" class="btn btn-warning btn-xs pull-right">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="panel-body">
                            This pony has 5 inches.
                        </div>
                    </div>
                    <!-- comment #3 -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Anonymous</strong>
                            <span class="text-muted">commented 5 minutes ago</span>
                            <button style="margin-left: 5px;" type="button" class="btn btn-danger btn-xs pull-right">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            </button>
                            <!-- Admin remove button -->
                            <button type="button" class="btn btn-warning btn-xs pull-right">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="panel-body">
                            Does it smell good?
                        </div>
                    </div>
                </div>
                <!-- new comment -->
                <div class="panel-footer" style="min-height: 120px">
                    <form>
                        <textarea class="col-sm-12" rows="3" placeholder="Do you have some question?"></textarea>
                        <button type="submit" class="btn btn-success pull-right" style="margin: 5px;">
                            <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                        </button>
                        <label class="btn btn-success btn-file pull-right" style="margin-top: 5px;">
                            <span class=" glyphicon glyphicon-paperclip " aria-hidden="true "></span>
                            <input type="file " style="display: none; ">
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>