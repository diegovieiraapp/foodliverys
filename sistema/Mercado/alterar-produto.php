<?php include_once "headerMercado.php";?>
          <h5 class="page-title hidden-menubar-top hidden-float">Alterar/Ecluir</h5>
<?php include_once "navBarMercado.php";?>
<div class="col-md-12">
				<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Formulario de Cadastro</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<?php 
						include_once "../conection.php";
							
							$id = $_GET['produto'];
							$_SESSION['idAlterar'] = $id;
							
							$sql = "SELECT * FROM `cadastro_produto` WHERE ID_PRODUTO = ".$id.";";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
						
									echo '<form id="formCadastro" action="../funcoes/AlterarProduto.php" enctype="multipart/form-data" method="post" class="form-horizontal">
										<div class="form-group">	
											<label for="txtNomeCadastro" class="col-sm-2 col-sm-offset-2 control-label">Nome</label>
											<div class="col-sm-5">
												<input class="form-control input-lg" type="text" id="txtNomeCadastro" name="nome" value="'.$row['NOME'].'" placeholder="Nome">
											</div>
										</div><!-- .form-group -->
										<div class="form-group">	
											<label for="txtEmailCadastro" class="col-sm-2 col-sm-offset-2 control-label">Marca</label>
											<div class="col-sm-5">
												<input class="form-control input-lg" type="text" id="txtMarcaCadastro" name="marca" value="'.$row['MARCA'].'" placeholder="Marca">
											</div>
										</div><!-- .form-group -->
										<div class="form-group">	
											<label for="txtEnderecoCadastro" class="col-sm-2 col-sm-offset-2 control-label">Peso</label>
											<div class="col-sm-5">
												<input class="form-control input-lg" type="text" id="txtPesoCadastro" name="peso" value="'.$row['PESO'].'"  placeholder="Peso">
											</div>
										</div><!-- .form-group -->
										<div class="form-group">	
											<label for="txtPrecoCadastro" class="col-sm-2 col-sm-offset-2 control-label">Preço</label>
											<div class="col-sm-5">
												<input class="form-control input-lg" type="text" id="txtPrecoCadastro" name="preco" value="'.$row['PRECO'].'"  placeholder="Preço">
											</div>
										</div><!-- .form-group -->
										<div class="form-group">
											<label for="txtDescricaoCadastro" class="col-sm-2 col-sm-offset-2 control-label">Descrição</label>
											<div class="col-sm-5">
												<textarea id="txtDescricaoCadastro" maxlength="150" name="descr" class="form-control" placeholder="Descrição" cols="30" rows="10">'.$row['DESCRICAO'].'</textarea>
											</div>
										</div>
										<div class="form-group">	
											<label for="txtTelefoneCadastro" class="col-sm-2 col-sm-offset-2 control-label">Categoria</label>
											<div class="col-sm-3">
											  <select name="categoria" class="form-control input-lg">
												<option value="0">Categoria</option>';

													
													$sql = "SELECT * FROM `produto_categoria`;";
													$result1 = $conn->query($sql);
													while($row1 = $result1->fetch_assoc()) {
														if($row1['ID_CATEGORIA'] == $row['ID_CATEGORIA']){
															echo '<option selected="selected" value=' .$row1["ID_CATEGORIA"] . '>' . $row1["NOME"] . '</option>';
														}else{
															echo '<option value=' .$row1["ID_CATEGORIA"] . '>' . $row1["NOME"] . '</option>';
														}	
													}
													echo '</select>';							
										
											echo '</div>
										</div><!-- .form-group -->
										<div class="form-group">
											<label for="exampleInputFile" class="col-sm-2 col-sm-offset-2 control-label">Imagem</label>
											<div class="col-sm-5">
												<input type="file" id="exampleInputFile" name="urlImage" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputFile" class="col-sm-2 col-sm-offset-2 control-label"></label>
											<div class="col-sm-5">
												<button type="submit" class="btn rounded mw-md btn-success " form="formCadastro" value="Submit">Salvar</button>
												<button id="btnExcluir" type="button" class="btn rounded mw-md btn-danger " value="Submit">Excluir</button>
											</div>
										</div>
									</form>';
									
										}
							}
									
									?>
							
						
					</div>
				</div><!-- .widget -->
			</div>
<?php include_once "footerMercado.php";?>
<script>
$('#btnExcluir').click(function() {
		$.ajax({
			url: '../funcoes/ExcluirProduto.php',
			type: 'POST',
			data: {	},
			success: function(msg) {
				alert('Produto Removido');
				location.href = "../Mercado/consultar-produto.php";
			}               
		});
	});
</script>