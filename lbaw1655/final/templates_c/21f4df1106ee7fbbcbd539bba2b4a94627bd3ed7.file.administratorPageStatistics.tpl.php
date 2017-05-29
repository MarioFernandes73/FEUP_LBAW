<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 20:11:42
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/administrator/administratorPageStatistics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1136367592c6c2cc6e280-59483453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21f4df1106ee7fbbcbd539bba2b4a94627bd3ed7' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/administrator/administratorPageStatistics.tpl',
      1 => 1496084686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1136367592c6c2cc6e280-59483453',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c6c2cc71f60_85805237',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c6c2cc71f60_85805237')) {function content_592c6c2cc71f60_85805237($_smarty_tpl) {?><!-- STATISTICS -->
            <div class="row">
                <div class="statistics-content hidden">
                <div class="col-sm-6">
                    <div class="circle-tile ">
                        <div class="circle-tile-heading dark-blue"><em class="fa fa-users fa-fw fa-3x"></em></div>
                        <div class="circle-tile-content dark-blue">
                            <div class="circle-tile-description text-faded">Total Users</div>
                            <div id="totalUsersStats" class="circle-tile-number text-faded "></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="circle-tile ">
                        <div class="circle-tile-heading red"><em class="fa fa-bullhorn fa-fw fa-3x"></em></div>
                        <div class="circle-tile-content red">
                            <div class="circle-tile-description text-faded">Total Auctions</div>
                            <div id="totalAuctionsStats" class="circle-tile-number text-faded "></div>
                        </div>
                    </div>
                </div>
                </div>
            </div><?php }} ?>
