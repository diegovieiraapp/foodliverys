<?php



session_start();

set_time_limit(0);



$pagina_login = 1;



$page_id = 0;



include 'config.php';



if (isset($_GET['sair'])) {

    $_SESSION['logado'] = "";

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<title>Foodliverys - Sistema</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

	<meta name="description" content="" />

	<link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">

	

	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">

	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">

	<link rel="stylesheet" href="assets/css/bootstrap.css">

	<link rel="stylesheet" href="assets/css/core.css">

	<link rel="stylesheet" href="assets/css/misc-pages.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">

</head>

<body class="simple-page">

 <!--	<div id="back-to-home">

		<a href="login.php" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>

	</div> -->

	<div class="simple-page-wrap">

		<div class="simple-page-logo animated swing">

			<a href="index.html">

				<span><i class="fa fa-cart-arrow-down"></i></span>

				<span>Foodliverys</span>

			</a>

		</div><!-- logo -->