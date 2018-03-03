<?php include_once "headLogin.php"; ?>

<div class="simple-page-form animated flipInY" id="login-form">
	<h4 class="form-title m-b-xl text-center">Faça login com sua conta Foodliverys</h4>
	<form action="" method="post">
		<div class="form-group">
			<input id="sign-in-email" type="email" name="email" class="form-control" placeholder="Email">
		</div>

		<div class="form-group">
			<input id="sign-in-password" type="password" name="password" class="form-control" placeholder="Senha">
		</div>

		<div class="form-group m-b-xl">
			<div class="checkbox checkbox-primary">
				<input type="checkbox" id="keep_me_logged_in"/>
				<label for="keep_me_logged_in">Permanecer conectado</label>
			</div>
		</div>
		<input type="submit" class="btn btn-primary" name="OK" value="Entrar">
	</form>
	<div id="alerta" class="alert alert-danger alert-dismissible" <?php if (!isset($_GET['erro'])){ echo 'style="display:none;"'; } ?> role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		<strong>Opss! </strong>
		<span>Email ou Senha inválido.</span>
	</div>
</div><!-- #login-form -->

<div class="simple-page-footer">
	<p><a href="esqueceu-senha.php">ESQUECEU SUA SENHA ?</a></p>
	<p>
		<small>Não tem uma conta ?</small>
		<a href="cadastro.php">CRIE A SUA CONTA AQUI</a>
	</p>
</div><!-- .simple-page-footer -->
<?php include_once "footerLogin.php"; ?>
<script>
$("#alerta").click(function(){
	document.getElementById('alerta').style.display = 'none';
});
</script>