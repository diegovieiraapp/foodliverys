<?php include_once "headerMaster.php";?>
          <h5 class="page-title hidden-menubar-top hidden-float">Editar Usuário</h5>
<?php include_once "navBarMaster.php";?>
<div class="col-md-12">
				<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Alterar/Excluir</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<?php 
							include_once "../conection.php";
							
							$id = $_GET['id'];
							$_SESSION['idAlterar'] = $id;
							
							$sql = "SELECT * FROM `cadastro_usuario` WHERE ID_USUARIO = ".$id.";";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo '<form id="formCadastro" action="../funcoes/AlterarUsuario.php"  enctype="multipart/form-data" method="post" class="form-horizontal">
											<div class="form-group">	
												<label for="txtNomeCadastro" class="col-sm-2 col-sm-offset-2 control-label">Nome</label>
												<div class="col-sm-5">
													<input class="form-control input-lg" type="text" id="txtNomeCadastro" name="nome" value="'.$row['NOME'].'" placeholder="Nome">
												</div>
											</div><!-- .form-group -->
											<div class="form-group">	
												<label for="txtEmailCadastro" class="col-sm-2 col-sm-offset-2 control-label">Email</label>
												<div class="col-sm-5">
													<input class="form-control input-lg" type="text" id="txtEmailCadastro" name="email" value="'.$row['EMAIL'].'" placeholder="Email">
												</div>
											</div><!-- .form-group -->
											<div class="form-group">	
												<label for="txtEnderecoCadastro" class="col-sm-2 col-sm-offset-2 control-label">Endereço</label>
												<div class="col-sm-5">
													<input class="form-control input-lg" type="text" id="txtEnderecoCadastro" value="'.$row['ENDERECO'].'" name="endereco" placeholder="Endereço">
												</div>
											</div><!-- .form-group -->
											<div class="form-group">	
												<label for="txtTelefoneCadastro" class="col-sm-2 col-sm-offset-2 control-label">Telefone</label>
												<div class="col-sm-3">
													<input class="form-control input-lg" type="text" id="txtTelefoneCadastro" value="'.$row['TELEFONE'].'" name="telefone" placeholder="Telefone">
												</div>
												
											</div><!-- .form-group -->
											<div class="form-group">	
												<label for="txtTelefoneCadastro" class="col-sm-2 col-sm-offset-2 control-label">Senha</label>
												<div class="col-sm-3">
													<input class="form-control input-lg" type="password" id="txtSenhaCadastro" name="password" placeholder="Senha">
												</div>
												
											</div><!-- .form-group -->
											<div class="form-group">	
												<label for="txtTelefoneCadastro" class="col-sm-2 col-sm-offset-2 control-label">Tipo conta</label>
												<div class="col-sm-3">
												  <select name="tipoConta" class="form-control input-lg">
														<option value="0">Tipo</option>';
													  if($row['ID_PERFIL'] == 1){
														 echo '<option selected="selected" value="1">Master</option>';
													  }else{
														echo '<option value="1">Master</option>';  
													  }
													  if($row['ID_PERFIL'] == 2){
														echo '<option selected="selected" value="2">Mercado</option>' ; 
													  }else{
														echo '<option value="2">Mercado</option>'; 
													  }
													  if($row['ID_PERFIL'] == 3){
														echo '<option selected="selected" value="3">Cliente</option>';  
													  }else{
														echo '<option value="3">Cliente</option>';
													  }
													  if($row['ID_PERFIL'] == 4){
														echo '<option selected="selected" value="4">Delivery</option>';  
													  }else{
														echo '<option value="4">Delivery</option>';  
													  }
													
													
												 echo '</select>
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
													<button type="submit" class="btn rounded mw-md btn-primary " form="formCadastro" value="Submit">Alterar</button>
													<button id="btnExcluir" type="button" class="btn rounded mw-md btn-danger " value="Submit">Excluir</button>
												</div>
											</div>
										</form>';
								}
							}
														
							//$conn->close();
						?>	
					</div>
				</div><!-- .widget -->
			</div>
<?php include_once "footerMaster.php";?>
<script>
$('#btnExcluir').click(function() {
		$.ajax({
			url: '../funcoes/ExcluirUsuario.php',
			type: 'POST',
			data: {	},
			success: function(msg) {
				alert('Usuário Removido');
				location.href = "../Master/<?php echo $_SESSION['urlCaminho'] ?>";
			}               
		});
	});
</script>