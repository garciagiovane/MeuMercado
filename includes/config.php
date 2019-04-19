<?php
if ($_SERVER["SCRIPT_NAME"] != "/view/index.php" && $_SERVER["SCRIPT_NAME"] != "/view/consulta-produtos.php" && $_SERVER["SCRIPT_NAME"] != "/view/login.php" && $_SERVER["SCRIPT_NAME"] != "/view/resposta.php") {
	//if ($_SERVER["SCRIPT_NAME"] != "/meu-mercado/view/index.php" && $_SERVER["SCRIPT_NAME"] != "/meu-mercado/view/consulta-produtos.php" && $_SERVER["SCRIPT_NAME"] != "/meu-mercado/view/login.php" && $_SERVER["SCRIPT_NAME"] != "/meu-mercado/view/resposta.php") {
	if (!isset($_SESSION["usuarioLogado"])) { 
		$return_url = $_SERVER["SCRIPT_NAME"];
//echo $_SERVER["SCRIPT_NAME"];
		header("Location: login.php?return_url=$return_url");
	}
}
$h1 = "Meu mercatto";
switch ($_SERVER["SCRIPT_NAME"]) {
	case "/meu-mercado/view/cadastro-produtos.php":
		$CURRENT_PAGE = "Cadastro de Produtos";
		$PAGE_TITLE = "Cadastro de Produtos";
		$h1 = $h1;
		break;
	case "/meu-mercado/view/resposta.php":
		$CURRENT_PAGE = "Resposta";
		$PAGE_TITLE = "Resposta";
		$h1 = $h1;
		break;
	case "/meu-mercado/view/consulta-produtos.php":
		$CURRENT_PAGE = "Consulta de Produtos";
		$PAGE_TITLE = "Consulta de Produtos";
		$h1 = $h1;
		break;
	case "/meu-mercado/view/excluir-produtos.php":
		$CURRENT_PAGE = "Exclusão de produtos";
		$PAGE_TITLE = "Exclusão de produtos";
		$h1 = $h1;
		break;
	case "/meu-mercado/view/cadastro-usuario.php":
		$CURRENT_PAGE = "Cadastro de Usuários";
		$PAGE_TITLE = "Cadastro de Usuários";
		$h1 = $h1;
		break;
	case "/meu-mercado/view/login.php":
		$CURRENT_PAGE = "Login";
		$PAGE_TITLE = "Login";
		$h1 = $h1;
		break;
	default:
		$CURRENT_PAGE = "Index";
		$PAGE_TITLE = "Meu Mercatto";
		$h1 = $h1;
}
