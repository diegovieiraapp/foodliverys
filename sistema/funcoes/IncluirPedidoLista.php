<?php 
	include '../conection.php';
	
	session_start();
	
	if (isset($_POST['idProduto']) && $_POST['idProduto'] != '') {
		//echo $_POST['id'];
			$id_produto = $_POST['idProduto'];
			$id_cliente = $_SESSION["id_usuario"];
			$quantidade = $_POST['quantidade'];
			$sql = "SELECT `ID_LISTA` FROM `lista_pedido` WHERE ID_CLIENTE = ".$id_cliente." && ID_STATUS = 1 LIMIT 1;";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$_SESSION['id_lista'] = $row['ID_LISTA'];
					$id_lista = $row['ID_LISTA'];
					$sql = "SELECT `ID_PRODUTO` FROM `lista_pedido` WHERE ID_CLIENTE = ".$id_cliente." && ID_PRODUTO = ".$id_produto." && ID_STATUS = 1";
					$result1 = $conn->query($sql);
					if ($result1->num_rows > 0) {
						$sql = "UPDATE `lista_pedido` SET `QUANTIDADE` = '".$quantidade."' WHERE `ID_LISTA` = ".$id_lista." && `ID_PRODUTO` = ".$id_produto.";";
						$result2 = $conn->query($sql);
					}else{
						$sql = "INSERT INTO `lista_pedido`(`ID_LISTA`,`ID_CLIENTE`,`ID_PRODUTO`,`QUANTIDADE`,`ID_STATUS`)VALUES(".$id_lista.",".$id_cliente.",".$id_produto.",'".$quantidade."',1);";
						$result2 = $conn->query($sql);
					}
				}
			}else{
				$sql = "SELECT max(ID_LISTA) FROM `lista_pedido`;";
				$result1 = $conn->query($sql);
				if ($result1->num_rows > 0) {
					while($row = $result1->fetch_assoc()) {
						//echo $row['max(ID_LISTA)'];
						$id_lista = $row['max(ID_LISTA)'];
						$id_lista = $id_lista + 1;
						$_SESSION['id_lista'] = $id_lista;
						$sql = "INSERT INTO `lista_pedido`(`ID_LISTA`,`ID_CLIENTE`,`ID_PRODUTO`,`QUANTIDADE`,`ID_STATUS`)VALUES(".$id_lista.",".$id_cliente.",".$id_produto.",'".$quantidade."',1);";
						$result2 = $conn->query($sql);
					}
				}else{	
					$id_lista =  1;
					$_SESSION['id_lista'] = $id_lista;
					$sql = "INSERT INTO `lista_pedido`(`ID_LISTA`,`ID_CLIENTE`,`ID_PRODUTO`,`QUANTIDADE`,`ID_STATUS`)VALUES(".$id_lista.",".$id_cliente.",".$id_produto.",'".$quantidade."',1);";
					$result2 = $conn->query($sql);
				}					
			}
        
			$conn->close();
			
			//header("Location: ../Master/cadastroUsuario.php");
		}

?>