<?php /* Smarty version Smarty-3.1.15, created on 2017-05-04 14:20:55
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/users/profileAuctions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14837175535901beab298c74-54595180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca3cfa77bd64ac4cabe7d8b8606319e0063ed70b' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/users/profileAuctions.tpl',
      1 => 1493903916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14837175535901beab298c74-54595180',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5901beab2a1b62_73894903',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901beab2a1b62_73894903')) {function content_5901beab2a1b62_73894903($_smarty_tpl) {?><!-- 2 : auctions -->
<div class="row">
    <div class="auctions-content hidden">
        <div class="col-sm-2 sidebar">
            <ul id="myAuctions-navigation" class="nav nav-sidebar">
                <li class="active followedAuctions"><a>Followed <span id="followedAuctionsBadge" class="badge"></span></a></li>
                <li class="inConclusionAuctions"><a>In Conclusion <span id="inConclusionAuctionsBadge" class="badge"></span></a></li>
                <li class="historyAuctions"><a>History <span id="historyAuctionsBadge" class="badge"></span></a></li>
            </ul>
        </div>
        <!-- FOLLOWED -->
        <div class="auctions-content followedAuctions">
            <div class="col-sm-10">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Auction</th>
                            <th>Timeleft</th>
                        </tr>
                        </thead>
                        <tbody id="followedAuctionsTable">
                        <!-- Followed Auctions Table body-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         <!-- IN CONCLUSION -->
        <div class="auctions-content inConclusionAuctions hidden">
            <div class="col-sm-10">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th colspan="1">Auction</th>
                            <th colspan="1">Type</th>
                            <th colspan="2" class="text-center">State</th>
                        </tr>
                        </thead>
                        <tbody id="inConclusionAuctionsTable">
                        <!-- In Conclusion Auctions Table Body-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- HISTORY -->
        <div class="auctions-content historyAuctions hidden">
            <div class="col-sm-10">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Auction</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Rating</th>
                        </tr>
                        </thead>
                        <tbody id="historyAuctionsTable">
                        <!--History Auctions Table Body -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> <!-- termina a row 2 --><?php }} ?>
