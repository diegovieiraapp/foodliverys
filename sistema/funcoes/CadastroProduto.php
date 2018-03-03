<?php 
	include '../conection.php';
	include '../config_ftp.php';
	session_start();
	
	if (isset($_POST['nome']) && $_POST['nome'] != '') {
			$nome=$_POST['nome'];
			$marca=$_POST['marca'];
			$descricao=$_POST['descr'];
			$categoria=$_POST['categoria'];
			$urlImage= $caminho_produtos.$arquivo['name'];
			$peso= $_POST['peso'];
			$preco = $_POST['preco'];
			$id_mercado = $_SESSION["id_usuario"];
			 
			//echo $nome;
			//echo $marca;
			//echo $descricao;
			//echo $categoria;
			//echo $peso;
			//echo $preco;
			//echo $id_mercado;
			
			
			$sql = "INSERT INTO `cadastro_produto`(`ID_CATEGORIA`,`ID_MERCADO`,`NOME`,`MARCA`,`PESO`,`DESCRICAO`,`IMAGEM`,`PRECO`)VALUES(".$categoria.",".$id_mercado.",'".$nome."','".$marca."','".$peso."','".$descricao."','".$urlImage."','".$preco."');";
			$result = $conn->query($sql);

			ftp_put( $con_id, $caminho_absoluto_produtos.$arquivo['name'], $arquivo['tmp_name'], FTP_BINARY );
			$conn->close();
			
			header("Location: ../Mercado/cadastro-produtos.php");
		}

?>