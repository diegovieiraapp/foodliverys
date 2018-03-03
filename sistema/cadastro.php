<?php include_once "headLogin.php"; ?>
<div class="simple-page-form animated flipInY" id="signup-form">
	<h4 class="form-title m-b-xl text-center">Cadastrar nova conta</h4>
	<form action="funcoes/CadastrarUsuarioComum.php" method="post">
		<div class="form-group">
			<input id="sign-up-nome" type="text" class="form-control" name="nome" placeholder="Nome">
		</div>
		
		<div class="form-group">
			<input id="sign-up-telefone" type="text" class="form-control" name="telefone" placeholder="Telefone">
		</div>

		<div class="form-group">
			<input id="sign-up-email" type="email" class="form-control" name="email" placeholder="Email">
		</div>
		
		<div class="form-group">
			<input id="sign-up-endereco" type="text" class="form-control" name="endereco" placeholder="Endereço">
		</div>

		<div class="form-group">
			<input id="sign-up-password" type="password" class="form-control" name="senha" placeholder="Password">
		</div>

		<input type="submit" class="btn btn-primary" value="Cadastrar">
	</form>
</div><!-- #login-form -->

<div class="simple-page-footer">
	<p>
		<small>Você tem uma conta ?</small>
		<a href="login.php">ENTRAR</a>
	</p>
</div><!-- .simple-page-footer -->
<?php include_once "footerLogin.php"; ?>