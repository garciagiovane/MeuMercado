<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/meu-mercado/view/cadastro-produtos.php":
			$CURRENT_PAGE = "Cadastro de Produtos"; 
			$PAGE_TITLE = "Cadastro de Produtos";
			break;
		case "/meu-mercado/view/resposta.php":
			$CURRENT_PAGE = "Resposta"; 
			$PAGE_TITLE = "Resposta";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Meu Mercado";
			
	}
?>