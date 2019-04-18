<?php
if(isset($emisor->emisor_id)){
    $emisor_id = $emisor->emisor_id;
}else{
    $emisor_id='';
}
?>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Listado de Facturas <img class="pull-right principal_sunat" style = "cursor:pointer" onclick="enviar_todos_sunat('<?=$emisor_id?>')" width="100" src="<?php echo base_url()?>assets/img/logoamplio.png" alt=""></div><div class="loading_ajax_sunat"></div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="factura_table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Moneda</th>
                                <th>Serie</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Moneda</th>
                                <th>Serie</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Ver</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="infofactura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-body">
                    <table class="table table-bordered" id="informacion_table" style="table-layout:fixed">
                        
                    </table>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

