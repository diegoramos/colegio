<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <h4 class="m-b-5 font-strong">S/ <?=($total_factura!='')?$total_factura:0?></h4>
                    <div class="m-b-5">Facturas</div><i class="fa fa-money widget-stat-icon"></i>
                    <!--<div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>-->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h4 class="m-b-5 font-strong">S/ <?=round(($total_boleta!='')?$total_boleta:0,3)?></h4>
                    <div class="m-b-5">Botelas</div><i class="fa fa-money widget-stat-icon"></i>
                    <!--<div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>-->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h4 class="m-b-5 font-strong"><?=$cantidad_documentos?></h4>
                    <div class="m-b-5">Cantidad documentos</div><i class="ti-files widget-stat-icon"></i>
                    <!--<div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div> -->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h4 class="m-b-5 font-strong"><?=$cantidad_comunicacion?></h4>
                    <div class="m-b-5">Cantidad de baja</div><i class="ti-files widget-stat-icon"></i>
                    <!--<div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>-->
                </div>
            </div>
        </div>
    </div>
</div>