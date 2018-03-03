<?php
	include_once "../conection.php";
	if(isset($_POST['OK']) && $_POST['password'] && $_POST['email'])
	{
		$email=$_POST['email'];
		$pass=$_POST['password'];
		$sql = "UPDATE `cadastro_usuario`
				SET
				`SENHA` = MD5('".$pass."')
				WHERE `EMAIL` = '".$email."';";
		$result = $conn->query($sql);
		
		print $result;
	}
?>