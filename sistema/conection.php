<?php
	//Configuração do Banco de dados
	$host = "localhost";
	$user = "apowerso_market";
	$pass = "MarketBD";
	$d_b = "apowerso_MarketBrazil";

	$conn = new mysqli($host, $user, $pass, $d_b);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>