<?php include_once "headerMaster.php";?>
          <h5 class="page-title hidden-menubar-top hidden-float">Cadastrar Mercado</h5>
<?php include_once "navBarMaster.php";?>
<div class="col-md-12">
				<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Formulario de Cadastro</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<form id="formCadastro" action="../funcoes/CadastrarUsuario.php" method="post" enctype="multipart/form-data" class="form-horizontal">
							<div class="form-group">	
								<label for="txtNomeCadastro" class="col-sm-2 col-sm-offset-2 control-label">Nome</label>
								<div class="col-sm-5">
									<input class="form-control input-lg" type="text" id="txtNomeCadastro" name="nome" placeholder="Nome">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtEmailCadastro" class="col-sm-2 col-sm-offset-2 control-label">Email</label>
								<div class="col-sm-5">
									<input class="form-control input-lg" type="text" id="txtEmailCadastro" name="email" placeholder="Email">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtEnderecoCadastro" class="col-sm-2 col-sm-offset-2 control-label">Endereço</label>
								<div class="col-sm-5">
									<input class="form-control input-lg" type="text" id="txtEnderecoCadastro" name="endereco" placeholder="Endereço">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtTelefoneCadastro" class="col-sm-2 col-sm-offset-2 control-label">Telefone</label>
								<div class="col-sm-3">
									<input class="form-control input-lg" type="text" id="txtTelefoneCadastro" name="telefone" placeholder="Telefone">
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
									<option value="0">Tipo</option>
									<option value="1">Master</option>
									<option value="2">Mercado</option>
									<option value="3">Cliente</option>
									<option value="4">Delivery</option>
								  </select>
								</div>
							</div><!-- .form-group -->
							<div class="form-group">
								<label for="exampleInputFile" class="col-sm-2 col-sm-offset-2 control-label">Imagem</label>
								<div class="col-sm-5">
									<input type="file" id="urlImage" name="urlImage" class="form-control">
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
<?php include_once "footerMaster.php";?>
<script>
$('input[type="file"]').change(function(){
    var f=this.files[0];
    var sizeInMb = f.size/1024;
    var sizeLimit= 1024*0.5; // if you want 2 MB
    if (sizeInMb > sizeLimit) {
        alert('Desculpe, o tamanho do arquivo selecionado ultrapassa o limite de 512 KB!');
        // reset the input (code for all browser)
        $(this).val('').clone(true);
        return false;
    }
    else {
        var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];
		 for (var i = 0; i < $(this).length; i++) {
			var oInput = $(this)[i];
			if (oInput.type == "file") {
				var sFileName = oInput.value;
				if (sFileName.length > 0) {
					var blnValid = false;
					for (var j = 0; j < _validFileExtensions.length; j++) {
						var sCurExtension = _validFileExtensions[j];
						if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
							blnValid = true;
							break;
						}
					}
					
					if (!blnValid) {
						alert("Desculpe, " + sFileName + " invalido, só é permitido arquivos do tipo: " + _validFileExtensions.join(", "));
						$(this).val('').clone(true);
						return false;
					}
				}
			}
		 }
    }
});
</script>