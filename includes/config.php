<?php
$h1 = "PlenosMarket";

if ($_SERVER["SERVER_NAME"] == "localhost") {
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/meu-mercado/view/alterar-produto.php":
		case "/meu-mercado/view/alterarusuario.php":
		case "/meu-mercado/view/cadastro-produtos.php":
		case "/meu-mercado/view/alterar-produto.php":
		case "/meu-mercado/view/consulta-produtos.php":
		case "/meu-mercado/view/busca-vendas.php":

			if (!isset($_SESSION["usuarioLogado"])) {
				$return_url = $_SERVER["SCRIPT_NAME"];
				header("Location: login.php?return_url=$return_url");
			}
			break;
		case "/meu-mercado/view/edicaoadm.php":
			if (!isset($_SESSION["usuarioLogado"])) {
				$return_url = $_SERVER["SCRIPT_NAME"];
				header("Location: login.php?return_url=$return_url");
			} else {
				$userEncontrado = $_SESSION["usuarioLogado"];
				$nome = $userEncontrado[0];
				$codigo = $userEncontrado[3];

				if ($codigo != 1000) {
					header("Location: index.php");
				}
			}
			break;

		default:
			break;
	}

	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/meu-mercado/view/cadastro-produtos.php":
			$lead = "Cadastro de Produtos";
			$PAGE_TITLE = "Cadastro de Produtos";
			$h1;
			break;
		case "/meu-mercado/view/resposta.php":
			$lead = "Resposta";
			$PAGE_TITLE = "Resposta";
			$h1;
			break;
		case "/meu-mercado/view/consulta-produtos.php":
			$lead = "Consulta de Estoque";
			$PAGE_TITLE = "Consulta de Produtos";
			$h1;
			break;
		case "/meu-mercado/view/excluir-produtos.php":
			$lead = "Exclusão de produtos";
			$PAGE_TITLE = "Exclusão de produtos";
			$h1;
			break;
		case "/meu-mercado/view/cadastro-usuario.php":
			$lead = "Cadastro de Usuários";
			$PAGE_TITLE = "Cadastro de Usuários";
			$h1;
			break;
		case "/meu-mercado/view/login.php":
			$lead = "Login";
			$PAGE_TITLE = "Login";
			$h1;
			break;
		case "/meu-mercado/view/venda.php":
			$lead = "Escolha seu produto";
			$PAGE_TITLE = "Venda";
			$botaoAnular = "Cancelar";
			$botaoCancelar = "Comprar";
			$op = "10";
			$h1;
			break;
		case "/meu-mercado/view/busca-vendas.php":
			$lead = "Colsultar vendas";
			$PAGE_TITLE = "Vendas";
			$h1;
			$botaoAnular = "Cancelar operação";
			$botaoCancelar = "Cancelar Venda";
			$op = "12";
			break;
		default:
			$lead = "Escolha sua opção";
			$PAGE_TITLE = "PlenosMarket";
			$h1;
	}
} else {
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/view/alterar-produto.php":
		case "/view/alterarusuario.php":
		case "/view/cadastro-produtos.php":
		case "/view/alterar-produto.php":
		case "/view/consulta-produtos.php":
		case "/view/busca-vendas.php":

			if (!isset($_SESSION["usuarioLogado"])) {
				$return_url = $_SERVER["SCRIPT_NAME"];
				header("Location: login.php?return_url=$return_url");
			}
			break;
		case "/view/edicaoadm.php":
			if (!isset($_SESSION["usuarioLogado"])) {
				$return_url = $_SERVER["SCRIPT_NAME"];
				header("Location: login.php?return_url=$return_url");
			} else {
				$userEncontrado = $_SESSION["usuarioLogado"];
				$nome = $userEncontrado[0];
				$codigo = $userEncontrado[3];

				if ($codigo != 1000) {
					header("Location: index.php");
				}
			}
			break;

		default:
			break;
	}
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/view/cadastro-produtos.php":
			$lead = "Cadastro de Produtos";
			$PAGE_TITLE = "Cadastro de Produtos";
			$h1;
			break;
		case "/view/resposta.php":
			$lead = "Resposta";
			$PAGE_TITLE = "Resposta";
			$h1;
			break;
		case "/view/consulta-produtos.php":
			$lead = "Consulta de Estoque";
			$PAGE_TITLE = "Consulta de Estoque";
			$h1;
			break;
		case "/view/excluir-produtos.php":
			$lead = "Exclusão de produtos";
			$PAGE_TITLE = "Exclusão de produtos";
			$h1;
			break;
		case "/view/cadastro-usuario.php":
			$lead = "Cadastro de Usuários";
			$PAGE_TITLE = "Cadastro de Usuários";
			$h1;
			break;
		case "/view/login.php":
			$lead = "Login";
			$PAGE_TITLE = "Login";
			$h1;
			break;
		case "/view/venda.php":
			$lead = "Escolha seu produto";
			$PAGE_TITLE = "Venda";
			$botaoAnular = "Cancelar";
			$botaoCancelar = "Comprar";
			$op = "10";
			$h1;
			break;
		case "/view/busca-vendas.php":
			$lead = "Colsultar vendas";
			$PAGE_TITLE = "Vendas";
			$h1;
			$botaoAnular = "Cancelar operação";
			$botaoCancelar = "Cancelar Venda";
			$op = "12";
			break;
		default:
			$lead = "Escolha sua opção";
			$PAGE_TITLE = "PlenosMarket";
			$h1;
	}
}
