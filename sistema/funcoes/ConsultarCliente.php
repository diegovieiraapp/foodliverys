<?php 
	include '../conection.php';
				
			$sql = "SELECT `ID_USUARIO`, `NOME`,`TELEFONE`,`ENDERECO`,`EMAIL` FROM `cadastro_usuario` WHERE `ID_PERFIL` = 3;";
			$result = $conn->query($sql);
			
				while($row = $result->fetch_assoc()) {
					$id=$row['ID_USUARIO']; 
					$nome=$row['NOME']; 
					$telefone=$row['TELEFONE'];
					$endereco=$row['ENDERECO'];
					$email=$row['EMAIL'];
				
					$posts[] = array($id, $nome, $telefone, $endereco, $email);
				}
			$response['data'] = $posts;

			$fp = fopen('../api/json/consultaClientes.json', 'w');
			fwrite($fp, json_encode($response));
			fclose($fp);
			
			$conn->close();
?>