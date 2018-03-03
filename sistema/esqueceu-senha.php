<?php include_once "headLogin.php"; ?>
<div class="simple-page-form animated flipInY" id="reset-password-form">
	<h4 class="form-title m-b-xl text-center">Esqueceu sua senha ?</h4>

	<form action="funcoes/mail.php" method="POST">
		<div class="form-group">
			<input id="reset-password-email" type="email" class="form-control" name="email" placeholder="Email">
		</div>
		<input type="submit" class="btn btn-primary" value="RESETAR SENHA">
	</form>
	<div class="alert alert-danger alert-dismissible" <?php if (!isset($_GET['erro'])){ echo 'style="display:none;"'; } ?> role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		<strong>Opss! </strong>
		<span>Email não encontrado. Verifique e tente novamente.</span>
	</div>
	<div class="alert alert-success alert-dismissible" <?php if (!isset($_GET['sucesso'])){ echo 'style="display:none;"'; } ?> role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span></button>
		<strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tudo Certo! </font></font></strong>
		<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviamos para o email cadastrado sua nova senha.</font></font></span>
	</div>
</div><!-- #reset-password-form -->
<?php include_once "footerLogin.php"; ?>