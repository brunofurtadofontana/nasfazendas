<?php
    include("../files/conexao.php");
    session_start();
    require_once("../verifica.php");
    $email = $_SESSION['LOGIN_USUARIO'];
    $res = mysql_query("SELECT *from usuario as u JOIN pessoa_fisica as pf WHERE usu_email = '$email' AND u.usu_id = pf.usuario_usu_id " );
    $show = mysql_fetch_assoc($res);
    $nomePF = $show['pessoaFisica_nome'];
    $id = $show['usu_id'];
   // $nomeJUR = $show['pessoa_jur_nomeFantasia'];


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NAS FAZENDAS PAINEL</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background: #275b2f;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style="color:#fff;    ">Painel Admin NASFAZENDAS</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile "<?php  echo $nomePF; ?>"</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logoff.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Anúncios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="anuncio.php">Gerenciar Anúncios</a>
                                </li>
                                <li>
                                    <a href="relatorioAnuncio.php">Relatórios</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="categoria.php"><i class="fa fa-table fa-fw"></i> Categorias</a>
                        </li>
                        <li>
                            <a href="qualificar.php"><i class="fa fa-edit fa-fw"></i>Qualificações</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Financeiro<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="pagamentoEfetuado.php">Pagementos Efetuados</a>
                                </li>
                                <li>
                                    <a href="pagamentoAreceber.php">Pagementos a receber</a>
                                </li>
                                 <li>
                                    <a href="relatorioPagamento.php">Relatórios</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="favorito.php"><i class="fa fa-gittip fa-fw"></i>Meus Favoritos</a>
                           
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Usuários<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="usuario.php">Gerenciar Usuários</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Anúncio</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 col-md-6">
                   <center>
                        <button class="btn btn-large btn-success" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-cloud-upload fa-fw"></i> Cadastrar novo anúncio?
                        </button>
                   </center>
                    <label>Pagamento</label>
                    <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
                    <form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
                    <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
                    <input type="hidden" name="code" value="B96E83277979EA88840BBFA59371427A" />
                    <input type="hidden" name="iot" value="button" />
                    <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                    </form>
                    <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
                    <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
                 <form action="../files/Funcoes.php?funcao=5&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                            <label>Título do anúncio</label>
                            <input type="text" name="titulo" class="form-control"/>
                            <label>Descrição</label>
                            <textarea name="descricao" class="form-control"></textarea>
                            <label>Valor</label>
                            <input type="number" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor ="100" class="form-control currency" name="valor" placeholder="R$ Valor do produto">
                            <label>Categoria</label>
                            <select name="categoria" class="form-control">
                                <option>Escolha uma categoria</option>
                                <?php 
                                    $res = mysql_query("SELECT * from categoria")or die(mysql_error());
                                    while ($mostrar=mysql_fetch_assoc($res)) { 
                                        $cidade= $mostrar['categoria_nome'];
                                    ?>
                                        <option value="<?php echo $cidade?>"><?php echo $cidade; ?></option>
                                  <?php      
                                    }
                                ?>
                            </select>
                             <label>Escolha foto</label>
                            <div style="width:98%;height:150px;background-color: #f6f7f8;padding:10px 10px;margin:10px 10px;border:2px dashed #ccc; display:table;">
                                <br><br>
                                <center><input type="file"  name="files[]" id="imageURL" multiple /></center>
                            </div>
                            <label>Estado</label>
                            <select name="estado" class="form-control">
                                <option>Escolha um estado</option>
                                <?php 
                                    $res = mysql_query("SELECT * from tb_estados")or die(mysql_error());
                                    while ($mostrar=mysql_fetch_assoc($res)) { 
                                        $cidade= $mostrar['nome'];
                                    ?>
                                        <option value="<?php echo $cidade?>"><?php echo $cidade; ?></option>
                                  <?php      
                                    }
                                ?>
                            </select>
                            <label>cidade</label>
                            <select name="cidade" class="form-control">
                                <option>Escolha uma cidade</option>

                                <?php 
                                    $res = mysql_query("SELECT * from tb_cidades")or die(mysql_error());
                                    while ($mostrar=mysql_fetch_assoc($res)) { 
                                        $cidade= $mostrar['nome'];
                                    ?>
                                        <option value="<?php echo $cidade?>"><?php echo $cidade; ?></option>
                                  <?php      
                                    }
                                ?>
                            </select>
                            <input type="hidden" name="id" value="<?php echo $id ?>"/>
                            <input type="submit" name="Enviar" class="btn btn-success">
                        </form>

                        <!-- [[ LISTANDO ANUNCiOS ]]-->
                        <hr>
                        <h2>Buscar anúncios</h2>
                        <hr>
                        <form action="" method="post">
                            <input type="text" class="form-control" name="buscar" placeholder="Titulo,valor,data..." required="required"><br>
                            <button type="submit" value="buscar" class="btn btn-success">Buscar</button>
                        </form>
                        <?php
                            if(!isset($_POST['buscar'])){
                        ?>
                        <hr>
                        <h2>Últimos anúncios</h2>
                        <hr>
                        <table class="table table-bordered" style="font-size:14px;margin-top:20px;">
                        <tr>
                            <th style="text-align:center;">#id</th>
                            <th style="text-align:center;">Titulo</th>
                            <th style="text-align:center;">Descrição</th>
                            <th style="text-align:center;">Preço</th>
                            <th style="text-align:center;" >Data Postagem</th>
                            <th style="text-align:center;">Data Expira</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Total Imagens</th>
                            <th style="text-align:center;">Ação</th>
                        </tr>
                        <?php 

                            $res =mysql_query("SELECT *FROM anuncio LIMIT 20")or die(mysql_error());
                            while($mostrar = mysql_fetch_assoc($res)):
                                $id = $mostrar['anuncio_id'];
                                $titulo = $mostrar['anuncio_titulo'];
                                $desc = $mostrar['anuncio_desc'];
                                $valor = $mostrar['anuncio_valor'];
                                $data = $mostrar['anuncio_datainicial'];
                                $data = date('d-m-Y', strtotime($data));
                                $dataFinal = $mostrar['anuncio_datafinal'];
                                $dataFinal = date('d-m-Y', strtotime($dataFinal));
                                $forma = $mostrar['anuncio_formPag'];

                                $resImg = mysql_query("SELECT COUNT(*) as total FROM img_produto WHERE anuncio_anuncio_id = '$id'")or die(mysql_error());
                                $mostrarImg = mysql_fetch_assoc($resImg);
                                $totalImg = $mostrarImg['total'];


                        ?>
                         <tr>
                            <th > <?php echo $id ?> </th>
                            <th > <?php echo $titulo ?> </th>
                            <th > <?php echo $desc; ?> </th>
                            <th > <?php echo $valor;  ?> </th> 
                            <th > <?php echo $data; ?> </th>
                            <th > <?php echo $dataFinal; ?> </th>
                            <th > <?php echo $forma; ?> </th>
                            <th > <?php echo "Imagens ( " .$totalImg." )"; ?> </th>
                            <th style="text-align:center;">
                                <a href="../files/editar.php?id=<?php echo $id; ?>" data-toggle="modal" title="Editar">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>
                                <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" title="Excluir">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </a>
                                <a href="home.php?go=info&id=<?php echo $id; ?>" data-toggle="modal" data-target=".bd-info-modal-lg" title="Mais Informações">
                                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                </a>
                               
                            </th>
                        </tr>
                        <?php 
                            endwhile;
                        }else{
                             echo "<small>Nunhum resultado encontrado</small>"; ?>
                            <br>
                            <a href="anuncio.php"><button class="btn btn-primary" >Voltar</button></a>
                       <?php }

                         ?>

                </div><!-- /#col-lg12 -->
            </div> <!-- /#row -->
                   
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
