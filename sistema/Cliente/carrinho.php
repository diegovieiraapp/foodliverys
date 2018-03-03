<?php include_once "headerCliente.php";?>

          <h5 class="page-title hidden-menubar-top hidden-float">Consultar Pedidos</h5>

<?php include_once "navBarCliente.php";?>

<div class="col-md-12">

    <div class="widget">

        <!-- .widget-header -->

        <div class="widget-body clearfix">

			<div class="container">

				<div class="row">

					<div class="col-xs-10">

						<div class="panel panel-info">

							<div class="panel-heading">

								<div class="panel-title">

									<div class="row">

										<div class="col-xs-6">

											<h5></h5>

										</div>

										<div class="col-xs-6">

											<button type="button" class="btn btn-primary btn-sm btn-block btnVoltar">

												<span class="glyphicon glyphicon-share-alt"></span> Adicionar mais produtos

											</button>

										</div>

									</div>

								</div>

							</div>

							<div class="panel-body">

								<?php 

										include '../conection.php';

										if (isset($_SESSION['id_lista']) && $_SESSION['id_lista'] != '') {

											$id_lista = $_SESSION['id_lista'];

											$sql = "SELECT 

														C.ID_PRODUTO,

														C.NOME,

														C.MARCA,

														C.PESO,

														L.QUANTIDADE, 

														C.PRECO,

														C.IMAGEM

													FROM lista_pedido L

													INNER JOIN cadastro_produto C ON L.ID_PRODUTO = C.ID_PRODUTO

													WHERE L.ID_LISTA = ".$id_lista.";";

													

											$result = $conn->query($sql);

											if ($result->num_rows > 0) {

												while($row = $result->fetch_assoc()) {

													echo '<div class="row">

															<div class="col-xs-2"><img class="img-responsive" src="'.$row['IMAGEM'].'">

															</div>

															<div class="col-xs-4">

																<h4 class="product-name"><strong>'.$row['NOME'].' '.$row['MARCA'].' - '.$row['PESO'].'</strong></h4><h4><small></small></h4>

															</div>

															<div class="col-xs-6">

																<div class="col-xs-6 text-right">

																	<h6 name="preco"><strong><span class="spnValor">'.$row['PRECO'].' </span><span class="text-muted">x</span></strong></h6>

																</div>

																<div class="col-xs-4">

																	<input type="number" min="0" class="form-control input-sm" name="quantidade" value="'.$row['QUANTIDADE'].'">

																</div>

																<div class="col-xs-2">

																<input type="hidden" class="btn btn-danger btn-sm" name="produto" value="'.$row['ID_PRODUTO'].'"/>

																	<button type="button" class="btn btn-link btn-xs remover">

																		<span class="glyphicon glyphicon-trash"> </span>

																	</button>

																</div>

															</div>

														</div>

														<hr>';

												}

											}else{

												$_SESSION['id_lista'] = 0;

											}

										}										

										//$conn->close();

									?>

							</div>

							<div class="panel-footer">

								<div class="row text-center">

									<div class="col-xs-9">

										<h4 class="text-right">Total <strong>$<span id="valorTotal"></span></strong></h4>

									</div>

									<div class="col-xs-3">

										<button id="btnFinalizar" type="button" class="btn btn-success btn-block">

											Comprar

										</button>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

        <!-- .widget-body -->

    </div>

    <!-- .widget -->

</div>

<?php include_once "footerCliente.php";?>

<script>

	$( document ).ready(function() {

		AtualizarTotal();

	});

	

	

	$('.remover').click(function() {

		debugger;

		var produto = $(this).offsetParent(0).children(0)[0].value;

		$.ajax({

				url: '../funcoes/RemoverItemLista.php',

				type: 'POST',

				data: {

					idProduto: produto

				},

				success: function(msg) {

					window.location.href = "carrinho.php";

				}               

			});

		

	});

	$('#btnFinalizar').click(function() {

		debugger;

		for(i = 0 ; i < $('.spnValor').length; i++){

			var quantidade = $('input[name=quantidade]')[i].value;

			var produto = $('input[name=produto]')[i].value;

			

			$.ajax({

				url: '../funcoes/IncluirPedidoLista.php',

				type: 'POST',

				data: {

					idProduto: produto,

					quantidade: quantidade

				},

				success: function(msg) {

					

				}               

			});

		}

		

		$.ajax({

				url: '../funcoes/FinalizarPedido.php',

				success: function(msg) {

					window.location.href = "realizar-pedido.php";

				}               

			});

	});

	

	$(".btnVoltar").click(function(){

		window.history.back();

	});

	

	$('input[name=quantidade]').change(function(){

		AtualizarTotal();

	});

	

	function AtualizarTotal(){

	var total = 0;

	for(i = 0 ; i < $('.spnValor').length; i++){

		var p = parseFloat($('.spnValor')[i].innerText);

		var q = parseInt($('input[name=quantidade]')[i].value);

		

		total = total + Number(((q * p)).toFixed(2));

	}

	$('#valorTotal').text(total.formatMoney(2));

	

	

}



Number.prototype.formatMoney = function(c, d, t){

var n = this, 

    c = isNaN(c = Math.abs(c)) ? 2 : c, 

    d = d == undefined ? "." : d, 

    t = t == undefined ? "," : t, 

    s = n < 0 ? "-" : "", 

    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 

    j = (j = i.length) > 3 ? j % 3 : 0;

   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");

 };

</script>



