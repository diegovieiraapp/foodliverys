<?php 
	include '../conection.php';
	session_start();
	if (isset($_SESSION['id_lista']) && $_SESSION['id_lista'] != '') {
		$idProduto = $_POST['idProduto'];
		$idLista = $_SESSION['id_lista'];
			$sql = "DELETE FROM `lista_pedido`
					WHERE ID_PRODUTO = ".$idProduto." && ID_LISTA = ".$idLista.";";
			$result = $conn->query($sql);
			$conn->close();
	}
?>