<?php /* Smarty version Smarty-3.1.15, created on 2017-04-26 16:06:16
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/authentication/homepage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94777696558f75b26a29bf5-88400756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a58dc992daed7d6dfc2bdf464abae82d7a9d6677' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/authentication/homepage.tpl',
      1 => 1493219173,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94777696558f75b26a29bf5-88400756',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f75b26b8dd83_53652696',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f75b26b8dd83_53652696')) {function content_58f75b26b8dd83_53652696($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

    <div class="panel panel-primary" id="lastMinute">
        <div class="panel panel-default" style="background-color: #f5f5f5">
            <h3 class="text-center">Last Minute Opportunities</h3>
        </div>
        <div class="panel-body">
            <div class="carousel slide" id="myCarouselOpp">
                <div class="carousel-inner"> </div>
                <a class="left carousel-control" href="#myCarouselOpp" data-slide="prev"><i
                            class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right carousel-control" href="#myCarouselOpp" data-slide="next"><i
                            class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>
        <div class="panel-footer"><a href="searchresult.html">See More</a></div>
    </div>

    <div class="panel panel-primary" id="hot">
        <div class="panel panel-default" style="background-color: #f5f5f5">
            <h3 class="text-center">Hot</h3>
        </div>
        <div class="panel-body">
            <div class="carousel slide" id="myCarouselHot">
                <div class="carousel-inner"></div>
                <a class="left carousel-control" href="#myCarouselHot" data-slide="prev"><i
                            class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right carousel-control" href="#myCarouselHot" data-slide="next"><i
                            class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>
        <div class="panel-footer"><a href="searchresult.html">See More</a></div>
    </div>

</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/listAuctions.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/timeleft.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
