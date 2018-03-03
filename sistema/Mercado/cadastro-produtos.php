<?php include_once "headerMercado.php";?>
          <h5 class="page-title hidden-menubar-top hidden-float">Cadastrar Produtos</h5>
<?php include_once "navBarMercado.php";?>
<div class="col-md-12">
				<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Formulario de Cadastro</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<form id="formCadastro" action="../funcoes/CadastroProduto.php" enctype="multipart/form-data" method="post" class="form-horizontal">
							<div class="form-group">	
								<label for="txtNomeCadastro" class="col-sm-2 col-sm-offset-2 control-label">Nome</label>
								<div class="col-sm-5">
									<input class="form-control input-lg" type="text" id="txtNomeCadastro" name="nome" placeholder="Nome">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtEmailCadastro" class="col-sm-2 col-sm-offset-2 control-label">Marca</label>
								<div class="col-sm-5">
									<input class="form-control input-lg" type="text" id="txtMarcaCadastro" name="marca" placeholder="Marca">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtEnderecoCadastro" class="col-sm-2 col-sm-offset-2 control-label">Peso</label>
								<div class="col-sm-5">
									<input class="form-control input-lg" type="text" id="txtPesoCadastro" name="peso" placeholder="Peso">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtPrecoCadastro" class="col-sm-2 col-sm-offset-2 control-label">Preço</label>
								<div class="col-sm-5">
									<input class="form-control input-lg" type="text" id="txtPrecoCadastro" name="preco" placeholder="Preço">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">
								<label for="txtDescricaoCadastro" class="col-sm-2 col-sm-offset-2 control-label">Descrição</label>
								<div class="col-sm-5">
									<textarea id="txtDescricaoCadastro" maxlength="150" name="descr" class="form-control" placeholder="Descrição" cols="30" rows="10"></textarea>
								</div>
							</div>
							<div class="form-group">	
								<label for="txtTelefoneCadastro" class="col-sm-2 col-sm-offset-2 control-label">Categoria</label>
								<div class="col-sm-3">
								  <select name="categoria" class="form-control input-lg">
									<option value="0">Categoria</option>
									<?php 
										include '../conection.php';
										
										$sql = "SELECT * FROM `produto_categoria`;";
										$result = $conn->query($sql);
										while($row = $result->fetch_assoc()) {
											echo "<option value=" .$row['ID_CATEGORIA'] . ">" . $row['NOME'] . "</option>";
										}
										echo "</select> "							
										//$conn->close();
									?>
								  </select>
								</div>
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
									<button type="submit" class="btn rounded mw-md btn-primary " form="formCadastro" value="Submit">Cadastrar</button>
								</div>
							</div>
						</form>
						
					</div>
				</div><!-- .widget -->
			</div>
<?php include_once "footerMercado.php";?>