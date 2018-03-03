<?php 
	include '../conection.php';
	
	session_start();
	if (isset($_SESSION['id_lista']) && $_SESSION['id_lista'] != '') {
			$id_mercado = $_SESSION['mercadoID'];
			$id_cliente = $_SESSION["id_usuario"];
			$id_lista = $_SESSION['id_lista'];
			date_default_timezone_set('America/Sao_Paulo');
			$date = date('Y-m-d H:i');
			
			
			
			$sql = "select sum(p.preco * l.quantidade) as total from lista_pedido l inner join cadastro_produto p on l.ID_PRODUTO = p.ID_PRODUTO WHERE l.ID_LISTA = ".$id_lista." group by l.ID_LISTA;";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()) {				
				$total = $row['total']; 
			}
			
			$sql = "INSERT INTO `pedido_cliente`(`ID_USUARIO`,`ID_LISTA`,`ID_MERCADO`, `ID_STATUS`, `TOTAL`, `DT_PEDIDO`)VALUES(".$id_cliente.",".$id_lista.",".$id_mercado.",2,'".$total."','".$date."');";
			$result = $conn->query($sql);
			
			$sql = "UPDATE `lista_pedido`
					SET
					`ID_STATUS` = 2
					WHERE ID_LISTA = ".$id_lista.";";
			$result = $conn->query($sql);

			$conn->close();
			
			$_SESSION['id_lista'] = 0;
			
			header("Location: ../Cliente/realizar-pedido.php");
		}

?>