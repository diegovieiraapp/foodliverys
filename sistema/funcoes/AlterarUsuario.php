<?php 
	include '../conection.php';
	include '../config_ftp.php';
	session_start();
	if (isset($_POST['urlImage']) && $_POST['urlImage'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
			$nome=$_POST['nome'];
			$telefone=$_POST['telefone'];
			$endereco=$_POST['endereco'];
			$tipoConta=$_POST['tipoConta'];
			$urlImage= $caminho_imagens.$_POST['urlImage'];
			$senha= md5($_POST['password']);
			$email=$_POST['email'];
			$id = $_SESSION['idAlterar'];
			
		$sql = "UPDATE `cadastro_usuario`
				SET
				`NOME` = '".$nome."',
				`TELEFONE` = '".$telefone."',
				`ENDERECO` = '".$endereco."',
				`EMAIL` = '".$email."',
				`SENHA` = '".$senha."',
				`IMAGEM` = '".$urlImage."',
				`ID_PERFIL` = ".$tipoConta."
				WHERE `ID_USUARIO` = ".$id.";";
				
		ftp_put( $con_id, $caminho_absoluto.$arquivo['name'], $arquivo['tmp_name'], FTP_BINARY );
		
	}else if(isset($_POST['urlImage']) && $_POST['urlImage'] == '' && isset($_POST['password']) && $_POST['password'] != '') {
		$nome=$_POST['nome'];
			$telefone=$_POST['telefone'];
			$endereco=$_POST['endereco'];
			$tipoConta=$_POST['tipoConta'];
			$urlImage= $caminho_imagens.$_POST['urlImage'];
			$senha= md5($_POST['password']);
			$email=$_POST['email'];
			$id = $_SESSION['idAlterar'];
			
		$sql = "UPDATE `cadastro_usuario`
				SET
				`NOME` = '".$nome."',
				`TELEFONE` = '".$telefone."',
				`ENDERECO` = '".$endereco."',
				`EMAIL` = '".$email."',
				`SENHA` = '".$senha."',
				`ID_PERFIL` = ".$tipoConta."
				WHERE `ID_USUARIO` = ".$id.";";
		
		
	}else if(isset($_POST['urlImage']) && $_POST['urlImage'] != '' && isset($_POST['password']) && $_POST['password'] == '') {
		$nome=$_POST['nome'];
			$telefone=$_POST['telefone'];
			$endereco=$_POST['endereco'];
			$tipoConta=$_POST['tipoConta'];
			$urlImage= $caminho_imagens.$_POST['urlImage'];
			$senha= md5($_POST['password']);
			$email=$_POST['email'];
			$id = $_SESSION['idAlterar'];
			
		$sql = "UPDATE `cadastro_usuario`
				SET
				`NOME` = '".$nome."',
				`TELEFONE` = '".$telefone."',
				`ENDERECO` = '".$endereco."',
				`EMAIL` = '".$email."',
				`IMAGEM` = '".$urlImage."',
				`ID_PERFIL` = ".$tipoConta."
				WHERE `ID_USUARIO` = ".$id.";";
				
		ftp_put( $con_id, $caminho_absoluto.$arquivo['name'], $arquivo['tmp_name'], FTP_BINARY );
		
		
	}else if(isset($_POST['urlImage']) && $_POST['urlImage'] == '' && isset($_POST['password']) && $_POST['password'] == '') {
		$nome=$_POST['nome'];
			$telefone=$_POST['telefone'];
			$endereco=$_POST['endereco'];
			$tipoConta=$_POST['tipoConta'];
			$urlImage= $caminho_imagens.$_POST['urlImage'];
			$senha= md5($_POST['password']);
			$email=$_POST['email'];
			$id = $_SESSION['idAlterar'];
			
		$sql = "UPDATE `cadastro_usuario`
				SET
				`NOME` = '".$nome."',
				`TELEFONE` = '".$telefone."',
				`ENDERECO` = '".$endereco."',
				`EMAIL` = '".$email."',
				`ID_PERFIL` = ".$tipoConta."
				WHERE `ID_USUARIO` = ".$id.";";
		
		
	}
			$result = $conn->query($sql);

			$conn->close();
			header("Location: ../Master/".$_SESSION['urlCaminho']);
?>