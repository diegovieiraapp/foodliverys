<?php include_once "headerCliente.php";?>

          <h5 class="page-title hidden-menubar-top hidden-float">Realizar Pedido</h5>

<?php include_once "navBarCliente.php";?>

	<div class="tab-content p-md" <?php if (isset($_GET['consultado'])){ echo 'style="display:none;"'; } ?>>

				<div role="tabpanel" class="tab-pane fade active in" id="colors">

					<h3 class="m-b-lg">Mercados</h3>

					<div class="row">

					

						<?php 

							include_once "../conection.php";

							

							$sql = "SELECT `ID_USUARIO`, `NOME`, `ENDERECO`, `IMAGEM`  FROM `cadastro_usuario` WHERE ID_PERFIL = 2;";

							$result = $conn->query($sql);

							if ($result->num_rows > 0) {

								while($row = $result->fetch_assoc()) {

									echo '<form id="formMercado" action="../funcoes/ConsultarProdutos.php" method="post" class="form-horizontal">';

									echo '<div class="col-sm-6 col-md-4">';

									echo '<div class="panel panel-default">';

						

					

									echo '<div class="column productbox  img-mercado clearfix">';

									echo '<img src="'.$row['IMAGEM'].'" class="img-responsive imagem-mercado">';

									echo '<div class="producttitle nome-mercado title-mercado">'.$row['NOME'].'</div>';

									echo '<div class="productprice"><div class="pricetext desc-mercado">'.$row['ENDERECO'].'</div></div><div class="pull-right">

									<input type="hidden" class="btn btn-danger btn-sm" name="mercadoId" value="'.$row['ID_USUARIO'].'"/>

									<input type="submit" class="btn btn-danger btn-sm" name="foo" value="Selecionar"/></div>';

									echo "</div>";

									echo '</div>';

									echo '</div><!-- END column -->';

									echo '</form>';

								}

							}

														

							//$conn->close();

						?>

						

					</div><!-- .row -->

				</div><!-- .tab-pane -->

	</div>





	

	<div <?php if (!isset($_GET['consultado'])){ echo 'style="display:none;"'; } ?> class="col-md-12">

		<div class="widget">	

			<div class="m-b-lg nav-tabs-horizontal">

				<!-- tabs list -->

				<ul class="nav nav-tabs" role="tablist">

					<?php 

							include_once "../conection.php";

							

							$sql = "SELECT `ID_CATEGORIA`, `NOME` FROM `produto_categoria`";

							$result = $conn->query($sql);

							if ($result->num_rows > 0) {

								while($row = $result->fetch_assoc()) {

									echo '<li role="presentation" class=""><a href="#'.$row['ID_CATEGORIA'].'" aria-controls="'.$row['ID_CATEGORIA'].'" role="tab" data-toggle="tab" aria-expanded="false">'.$row['NOME'].'</a></li>';

								}

							}

													

							//$conn->close();

						?>

					

				</ul><!-- .nav-tabs -->



				<!-- Tab panes -->

				

				<div class="tab-content p-md clearfix">

					<?php 

							include_once "../conection.php";

						if (isset($_SESSION['mercadoID']) && $_SESSION['mercadoID'] != '') {	

							$sql1 = "SELECT `ID_CATEGORIA`, `NOME` FROM `produto_categoria` ORDER BY ID_CATEGORIA;";

							$result1 = $conn->query($sql1);

							if ($result1->num_rows > 0) {

								while($row1 = $result1->fetch_assoc()) {

									echo '<div role="tabpanel" class="tab-pane fade" id="'.$row1['ID_CATEGORIA'].'">

											<p class="lh-lg">

												<!-- .widget-header -->

											<div class="widget-body">';

												

												$id_mercado = $_SESSION['mercadoID'];

													$sql = "SELECT 

																c.ID_PRODUTO,

																c.ID_CATEGORIA,

																c.NOME AS NOMEC,

																p.NOME AS NOMEP,

																c.MARCA,

																c.PESO,

																c.DESCRICAO,

																c.PRECO,

																c.IMAGEM

															FROM 

																cadastro_produto c

															INNER JOIN 

																produto_categoria p ON c.ID_CATEGORIA = p.ID_CATEGORIA 

															WHERE 

																c.ID_MERCADO =".$id_mercado."

															ORDER BY c.ID_CATEGORIA;";

															

														//echo $sql;

														$result = $conn->query($sql);

														if ($result->num_rows > 0) {

															while($row = $result->fetch_assoc()) {

																if($row['ID_CATEGORIA'] == $row1['ID_CATEGORIA']){

																	echo '<div class="col-md-3 col-sm-6">

																			<div class="widget">

																				<header class="widget-header">

																					<h4 class="widget-title nome-produto">'.$row['NOMEC'].' '.$row['MARCA'].' - '.$row['PESO'].'</h4>

																				</header><!-- .widget-header -->

																				<hr class="widget-separator">

																				<div class="widget-body text-center">

																					<div class="big-icon m-b-md watermark"><img src="'.$row['IMAGEM'].'" class="img-responsive img-mercado imagem-produto"></div>

																					<h4 class="m-b-md">$ '.$row['PRECO'].'</h4>

																					<p class="text-muted m-b-lg"></p>

																						  <div class="input-group spinner quantidadeProduto">

																							<input type="text" class="form-control" value="1" min="0" max="5">

																							<div class="input-group-btn-vertical">

																							  <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>

																							  <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>

																							</div>

																						  </div>

																					<input type="hidden" class="btn btn-danger btn-sm" name="produto" value="'.$row['ID_PRODUTO'].'"/>

																					<input type="button" class="btn p-v-xl btn-primary btnAdicionar" name="foo" value="Adicionar"/>

																				</div><!-- .widget-body -->

																			</div><!-- .widget -->

																		</div>';

																}	

															}

														}

											echo '</div>

										</p></div>';

								}

							}

													

							//$conn->close();

						}

				?>

				</div><!-- .widget-body -->

				</div><!-- .tab-content  -->

				</div>

				

				

				<div class="col-md-10"></div>

				<div class="col-md-2">

				

						<button id="btnFinalizar" type="button" <?php if (isset($_SESSION['id_lista']) && $_SESSION['id_lista'] == 0){ echo 'style="display:none;"'; }?> class="btn rounded mw-md btn-primary " form="formCadastro" value="Submit">Checkout</button>

				</div>

		

				</div><!-- .widget -->

					

<?php include_once "footerCliente.php";?>

<script>

	$('.btnAdicionar').click(function() {

		var produto = $(this).offsetParent(0).children(0).children(0).children(0)[5].value;

		var Valorquantidade = $(this).offsetParent(0).children(0).children(0).children(0).children(4)[1].value;

		$.ajax({

			url: '../funcoes/IncluirPedidoLista.php',

			type: 'POST',

			data: {

				idProduto: produto,

				quantidade: Valorquantidade

			},

			success: function(msg) {

				alert('Produto Adicionado ao Carrinho');

				$("#btnFinalizar").show();

			}               

		});

	});

	$('#btnFinalizar').click(function() {

		window.location.href = "carrinho.php";

	});

	

$(function(){



    $('.spinner .btn:first-of-type').on('click', function() {

      var btn = $(this);

      var input = btn.closest('.spinner').find('input');

      if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {    

        input.val(parseInt(input.val(), 10) + 1);

      } else {

        btn.next("disabled", true);

      }

    });

    $('.spinner .btn:last-of-type').on('click', function() {

      var btn = $(this);

      var input = btn.closest('.spinner').find('input');

      if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {    

        input.val(parseInt(input.val(), 10) - 1);

      } else {

        btn.prev("disabled", true);

      }

    });



})

</script>