<?php 
	include '../conection.php';
	
	 session_start();
	/*if (isset($_POST['mercado']) && $_POST['mercado'] != '') {			
		$id_mercado = $_POST['mercado'];
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '1'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
					}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataMercearia.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '2'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {	
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataHortifruti.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '3'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataCarnes.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '4'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataFrios.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '5'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataPescados.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '6'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataPadaria.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '7'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataCongelados.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '8'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;
				
				$fp = fopen('../api/json/dataBebidas.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '9'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataUtensilios.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '10'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataLimpeza.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '11'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataHigiene.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '12'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataPetshop.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$sql = "SELECT `ID_PRODUTO`, `NOME`,`MARCA`,`PESO`,`DESCRICAO`,`PRECO` FROM `cadastro_produto` WHERE ID_CATEGORIA = '13'&& ID_MERCADO = ".$id_mercado.";";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$ref=$row['ID_PRODUTO']; 
					$nome=$row['NOME']; 
					$marca=$row['MARCA'];
					$peso=$row['PESO'];
					$descricao=$row['DESCRICAO'];
					$preco=$row['PRECO'];
				
					$posts[] = array($nome, $marca, $peso, $descricao, $preco, $ref);
				}
				$response['data'] = $posts;

				$fp = fopen('../api/json/dataSuplementos.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			}
			
			$conn->close();*/
			$_SESSION['mercadoID'] = $_POST['mercadoId'];
			header("Location: ../Cliente/realizar-pedido.php?consultado=1");
	//}
?>