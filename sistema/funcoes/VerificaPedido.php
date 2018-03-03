<?php 
	include '../conection.php';
		session_start();
		$id = $_POST['idPedido'];
		$_SESSION['idProdudo'] = $id;
		
			$sql = "SELECT 
						C.NOME, 
						L.QUANTIDADE, 
						C.PRECO,
						U.NOME AS NOME_CLIENTE,
						U.ENDERECO
					FROM lista_pedido L
					INNER JOIN cadastro_produto C ON L.ID_PRODUTO = C.ID_PRODUTO
                    INNER JOIN pedido_cliente P ON P.ID_LISTA = L.ID_LISTA
					INNER JOIN cadastro_usuario U ON U.ID_USUARIO = P.ID_USUARIO
					WHERE P.ID_PEDIDO = ".$id.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$nome=$row['NOME']; 
					$nomeCliente=$row['NOME_CLIENTE'];
					$endereco=$row['ENDERECO']; 
					$quantidade=$row['QUANTIDADE'];
					$preco= "$ ".number_format($row['PRECO'],2, ',', '.');
					//echo sprintf("%.2f",$row['PRECO']);
					$posts[] = array($nome, $quantidade, $preco, $nomeCliente, $endereco);
				}
			}
			$response['data'] = $posts;

			$fp = fopen('../api/json/consultaPedido.json', 'w');
			fwrite($fp, json_encode($response));
			fclose($fp);
			
			$conn->close();
?>