<?php
/* Smarty version 4.1.1, created on 2023-03-14 13:36:23
  from 'C:\wamp\www\lojaeditando\view\clientes_pedidos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_6410a28739f891_33194960',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '781c65dc693294d2dfa23c64c8d025a247b1e47e' => 
    array (
      0 => 'C:\\wamp\\www\\lojaeditando\\view\\clientes_pedidos.tpl',
      1 => 1678811782,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6410a28739f891_33194960 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
.table{

  background-color:#DFD5FB;
}

.pagina {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
  }

.table- {
  letter-spacing: 1px;
  margin-left: 0.2rem;
  padding-top: 18px;
  padding-left: 0.2rem;


}

@media (max-width:600px){

    .table-{
      font-size: 12px;


    }

    .pagina {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
   
  }

}


</style>

<br>

<section class="table- " id="pedidos" >
    
    <h4 class="text-center">Meus Pedidos</h4>
<br>
    
    <center>
      <?php if ($_smarty_tpl->tpl_vars['PEDIDOS_QUANTIDADES']->value > 0) {?>
      <table class="">

        <thead class="table ">
          <tr>
            <th>Data</th>
            <th>Hora</th>
            <th>Status</th>
            <th>Detalhes</th>
          </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PEDIDOS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>

          <tr>
            
         
            <td>
              <p class="fw-normal mb-1"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_data'];?>
</p>
            </td>

            <td>
              <p class="fw-normal mb-1"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_hora'];?>
</p>
            </td>
            
         
              
            <?php if ($_smarty_tpl->tpl_vars['P']->value['ped_pag_status'] == 'Aguardando') {?> 
             <td style="width: 15%"><span class="label label-info"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</span></td>
            <?php } elseif ($_smarty_tpl->tpl_vars['P']->value['ped_pag_status'] == 'Pago') {?>
              <td style="width: 15%"><span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</span></td>
            <?php } else { ?>
              <td style="width: 15%"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</td>
            <?php }?>
            
            <form name="itens" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_ITENS']->value;?>
">
            
              <input type="hidden" name="cod_pedido" id="cod_pedido" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['ped_cod'];?>
">
              <td style="width: 10%"><button class="btn btn-default"><i class="glyphicon glyphicon-menu-hamburger"></i> Detalhes</button></td>
        
         </form>  
          </tr>
          <tr>
            
            
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            
        </tbody>
        
      </table>
      <?php } else { ?>
      Você não tem nenhum pedido ainda!!
      <?php }?>
      </center>
    
  
</section>
<hr>


   <!-- paginaçao inferior -->
   <section id="pagincao" class="pagina">
    <center>
        <?php echo $_smarty_tpl->tpl_vars['PAGINAS']->value;?>

    </center>
</section>
   <br>   
   <br>   <?php }
}
