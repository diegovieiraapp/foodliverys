<?php

include 'conection.php';

if (isset($_SESSION['logado'])){
    $logado = $_SESSION['logado'];
}
else{
    $logado = "";
}
		if (isset($_POST['email']) && $_POST['email'] != '') {
			$email=$_POST['email'];
			$senha=$_POST['password'];
			
			$senha_ = md5($senha);
			
			$sql = "SELECT `ID_USUARIO`, `NOME`, `SENHA`, `ID_PERFIL` FROM `cadastro_usuario` WHERE `EMAIL`= '".$email."' && `SENHA`= '".$senha_."';";
			$result = $conn->query($sql);
			
			if ($result->num_rows == 1) {
				while($row = $result->fetch_assoc()) {
					if ($_POST['email'] == $email && md5($_POST['password']) == $row["SENHA"]) {
						$logado = $_SESSION['logado'] = md5($_POST['password']);
						$_SESSION["id_usuario"] = $row["ID_USUARIO"];
						$_SESSION["nome"] = $row["NOME"];
						$_SESSION["id_perfil"] = $row["ID_PERFIL"];
						
						switch($_SESSION["id_perfil"]){
							case 1: header("Location: Master/master.php");
							break;
							case 2: header("Location: Mercado/consultar-pedidos.php");
							break;
							case 3: header("Location: Cliente/realizar-pedido.php");
							break;;
						}
						exit();
					}
				}
			} else {
				header("Location: login.php?erro=1");
			}
			$conn->close();
		}
		
		
	if ($logado == "" && !isset($pagina_login) || $page_id != $_SESSION["id_perfil"] && $page_id != 0) {

    header("Location: login.php");

    exit();
	}
?>
