<?php 
	include '../conection.php';
	include '../config_ftp.php';
	session_start();
	if (isset($_FILES['urlImage']['name']) && $_FILES['urlImage']['name'] != '') {
			$nome=$_POST['nome'];
			$marca=$_POST['marca'];
			$peso=$_POST['peso'];
			$descricao=$_POST['descr'];
			$categoria=$_POST['categoria'];
			$urlImage= $caminho_produtos.$arquivo['name'];
			$preco=$_POST['preco'];
			$id = $_SESSION['idAlterar'];
			$idMercado = $_SESSION['id_usuario'];
			
		$sql = "UPDATE `cadastro_produto`
				SET
				`ID_CATEGORIA` = ".$categoria.",
				`ID_MERCADO` = ".$idMercado.",
				`NOME` = '".$nome."',
				`MARCA` = '".$marca."',
				`PESO` = '".$peso."',
				`DESCRICAO` = '".$descricao."',
				`IMAGEM` = '".$urlImage."',
				`PRECO` = '".$preco."'
				WHERE `ID_PRODUTO` = ".$id.";";
		$result = $conn->query($sql);
		

		ftp_put( $con_id, $caminho_absoluto_produtos.$arquivo['name'], $arquivo['tmp_name'], FTP_BINARY );

	}else{
			$nome=$_POST['nome'];
			$marca=$_POST['marca'];
			$peso=$_POST['peso'];
			$descricao=$_POST['descr'];
			$categoria=$_POST['categoria'];
			$preco=$_POST['preco'];
			$id = $_SESSION['idAlterar'];
			$idMercado = $_SESSION['id_usuario'];
			
			$sql = "UPDATE `cadastro_produto`
				SET
				`ID_CATEGORIA` = ".$categoria.",
				`ID_MERCADO` = ".$idMercado.",
				`NOME` = '".$nome."',
				`MARCA` = '".$marca."',
				`PESO` = '".$peso."',
				`DESCRICAO` = '".$descricao."',
				`PRECO` = '".$preco."'
				WHERE `ID_PRODUTO` = ".$id.";";
			$result = $conn->query($sql);
	}

			$conn->close();
			header("Location: ../Mercado/consultar-produto.php");
?>