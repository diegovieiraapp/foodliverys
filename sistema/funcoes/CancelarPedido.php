<?php 
	include '../conection.php';
		
			$sql = "UPDATE `pedido_cliente`
					SET
					`ID_STATUS` = 5
					WHERE ID_PEDIDO = ".$_POST['idPedido'].";";
			$result = $conn->query($sql);
			
			$sql = "UPDATE `lista_pedido`
					SET
					`ID_STATUS` = 5
					WHERE ID_PEDIDO = ".$_POST['idPedido'].";";
			$result = $conn->query($sql);

			$conn->close();
?>