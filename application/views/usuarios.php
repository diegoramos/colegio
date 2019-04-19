
<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Listado de usuarios <button class="btn btn-success " onclick="add_user()"><li class="fa fal fa-pencil"></li> Nuevo</button></div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="usuario_table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                                <th>Descripion</th>
                                <th>Estado</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                                <th>Descripion</th>
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
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-body">
                    <form class="form-horizontal" id="form" method="post" novalidate="novalidate">
                        <input type="hidden" id="usuario_id" name="usuario_id">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Usuario</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="email" name="username">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="password" type="password" name="password" placeholder="password">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Psw (confirm)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="confirm password">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Descripcion</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ROL</label>
                            <div class="col-sm-9">
                                <select name="rol" id="rol" class="form-control">
                                    <?php foreach($roles as $rols){ ?>
                                    <option value="<?=$rols->id?>"><?=$rols->nombre?></option>
                                    <?php } ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>