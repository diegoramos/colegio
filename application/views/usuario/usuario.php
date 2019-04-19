
<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Listado de usuarios <button class="btn btn-success " onclick="add_usuario()"><li class="fa fal fa-plus"></li> Nuevo</button></div>
                </div>
                <div class="ibox-body">
                    <div id="toolbar">
                        <button id="remove" class="btn btn-danger" disabled>
                            <i class="glyphicon glyphicon-remove"></i> Delete
                        </button>
                    </div>
                    <table
                        class="table-hover table-striped"
                        id="table"
                        data-toolbar="#toolbar"
                        data-search="true"
                        data-show-refresh="true"
                        data-show-toggle="true"
                        data-show-fullscreen="true"
                        data-show-columns="true"
                        data-detail-view="true"
                        data-show-export="true"
                        data-detail-formatter="detailFormatter"
                        data-minimum-count-columns="2"
                        data-show-pagination-switch="true"
                        data-pagination="true"
                        data-id-field="id"
                        data-page-list="[10, 25, 50, 100, ALL]"
                        data-show-footer="true"
                        data-side-pagination="server"
                        data-pagination-pre-text="Atras"
                        data-pagination-next-text="Siguiente"
                        data-response-handler="responseHandler">
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
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form" method="post" novalidate="novalidate">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" href="#info_basico" aria-controls="info_basico" role="tab" data-toggle="tab">Información basica</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#info_accesso" aria-controls="info_accesso" role="tab" data-toggle="tab">Accesso</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#permisos"  aria-controls="permisos" role="tab" data-toggle="tab">Permisos</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="info_basico">
                            <div class="form-body">
                                <div class="form-group row">
                                    <input type="hidden" id="person_id" name="person_id">
                                    <input type="hidden" id="usuario_id" name="usuario_id">
                                    <label class="col-sm-3 col-form-label">Nombre *</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="nombres">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ap. Paterno *</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="appaterno">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ap. Materno *</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="apmaterno">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Dni (*)</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="dni">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Correo</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="email">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Genero</label>
                                    <div class="col-sm-9">
                                        <select name="sexo" id="sexo" class="form-control">
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Teléfono</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="telefono">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="info_accesso">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Usuario *</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="username">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password *</label>
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
                            </div>
                        </div>
                            
                        <div role="tabpanel" class="tab-pane" id="permisos">
                            <div class="form-body">
                                <?php
                                foreach($all_modules->result() as $module)
                                {
                                    $checkbox_options = array(
                                    'name' => 'permissions[]',
                                    'id' => 'permissions'.$module->module_id,
                                    'value' => $module->module_id,
                                    'class' => 'module_checkboxes '
                                    );
                                ?>
                                <div class="ibox">
                                        <ul class="list-group list-group-bordered">
                                            <li class="list-group-item active">
                                                <label class="ui-checkbox ui-checkbox-success">
                                                    <?php echo form_checkbox($checkbox_options).'<span class="input-span"></span><label style="font-weight: bold;" for="permissions'.$module->module_id.'">'.lang('module_'.$module->module_id).':</label>'; ?>
                                                    <span class="" style=""><?php echo lang('module_'.$module->module_id.'_desc');?></span>
                                                </label>
                                            </li>
                                            <?php
                                            foreach($this->Module_action->get_module_actions($module->module_id)->result() as $module_action)
                                            {
                                                $checkbox_options = array(
                                                'name' => 'permissions_actions[]',
                                                'data-module-checkbox-id' => 'permissions'.$module->module_id,
                                                'class' => 'module_action_checkboxes',
                                                'id' => 'permissions_actions'.$module_action->module_id."|".$module_action->action_id,
                                                'value' => $module_action->module_id."|".$module_action->action_id,
                                               
                                                );
                                                ?>
                                            <li class="list-group-item permission-action-item">
                                                <label class="ui-checkbox ui-checkbox-success">
                                                    <?php echo form_checkbox($checkbox_options).'<span class="input-span"></span><label for="permissions_actions'.$module_action->module_id."|".$module_action->action_id.'">'.lang($module_action->action_name_key).'</label>'; ?>
                                                </label>

                                                    
                                            </li>
                                                <?php } ?>
                                        </ul>
                                    </div> 

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>