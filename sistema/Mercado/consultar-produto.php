<?php include_once "headerMercado.php";?>
          <h5 class="page-title hidden-menubar-top hidden-float">Realizar Pedido</h5>
<?php include_once "navBarMercado.php";?>	
	<div class="col-md-12">
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
						if (isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] != '') {	
							$sql1 = "SELECT `ID_CATEGORIA`, `NOME` FROM `produto_categoria` ORDER BY ID_CATEGORIA;";
							$result1 = $conn->query($sql1);
							if ($result1->num_rows > 0) {
								while($row1 = $result1->fetch_assoc()) {
									echo '<div role="tabpanel" class="tab-pane fade" id="'.$row1['ID_CATEGORIA'].'">
											<p class="lh-lg">
												<!-- .widget-header -->
											<div class="widget-body">';
												
												$id_mercado = $_SESSION['id_usuario'];
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
																	echo '<div class="col-sm-6 col-md-4">';
																		echo '<div class="panel panel-default">';
																			echo '<div class="column productbox clearfix">';
																				echo '<img src="'.$row['IMAGEM'].'" class="img-responsive imagem-produto">';
																					echo '<div class="producttitle title-product">'.$row['NOMEC'].' '.$row['MARCA'].' - '.$row['PESO'].'</div>';
																					echo '<div class="productprice">
																							<div class="pricetext descricao-produto"></div>
																					</div>
																					<div id="formProduto" class="pull-right">
																						<input type="hidden" class="btn btn-danger btn-sm" name="produto" value="'.$row['ID_PRODUTO'].'"/>
																						<div class="col-md-6 marginZero">
																							<span class="price-product">$ '.$row['PRECO'].'</span>
																						</div>	
																						  <div class="col-md-6 marginZero">
																							<input type="submit" class="btn btn-warning btn-sm botao" name="foo" value="Editar"/>
																						</div>
																					</div>';		
																			echo '</div>
																		</div><!-- END column -->
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
		
				</div><!-- .widget -->
					
<?php include_once "footerMercado.php";?>
<script>
$('#formProduto .col-md-6 .botao').click(function() {
		var produto = $(this).offsetParent().offsetParent(0).children(0).children(0).children(0).children(2)[1].value;
		window.location.href = 'alterar-produto.php?produto=' + produto;
	});
</script>