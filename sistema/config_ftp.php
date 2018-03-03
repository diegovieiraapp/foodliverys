<?php
$servidor = 'ftp.foodliverys.com';
$caminho_absoluto = '/public_html/images/foodliverys/';
$caminho_absoluto_produtos = '/public_html/images/foodliverys/produtos/';
$caminho_produtos = 'http://foodliverys.com/images/foodliverys/produtos/';
$caminho_imagens = 'http://foodliverys.com/images/foodliverys/';
$arquivo = $_FILES['urlImage'];

$con_id = ftp_connect($servidor) or die( 'Não conectou em: '.$servidor );
ftp_login( $con_id, 'sistema@foodliverys.com', 'sistema@123' );

?>