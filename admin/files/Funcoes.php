<?php
		include("conexao.php");

$funcao = $_GET['funcao'];

switch ($funcao) {
	case 1:
		cadastraUsuarioCpf();
		break;
	case 2:
		cadastraUsuarioCnpj();
		break;
	default:
		# code...
		break;
}
function cadastraUsuarioCpf(){

		$pessoaFisica_nome = htmlspecialchars(trim($_POST['nome']));
		$usu_email = htmlspecialchars(trim($_POST['email']));
		$usu_foneCel = htmlspecialchars(trim($_POST['fone']));
		$usu_foneCom = htmlspecialchars(trim($_POST['fonecom']));
		$pessoaFisica_cpf = htmlspecialchars(trim($_POST['cpf']));
		//$pessoaJur_cnpj = htmlspecialchars(trim($_POST['cnpj']));
		//$pessoa_jur_nomeFantasia = htmlspecialchars(trim($_POST['fantasia']));
		$usu_senha = htmlspecialchars(trim(md5($_POST['senha'])));
		$usu_cep = htmlspecialchars(trim($_POST['cep']));
		$usu_endereco = htmlspecialchars(trim($_POST['rua']));
		$usu_numero = htmlspecialchars(trim($_POST['numero']));
		$usu_complemento = htmlspecialchars(trim($_POST['complemento'])); 
		//$usu_estado = htmlspecialchars(trim($_POST['estado']));
		//$usu_cidade = htmlspecialchars(trim($_POST['cidade']));

		$dadosUser = mysql_query("INSERT INTO usuario(
										usu_email,
										usu_foneCel,
										usu_foneCom,
										usu_senha)
										VALUES(
										'$usu_email',
										'$usu_foneCel',
										'$usu_foneCom',
										'$usu_senha')")or die(mysql_error());

		$res = mysql_query("SELECT max(usu_id)as maior from usuario")or die(mysql_error());
		$show = mysql_fetch_assoc($res);
		$idUsuario = $show['maior'];
		
		$dadosCpf = mysql_query("INSERT INTO pessoa_fisica(
														   pessoaFisica_cpf,
										 				   pessoaFisica_nome,
														   usuario_usu_id)
														   VALUES(
														   '$pessoaFisica_cpf',
														   '$pessoaFisica_nome',
														   '$idUsuario')")or die(mysql_error());

		$dadosEndereco = mysql_query("INSERT INTO endereco(
															endereco_rua,
															endereco_cep,
															endereco_numero,
															endereco_comp,
															usuario_usu_id)
															VALUES(
															'$usu_endereco',
															'$usu_cep',
															'$usu_numero',
															'usu_complemento',
															'$idUsuario')")or die(mysql_error());
	
		if(!mysql_error()){
			header("Location:../index.php?error=6");	
		}else{
			header("Location:../index.php?error=5");
		}
		
}
function cadastraUsuarioCnpj(){

		//$pessoaFisica_nome = htmlspecialchars(trim($_POST['nome']));
		$usu_email = htmlspecialchars(trim($_POST['email']));
		$usu_foneCel = htmlspecialchars(trim($_POST['fone']));
		$usu_foneCom = htmlspecialchars(trim($_POST['fonecom']));
		//$pessoaFisica_cpf = htmlspecialchars(trim($_POST['cpf']));
		$pessoaJur_cnpj = htmlspecialchars(trim($_POST['cnpj']));
		$pessoaJur_nomeFantasia = htmlspecialchars(trim($_POST['fantasia']));
		$usu_senha = htmlspecialchars(trim(md5($_POST['senha'])));
		$usu_cep = htmlspecialchars(trim($_POST['cep']));
		$usu_endereco = htmlspecialchars(trim($_POST['rua']));
		$usu_numero = htmlspecialchars(trim($_POST['numero']));
		$usu_complemento = htmlspecialchars(trim($_POST['complemento'])); 
		//$usu_estado = htmlspecialchars(trim($_POST['estado']));
		//$usu_cidade = htmlspecialchars(trim($_POST['cidade']));

		$dadosUser = mysql_query("INSERT INTO usuario(
										usu_email,
										usu_foneCel,
										usu_foneCom,
										usu_senha)
										VALUES(
										'$usu_email',
										'$usu_foneCel',
										'$usu_foneCom',
										'$usu_senha')")or die(mysql_error());

		$res = mysql_query("SELECT max(usu_id)as maior from usuario")or die(mysql_error());
		$show = mysql_fetch_assoc($res);
		$idUsuario = $show['maior'];
		
		$dadosCpf = mysql_query("INSERT INTO pessoa_jur(
														   pessoaJur_cnpj,
										 				   pessoa_jur_nomeFantasia,
														   usuario_usu_id)
														   VALUES(
														   '$pessoaJur_cnpj',
														   '$pessoaJur_nomeFantasia',
														   '$idUsuario')")or die(mysql_error());

		$dadosEndereco = mysql_query("INSERT INTO endereco(
															endereco_rua,
															endereco_cep,
															endereco_numero,
															endereco_comp,
															usuario_usu_id)
															VALUES(
															'$usu_endereco',
															'$usu_cep',
															'$usu_numero',
															'usu_complemento',
															'$idUsuario')")or die(mysql_error());
	
		if(!mysql_error()){
			header("Location:../index.php?error=6");	
		}else{
			header("Location:../index.php?error=5");
		}
		
}
?>