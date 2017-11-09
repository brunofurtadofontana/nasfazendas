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
    case 3:
        adicionarCategoria();
        break;
    case 4:
        adicionarSubCat();
        break;
    case 5:
        adicionarAnuncio();       
        break;
    case 6:
        alterar();
        break;
    case 7:
        excluirCat();
        break;
    case 8:
        excluirSubCat();
        break;
    case 9:
        editarSubCat();
        break;
    case 10:
        editarCat();
        break;
    
    default:
        # code...
        break;
}

function cadastraUsuarioCpf() {

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
										privilegio,
										usu_senha)
										VALUES(
										'$usu_email',
										'$usu_foneCel',
										'$usu_foneCom',
										'anunciante',
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

    if (!mysql_error()) {
        header("Location:../index.php?error=6");
    } else {
        header("Location:../index.php?error=5");
    }
}

function cadastraUsuarioCnpj() {

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
														'$usu_complemento',
														'$idUsuario')")or die(mysql_error());

    if (!mysql_error()) {
        header("Location:../index.php?error=6");
    } else {
        header("Location:../index.php?error=5");
    }
}

function adicionarCategoria() {
    $id = $_GET['id'];
    $nome = htmlspecialchars(trim($_POST['nome']));
    //$nome = "Atividade ".$nome;
    $res = mysql_query("INSERT INTO categoria(categoria_nome) VALUES( '$nome')")or die(mysql_error());
    if ($res) {
        echo header("location:../pages/categoria.php?sts=1");
    } else
        echo header("location:../pages/categoria.php?sts=2");
}



function adicionarSubCat() {
    $id = $_GET['id'];
    $sub = htmlspecialchars(trim($_POST['subcategoria']));
    $nome = htmlspecialchars(trim($_POST['nome']));
    //$nome = "Atividade ".$nome;
    $res = mysql_query("INSERT INTO subcategoria(subcat_nome, categoria_categoria_id) VALUES( '$nome','$sub')")or die(mysql_error());
    if ($res) {
        echo header("location:../pages/categoria.php?sts=1");
    } else
        echo header("location:../pages/categoria.php?sts=2");
}
function alterar(){
    $id = $_GET['id'];
    $email = htmlspecialchars(trim($_POST['email']));
    $nome = htmlspecialchars(trim($_POST['nome']));
    $fonecel = htmlspecialchars(trim($_POST['fone']));
    $fonecom = htmlspecialchars(trim($_POST['fonecom']));
    $cpf = htmlspecialchars(trim($_POST['cpf']));
    $cnpj = htmlspecialchars(trim($_POST['cnpj']));
    $fantasia = htmlspecialchars(trim($_POST['fantasia']));
    $senha = htmlspecialchars(trim(md5($_POST['senha'])));
    $cep = htmlspecialchars(trim($_POST['cep']));
    $endereco = htmlspecialchars(trim($_POST['rua']));
    $numero = htmlspecialchars(trim($_POST['numero']));
    $comp = htmlspecialchars(trim($_POST['complemento']));
    //$estado = htmlspecialchars(trim($_POST['estado']));
    //$cidade = htmlspecialchars(trim($_POST['cidade']));
    
                    
                    $dadosEditado = mysql_query("UPDATE usuario SET 
                                                        usu_email =  '$email',
                                                        usu_foneCel='$fonecel',
                                                        usu_foneCom = '$fonecom',
                                                        usu_senha = '$senha'
                                                  WHERE 
                                                        usu_id = '$id'")or die(mysql_error());

                    $dadosEditadoJur = mysql_query("UPDATE pessoa_jur SET 
                                                        pessoaJur_cnpj =  '$cnpj',
                                                        pessoa_jur_nomeFantasia='$fantasia'
                                                  WHERE 
                                                        usuario_usu_id = '$id'")or die(mysql_error());

                    $dadosEditadoFis = mysql_query("UPDATE pessoa_fisica SET 
                                                        pessoaFisica_cpf =  '$cpf',
                                                        pessoaFisica_nome='$nome'
                                                  WHERE 
                                                        usuario_usu_id = '$id'")or die(mysql_error());

                    $dadosEditadoEnd = mysql_query("UPDATE endereco SET 
                                                        endereco_rua =  '$rua',
                                                        endereco_cep='$cep',
                                                        endereco_numero = '$numero',
                                                        endereco_comp = '$comp'
                                                  WHERE 
                                                        usuario_usu_id = '$id'")or die(mysql_error());
                    

                    if(!mysql_error()){
                          
                          header("Location:../pages/usuario.php?error=0");
                          
                        }else{
                          
                          header("Location:../pages/usuario.php?error=1");
                            
                        }
                }
function excluirCat(){

        $exclui_id = $_GET['id'];

        mysql_query("DELETE FROM categoria WHERE  categoria_id = '$exclui_id'")or die(mysql_error());
        
        header("Location:../pages/categoria.php");

}
function excluirSubCat(){

        $exclui_idSub = $_GET['id'];

        $res = mysql_query("DELETE FROM subcategoria WHERE  subcat_id = '$exclui_idSub' ")or die(mysql_error());
        if($res){
           mysql_error();
        }
        
        header("Location:../pages/categoria.php");

}
function editarSubCat(){
        $editarNomeSubCat = $_POST['nomeSub'];
        $editarIdSubCat = $_POST['id'];
        $res = mysql_query("UPDATE subcategoria SET subcat_nome = '$editarNomeSubCat' WHERE subcat_id = '$editarIdSubCat'")or die(mysql_error());
        if($res){
           mysql_error();
        }
        header("Location:../pages/categoria.php");
}
function editarCat(){
        $editarNomeCat = $_POST['nome'];
        $editarIdCat = $_POST['id'];
        $res = mysql_query("UPDATE categoria SET categoria_nome = '$editarNomeCat' WHERE categoria_id = '$editarIdCat'")or die(mysql_error());
        if($res){
           mysql_error();
        }
        header("Location:../pages/categoria.php");
}




function adicionarAnuncio(){
	if(isset($_FILES['files'])){
    $errors= array();
    $file_name = md5(rand(1,999)).$_FILES['files']['name'][$key];
    $file_size =$_FILES['files']['size'][$key];
    $file_tmp =$_FILES['files']['tmp_name'][$key];
    $file_type=$_FILES['files']['type'][$key];
    $idUser = $_POST['id']; 
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $valor= $_POST['valor'];
    $data = date("YY/dd/mm");
    $dataFinal = $data+10;
    mysql_query("INSERT INTO anuncio(anuncio_titulo,
                                              anuncio_desc,
                                              anuncio_valor,
                                              anuncio_datainicial,
                                              anuncio_datafinal,
                                              anuncio_formPag,
                                              usuario_usu_id) 
                                  VALUES('$titulo',
                                         '$descricao',
                                         '$valor',
                                         '$data',
                                         '$dataFinal',
                                         '$data',
                                         '$idUser')")or die(mysql_error());
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		
        if($file_size > 5097152){
			$errors[]='File size must be less than 2 MB';
        }		
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"user_data/".$file_name);
            }else{									//rename the file if another one exist
                $new_dir="user_data/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }

             

             
             $res = mysql_query("select max(anuncio_id)as maior FROM anuncio")or die(mysql_error());
             $most = mysql_fetch_assoc($res);
             $maxIdAnuncio = $most['maior'];
             mysql_query("INSERT into img_produto(img_nome,
             									  img_dir,
                                                  anuncio_anuncio_id,
                                                  anuncio_usuario_usu_id)
             									  VALUES('$file_name',
             											  '$file_type',
                                                          '$maxIdAnuncio',
                                                          '$idUser')")or die(mysql_error());


            // mysql_query("INSERT INTO fotos(titulo,FILE_NAME,FILE_SIZE,FILE_TYPE,descricao,data) 
              //                  VALUES('$titulo','$file_name','$file_size','$file_type','$descricao','$data')")or die(mysql_error());			

        }else{
                print_r($errors);
        }
        
    }
	if(empty($error)){
		echo "Success";
       
        header("Location:../pages/anuncio.php");
	}
}
}
	
?>