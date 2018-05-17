<?php include("header.php"); ?>
<style>
	body {

	  height: 100vh;
	  background-image: url("imagens/bobs.jpg");
	  background-attachment: fixed;
	  background-size: cover;
	}

	@media screen and (max-width: 1500px) {
	  body  {
	    background-image: url("imagens/bobs.jpg");
	  }
	}
	@media screen and (max-width: 1000px) {
	  body  {
	    background-image: url("imagens/bobs.jpg");
	  }
	}
	@media screen and (max-width: 800px) {
	  body  {
	    background-image: url("imagens/bobs.jpg");
	  }
	}
	@media screen and (max-width: 600px) {
	  body  {
	    background-image: url("imagens/bobs.jpg");
	  }
	}
	@media screen and (max-width: 400px) {
	  body  {
	    background-image: url("imagens/bobs.jpg");
	  }
	}
	@media screen and (max-width: 320px) {
	  body  {
	    background-image: url("imagens/bobs.jpg");
	  }
	}
	@media screen and (max-width: 384px) {
	  body  {
	    background-image: url("imagens/bobs2.jpg");
	  }
	}
	.lanches {
		padding: 1% 1% 1% 10%
	}
</style>

<?php 
$produtos = listaProdutos($conexao);
	foreach($produtos as $produto) {
?>
<div class="lanches">
	<div class="container">
	  	<div class="row">
	    	<div class="col-sm-3">
	      		<?=$produto->nome;?>
	    	</div>
	  	</div>
	</div>
</div>
<?php } ?>
  		


</div>

<?php require_once("rodape.php"); ?>