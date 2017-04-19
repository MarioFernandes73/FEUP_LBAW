<?php /* Smarty version Smarty-3.1.15, created on 2017-04-18 22:52:57
         compiled from "/opt/lbaw/lbaw1655/public_html/frmk/templates/authentication/homepage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102415414858f23686abd580-51171696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48723370001a12cf99c4516aac52903f19a8fe9f' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/frmk/templates/authentication/homepage.tpl',
      1 => 1492552371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102415414858f23686abd580-51171696',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f23686c13806_18285246',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f23686c13806_18285246')) {function content_58f23686c13806_18285246($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
    </div>
    <div class="panel-footer"><a href="searchresult.html">See More</a></div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/listAuctions.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
