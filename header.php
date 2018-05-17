<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("logica-usuario.php");
require_once("mostra-alerta.php"); 
require_once("banco-produto.php");
require_once("class/Lanchonete.php");
require_once("conecta.php");
if(!admEstaLogado()){
	header("Location: index.php");
}?>

<html>
<head>
	<meta charset="utf-8">

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
					<li class="nav-item dropdown" >
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
								<a class="dropdown-item" href="lanchonetes.php?cupons=bobs" data-toggle="tooltip" data-placement="right" title="Bob´s realiza entregas dentro do campus.">
									<img class="img-responsive" src="imagens/bobs.png" width="35"> - Bobs Delivery
								</a>
								<a class="dropdown-item" href="#"  data-toggle="tooltip" data-placement="right" title="Starcbucks - Bebidas promocionais.">
									<img  class="img-responsive" src="imagens/sb.png" width="30"> - StarBucks
								</a>
								<a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="right" title="Cookies Mr. Cheney - Bicoitos promocionais.">
									<img class="img-responsive" src="imagens/ck.png" width="33"> - Mr. Cheney
								</a>
								<div class="dropdown-divider"></div>
								<b class="dropdown-item" href="#" data-toggle="tooltip" data-placement="right" title="Dirija-se até o estabelecimento para averiguação da promoção.">Observação.</b>
							</div>
						<?php } ?>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link" href="#"  
							id="navbarDropdown" role="button" data-toggle="dropdown" 
							aria-haspopup="true" aria-expanded="false">
							<i  data-toggle="tooltip" data-placement="right" title="Lanchonetes e cupons" class="material-icons">restaurant_menu</i>
						</a>
						<?php
							if(!usuarioEstaLogado()){
								sem_sessao();
							} else {?>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#" data-toggle="tooltip" 
									data-placement="right" title="Mc Donalds - Cupons promocionais.">
									<img class="img-responsive" src="imagens/mc.png" width="25"> - Mc Donalds
								</a>
								<a class="dropdown-item" href="#" data-toggle="tooltip" 
									data-placement="right" title="Entregas com ubereats.">
									<img class="img-responsive" src="imagens/ue.png" width="25"> - UberEats
								</a>
								<a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="right" title="opcao 3">Something else here</a>
							</div>
						<?php } ?>	
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
							<a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="right" title="opcao 1">Action</a>
							<a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="right" title="opcao 2">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="right" title="opcao 3">Something else here</a>
						</div>
						<?php } ?>
					</li>

					<li>
						<a style="text-decoration: none;" 
							id="navbarDropdown" role="button" data-toggle="dropdown" 
							aria-haspopup="true" aria-expanded="false">
							<a class="nav-link"  href="contato.php" >
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
													  	<label class="form-check-label" for="colaborador">Colaborador</label>
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

	 	<div style="text-align: center;">
			<?php mostraAlerta("success");  mostraAlerta("danger"); ?>
		</div>
