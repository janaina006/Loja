<?php
/* Smarty version 4.1.1, created on 2023-02-25 18:30:21
  from 'C:\wamp\www\lojaeditando\view\produtos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_63fa7ded75b3b0_35341731',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96ccc3f4a746fedfb912781538575c9d75bbcd21' => 
    array (
      0 => 'C:\\wamp\\www\\lojaeditando\\view\\produtos.tpl',
      1 => 1676849114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63fa7ded75b3b0_35341731 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>
    @media (max-width:990px){

        .n{
            font-size: 12px;
        }
    }




</style>




<?php if ($_smarty_tpl->tpl_vars['PRO_TOTAL']->value < 1) {?>
<H4 class="alert alert-danger">Nenhum produto encontrado!!</H4>
<meta http-equiv="refresh" content=1;url="<?php echo $_smarty_tpl->tpl_vars['PRODUTOS']->value;?>
">

<?php }?>


<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
            <div class="col mb-5">
                
                
                <div class="card h-100">
                    <a class="card-title" href="<?php echo $_smarty_tpl->tpl_vars['PRO_INFO']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_slug'];?>
">
                    <!-- Product image-->
                    <img class="imgstyle card-img-top" src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
"alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="n card-title">
                            <!-- Product name-->
                            <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>

                            <br>
                            <!-- Product price-->
                           <h6>R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
</h6> 
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a  href="#"></a></div>
                    </div>
                </div>
                
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</section>

   

    <!-- paginaçao inferior -->
    <section id="pagincao" class="pagination">
        <center>
            <?php echo $_smarty_tpl->tpl_vars['PAGINAS']->value;?>

        </center>
    </section>
    <br>
    <br><?php }
}
