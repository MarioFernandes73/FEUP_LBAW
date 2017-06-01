{include file='common/header.tpl'}
{include file='common/navbar.tpl'}

<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">
            <h2 class="text-center mytext">FAQ</h2>
            <br><br>
            <div>
                <h3 class="text-center mytext">English auction</h3>
                <br>
                <p>This is the traditional auction, which has a time limit and during the time which is active, every client can bid.
                    Each bid has to be bigger than the previous bid and will stay as the winning bid until someone else offers more money
                    or the auction ends. When the auction ends, the current winning bid will be declared as the winner. In our version each
                    bid will need to increase the price by at least fixed amount of the previous one and at a certain point, each bid will
                    increase the duration of the auction. a few minutes more (up to a cap).</p>

                <br>
                <h3 class="text-center mytext">Dutch auction</h3>
                <br>
                <p>This type of auction is designed for auctioneers that know very well how much their item is worth since it begins with a
                    price suggested by the seller. During the auction the seller will be able to drop the price of the item but the moment
                    someone offers the amount the seller is asking for, the auction ends and that client is the winner.</p>

                <br>
                <h3 class="text-center mytext">Blind auction</h3>
                <br>
                <p>In this auction, the buyers offer whatever price they want for the item one single time. When the auction ends, the client
                    who has the highest bid wins the auction and the price is sold at that item. During the course of the auction, nobody
                    can see any bids apart from their own.</p>


            </div>

        </div>
    </div>
</div>
{include file='common/footer.tpl'}