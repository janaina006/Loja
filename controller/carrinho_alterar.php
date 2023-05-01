<?php 

$ref_cod_pedido =  date('ymdHms') . $_SESSION['CLI']['cli_id'];

if(!isset($_SESSION['PRO']['cod'])){
$_SESSION['PRO']['cod'] = $ref_cod_pedido;
}


// echo $_SESSION['PRO']['cod'];

if(!isset($_POST['pro_id']) or $_POST['pro_id'] < 1){
	echo '<h4 class="alert alert-danger"> Erro na operação! </h4>';
	Rotas::Redirecionar(1, Rotas::pag_Carrinho());
	exit();
}

$id = (int)$_POST['pro_id'];




// $_SESSION['PRO']['pro_id'] = $id;

$carrinho = new Carrinho();










try {
	$carrinho->CarrinhoADD($id);
	
} catch (Exception $e) {
	echo '<h4 class="alert alert-danger"> Erro na operação! </h4>';
}


Rotas::Redirecionar(10, Rotas::pag_Carrinho());

 ?>