<?php 
	include '../conection.php';
				
			$sql = "SELECT 
							p.ID_PEDIDO,
							s.NOME as STATUS_ENTREGA,
							u.NOME as CLIENTE,
                            c.nome as MERCADO,
							p.total,
							p.DT_PEDIDO
						FROM pedido_cliente p
						inner join pedido_status s on s.id_status = p.id_status
						inner join cadastro_usuario u on u.id_usuario = p.ID_USUARIO
                        iNNER JOIN cadastro_usuario c on c.id_usuario = p.ID_MERCADO
						ORDER BY p.ID_PEDIDO;";
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$id_pedido=$row['ID_PEDIDO']; 
						$nome_cliente=$row['CLIENTE'];
						$nome_mercado=$row['MERCADO'];
						$status=$row['STATUS_ENTREGA'];
						$total= "$ ".$row['total'];
						$data= $row['DT_PEDIDO'];
					
						$posts[] = array($id_pedido, $nome_cliente, $nome_mercado, $status, $total, $data);
					}
				}
			$response['data'] = $posts;

			$fp = fopen('../api/json/consultaPedidos.json', 'w');
			fwrite($fp, json_encode($response));
			fclose($fp);
			
			$conn->close();
?>