<?php 
	include '../conection.php';
	session_start();
		$id = $_SESSION['idAlterar'];
			$sql = "DELETE FROM `cadastro_produto`
					WHERE ID_PRODUTO = ".$id.";";
			$result = $conn->query($sql);
			$conn->close();
?>