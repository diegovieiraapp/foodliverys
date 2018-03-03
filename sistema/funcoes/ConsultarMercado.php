<?php 
	include '../conection.php';
				
			$sql = "SELECT `ID_USUARIO`, `NOME`,`TELEFONE`,`ENDERECO`,`EMAIL` FROM `cadastro_usuario` WHERE `ID_PERFIL` = 2;";
			$result = $conn->query($sql);
			
				while($row = $result->fetch_assoc()) {
					$nome=$row['NOME']; 
					$telefone=$row['TELEFONE'];
					$endereco=$row['ENDERECO'];
					$email=$row['EMAIL'];
					$id=$row['ID_USUARIO'];
				
					$posts[] = array($id, $nome, $telefone, $endereco, $email);
				}
			$response['data'] = $posts;

			$fp = fopen('../api/json/consultaMercado.json', 'w');
			fwrite($fp, json_encode($response));
			fclose($fp);
			
			$conn->close();
?>