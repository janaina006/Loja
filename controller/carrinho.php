<?php


if(isset($_SESSION['PRO'])) {

    

    $smarty = new Tamplate();

    $carrinho = new Carrinho();
		$produtos = new Produtos();

    

       

  

	// $carrinho->CarrinhoGravar($cliente, $produto, $quantidade, $cod);
	$carrinho->GetPedidosCliente($_SESSION['CLI']['cli_id']);
	
    
        

    

   



    $smarty->assign('PRO', $carrinho->GetItens());
    $smarty->assign('TOTAL', Sistema::MoedaBR($carrinho->GetTotal()));
    $smarty->assign('PAG_CARRINHO_ALTERAR', Rotas::pag_CarrinhoAlterar());
    $smarty->assign('PAG_PRODUTOS', Rotas::pag_Produtos());
    $smarty->assign('PAG_CONFIRMAR', Rotas::pag_PedidoConfirmar());
    $smarty->assign('PESO', number_format($carrinho->GetPeso(),3,'.',''));
    $smarty->assign('TOTAL_ITENS', $carrinho->GetTotal_Itens());
$smarty->assign('PRO_INFO', Rotas::pag_ProdutosInfo());
    



    $smarty-> display('carrinho.tpl');
    
    }else {
       echo '<h4 class="alert alert-danger"> Não possui produtos no carrinho </h4>';
          Rotas::Redirecionar(2, Rotas::pag_Produtos());

    }


?>