<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 23:38:02
         compiled from "/opt/lbaw/lbaw1655/public_html/final/templates/tickets/tickets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:435443912592c6bec844575-24668958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '056941b6c85c0c6aabf42f3bd05ea8210d805199' => 
    array (
      0 => '/opt/lbaw/lbaw1655/public_html/final/templates/tickets/tickets.tpl',
      1 => 1496097481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '435443912592c6bec844575-24668958',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c6bec9d76d6_93585226',
  'variables' => 
  array (
    'msg' => 0,
    'BASE_URL' => 0,
    'idUser' => 0,
    'idComment' => 0,
    'idAuction' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c6bec9d76d6_93585226')) {function content_592c6bec9d76d6_93585226($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="row main">
        <div class="main-login main-center">


            <!-- reportComment -->
            <?php if ($_smarty_tpl->tpl_vars['msg']->value!='') {?>
                <form class="form-horizontal my-style" method="POST"
                      action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/tickets/reportComment.php">

                    <div class="row inline">
                        <div class="col-md-3 col-md-offset-5">
                            <h2 class="text-center mytext" style="margin: 0px">Ticket</h2>
                        </div>
                        <button type="button" class="btn btn-link btn-xs pull-left" data-toggle="tooltip"
                                title="Fill the following form if you have any problem or question">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </button>
                    </div>
                    <input name="iduser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idUser']->value;?>
">
                    <input name="idcomment" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idComment']->value;?>
">
                    <input name="idauction" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idAuction']->value;?>
"> 

                    <div class="form-group">
                        <label for="Title">Title
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button>
                        </label>
                        <textarea name="title" class="form-control" rows="1"
                                  placeholder="<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
" readonly></textarea>

                    </div>

                    <div class="form-group">
                        <label for="category">Category
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button>
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Choose ticket category according to your problem.'Report' for site problems,
                                    'Product' for auction payment and delivery problems, 'Questions' for more info.
                                    If none of the default categories fit your problem, choose the 'Other' option.">
                                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            </button>
                        </label>
                        <select id="category" class="form-control form-control-lg">
                            <option>Report</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Message
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button>
                        </label>
                        <textarea title="ticket message" required="required" name="message" class="form-control"
                                  rows="5" id="comment"
                                  placeholder="Write your ticket..."></textarea>

                    </div>

                    <div class="form-group" style="padding: 1em 3em">
                        <button type="submit" style="min-height: 10px; font-size: 3vmin"
                                class="btn btn-primary btn-lg btn-block login-button">
                            Send
                        </button>
                    </div>
                </form>
            <?php } else { ?>
                <!-- report -->
                <form class="form-horizontal" style="padding: 0% 25%" method="POST"
                      action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/tickets/createTicket.php">


                    <div class="row inline">
                        <div class="col-md-3 col-md-offset-5">
                            <h2 class="text-center mytext" style="margin: 0px">Ticket</h2>
                        </div>
                        <button type="button" class="btn btn-link btn-xs pull-left" data-toggle="tooltip"
                                title="Fill the following form if you have any problem or question">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </button>
                    </div>


                    <div class="form-group">
                        <label for="Title">Title
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button>
                        </label>
                        <textarea title="title" name="title" class="form-control" rows="1"
                                  required="required" placeholder="Title of ticket"></textarea>


                    </div>

                    <div class="form-group">
                        <label for="category">Category
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button>
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Choose ticket category according to your problem.'Report' for site problems,
                                    'Product' for auction payment and delivery problems, 'Questions' for more info.
                                    If none of the default categories fit your problem, choose the 'Other' option.">
                                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            </button>
                        </label>
                        <select name="category" id="category" class="form-control form-control-lg">
                            <option>Report</option>
                            <option>Product</option>
                            <option>Questions</option>
                            <option>Others</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">
                            Message
                            <button type="button" class="btn btn-link btn-xs pull-right" data-toggle="tooltip"
                                    title="Required field">*
                            </button>
                        </label>
                        <textarea required="required" name="message" class="form-control" rows="5" id="comment"
                                  placeholder="Write your ticket..."></textarea>

                    </div>

                    <div class="form-group" style="padding: 1em 3em">
                        <button type="submit" style="min-height:20px;"
                                class="btn btn-primary btn-lg btn-block login-button">
                            Send
                        </button>
                    </div>
                </form>
            <?php }?>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script><?php }} ?>
