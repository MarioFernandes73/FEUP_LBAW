<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 19:24:34
         compiled from "/opt/lbaw/lbaw1655/public_html/proto/templates/authentication/contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1352350992592c6506be46c0-13441569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '107d5523c352aa90bf394fefcbdb289f53601393' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/proto/templates/authentication/contacts.tpl',
      1 => 1496082273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1352350992592c6506be46c0-13441569',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c6506c9bd98_63962028',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c6506c9bd98_63962028')) {function content_592c6506c9bd98_63962028($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">
            <h2 class="text-center mytext">Contacts</h2>

            <div>
                <br><br>
                <h5 class="text-center mytext"> This website was developed by a group of students of FEUP (Faculdade de Engenharia da Universidade do Porto) in the class of LBAW
                    in the 3rd year of the Master's Degree in Informatics and Computer Engineering.</h5>

                <br>
                
                <div class="form-group" style="padding: 1em 3em">
                    <button type="submit" style="min-height: 20px" class="btn btn-primary btn-lg btn-block login-button">
                        Catarina Ramos
                    </button>
                </div>

                <div class="form-group" style="padding: 1em 3em">
                    <button type="submit" style="min-height: 20px" class="btn btn-primary btn-lg btn-block login-button">
                        Inês Gomes
                    </button>
                </div>

                <div class="form-group" style="padding: 1em 3em">
                    <button type="submit" style="min-height: 20px" class="btn btn-primary btn-lg btn-block login-button">
                        Lázaro Costa
                    </button>
                </div>

                <div class="form-group" style="padding: 1em 3em">
                    <button type="submit" style="min-height: 20px" class="btn btn-primary btn-lg btn-block login-button">
                        Mário Fernandes
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
