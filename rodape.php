			
		</div>
	</div>
</div>
<style>
.footer {
	font-family: 'Rajdhani', sans-serif;
    padding-top: 1px;
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    color: white;
    text-align: center;
    font-size: 90%;
}
.face {
    font-family: 'Rajdhani', sans-serif;
    padding: 2%;
    position: fixed;
    left: 1%;
    bottom: 3%;
}

</style>
<?php 
if(!admEstaLogado()){?>
<div class="face">
    <?php require_once("modulo_facebook.php");?>
</div>
<?php } ?>
	<div class="footer">
	  	&copy; 2018 Projeto AWS Tomaz
	</div>

</body>
</html>