<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 19:55:25
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/authentication/contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39210953592c67dc4eb959-67307521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e1ebdd2724034c66e98e1b4d09a776b4a45212d' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/authentication/contacts.tpl',
      1 => 1496084123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39210953592c67dc4eb959-67307521',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c67dc6643e6_44894114',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c67dc6643e6_44894114')) {function content_592c67dc6643e6_44894114($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">
            <h2 class="text-center mytext">Contacts</h2>

            <div>
                <br><br>
                <h4 class="text-center mytext"> This website was developed by a group of students of FEUP (Faculdade de Engenharia da Universidade do Porto)
                    <br>in the class of LBAW in the 3rd year of the Master's Degree in Informatics and Computer Engineering.</h4>

                <br>

                <div class="form-group" style="padding: 1em 3em">
                    <button onclick="location.href = 'https://sigarra.up.pt/feup/pt/fest_geral.cursos_list?pv_num_unico=201406219'" type="button" style="min-height: 20px" class="btn btn-primary btn-lg btn-block login-button">
                        Catarina Ramos
                    </button>
                </div>

                <div class="form-group" style="padding: 1em 3em">
                    <button onclick="location.href = 'https://sigarra.up.pt/feup/pt/fest_geral.cursos_list?pv_num_unico=201405778'" type="button" style="min-height: 20px" class="btn btn-primary btn-lg btn-block login-button">
                        Inês Gomes
                    </button>
                </div>

                <div class="form-group" style="padding: 1em 3em">
                    <button onclick="location.href = 'https://sigarra.up.pt/feup/pt/fest_geral.cursos_list?pv_num_unico=201405342'" type="button" style="min-height: 20px" class="btn btn-primary btn-lg btn-block login-button">
                        Lázaro Costa
                    </button>
                </div>

                <div class="form-group" style="padding: 1em 3em">
                    <button onclick="location.href = 'https://sigarra.up.pt/feup/pt/FEST_GERAL.CURSOS_LIST?pv_num_unico=201201705'" type="button" style="min-height: 20px" class="btn btn-primary btn-lg btn-block login-button">
                        Mário Fernandes
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
