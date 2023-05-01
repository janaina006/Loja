<?php 

class Carrinho extends Conexao{
	
	
	function __construct(){
		parent::__construct();
    }
	
	public $total_valor, $total_peso, $itens = array();


	function CarrinhoGravar($cliente, $produto, $quantidade, $cod, $valor){

        $retorno = FALSE;
        $query  = "INSERT INTO ".$this->prefix."carrinho";   
        $query .= "(id_usuario, id_produto, quantidade, cod, pro_valor_us)"; 
        $query .= " VALUES ";
        $query .= "(:id_usuario, :id_produto, :quantidade, :cod, :pro_valor_us)";
        
        $params = array(
            ':id_usuario'=> (int)$cliente,
            ':id_produto' => $produto,
            ':quantidade' => $quantidade,
            ':cod' => $cod,
            ':pro_valor_us' => $valor


           
        );
    
        $this->ExecuteSQL($query, $params);
    

        $retorno = TRUE;
        return $retorno;
        
     }

	     

    //  function GetPedidosCliente(){
    //     $query = "select *
	// 	from lv_carrinho join lv_produtos on lv_carrinho.id_produto = lv_produtos.pro_id
	// 	where lv_carrinho.id_produto = lv_produtos.pro_id";
       
       
    //     $this->ExecuteSQL($query);
    //     $this->GetCarrinho();

     
	// }
     function GetPedidosCliente($cliente=null){
		
        $query = "SELECT * FROM {$this->prefix}carrinho r join {$this->prefix}produtos p";
		$query .= " ON r.id_produto = p.pro_id";
		$query .= " WHERE r.id_produto = p.pro_id";
		if($cliente != null){
			$cli = (int)$cliente;
			$query .= " AND id_usuario = {$cli}";

		}
       
       
		$this->ExecuteSQL($query);
        $this->GetCarrinho();


     
	}

	function CarrinhoAtualizar($quantidade, $id) {
		$carrinho = new Carrinho();


        $retorno = FALSE;
        $query  = "UPDATE " . $this->prefix . "carrinho ";
        $query .= "SET quantidade = :quantidade ";
        $query .= "WHERE id_produto = :id";
    
        $params = array(
            ':quantidade' => $quantidade,
            ':id' => $id

        );
		

    
        $this->ExecuteSQL($query, $params);

    
        $retorno = TRUE;
        return $retorno;

    }





	function GetCarrinho(){

		$i = 1; $sub = 1.00; $peso = 0;

		

		while ($lista = $this->ListarDados()):
			

			$sub = ($lista['pro_valor_us'] * $lista['quantidade']);
			$this->total_valor += $sub;



			$peso = $lista['pro_peso'] *  $lista['quantidade'];
			$this->total_peso += $peso;

			

			$this->itens[$i] = array(

				
				'id_carrinho' => $lista['id_carrinho'],
				'id_usuario' => $lista['id_usuario'],
				'id_produto' => $lista['id_produto'],
				'quantidade' => $lista['quantidade'],
				'cod' => $lista['cod'],
				'pro_id' => $lista['pro_id'],
				'pro_nome'  => $lista['pro_nome'],
				'pro_valor'   => Sistema::MoedaBR($lista['pro_valor'])  ,  
				'pro_valor_us'   =>  $lista['pro_valor_us'],  
	            'pro_peso'  => $lista['pro_peso'],
	            // 'pro_qtd'   => $lista['pro_qtd'],
	            'pro_img'   =>  Rotas::ImageLink($lista['pro_img'], 100, 100),
	            // 'pro_link'  =>$lista['LINK'],
	            'pro_subTotal'=> Sistema::MoedaBR($sub),         
	            'pro_subTotal_us'=> $sub 

				);
			$i++;
        endwhile;



	}


	function GetTotal(){
		return $this->total_valor;
	}

	function GetPeso(){
		return $this->total_peso;
	}
	
	function GetTotal_Itens(){
		$number_of_items = count($this->itens);
		return $number_of_items;
		
		
	}


	function CarrinhoADD($id){

		$CLIENTE = $_SESSION['CLI']['cli_id'];			
		$COD = $_SESSION['PRO']['cod'];
		

		$produtos = new Produtos();
		$produtos->GetProdutosID($id);
		foreach ($produtos->GetItens() as $pro) {
			$ID = $pro['pro_id'];
			$NOME  = $pro['pro_nome'];
            $VALOR_US = $pro['pro_valor_us'];
            $VALOR  = $pro['pro_valor'];
            $PESO  = $pro['pro_peso'];
            $ESTOQUE  = $pro['pro_estoque'];
            $QTD   = 1;
            $IMG   = $pro['pro_img_p'];
            $LINK  = Rotas::pag_ProdutosInfo().'/'.$ID.'/'.$pro['pro_slug'];
            $ACAO  = $_POST['acao'];

			

		}


		switch ($ACAO) {

			case 'add':
					if(!isset($_SESSION['PRO'][$ID]['ID'])){
						$_SESSION['PRO'][$ID]['ID'] = $ID;
						$_SESSION['PRO'][$ID]['NOME']  = $NOME;
					    $_SESSION['PRO'][$ID]['VALOR'] = $VALOR;
					    $_SESSION['PRO'][$ID]['VALOR_US'] = $VALOR_US;
					    $_SESSION['PRO'][$ID]['PESO']  = $PESO;
					    $_SESSION['PRO'][$ID]['QTD']   = $QTD;
					    $_SESSION['PRO'][$ID]['IMG']   = $IMG;
					    $_SESSION['PRO'][$ID]['LINK']  = $LINK;  
					    $_SESSION['PRO'][$ID]['ESTOQUE']  = $ESTOQUE;  
						$this->CarrinhoGravar($CLIENTE, $ID, $QTD, $COD, $VALOR_US);



						
						
					}else{


						

						$_SESSION['PRO'][$ID]['QTD'] += $QTD;
						$id = $_SESSION['PRO'][$ID]['ID'];
						$this->CarrinhoAtualizar($_SESSION['PRO'][$ID]['QTD'], $id);


					}

					echo '<h4 class="alert alert-success"> Produto Inserido! </h4>';
					

				break;

			case 'del':
				$this->CarrinhoDEL($id);
				echo '<h4 class="alert alert-success"> Produto Removido! </h4>';
				break;

			case 'limpar':
				$cliente = $_SESSION['CLI']['cli_id'];
				$this->CarrinhoLimpar($cliente);
				echo '<h4 class="alert alert-success"> Produtos Removidos! </h4>';
				break;
			
			
		}
	}


	private function CarrinhoDEL($id){
		
    $query =  " DELETE FROM {$this->prefix}carrinho WHERE id_produto = :id";        
    // parametros
    $params = array(':id'=>$id);
    // executo a minha SQL
    $this->ExecuteSQL($query, $params);
	unset($_SESSION['PRO'][$id]['ID']);



    
 
	}

	private function CarrinhoLimpar($cliente){
		$query =  " DELETE FROM {$this->prefix}carrinho WHERE id_usuario = :cliente";        
		// parametros
		$params = array(':cliente'=>$cliente);
		// executo a minha SQL
		$this->ExecuteSQL($query, $params);
		unset($_SESSION['PRO']);

	}

// 	function ReduzirEstoque($id){
		

		
// 		$produtos = new Produtos();
// 		$carrinho = new Carrinho();

// 		        $this->GetCarrinho();

// 		foreach ($produtos->GetItens() as $pro) {
// 			$ID = $pro['pro_id'];
//             $ESTOQUE  = $pro['pro_estoque'];
//             $QTD   = 1;


// 	}

// 		$estoque_atual = $ESTOQUE - $QTD;

//         $retorno = FALSE;
//         $query  = "UPDATE " . $this->prefix . "produtos ";
//         $query .= "SET pro_estoque = :estoque ";
//         $query .= "WHERE pro_id = :id";
    
//         $params = array(
//             ':id' => $id,
// 			':estoque' => $estoque_atual

//         );
		

    
//         $this->ExecuteSQL($query, $params);

    
//         $retorno = TRUE;
//         return $retorno;

// }



	

	 function LimparSessoes(){
        unset($_SESSION['PRO']);
        unset($_SESSION['PRO']['pro_id']);
        unset($_SESSION['PED']['pedido']);
        unset($_SESSION['PED']['ref']);


		$cliente = $_SESSION['CLI']['cli_id'];
		 $this->CarrinhoLimpar($cliente);
        unset($_SESSION['PRO']);
        unset($_SESSION['PRO']['cod']);
        unset($_SESSION['PRO']['pro_id']);
     }




}

 ?>