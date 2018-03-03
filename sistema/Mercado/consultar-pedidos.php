<?php include_once "headerMercado.php";?>
          <h5 class="page-title hidden-menubar-top hidden-float">Consultar Pedidos</h5>
<?php include_once "navBarMercado.php";?>
<div class="col-md-12">
    <div class="widget">
        <!-- .widget-header -->
        <div class="widget-body clearfix">
            <?php 
				include_once "../conection.php";
				
				$sql = "SELECT 
							p.ID_PEDIDO,
							s.NOME as STATUS_ENTREGA,
							s.id_status,
							u.NOME as MERCADO,
						    sum(l.QUANTIDADE * prod.preco) as total
						FROM pedido_cliente p
						inner join pedido_status s on s.id_status = p.id_status
						inner join cadastro_usuario u on u.id_usuario = p.id_mercado
                        inner join lista_pedido l on l.id_lista = p.id_lista
                        inner join cadastro_produto prod on prod.id_produto = l.id_produto
						WHERE p.id_mercado = ".$_SESSION["id_usuario"]."
							group by ID_PEDIDO
						ORDER BY p.ID_PEDIDO;";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()) {
					if($row['id_status'] == 2){
						echo '<div class="col-sm-6 col-md-4">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h4 class="panel-title">'.$row['STATUS_ENTREGA'].' - Nº'.$row['ID_PEDIDO'].'</h4>
									</div>
									<div class="panel-body">
										<p>'.$row['MERCADO'].'</p>
										<p>Total $ '.floatval($row['total']).'</p>
									</div>
									<div id="botoes" class="panel-footer">
										<input type="hidden" class="btn btn-danger btn-sm" name="pedido" value="'.$row['ID_PEDIDO'].'"/>
										<button class="btn btn-sm btn-primary btnVerifica">Verificar Pedido</button>
										<button class="btn btn-sm btn-warning btnAprovar">Aprovar Pedido</button>
									</div>
								</div>
							</div>';
					}else if($row['id_status'] == 3){
						echo '<div class="col-sm-6 col-md-4">
								<div class="panel panel-warning">
									<div class="panel-heading">
										<h4 class="panel-title">'.$row['STATUS_ENTREGA'].' - Nº'.$row['ID_PEDIDO'].'</h4>
									</div>
									<div class="panel-body">
										<p>'.$row['MERCADO'].'</p>
										<p>Total $ '.floatval($row['total']).'</p>
									</div>
									<div id="botoes" class="panel-footer">
										<input type="hidden" class="btn btn-danger btn-sm" name="pedido" value="'.$row['ID_PEDIDO'].'"/>
										<button class="btn btn-sm btn-primary btnVerifica">Verificar Pedido</button>
										<button class="btn btn-sm btn-success btnEntregue">Pedido Entregue</button>
									</div>
								</div>
							</div>';	
					}
				}
											
				//$conn->close();
			?>
        </div>
        <!-- .widget-body -->
    </div>
    <!-- .widget -->
</div>
<?php include_once "footerMercado.php";?>

<script>
$('#botoes .btnVerifica').click(function() {
		var pedido = $(this).offsetParent().children(0).children(2).children()[3].value;
		$.ajax({
			url: '../funcoes/VerificaPedido.php',
			type: 'POST',
			data: {
				idPedido: pedido
			},
			success: function(msg) {
				window.location.href = 'verificar-pedido.php?id=' + pedido;
			}               
		});
	});
$('#botoes .btnEntregue').click(function() {
	var pedido = $(this).offsetParent().children(0).children(2).children()[3].value;
	$.ajax({
		url: '../funcoes/PedidoEntregue.php',
		type: 'POST',
		data: {
			idPedido: pedido
		},
		success: function(msg) {
			window.location.href = 'consultar-pedidos.php';
		}               
	});
});
$('#botoes .btnAprovar').click(function() {
	var pedido = $(this).offsetParent().children(0).children(2).children()[3].value;
	$.ajax({
		url: '../funcoes/AprovarPedido.php',
		type: 'POST',
		data: {
			idPedido: pedido
		},
		success: function(msg) {
			window.location.href = 'consultar-pedidos.php';
		}               
	});
});
</script>