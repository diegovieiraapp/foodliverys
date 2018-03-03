<?php 
	include_once "../conection.php";
	 session_start();
	$sql = "SELECT 
				count(p.ID_PEDIDO) as TOTAL
			FROM pedido_cliente p
			WHERE p.id_mercado = ".$_SESSION["id_usuario"]." && p.id_status = 2
			ORDER BY p.ID_PEDIDO;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			print $row['TOTAL'];
		}
	}else{
		print "0";
	}
?>