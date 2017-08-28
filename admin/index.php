<?php
  error_reporting(0);
  $erro=$_GET['erro'];
  if(isset($erro)){
    switch ($erro) {
      case 0:
        echo"<div style='width:99%;height:30px;background:#0099cc;border-radius:10px;border:1px solid blue;color:#fff;font-family:Arial;margin:5px 5px;padding-top:10px;'><center>Cadastro efetuado com sucesso!!!</center></div>";
        break;
      case 1:
        echo"<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Erro ao fazer o Login!! Senha inválida</b></div>";
      break;
      case 2:
        echo"<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Erro ao fazer o Login!! Usuário inválido</b></div>";
      break;
      case 3:
          echo"<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Erro!! Você deve estar logado para acessar o conteúdo.</b></div>";
      break;
      case 4:
          echo"<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Você foi desconectado!</b></div>";
      break;
      default:
        echo"<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> <b>Algo estranho aconteceu!</b></div>";
        break;
   }
 }
?>
<html>
<head>
	<title>Gestão de Clientes</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/login.css">

	<!-- Latest compiled and minified JavaScript -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script type="text/javascript">
      $(document).ready(function() {
        var movementStrength = 55;
        var height = movementStrength / $(window).height();
        var width = movementStrength / $(window).width();
        $("#top-image").mousemove(function(e){
                  var pageX = e.pageX - ($(window).width() / 2);
                  var pageY = e.pageY - ($(window).height() / 2);
                  var newvalueX = width * pageX * -1 - 25;
                  var newvalueY = height * pageY * -1 - 50;
                  $('#top-image').css("background-position", newvalueX+"px     "+newvalueY+"px");
        });
     });

</script>
</head>
<body >
<div id="top-image"></div>
	<div class="container">
  
      <p>
        <center><img src="../images/logo.png" width="200" /></center>
      </p>
      <form class="form-signin" action="validaLog.php" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Usuário</label>
        <input name="usuario" type="email" id="inputEmail" class="form-control" placeholder="Usuário" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
        <div class="checkbox">
          
          <label>
            <a href="" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastre-se</a>
          </label>
          
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form>

    </div> <!-- /container -->
    <!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:5px 5px;padding-right:25px;">
     <div class="modal-header">
      <h5 class="modal-title">Cadastro usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <small>Tipo de cadastro</small>
        <form class="cadas" action="tratadados.php" method="post">
            <input type="radio" name="tipo" value="pessoafisica">Pessoa Física
            <input type="radio" name="tipo" value="pessoajuridica">Pessoa Jurídica <br>
            <div class="form-group">
              <input class="form-control" type="text" name="nome" placeholder="Nome" required="required" />
            </div>
            <div class="form-group">
              <input class="form-control" type="email" name="email" placeholder="Email" required="required"  />
            </div>
            <div class="row">
                <div class="col-6">
                  <input class="form-control" type="text" name="fone" placeholder="Telefone" required="required" />
                </div>
                <div class="col-6">
                  <input class="form-control" type="text" name="fonecom" placeholder="Telefone Comercial" required="required" />
                </div>
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="cpf" placeholder="CPF" required="required" />
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="cnpj" placeholder="CNPJ" required="required" />
            </div>
            
            <div class="form-group">
              <input class="form-control" type="password" name="senha" placeholder="Senha" required="required"  />
            </div>
            <div class="form-group">
              <input class="btn btn-success" type="submit" value="Cadastrar" />
            </div>
        </form>
    </div>
  </div>
</div>

</body>
</html>