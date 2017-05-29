<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 19:54:48
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/authentication/faq.tpl" */ ?>
<?php /*%%SmartyHeaderCode:605202641592c6ba8387c12-73173343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a185441bdc983dfd90e9192fbd956b5f822a0cdd' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/authentication/faq.tpl',
      1 => 1496084086,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '605202641592c6ba8387c12-73173343',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c6ba84eadf0_75545451',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c6ba84eadf0_75545451')) {function content_592c6ba84eadf0_75545451($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
