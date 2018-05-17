<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("conecta.php");
require_once("logica-usuario.php");
require_once("mostra-alerta.php");
require_once("banco-lanchonete.php");
require_once("class/Lanchonete.php");?>

<html>
	<head>
		<meta charset="utf-8">
	 	<meta property="og:url"           content="http://18.188.27.136/mackcupons/index.php" />
	  	<meta property="og:type"          content="website php" />
	  	<meta property="og:title"         content="MackCupons" />
	  	<meta property="og:description"   content="Descontos e cupons promocionais para Mackenzistas!" />
	  	<meta property="og:image"         content="http://18.188.27.136/mackcupons/imagens/logo_mack_cupom.png" />
		<?php require_once("java script/scripts_js.php");?>
		<?php require_once("style css/style_css.php");?>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href='style css/menu_css.css' type='text/css' rel='stylesheet'>
		<script type='text/javascript' src='java script/script.js'></script>

		<title>Mack Cupons</title>

	</head>
	<body class="corpo">

		<nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a  data-toggle="tooltip" data-placement="bottom" title="Inicio" class="navbar-brand" href="index.php">
			    <img src="imagens/mack.png" width="27" height="27">
			    ackCupons
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
					<li class="nav-item dropdown">
						<a class="nav-link" href="#"  
							id="navbarDropdown" role="button" data-toggle="dropdown" 
							aria-haspopup="true" aria-expanded="false">
							<i data-toggle="tooltip" data-placement="bottom" title="No campos" class="material-icons">store</i><span class="sr-only">(current)</span>
						</a>
						<?php

							if(!usuarioEstaLogado()){
								sem_sessao();
							} else { ?>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php
									$restaurantes = listaLanchonetes($conexao);
										foreach($restaurantes as $lanchonete) {?>
								<a class="dropdown-item" href="index.php?cupom=<?=$lanchonete->getId_lanchonete()?>&loja=<?=utf8_encode($lanchonete->getNome())?>"
									 data-toggle="tooltip" data-placement="right" 
									title="<?=utf8_encode($lanchonete->getDescricao())?>">
									<img class="img-responsive" src="imagens/<?=$lanchonete->getId_lanchonete()?>.png" width="30"> 
									- <?=utf8_encode($lanchonete->getNome())?>
								</a>
								<?php } ?>
								<div class="dropdown-divider"></div>
								<b class="dropdown-item" href="#" data-toggle="tooltip" data-placement="right" title="Dirija-se até o estabelecimento para averiguação da promoção.">Observação.</b>
							</div>
						<?php  }?>	
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link" href="#"  
							id="navbarDropdown2" role="button" data-toggle="dropdown" 
							aria-haspopup="true" aria-expanded="false">
							<i  data-toggle="tooltip" data-placement="right" title="Lanchonetes e cupons" class="material-icons">local_bar</i>
						</a>
						<?php
							if(!usuarioEstaLogado()){
								sem_sessao();
							} else {?>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
							<a class="dropdown-item" href="index.php?estabelecimento=sim" 
								data-toggle="tooltip" data-placement="right" title="Listar Prédios">
								<div class="row" align="center">
							    	<div class="col-md-12">
							      		Visualizar Campus.
							      	</div>
							  	</div>
							</a>

							<div class="dropdown-divider"></div>
						</div>
						<?php } ?>
					</li>

					
					<li>
						<a style="text-decoration: none;" 
							id="navbarDropdown" role="button" data-toggle="dropdown" 
							aria-haspopup="true" aria-expanded="false">
							<a class="nav-link"  href="index.php?contato=sim" >
								<i data-toggle="tooltip" data-placement="bottom" title="Sobre nós" class="material-icons">contact_mail</i>
							</a>
						</a>
					</li>
					<?php
					if(!usuarioEstaLogado()){?>
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
									 	 	<h3><i class="material-icons">https</i> - Acesso Administrativo</h3>
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
										    	<button type="submit" class="btn btn-primary btn-md">
										    		Entrar
									    		</button>
										  		<input type="hidden" name="acesso" value="adm">
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
					if(!usuarioEstaLogado()){?>
						<!-- CADASTRO -->
						<div class="formularios">
							<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#cadastrar">
							  	Cadastre-se
							</button>

							<div class="modal fade" id="cadastrar" 
								role="dialog" aria-labelledby="cadastrar" aria-hidden="true">
							  	<div class="modal-dialog modal-dialog-centered" role="document">
							    	<div class="modal-content"  style="border:solid black 1px;">
							      		<div id="cadastrar" class="modal-header" style="padding: 4% 1% 1% 30%;background-color: #DCDCDC ">
											<p style="font-family: 'Audiowide', cursive;font-size: 150%;text-align: center;">
												 MackCupons
											</p>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          	<h2><span aria-hidden="true">&times;</span></h2>
									        </button>
							      		</div>
								      	<div class="modal-body" style="font-family: 'Gentium Book Basic', serif;">
							        		<form method="post" action="login.php">
										 	 	<h3>Obrigado pela escolha!</h3>
										 	 	<hr>
											  	<div class="form-group">
											    	<label for="nome">Nome</label>
											    	<input type="text" class="form-control" name="nome" id="nome" aria-describedby="emailHelp" 	
											    		placeholder="Nome completo">
											  	</div>
											  	<div class="form-group">
											    	<label for="identificador">TIA / DRT</label>
											    	<input type="text" class="form-control" name="identificador" id="identificador" aria-describedby="emailHelp" 	
											    		placeholder="TIA / DRT">
											  	</div>
											  	<div class="form-group">
											    	<label for="senha">Senha</label>
											    	<input type="password" class="form-control" name="senha" id="senha" placeholder="senha">
											  	</div>
											  	<div class="form-group">
											    	<label>Mackenzista</label><br>
											  		<div class="form-check form-check-inline">
													  	<input class="form-check-input" type="radio" name="mackenzista" id="aluno" value="aluno">
													  	<label class="form-check-label" for="aluno">Estudante</label>
													</div>
													<div class="form-check form-check-inline">
													  	<input class="form-check-input" type="radio" name="mackenzista" id="colaborador" value="colaborador">
													  	<label class="form-check-label" for="colaborador">Professor</label>
													</div>
												</div>
											  	<button type="submit" class="btn btn-primary">Enviar</button>
											  	<input type="hidden" name="acesso" value="cadastrar">
											</form>
								      	</div>
								      	<div class="modal-footer" style="background-color: #DCDCDC">
								        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								      </div>
							    	</div>
							  	</div>
							</div>
						</div>

						<!-- LOGAR -->
						<div class="formularios">
							<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#login">
							  	Entrar
							</button>

							<div class="modal fade" id="login"  
								role="dialog" aria-labelledby="login" aria-hidden="true">
							  	<div class="modal-dialog modal-dialog-centered" role="document">
							    	<div class="modal-content">
							      		<div id="cadastrar" class="modal-header" style="padding: 4% 1% 1% 30%;background-color: #DCDCDC ">
											<p style="font-family: 'Audiowide', cursive;font-size: 150%;text-align: center;">
												 MackCupons
											</p>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          	<h2><span aria-hidden="true">&times;</span></h2>
									        </button>
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
											    	<button type="submit" class="btn btn-primary btn-md">Entrar</button>
											  	<input type="hidden" name="acesso" value="logar">
											  </form>
											</div>    
								      	</div>
								      	<div class="modal-footer" style="background-color: #DCDCDC ">
								        	<button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Fechar</button>
								      </div>
							    	</div>
							  	</div>
							</div>
						</div>

					<?php } else {?>

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
					padding-top: 2%;
					margin: 2px;
					background-color: #DCDCDC;	
				}
				.carousel-item {
					padding-top: 2%;
				}

			</style>
			<img src="imagens/mack.png" width="60" height="60"><br>
			<p style="font-family: 'Audiowide', cursive;font-size: 150%">
				MackCupons
			</p>
			<?php if($_GET["cupom"] == "" and $_GET["contato"] == "" and $_GET["estabelecimento"] == ""){?>
		  	<div style="background-color: white;" class="carousel-inner">
		    	<div class="carousel-item active">
		    		<?php
					if(!usuarioEstaLogado()){?>
				    Cadastre-se para obter mais vantagens!
				    <?php } else {?>
				    	Aproveite as ofertas em nossa plataforma!
				    <?php } ?>
			  	</a>
		    	</div>
		    	<div class="carousel-item">
				    Ofertas e Cupons para Mackenzistas!
			  	</a>
		    	</div>
		    	<div class="carousel-item">
		      		<?php require_once('car1.php');?>
				    Mr Cheney com preço reduzido para Colaboradores!
			  	</a>
		    	</div>
		  	</div>
		  	<?php } else {?>
		  		<div style="background-color: white;" class="carousel-inner">
		    	<div class="carousel-item active">
		    		<?php
		    		$restaurantes = listaLanchonete($conexao,$_GET["cupom"]);
					foreach($restaurantes as $lanchonete) {

						if($_GET["cupom"] == $lanchonete->getId_lanchonete()){
				        echo $_GET["loja"];?>
			
		    	</div>
		    	<div class="carousel-item">

				    <?=$lanchonete->getDescricao()?>
			  	</a>
		    	</div>
		    	<div class="carousel-item">

				    Uma vez mackenzista, sempre mackenzista!
			  	</a>
		    	</div>
		  	</div>
		  	<?php } } }?>
		</div>
		<hr>
		<?php if($_GET["cupom"] != "" ){?>
		<div class="lanches" >
			<div class="container" >
				<div class="table-responsive"  style="padding: 1% 10% 1% 10%">
				<table class="table table-bordered" align="center">
				  	<thead align="center" style="text-align: center;">
				  		<div style="text-align: center;">
					      		<img class="img-responsive" 
					      		 src="imagens/<?=$_GET["cupom"]?>.png"
					      	 	width="70">
					      	 	<br><br>
					      	 	  <th style="background-color:#D3D3D3 " scope="row"><i class="material-icons">event_note</i><br>CUPONS</th>
						</div>
				  	</thead>
						<?php
						$d = 0;
							$restaurantes = listaLanchonete($conexao,$_GET["cupom"]);
							foreach($restaurantes as $lanchonete) {
							$cupom = explode(",",utf8_encode($lanchonete->getCupom()));
							while($d < count($cupom)){?>
						  	<tbody class="lanches">
							<?php if ($cupom[$d] != ""){?>
								<tr style="text-align: center;">
								  <td><i style="padding-right: 100%;" class="material-icons">confirmation_number</i> 
								  	<?=$cupom[$d]?></td>
								</tr>
							<?php } else {?>
								<tr style="text-align: center;">
								  <td>Não há cupons.</td>
								</tr>
							<?php }?>
				  			</tbody>
				  			<?php $d++;} ?>
				</table>
				<br>
			</div>
			</div>
		</div>
		<?php }} ?>

		<?php if($_GET["contato"] != ""){
			require_once("contato.php");
		}?>

		<?php if($_GET["estabelecimento"] != ""){?>
			<div class="container">
				<h4 style="font-size:90%">Uma força para você não se perder!<br>	
				Download <a href="imagens/predio.pdf" download>
					<img src="imagens/pdf.png" class="img-fluid" width="40" alt="Responsive image"></a>
				<br></h4>
				<hr>
				<img src="imagens/campus.png" class="img-fluid" alt="Responsive image">
				<hr>
			</div>
		<?php } ?>

	 	<div style="text-align: center;">
			<?php mostraAlerta("success");  mostraAlerta("danger"); ?>
		</div>

		<?php 
			if($_GET["contato"] == "" and $_GET["cupom"] == "" and $_GET["estabelecimento"] == "" and usuarioEstaLogado() != ""){
			require_once("apresentacao.php");
		}?>
	</body>
<?php  
	require_once("rodape.php");

?>