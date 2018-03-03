<?php 
	include '../conection.php';
	
	if (isset($_POST['email']) && $_POST['email'] != '') {
			$nome=$_POST['nome'];
			$telefone=$_POST['telefone'];
			$endereco=$_POST['endereco'];
			$senha= $_POST['senha'];
			$email=$_POST['email'];
			
			//echo $nome;
			//echo $telefone;
			//echo $endereco;
			//echo $tipoConta;
			//echo $urlImage;
			//echo $senha;
			//echo $email;
			
			$sql = "INSERT INTO `cadastro_usuario`(`NOME`,`TELEFONE`,`ENDERECO`,`EMAIL`,`SENHA`,`IMAGEM`,`ID_PERFIL`)VALUES('".$nome."','".$telefone."','".$endereco."','".$email."',MD5('".$senha."'),'',3);";
			$result = $conn->query($sql);

			$conn->close();
			
			header("Location: ../login.php");
		}

?>