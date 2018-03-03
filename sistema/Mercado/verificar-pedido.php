<?php include_once "headerMercado.php";?>
          <h5 class="page-title hidden-menubar-top hidden-float">Pedido</h5>
<?php include_once "navBarMercado.php";?>
<div class="col-md-12">
    <div class="widget">
        <!-- .widget-header -->
        <div class="widget-body clearfix">
			<div id="divImprimir" class="panel panel-default">
				<div class="panel-heading bg-white">
					<h4 class="panel-title">Informações do pedido</h4>
				</div>

				<div class="panel-body">
					<?php 
								include '../conection.php';
		
								$sql = "SELECT 
											U.NOME AS NOME_CLIENTE,
											M.NOME AS NOME_MERCADO,
											M.ENDERECO AS ENDERECO_MERCADO,
											M.TELEFONE AS TELEFONE_MERCADO,
											M.EMAIL AS EMAIL_MERCADO,
											U.ENDERECO,
											U.TELEFONE,
											U.EMAIL,
											P.TOTAL
											FROM lista_pedido L
											INNER JOIN cadastro_produto C ON L.ID_PRODUTO = C.ID_PRODUTO
											INNER JOIN pedido_cliente P ON P.ID_LISTA = L.ID_LISTA
											INNER JOIN cadastro_usuario U ON U.ID_USUARIO = P.ID_USUARIO
											INNER JOIN cadastro_usuario M ON M.ID_USUARIO = P.ID_MERCADO
											WHERE P.ID_PEDIDO = ".$_GET['id']."
											group by U.NOME;";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$nomeCliente=$row['NOME_CLIENTE'];
										$nomeMercado=$row['NOME_MERCADO'];
										$enderecoMercao=$row['ENDERECO_MERCADO']; 
										$TelefoneMercado=$row['TELEFONE_MERCADO'];
										$emailMercado=$row['EMAIL_MERCADO'];
										$endereco=$row['ENDERECO'];
										$telefone= $row['TELEFONE'];
										$email= $row['EMAIL'];
										$total= number_format($row['TOTAL'],2, ',', '.');
										//echo sprintf("%.2f",$row['PRECO']);
										echo '<div class="row">
													<div class="col-sm-8 col-xs-6">
														<h4 class="fw-600">'.$nomeMercado.',</h4>
														<p>Email: <a href="#">'.$emailMercado.'</a></p>
														<p>Endereço: '.$enderecoMercao.'</p>
														<p>Telefone: '.$TelefoneMercado.'</p>

														<h4 class="m-t-lg fw-600">Pedido Para:</h4>
														<p>'.$nomeCliente.'</p>
														<p>Endereço: '.$endereco.'</p>
														<p>Email: '.$email.'</p>
														<p>Telefone: '.$telefone.'</p>
													</div>
													<div class="col-sm-4 col-xs-6">
														<h4 class="fw-600 text-right">PEDIDO #'.$_GET['id'].'</h4>
													
													</div>
												</div>
												<div class="table-responsive m-h-lg">
													<table class="table">
														<tbody><tr><th>Cod. Produto</th><th>Descrição</th><th>Quantidade</th><th>Valor Unitário</th><th>Total</th></tr>';
									}
								}
								$sql = "SELECT 
											L.ID_PRODUTO,
                                            C.NOME, 
											L.QUANTIDADE, 
											C.PRECO,
											C.MARCA,
											C.PESO,
											P.ID_STATUS,
											P.TOTAL AS TOTAL_PEDIDO,
                                            (C.PRECO * L.QUANTIDADE) AS TOTAL
										FROM lista_pedido L
										INNER JOIN cadastro_produto C ON L.ID_PRODUTO = C.ID_PRODUTO
										INNER JOIN pedido_cliente P ON P.ID_LISTA = L.ID_LISTA
										WHERE P.ID_PEDIDO = ".$_GET['id']."";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$id_produto=$row['ID_PRODUTO'];
										$nome=$row['NOME']; 
										$quantidade=$row['QUANTIDADE'];
										$preco= "$".$row['PRECO'];
										$marca= $row['MARCA'];
										$peso = $row['PESO'];
										$status= $row['ID_STATUS'];
										$total_pedido = $row['TOTAL_PEDIDO'];
										$total= "$".number_format($row['TOTAL'],2, ',', '.');
								
										echo '<tr><td>'.$id_produto.'</td><td>'.$nome.' '.$marca.' '.$peso.'</td><td>'.$quantidade.'</td><td>'.$preco.'</td><td>'.$total.'</td></tr>';		
									}
								}
								echo '</tbody></table>
												</div>
												<div class="row">
										<div class="col-sm-3 col-sm-push-9">
											<p>Valor Total: <span class="text-primary">$'.$total_pedido.'</span></p>
											<div class="m-t-lg">
												<button type="button" onClick="printDiv();" class="btn btn-md btn-default">Imprimir</button>
											</div>
										</div>
									</div>';
					?>
				</div><!-- .panel-body -->
			</div>
			<div id="editor"></div>
        </div>
        <!-- .widget-body -->
    </div>
    <!-- .widget -->
</div>
<?php include_once "footerMercado.php";?>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script>
	$("#divImprimir").click(function(){
		$(".buttons-print").click();
	});
	
	function printDiv() 
	{

	  var divImprimir=document.getElementById('divImprimir');

	  var newWin=window.open('','Print-Window');

	  newWin.document.open();

	  newWin.document.write('<html><body onload="window.print()">'+divImprimir.innerHTML+'</body></html>');

	  newWin.document.close();

	  setTimeout(function(){newWin.close();},10);

	}
	
</script>
