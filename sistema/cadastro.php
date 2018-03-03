<?php include_once "headLogin.php"; ?>

<div class="simple-page-form animated flipInY" id="signup-form">
	<h4 class="form-title m-b-xl text-center">Cadastrar nova conta</h4>
	<form name="myform" action="javascript:Cadastrar()">
		<div class="form-group">
			<input id="sign-up-nome" type="text" class="form-control" name="nome" placeholder="Nome" required>
		</div>
		
		<div class="form-group">
			<input id="sign-up-telefone" type="text" class="form-control" name="telefone" placeholder="Telefone" required>
		</div>

		<div class="form-group">
			<input id="sign-up-email" type="email" class="form-control" name="email" placeholder="Email" required>
		</div>
		
		<div class="form-group">
			<input id="sign-up-endereco" type="text" class="form-control" name="endereco" placeholder="Endereço" required>
		</div>

		<div class="form-group">
			<input id="sign-up-password" type="password" class="form-control" name="senha" placeholder="Password" required>
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
<script>
	function Cadastrar(){
		var nome = $("[name='nome']").val();
		var telefone = $("[name='telefone']").val();
		var email = $("[name='email']").val();
		var endereco = $("[name='endereco']").val();
		var senha = $("[name='senha']").val();
		$.ajax({
			url: 'funcoes/CadastrarUsuarioComum.php',
			type: 'POST',
			data: {
				nome: nome,
				telefone: telefone,
				email: email,
				endereco: endereco,
				senha: senha
			},
			success: function(msg) {
					alert(msg);
					window.location.href = "login.php";
				
			}               
		});
	};
</script>