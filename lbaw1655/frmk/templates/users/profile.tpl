{include file='common/header.tpl'}
{include file='common/navbar.tpl'}
<!-- MAIN INTERACTION -->
<div class="jumbotron">
    <!-- navs -->
    <div class="panel panel-primary" style="min-height: 600px">
        <div class="panel panel-default">
            <ul class="nav nav-pills nav-justified" role="tablist">
                <li role="presentation"class="active"><a href="#">My Profile</a></li>
                <li role="presentation"><a href="#">Auctions</a></li>
                <li role="presentation" ><a href="#">Tickets</a></li>
            </ul>
        </div>
        <!-- 1 : Profile -->
      <!--  <div class="row">
            <div class="col-sm-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Statistics</a></li>
                    <li class="active"><a href="#">Edit Account</a></li>
                    <li><a href="#">Delete Account</a></li>
                </ul>
            </div>
            <!-- MY ACCOUNT --
            <div class="col-sm-5" style="padding-left: 5%">
                <table class="table responsive">
                    <thead>
                    <tr>
                        <td><span class="glyphicon glyphicon-user" aria-hidden="true"/></td>
                        <td>lbaw</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-briefcase" aria-hidden="true"/></td>
                        <td>Catarina Inês Lázaro Mário</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-calendar" aria-hidden="true"/></td>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-envelope" aria-hidden="true"/></td>
                        <td>lbaw@fe.up.pt</td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-earphone" aria-hidden="true"/></td>
                        <td>987654321</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- STATISTICS --
            <div class="col-sm-10" style="padding-left: 5%">
                <div class="thumbnail" style="border: none">
                    <img src="assets/userStats.PNG" alt="statistics">
                </div>
            </div>
            <!-- EDIT ACCOUNT -->
            <div class="col-sm-10">
                {include file='users/editaccount.tpl'}
            </div>
            <!--
        </div> <!-- termina a row 1 -->
        <!-- 2 : auctions --
            <div class="row">
                <div class="col-sm-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li ><a href="#">Followed <span class="badge">4</span></a></li>
                        <li ><a href="#">In Conclusion <span class="badge">4</span></a></li>
                        <li class="active" ><a href="#">History <span class="badge">4</span></a></li>
                    </ul>
                </div>
                <!-- FOLLOWED --
                <div class="col-sm-10" style="padding-left: 5%">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Auction</th>
                                <th>Timeleft</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="auction.html">Computer</a></td>
                                <td>2 days 21:52:36</td>
                            </tr>
                            <tr>
                                <td><a href="auction.html">Catarina</a></td>
                                <td>00:21:54</td>
                            </tr>
                            <tr>
                                <td><a href="auction.html">Lázaro</a></td>
                                <td>00:05:34</td>
                            </tr>
                            <tr>
                                <td><a href="auction.html">Mouse</a></td>
                                <td>1 day 17:20:59</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- IN CONCLUSION --
                <div class="col-sm-10" style="padding-left: 5%">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Auction</th>
                                <th>Type</th>
                                <th colspan="2" class="text-center">State</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="auction.html">D'ZRT CD</a></td>
                                <td>Reception</td>
                                <td class="text-center"><strong>23:59:59 left</strong></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success">Make Payment</button>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="auction.html">Sonic VideoGame</a></td>
                                <td>Reception</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success">Confirm reception</button>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger">Report Problem</button>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="auction.html">PS4 semi-used</a></td>
                                <td>Reception</td>
                                <td class="text-center"><strong>Rate Seller</strong></td>
                                <td>
                                    <input class="rate rating-loading" data-size="xs">
                                </td>
                            </tr>
                            <tr>
                                <td><a href="auction.html">Curtains with flowers</a></td>
                                <td>Delivery</td>
                                <td class="text-center"><strong>Waiting for buyer</strong></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success disabled">Confirm Delivery</button>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="auction.html">Black Piano 2/3</a></td>
                                <td>Delivery</td>
                                <td class="text-center"></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success">Confirm Delivery</button>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="auction.html">TV LED brand new</a></td>
                                <td>Delivery</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success">Payment received</button>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger">Report Problem</button>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="auction.html">Red Bicycle for kids</a></td>
                                <td>Delivery</td>
                                <td class="text-center"><strong>Rate Buyer</strong></td>
                                <td>
                                    <input class="rate rating-loading" data-size="xs">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <script>
                            $(document).on('ready', function () {
                                $('.rate').rating(showCaption: false, showClear: false});
                            });
                        </script>
                    </div>
                </div>
                <!-- HISTORY --
                <div class="col-sm-10" style="padding-left: 5%">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Auction</th>
                                <th>Date</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="#auction.html">Purple Abajour</a></td>
                                <td>21/01/2017</td>
                                <td>7€</td>
                            </tr>
                            <tr>
                                <td><a href="#auction.html">Wood table to cut vegetables</a></td>
                                <td>25/01/2017</td>
                                <td>15€</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--
            </div> <!-- termina a row 2 -->
        <!-- 3 : tickets -->
       <!-- <div class="row">
            <div class="col-sm-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="#">Active <span class="badge">1</span></a></li>
                    <li><a href="#">Solved <span class="badge">1</span></a></li>
                    <li class="active"><a href="#">All <span class="badge">2</span></a></li>
                </ul>
            </div>
            <!-- ACTIVE --
            <div class="col-sm-10" style="padding-left: 5%">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Identification</th>
                            <th>My ticket is solved</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="#info">Product Broken</a></td>
                            <td>
                                <button type="submit" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- SOLVED --
            <div class="col-sm-10" style="padding-left: 5%">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Identification</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="#info">Can I have 2 e-mail adresses?</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- ALL --
        <div class="col-sm-10" style="top: -17px">
            <ul class="pager">
                <li class="previous">
                    <a href="#"><span aria-hidden="true">&larr;</span> Previous</a>
                </li>
                <li class="next">
                    <a href="#">Next <span aria-hidden="true">&rarr;</span></a>
                </li>
            </ul>
            <h3 class="sub-header text-center">Product Broken</h3>
            <div class="panel panel-default" style="min-height: 420px">
                <div class="panel-heading" style="min-height: 80px">
                    <strong>lbaw</strong> My delivery came broken but the seller says that the product was not
                    broken before he sent it. What can I do know? May I have my money back?
                </div>
                <div class="panel-body pre-scrollable" style="height: 220px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Admin</strong>
                        </div>
                        <div class="panel-body">
                            Hi! Can you take a picture to the product?
                        </div>
                    </div>
                </div>
                <div class="panel-footer" style="min-height: 120px;">
                    <form>
                        <textarea class="col-sm-12" rows="3" placeholder="New answer"></textarea>
                        <button style="margin-top: 5px;" type="submit" class="btn btn-success pull-right">
                            <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                        </button>
                        <label style="margin: 5px;" class="btn btn-success btn-file pull-right">
                            <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                            <input type="file" style="display: none;">
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-->
        </div> <!-- termina a row 3 -->
    </div>
</div>


{include file='common/footer.tpl'}