<!-- AUCTIONS -->
       <div class="row">
           <div class="auctions-content hidden">
               <div class="col-sm-2 sidebar">
                   <ul id="auctions-navigation" class="nav nav-sidebar">
                       <li class="active scheduledAuctions"><a>Scheduled <span id="scheduledAuctionsBadge" class="badge"></span></a></li>
                       <li class="activeAuctions"><a>Active <span id="activeAuctionsBadge" class="badge"></span></a></li>
                       <li class="inConclusionAuctions"><a>In Conclusion  <span id="inConclusionAuctionsBadge" class="badge"></span></a></li>
                       <li class="historyAuctions"><a>History <span id="historyAuctionsBadge" class="badge"></span></a></li>
                       <li class="bannedAuctions"><a>Banned <span id="bannedAuctionsBadge" class="badge"></span></a></li>
                   </ul>
               </div>
           <!-- Scheduled -->
               <div class="col-sm-10 auctions-content scheduledAuctions">
                   <table class="table table-responsive">
                       <thead>
                       <tr>
                           <th>Name</th>
                           <th>Seller</th>
                           <th>Starting Date</th>
                       </tr>
                       </thead>
                       <tbody id="scheduledAuctionsTable">
                       <!-- Scheduled Auctions Table Body-->
                       </tbody>
                   </table>
                   <nav aria-label="...">
                       <ul class="pager">
                           <li class="previous"><a onclick="previous(3)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                           <li class="next"><a onclick="next(3)">Next <span aria-hidden="true">&rarr;</span></a></li>
                       </ul>
                   </nav>
               </div>
               <!-- Active -->
               <div class="col-sm-10 auctions-content activeAuctions hidden">
                   <table class="table table-responsive">
                       <thead>
                       <tr>
                           <th>Name</th>
                           <th>Seller</th>
                           <th>Ban</th>
                       </tr>
                       </thead>
                       <tbody id="activeAuctionsTable">
                       <!-- Active Auctions Table Body-->
                       </tbody>
                   </table>
                   <nav aria-label="...">
                       <ul class="pager">
                           <li class="previous"><a onclick="previous(4)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                           <li class="next"><a onclick="next(4)">Next <span aria-hidden="true">&rarr;</span></a></li>
                       </ul>
                   </nav>
               </div>
               <!-- In conclusion -->
               <div class="col-sm-10 auctions-content inConclusionAuctions hidden">
                   <table class="table table-responsive">
                       <thead>
                       <tr>
                           <th>Name</th>
                           <th>State</th>
                       </tr>
                       </thead>
                       <tbody id="inConclusionAuctionsTable">
                       <!-- In Conclusion Auctions Table Body-->
                       </tbody>
                   </table>
                   <nav aria-label="...">
                       <ul class="pager">
                           <li class="previous"><a onclick="previous(5)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                           <li class="next"><a onclick="next(5)">Next <span aria-hidden="true">&rarr;</span></a></li>
                       </ul>
                   </nav>
               </div>
               <!-- History -->
               <div class="col-sm-10 auctions-content historyAuctions hidden">
                   <table class="table table-responsive">
                       <thead>
                       <tr>
                           <th>Name</th>
                           <th>Seller</th>
                           <th>Concluding Date</th>
                       </tr>
                       </thead>
                       <tbody id="historyAuctionsTable">
                       <!--History Auctions Table Body -->
                       </tbody>
                   </table>
                   <nav aria-label="...">
                       <ul class="pager">
                           <li class="previous"><a onclick="previous(6)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                           <li class="next"><a onclick="next(6)">Next <span aria-hidden="true">&rarr;</span></a></li>
                       </ul>
                   </nav>
               </div>
               <!-- Banned-->
               <div class="col-sm-10 auctions-content bannedAuctions hidden">
                   <table class="table table-responsive">
                       <thead>
                       <tr>
                           <th>Name</th>
                           <th>Reason</th>
                           <th>Banning Date</th>
                       </tr>
                       </thead>
                       <tbody id="bannedAuctionsTable">
                       <!--Banned Auctions Table Body -->
                       </tbody>
                   </table>
                   <nav aria-label="...">
                       <ul class="pager">
                           <li class="previous"><a onclick="previous(7)"><span aria-hidden="true">&larr;</span> Previous</a></li>
                           <li class="next"><a onclick="next(7)">Next <span aria-hidden="true">&rarr;</span></a></li>
                       </ul>
                   </nav>
               </div>
           </div>
       </div> <!-- fim da row da auction -->