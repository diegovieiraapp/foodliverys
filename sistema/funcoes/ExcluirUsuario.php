<?php 
	include '../conection.php';
	session_start();
		$id = $_SESSION['idAlterar'];
			$sql = "DELETE FROM `cadastro_usuario`
					WHERE ID_USUARIO = ".$id.";";
			$result = $conn->query($sql);
			$conn->close();
?>