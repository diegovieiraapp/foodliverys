<?php 
	include '../conection.php';
	include '../config_ftp.php';
	
	if (isset($_POST['email']) && $_POST['email'] != '') {
			$nome=$_POST['nome'];
			$telefone=$_POST['telefone'];
			$endereco=$_POST['endereco'];
			$tipoConta=$_POST['tipoConta'];
			$senha= $_POST['password'];
			$email=$_POST['email']; 
			$arquivo = $_FILES['urlImage'];
			
			$urlImage= $caminho_imagens.$arquivo['name'];
			
			//echo $nome;
			//echo $telefone;
			//echo $endereco;
			//echo $tipoConta;
			//echo $urlImage;
			//echo $senha;
			//echo $email;
			
			$sql = "INSERT INTO `cadastro_usuario`(`NOME`,`TELEFONE`,`ENDERECO`,`EMAIL`,`SENHA`,`IMAGEM`,`ID_PERFIL`)VALUES('".$nome."','".$telefone."','".$endereco."','".$email."',MD5('".$senha."'),'".$urlImage."','".$tipoConta."');";
			$result = $conn->query($sql);

			$conn->close();
			
			ftp_put( $con_id, $caminho_absoluto.$arquivo['name'], $arquivo['tmp_name'], FTP_BINARY );

			
			header("Location: ../Master/cadastroUsuario.php");
		}

?>