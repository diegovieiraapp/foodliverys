<?php include_once "headerCliente.php";?>
          <h5 class="page-title hidden-menubar-top hidden-float">Pedido</h5>
<?php include_once "navBarCliente.php";?>
<div class="col-md-12">
    <div class="widget">
        <!-- .widget-header -->
        <div class="widget-body">
            <div id="responsive-datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <div style="position: absolute; height: 1px; width: 0px; overflow: hidden;"><input type="text" tabindex="0"></div>
                        <table id="responsive-datatable" data-plugin="DataTable" data-options="{
									ajax: '../api/json/consultaPedido.json',
									responsive: true,
									keys: true
								}" class="table table-striped dataTable dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="responsive-datatable_info" style="width: 100%; position: relative;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="responsive-datatable" rowspan="1" colspan="1" style="width: 125px;" aria-label="nome: activate to sort column descending" aria-sort="ascending">Pruduto</th>
                                    <th class="sorting" tabindex="0" aria-controls="responsive-datatable" rowspan="1" colspan="1" style="width: 153px;" aria-label="telefone: activate to sort column ascending">quantidade</th>
                                    <th class="sorting" tabindex="0" aria-controls="responsive-datatable" rowspan="1" colspan="1" style="width: 121px;" aria-label="endereco: activate to sort column ascending">valor</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Produto</th>
                                    <th rowspan="1" colspan="1">Quantidade</th>
                                    <th rowspan="1" colspan="1">Valor</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr class="odd">
                                    <td valign="top" colspan="3" class="dataTables_empty">No data available in table</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- .widget-body -->
    </div>
    <!-- .widget -->
</div>
<?php include_once "footerCliente.php";?>
