<?php include_once "headLogin.php"; ?>
<?php
if($_GET['key'] && $_GET['reset'])
{
	$email=$_GET['key'];
	$pass=$_GET['reset'];
	$sql = "SELECT * FROM `cadastro_usuario` WHERE md5(EMAIL) = '".$email."' && `SENHA` = '".$pass."';";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo'<div class="simple-page-form animated flipInY" id="login-form">
					<h4 class="form-title m-b-xl text-center">Insira uma nova senha</h4>
					<form action="" method="post">
						<div class="form-group">
							<input type="hidden" name="email" value="'.$row['EMAIL'].'" >
							<input id="sign-in-password" type="text" name="password" class="form-control" placeholder="Nova Senha">
						</div>
						<input id="alterarSenha" type="button" class="btn btn-primary" name="OK" value="Alterar">
					</form>
				</div><!-- #login-form -->';
			}
		}
}
?>
<?php include_once "footerLogin.php"; ?>
<script>
$('#alterarSenha').click(function() {
		var email = $("[name='email']").val();
		var senha = $("[name='password']").val();
		$.ajax({
			url: 'funcoes/AlterarSenha.php',
			type: 'POST',
			data: {
				email: email,
				password: senha,
				OK: "ok"
			},
			success: function(msg) {
				if(msg = "1"){
					alert("Senha alterada com sucesso!");
					window.location.href = "login.php";
				}else{
					alert(msg);
					window.location.href = "login.php";
				}
				
			}               
		});
	});
</script>