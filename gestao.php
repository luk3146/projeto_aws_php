<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("conecta.php");
require_once("logica-usuario.php");
require_once("mostra-alerta.php");
require_once("banco-lanchonete.php");
require_once("class/Lanchonete.php");
require_once("banco-usuario.php");
verificaAdm();?>
<html>
	<head>
	<meta charset="utf-8">
		<?php require_once("java script/scripts_js.php");?>
		<?php require_once("style css/style_css.php");?>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href='style css/menu_css.css' type='text/css' rel='stylesheet'>
		<script type='text/javascript' src='java script/script.js'></script>

		<title>Mack Cupons</title>

	</head>
	<body class="corpo">
		
		<nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a  data-toggle="tooltip" data-placement="bottom" title="Inicio" class="navbar-brand" href="gestao.php">
			    <img src="imagens/mack.png" width="27" height="27">
			    ackCupons Gestão
		  	</a>

		  	<div data-toggle="tooltip" data-placement="bottom" title="Inicio">
				<button class="navbar-toggler" type="button" 
					data-toggle="collapse" data-target="#navbarSupportedContent" 
					aria-controls="navbarSupportedContent" aria-expanded="false" 
					aria-label="Toggle navigation">
					<i class="material-icons"  data-toggle="tooltip" data-placement="bottom" title="Menu">view_agenda</i>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown" >
						<a class="nav-link" href="#"  
							id="navbarDropdown" role="button" data-toggle="dropdown" 
							aria-haspopup="true" aria-expanded="false" >
							<i data-toggle="tooltip" data-placement="bottom" title="Listar Usuarios" class="material-icons">assignment_ind</i><span class="sr-only">(current)</span>
						</a>
						<?php
							if(!admEstaLogado()){
								sem_sessao();
							} else { ?>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="gestao.php?tipo_mackenzista=aluno" data-toggle="tooltip" data-placement="right" title="Listar Alunos.">
									<strong><i class="material-icons">account_box</i></strong> Mackenzistas
								</a>
								<a class="dropdown-item" href="gestao.php?tipo_mackenzista=colaborador" data-toggle="tooltip" data-placement="right" title="Listar Professores.">
									<strong><i class="material-icons">school</i></strong> Professores
								</a>
								<div class="dropdown-divider"></div>
							</div>
						<?php } ?>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link" href="#"  
							id="navbarDropdown" role="button" data-toggle="dropdown" 
							aria-haspopup="true" aria-expanded="false">
							<i class="material-icons">restaurant</i>
						</a>
						<?php
							if(!admEstaLogado()){
								sem_sessao();
							} else {?>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="gestao.php?cupom=sim">
								 	Listar Lanchonetes cadastradas
								</a>
							</div>
						<?php } ?>	
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link" href="#"  
							id="navbarDropdown2" role="button" data-toggle="dropdown" 
							aria-haspopup="true" aria-expanded="false">
							<i  data-toggle="tooltip" data-placement="right" title="Gerencimento" <i class="material-icons">supervised_user_circle</i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
							<a class="dropdown-item" href="http://18.188.27.136/" 
								data-toggle="tooltip" 
								data-placement="right" title="Acessar PHPMYADMIN - AMAZOM" target="_blank">
								<div class="row" align="center">
							    	<div class="col-md-12">
							      		<img src="imagens/phpadmin.png" width="80">
							      		<br>
							      		<strong>Usuario:</strong> root<br>
							      		<strong>Senha:</strong> admin
							      	</div>
							  	</div>
							</a>
							<hr>
							<a class="dropdown-item" href="gestao.php?logs=sim" data-toggle="tooltip" data-placement="right" title="Acessar Logs">
								<div class="row" align="center">
							    	<div class="col-md-12">
							      		Logs
							      	</div>
							  	</div>
							</a>	
						</div>
					</li>

					<?php
					if(!admEstaLogado()){?>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#"
							data-toggle="modal" data-target="#adm">
							<i  data-toggle="tooltip" data-placement="bottom" title="Acesso administrativo" class="material-icons">supervisor_account
							</i>
						</a>
						<!-- LOGAR -->
						<div class="formularios modal fade" id="adm" role="dialog" aria-labelledby="adm" aria-hidden="true">
						  	<div class="modal-dialog modal-dialog-centered" role="document">
						    	<div class="modal-content">
						      		<div id="adm" class="modal-header" style="padding: 4% 1% 1% 30%;background-color: #DCDCDC ">
										<p style="font-family: 'Audiowide', cursive;font-size: 150%;text-align: center;">
											 MackCupons
										</p>
						      		</div>
							      	<div class="modal-body">
									  	<div class="container" style="font-family: 'Gentium Book Basic', serif;">
									 	 	<h2>Seja bem vindo!</h2>
									 	 	<hr>
										  	<form action="login.php" method="post">
										    	<div class="form-group">
										      		<label for="identificador">TIA / DRT</label>
										      		<input type="text" class="form-control" id="identificador" placeholder="DRT / TIA" name="identificador">
										    	</div>
										    	<div class="form-group">
										      		<label for="senha">Senha</label>
										      		<input type="password" class="form-control" id="senha" placeholder="senha" name="senha">
										    	</div>
										    	<button type="submit" class="btn btn-primary btn-block">
										    		<h5 style="color: black">Entrar</h5>
									    		</button>
										  		<input type="hidden" name="acesso" value="logar_adm">
										  	</form>
										</div>    
							      	</div>
							      	<div class="modal-footer" style="background-color: #DCDCDC ">
							        	<button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Fechar</button>
							      	</div>
						      	</div>
					    	</div>
						</div>
					</li>
					<?php } ?>
					
				</ul>
				
				<?php
					if(admEstaLogado()){?>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          	<h2 >
				          		<a href="logout.php" style="color: red">
				          			<i data-toggle="tooltip" data-placement="bottom" title="Deslogar" class="material-icons">
				          				power_settings_new
				          			</i>
				          		</a>
				          	</h2>
				        </button>
				<?php } ?>
			</div>
		</nav>
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<style>
				#carouselExampleControls {
					font-family: 'Anton', sans-serif;
					text-align: center;
					padding-top: 1%;
					margin: 2px;
					background-color: #DCDCDC;	
				}
				.carousel-item {
					padding-top: 2%;
				}

			</style>
			<img src="imagens/mack.png" width="60" height="60"><br>
			<p style="font-family: 'Audiowide', cursive;font-size: 150%">
				MackCupons Gestão
			</p>
			<?php if($_GET["cupom"] == "" and $_GET["tipo_mackenzista"] == ""){?>
		  	<div style="background-color: white;" class="carousel-inner">
		    	<div class="carousel-item active">
			   		Você está logado como <?=$_SESSION["adm_logado"];?>
			  	</a>
		    	</div>
		  	</div>
		  	<?php } ?>
		</div>

		<div style="text-align: center;">
			<?php mostraAlerta("success");  mostraAlerta("danger"); ?>
		</div>

		<?php if($_GET["cupom"] != ""){?>
		<div class="lanches">
			<div class="container">
				
				<div class="table-responsive">   

					<div style="padding-left: 98%;float: right">
						<a href="exportar_lojas.php" target="_blank" >
							<img src="imagens/ex.png" width="20" 
							data-toggle="tooltip" data-placement="left" title="Exportar Dados para Planilha" />
						</a>
					</div>
					<a style="float: left;" data-toggle="modal" data-target="#amyModal">
				  		<i data-toggle="tooltip" data-placement="left" title="Adicionar Nova Lanchonete" class="material-icons">queue </i>
					</a>
					<!-- The Modal -->
					<div class="modal fade" id="amyModal">
					  	<div class="modal-dialog">
					    	<div class="modal-content">
					    		<form method="POST" action="Dao/lojaDao.php" enctype="multipart/form-data">
								      <!-- Modal Header -->
							      	<div class="modal-header">
								        <h4 class="modal-title">Inserir dados para Lanchonete abaixo:</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
							      	</div>

							      	<!-- Modal body -->
						      		<div class="modal-body">
									  	<div class="form-group">
										    <label for="nome">Nome Lanchonete:</label>
										    <input type="text" class="form-control" name="nome" placeholder="Nome fantasia">
									  	</div>
									  	<div class="form-group">
										    <label for="cupom">QTD Cupons</label>
										    <select class="form-control" name="cupom">
											  	<option value="1">1</option> 
											  	<option value="2">2</option>
											  	<option value="3">3</option>
											</select>
									  	</div>
									  	<div class="form-group">
										    <label for="cupons">Breve Descrição</label>
										    <textarea class="form-control" name="descricao" rows="3">

										    </textarea>
									  	</div>
									  	<div class="form-group">
										    <label>Imagem da Loja</label>
										    <input type="file" name="arquivo" class="form-control-file">
									  	</div>
							      	</div>
							      	<!-- Modal footer -->
							      	<div class="modal-footer">
							        	<input type="submit" class="btn btn-success">
							        	<input type="hidden" name="create" value="sim">
							        	<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
							      	</div>
						      	</form>
					    	</div>
					  	</div>
					</div>

					<table class="table table-bordered"">
					  <thead>

					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Lanchonete</th>
					      <th scope="col">Descrição</th>
					      <th scope="col">Cupoms</th>
					      <th scope="col">Editar</th>
					      <th scope="col">Deletar</th>
					    </tr>
					  </thead>
						<?php

						
						if($_GET["cupom"] != ""){
							$restaurantes = listaLanchonetes($conexao);
							foreach($restaurantes as $lanchonete) {
						?>
					  <tbody>
					    <tr style="text-align: center;">
					      <th scope="row"><?=$lanchonete->getId_lanchonete()?></th>
					      <td><img 
					      	data-toggle="tooltip" data-placement="right" title="<?=utf8_encode($lanchonete->getNome())?>" 
					      	class="img-responsive" src="imagens/<?=$lanchonete->getId_lanchonete()?>.png" width="30"></td>
					      <td><?php echo utf8_encode($lanchonete->getDescricao())?></td>
					      <td>

					      		<a data-toggle="modal" data-target="#5<?=utf8_encode($lanchonete->getId_lanchonete())?>myModal">
							  		<i data-toggle="tooltip" data-placement="top" title="Editar Cupons" <i class="material-icons">
																confirmation_number
																</i>
								</a>
								<div class="modal fade" id="5<?=$lanchonete->getId_lanchonete()?>myModal">
							  	<div class="modal-dialog">
							    	<div class="modal-content">
							    		<form method="POST" action="Dao/lojaDao.php">
										      <!-- Modal Header -->
									      	<div class="modal-header">
										        <h4 class="modal-title">Insira novos cupons:</h4>
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
									      	</div>

									      	<!-- Modal body -->
								      		<div class="modal-body">
											  	<div class="form-group">
												    <label for="nome">Nome Lanchonete:</label>
												    <input type="text" class="form-control" name="nome" value="<?=utf8_encode($lanchonete->getNome())?>">
											  	</div>
											  	<?php


											  	?>
											  	<div class="form-group">
												    <label for="cupons">Insira os cupons abaixo.</label><br>
												   	CUPOM 1<textarea class="form-control" 
												   		rows="1" name="descricao_cupom1" placeholder="CUPOM 1"></textarea><hr>
												   	CUPOM 2<textarea class="form-control" 
												   		rows="1" name="descricao_cupom2" placeholder="CUPOM 2"></textarea><hr>
												  	CUPOM 3<textarea class="form-control" 
												   		rows="1" name="descricao_cupom3" placeholder="CUPOM 3"></textarea>
											  	</div>
									      	</div>
									      	<!-- Modal footer -->
									      	<div class="modal-footer">
									      		<input type="hidden" name="id_lanchonete" value="<?=utf8_encode($lanchonete->getId_lanchonete())?>">
									        	<input type="submit" class="btn btn-success">
									        	<input type="hidden" name="inserir_cupons" value="sim">
									        	<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
									      	</div>
								      	</form>
							    	</div>
							  	</div>
							</div>
					      	</td>
					      <td>
							<a data-toggle="modal" data-target="#<?=utf8_encode($lanchonete->getId_lanchonete())?>myModal">
						  		<i data-toggle="tooltip" data-placement="top" title="Editar Lanchonete" <i class="material-icons">build</i>
							</a>
							<!-- The Modal -->
							<div class="modal fade" id="<?=$lanchonete->getId_lanchonete()?>myModal">
							  	<div class="modal-dialog">
							    	<div class="modal-content">
							    		<form method="POST" action="Dao/lojaDao.php">
										      <!-- Modal Header -->
									      	<div class="modal-header">
										        <h4 class="modal-title">Editar dados da Lanchonete abaixo:</h4>
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
									      	</div>

									      	<!-- Modal body -->
								      		<div class="modal-body">
											  	<div class="form-group">
												    <label for="nome">Nome Lanchonete:</label>
												    <input type="text" class="form-control" name="nome" value="<?=utf8_encode($lanchonete->getNome())?>">
											  	</div>
											  	<div class="form-group">
												    <label for="cupons">QTD Cupons</label>
												    <select class="form-control" name="cupom" disabled="disabled">
													  	<option value="1">1</option> 
													  	<option value="2">2</option>
													  	<option selected="<?=utf8_encode($lanchonete->getCupom())?>" value="<?=utf8_encode($lanchonete->getCupom())?>" value="3">3</option>
													</select>
											  	</div>
											  	<div class="form-group">
												    <label for="cupons">Breve Descrição</label>
												    <textarea class="form-control" name="descricao" value="<?=trim(utf8_encode($lanchonete->getDescricao()))?>" rows="3">
												    	<?=utf8_encode($lanchonete->getDescricao())?>
												    </textarea>
											  	</div>
									      	</div>
									      	<!-- Modal footer -->
									      	<div class="modal-footer">
									      		<input type="hidden" name="id_lanchonete" value="<?=utf8_encode($lanchonete->getId_lanchonete())?>">
									        	<input type="submit" class="btn btn-success">
									        	<input type="hidden" name="update" value="sim">
									        	<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
									      	</div>
								      	</form>
							    	</div>
							  	</div>
							</div>
					      </td>
					      <td style="text-align: center;">
					      	<a style="color: red" data-toggle="modal" data-target="#d<?=utf8_encode($lanchonete->getId_lanchonete())?>myModal">
						  		<i data-toggle="tooltip" data-placement="top"
						  		 title="Deletar Lanchonete" class="material-icons">delete_forever</i>
							</a>
							<div class="modal fade" id="d<?=$lanchonete->getId_lanchonete()?>myModal">
							  	<div class="modal-dialog">
							    	<div class="modal-content">
							    		<form method="POST" action="Dao/lojaDao.php">
										      <!-- Modal Header -->
									      	<div class="modal-header">
										        <h4 class="modal-title" style="color: red">Tem certeza que ira deletar a Lanchonete abaixo?</h4>
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
									      	</div>

									      	<!-- Modal body -->
								      		<div class="modal-body">
											  	<div class="form-group">
												    <label for="nome">Nome Lanchonete:</label>
												    <input type="text" class="form-control" name="nome" value="<?=utf8_encode($lanchonete->getNome())?>">
											  	</div>
											  	<div class="form-group">
												    <label for="cupons">QTD Cupons</label>
												    <select class="form-control" name="cupom">
													  	<option value="1">1</option> 
													  	<option value="2">2</option>
													  	<option value="3">3</option>
													  	<option value="4">4</option>
													  	<option value="5">5</option>
													  	<option value="6">6</option>
													  	<option value="7">7</option>
													  	<option  selected="<?=utf8_encode($lanchonete->getCupom())?>" value="<?=utf8_encode($lanchonete->getCupom())?>">8</option>
													</select>
											  	</div>
											  	<div class="form-group">
												    <label for="cupons">Breve Descrição</label>
												    <textarea class="form-control" name="descricao" value="<?=trim(utf8_encode($lanchonete->getDescricao()))?>" rows="3">
												    	<?=utf8_encode($lanchonete->getDescricao())?>
												    </textarea>
											  	</div>
									      	</div>
									      	<!-- Modal footer -->
									      	<div class="modal-footer">
									      		<input type="hidden" name="id_lanchonete" value="<?=utf8_encode($lanchonete->getId_lanchonete())?>">
									        	<input type="submit" class="btn btn-danger">
									        	<input type="hidden" name="delete" value="sim">
									        	<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									      	</div>
								      	</form>
							    	</div>
							  	</div>
							</div>
					      </td>
							  <?php } } ?>
					    </tr>
					  </tbody>
					</table>
					<br>
				</div>
			</div>
		</div>
		<?php } ?>

		<?php if($_GET["tipo_mackenzista"] != ""){?>
		<div class="lanches">
			<div class=" table-responsive">
			<div class="container">
				<a href="exportar_mackenzistas.php?mackenzista=<?=$_GET["tipo_mackenzista"]?>" target="_blank" ><img src="imagens/ex.png" width="20" 
					data-toggle="tooltip" data-placement="left" title="Exportar Dados para Planilha" /></a>
				<table class="table table-bordered">
				  <thead>

				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Nome</th>
				      <th scope="col">Tipo Mackenzista</th>
				      <th scope="col">ADM</th>
				      <th scope="col">Identificador</th>
				      <th scope="col">Acessos</th>
				    </tr>
				  </thead>
					<?php

					if($_GET["tipo_mackenzista"] != ""){
						$usuarios = listaUsuarios($conexao);
						foreach($usuarios as $usuario) {
							if($_GET["tipo_mackenzista"] == $usuario["tipo_mackenzista"]){
					?>
				  <tbody>
				    <tr>
				      <td><?=$usuario["id"]?></td>
				      <td><?=$usuario["nome"]?></td>
				      <td><?=$usuario["tipo_mackenzista"];?></td>
				      <td><?=$usuario["adm"];?></td>
				      <td><?=$usuario["identificador"];?></td>
				      <td>
						<a data-toggle="modal" data-target="#<?=$usuario["identificador"]?>myModal">
					  		<i data-toggle="tooltip" data-placement="right" title="Alterar Perfil" class="material-icons">supervisor_account</i>
						</a>
						<!-- The Modal -->
						<div class="modal fade" id="<?=$usuario["identificador"]?>myModal">
						  	<div class="modal-dialog">
						    	<div class="modal-content">
						    		<form method="POST" action="Dao/lojaDao.php">
									      <!-- Modal Header -->
								      	<div class="modal-header">
									        <h4 class="modal-title">Acessos:</h4>
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      	</div>
								      	<?php
								      	if($_SESSION["identificador"] == $usuario["identificador"]){?>

								      		<div class="modal-body">
								      			<div class="form-group">
								      				<div class="alert-danger">Você não pode alterar o seu tipo de acesso!</div>
								      				<hr>
												  	<div class="radio">
													  	<label><input type="radio" name="tipo_mackenzista" value="sim" disabled>Administrador</label>
													</div>
													<div class="radio">
													  <label><input type="radio" name="tipo_mackenzista" value="nao" disabled>Usuario</label>
													</div>
													<div class="radio disabled">
													  <label><input type="radio" name="tipo_mackenzista" disabled>Global</label>
													</div>
												</div>
									      	</div>

								      	<?php } else {?>
								      	<!-- Modal body -->
							      		<div class="modal-body">
							      			<div class="form-group">
							      				<div style="text-align: center;">
							      					<strong>ATENCÃO:</strong><br> Todo o acesso está sendo gravado para sua segurança, para dar acesso
							      					tenha ciencia de que suas informações estão sendo gravadas para segurança de nossa empresa!

													<br><br>Este usuario Possui acesso? <strong><?=$usuario["adm"]?></strong><br><br><hr>
							      				</div>
											  	<div class="radio">
												  	<label><input type="radio" name="tipo_mackenzista" value="sim">Administrador</label>
												</div>
												<div class="radio">
												  <label><input type="radio" name="tipo_mackenzista" value="nao">Usuario</label>
												</div>
												<div class="radio disabled">
												  <label><input type="radio" name="tipo_mackenzista" disabled>Global</label>
												</div>
											</div>
								      	</div>
								      	<?php } ?>
								      	<!-- Modal footer -->
								      	<div class="modal-footer">
								      		<input type="submit" class="btn btn-success">
								      		<input type="hidden" name="acessos" value="sim">
								      		<input type="hidden" name="dados" value="<?=$_SESSION?>">
								      		<input type="hidden" name="nome" value="<?=$usuario["nome"]?>">
								      		<input type="hidden" name="identificador" value="<?=$usuario["identificador"]?>">
								      		<input type="hidden" name="tipo" value="<?=$_GET["tipo_mackenzista"]?>">
								        	<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
								      	</div>
							      	</form>
						    	</div>
						  	</div>
						</div>
				      </td>
						 <?php } } }?>
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
		</div>
		<?php } ?>

		<?php if($_GET["logs"] != ""){?>
		<div class="lanches">
			<div class=" table-responsive">
			<div class="container">
				<a href="exportar_logs.php" target="_blank" ><img src="imagens/ex.png" width="20" 
					data-toggle="tooltip" data-placement="left" title="Exportar Dados para Planilha" /></a>
				<table class="table table-bordered"">
				  <thead>

				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">RESPONSAVEL</th>
				      <th scope="col">IDENTIFICADOR</th>
				      <th scope="col">ACÃO</th>
				      <th scope="col">NOME USUARIO</th>
				      <th scope="col">IDENTIFICADOR USUARIO</th>
				      <th scope="col">DATA</th>
				    </tr>
				  </thead>
					<?php

						$usuarios = historico($conexao);
						foreach($usuarios as $usuario) {
					?>
				  <tbody>
				    <tr>
				      <td><?=$usuario["id"]?></td>
				      <td><?=$usuario["nome_admin"]?></td>
				      <td><?=$usuario["identificador_admin"];?></td>
				      <td><?=$usuario["realizou"];?></td>
				      <td><?=$usuario["nome_usuario_admin"];?></td>
				      <td><?=$usuario["identificador_usuario_admin"];?></td>
				      <td><?=$usuario["data_horario"];?></td>
				    
						<?php } ?>
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
		</div>
		<?php } ?>

		<?php 
			if($_GET["logs"] == "" and $_GET["tipo_mackenzista"] == "" and $_GET["cupom"] == "" and admEstaLogado() != ""){
			require_once("apresentacao_admin.php");
		}?>

	</body>
<?php  
	require_once("rodape.php");
?>