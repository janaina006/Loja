<?php
/* Smarty version 4.1.1, created on 2023-03-23 21:50:02
  from 'C:\wamp\www\loja\view\pedido_retorno.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_641cf3ba626e11_95128464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f98ea3f295d4da6656e4deb6f4db8b7a25175ccc' => 
    array (
      0 => 'C:\\wamp\\www\\loja\\view\\pedido_retorno.tpl',
      1 => 1679619000,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641cf3ba626e11_95128464 (Smarty_Internal_Template $_smarty_tpl) {
?><h3 class="text-center text-success"> Obrigado pelo seu pedido </h3>
<hr>
<section class="row">
    
    <div class="col-md-3"></div> 
   
    <div class="col-md-6 ">
        
        
         <h4> Informações do pagamento </h4>
            <p> <b>Código transação:</b> <?php echo $_smarty_tpl->tpl_vars['CODIGO']->value;?>
</p>
            <p> <b>Referencia:</b> <?php echo $_smarty_tpl->tpl_vars['REF']->value;?>
</p>
            <p> <b>Status do pagamento:</b> <?php echo $_smarty_tpl->tpl_vars['PAGO']->value;?>
</p>
            <p> <b>Forma pagamento: </b><?php echo $_smarty_tpl->tpl_vars['FORMA_PAG']->value;?>
</p>
            
            
         
        
    </div> 
    <div class="col-md-3"></div> 
    
    <hr>
    
   
    
    
</section>




<?php }
}
