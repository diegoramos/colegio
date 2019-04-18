<style>
</style>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">USUARIO DE AUTENTICACIÓN</div>
                </div>
                <div class="ibox-body">
                    <form id="form1">
                        <input type="hidden" name="id" value="<?php echo (isset($userinfo->id))?$userinfo->id:''; ?>">
                        <input type="hidden" name="action" value="<?php echo (isset($userinfo->id))?'update':'save'; ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuario</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-email"></i></div>
                                <input type="text" class="form-control habi1" id="exampleInputEmail1" name="username" id="username" placeholder="Usuario" value="<?php echo (isset($userinfo->username))?$userinfo->username:''; ?>" disabled="" required>
                            </div>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputpwd1">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <input type="password" class="form-control habi1" id="exampleInputpwd1" placeholder="Enter password" name="password" id="password" disabled="" <?php if(isset($userinfo->password)){ if($userinfo->password==''){ echo "required";}} ?>>
                            </div>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputpwd2">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <input type="password" class="form-control habi1" id="exampleInputpwd2" placeholder="Enter password" name="password2" id="password2" disabled="" <?php if(isset($userinfo->password)){ if($userinfo->password==''){ echo "required";}} ?>>
                            </div>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputphone">Descripción</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                <input type="tel" class="form-control habi1" id="exampleInputphone" placeholder="Descripción" name="descripion" id="descripion" value="<?php echo (isset($userinfo->descripion))?$userinfo->descripion:''; ?>" disabled="">
                            </div>
                            <span class="help-block"></span>
                        </div>
                        <?php if(!$is_demo){ ?>
                        <button type="submit" id="saveuser" class="btn btn-success waves-effect waves-light m-r-10 habi1" disabled="">Guadar</button>
                        <?php } ?>
                        <button type="button" id="habilitar1" class="btn btn-inverse waves-effect waves-light  pull-right">Habilitar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">DATOS DEL EMISOR</div>
                </div>
                <div class="ibox-body">
                    <form data-toggle="validator" id="form2">
                        <input type="hidden" name="id" value="<?php echo (isset($emisorinfo->id)) ? $emisorinfo->id : ''; ?>">
                        <input type="hidden" name="usuario_id" value="<?php echo (isset($userinfo->id)) ? $userinfo->id : ''; ?>">
                        <input type="hidden" name="action" value="<?php echo (isset($emisorinfo->id)) ? 'update' : 'save'; ?>">
                        <div class="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="inputPassword2" class="control-label">RUC</label>
                                    <input type="text" data-toggle="validator" data-minlength="11" size="11" maxlength="11" class="form-control habi2" id="ruc" name="ruc" placeholder="RUC" required value="<?php echo (isset($emisorinfo->ruc)) ? $emisorinfo->ruc : ''; ?>" disabled="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputPassword2" class="control-label">Nombre comercial</label>
                                    <input type="text" data-toggle="validator" class="form-control habi2" id="nom_comercial" name="nom_comercial" placeholder="Nombre comercial" required value="<?php echo (isset($emisorinfo->nom_comercial)) ? $emisorinfo->nom_comercial : ''; ?>" disabled="">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="inputPassword2" class="control-label">Razon social</label>
                                    <input type="text" data-toggle="validator" class="form-control habi2" id="razon_social" name="razon_social" placeholder="Razon social" required value="<?php echo (isset($emisorinfo->razon_social)) ? $emisorinfo->razon_social : ''; ?>" disabled="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputPassword2" class="control-label">Codigo ubigeo</label>
                                    <select data-toggle="validator" required class="form-control habi2" id="codigo_ubigeo" name="codigo_ubigeo" disabled="">
                                        <?php foreach ($ubigeo as $key => $value) : ?>
                                        <option <?php if ($emisorinfo->codigo_ubigeo == $value->codigo_ubigeo) { ?> selected <?php 
                                                                                                                                    } ?> value="<?= $value->codigo_ubigeo ?>"><?= $value->nombre ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                    <!-- <input type="text" data-toggle="validator" class="form-control habi2" id="codigo_ubigeo" name="codigo_ubigeo" placeholder="Codigo ubigeo" required value="<?php echo (isset($data['emisorinfo']['codigo_ubigeo'])) ? $data['emisorinfo']['codigo_ubigeo'] : ''; ?>" disabled=""> -->

                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="inputPassword2" class="control-label">Direccion</label>
                                    <input type="text" data-toggle="validator" class="form-control habi2" id="direccion" name="direccion" placeholder="Direccion" required value="<?php echo (isset($emisorinfo->direccion)) ? $emisorinfo->direccion : ''; ?>" disabled="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputPassword2" class="control-label">Departamento</label>
                                    <input type="text" data-toggle="validator" class="form-control habi2" id="direccion_departamento" name="direccion_departamento" placeholder="Departamento" required value="<?php echo (isset($emisorinfo->direccion_departamento)) ? $emisorinfo->direccion_departamento : ''; ?>" disabled="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="inputPassword2" class="control-label">Provincia</label>
                                    <input type="text" data-toggle="validator" class="form-control habi2" id="direccion_provincia" name="direccion_provincia" placeholder="Provincia" required value="<?php echo (isset($emisorinfo->direccion_provincia)) ? $emisorinfo->direccion_provincia : ''; ?>" disabled="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputPassword2" class="control-label">Distrito</label>
                                    <input type="text" data-toggle="validator" class="form-control habi2" id="direccion_distrito" name="direccion_distrito" placeholder="Distrito" required value="<?php echo (isset($emisorinfo->direccion_distrito)) ? $emisorinfo->direccion_distrito : ''; ?>" disabled="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="inputPassword2" class="control-label">Usuariosol</label>
                                    <input type="text" data-toggle="validator" class="form-control habi2" id="usuariosol" name="usuariosol" placeholder="Usuariosol" required value="<?php echo (isset($emisorinfo->usuariosol)) ? $emisorinfo->usuariosol : ''; ?>" disabled="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputPassword2" class="control-label">Clavesol</label>
                                    <input type="text" data-toggle="validator" class="form-control habi2" id="clavesol" name="clavesol" placeholder="Clavesol" required value="<?php echo (isset($emisorinfo->clavesol)) ? $emisorinfo->clavesol : ''; ?>" disabled="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="inputPassword2" class="control-label">Codigo pais</label>
                                    <input type="text" data-toggle="validator" class="form-control habi2" name="direccion_codigopais" id="direccion_codigopais" placeholder="Codigo pais" required value="<?php echo (isset($emisorinfo->direccion_codigopais)) ? $emisorinfo->direccion_codigopais : ''; ?>" disabled="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php if (!$is_demo) { ?>
                            <button type="submit" class="btn btn-success habi2 botonemisor" disabled="" <?php if (!isset($userinfo->id)) {
                                                                                                            echo "style='display: none;'";
                                                                                                        } ?>>Guardar</button>
                            <?php  } ?>
                            <button type="button" id="habilitar2" class="btn btn-inverse pull-right botonemisor" <?php if (!isset($userinfo->id)) {
                                                                                                                        echo "style='display: none;'";
                                                                                                                    } ?>>Habilitar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">INFO SUNAT</div>
                </div>
                <div class="ibox-body">
                    <form id="form3">
                            <input type="hidden" name="id" value="<?php echo (isset($infosunat->id))?$infosunat->id:''; ?>">
                            <input type="hidden" name="emisor_id" value="<?php echo (isset($emisorinfo->id))?$emisorinfo->id:''; ?>">
                            <input type="hidden" name="action" value="<?php echo (isset($infosunat->id))?'update':'save'; ?>">
                            <div class="form-group">
                                <label for="exampleInputpwd1">Ruta</label>
                                <select class="form-control habi3" name="ruta_sunat" id="ruta_sunat" disabled="" required>
                                    <option value="3" <?php if(isset($infosunat->ruta_sunat)){ if($infosunat->ruta_sunat=='3'){ echo 'selected';} } ?>>Beta</option>
                                    <option value="1" <?php if(isset($infosunat->ruta_sunat)){ if($infosunat->ruta_sunat=='1'){ echo 'selected';} } ?>>Producción</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputpwd1">Carpeta</label>
                                <div class="input-group">
                                    <input type="text" class="form-control habi3" name="carpetas" placeholder="Carpeta" value="<?php echo (isset($infosunat->carpeta))?$infosunat->carpeta:''; ?>"  disabled="" required>
                                    <div class="input-group-addon"><i class="ti-file"></i></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputpwd2">Keycert</label>
                                <div class="input-group">
                                    <input type="text" class="form-control habi3" id="keycert" name="keycert" placeholder="Keycert" value="<?php echo (isset($infosunat->keycert))?$infosunat->keycert:''; ?>"  disabled="" required>
                                    <div class="input-group-addon"><i class="ti-lock"></i></div>
                                </div>
                            </div>
                            <div class="">
                                <?php if(!$is_demo){ ?>
                                    <?php if(isset($emisorinfo->id)){ 
                                        if($emisorinfo->id!=''){ ?>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 habi3" disabled="">Guardar</button>
                                    <?php } } ?>
                                <?php } ?>
                                <button type="button" id="habilitar3" class="btn btn-inverse waves-effect waves-light  pull-right">Habilitar</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">CERTIFICADO DIGITAL</div>
                </div>
                <div class="ibox-body">
                    <form id="form4" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo (isset($infosunat->id))?$infosunat->id:''; ?>">
                        <input type="hidden" name="action" value="updatecert">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subir Certificado</label>
                            <input class="form-control habi4" disabled="" style="color: black;" type="file" id="certificado" name="certificado" >
                            <span class="help-block"></span>
                            <input class="form-control btn btn-primary" style="color: black;" type="hidden" name="carpeta" value="<?php echo (isset($infosunat->carpeta))?$infosunat->carpeta:''; ?>"> 
                        </div>
                        <?php if(!$is_demo){ ?>
                            <?php if(isset($emisorinfo->id)){ 
                                if($emisorinfo->id!=''){ ?>
                            <button type="submit" id="updatecert" class="btn btn-success waves-effect waves-light m-r-10 habi4" disabled="">Guadar</button>
                            <?php } } ?>
                        <?php } ?>
                        <button type="button" id="habilitar4" class="btn btn-inverse waves-effect waves-light  pull-right">Habilitar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Logo de la empresa</div>
                </div>
                <div class="ibox-body">
                    <form id="form5" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo (isset($userinfo->id))?$userinfo->id:''; ?>">
                        <input type="hidden" name="action" value="updatelogo">
                        <div class="form-group">
                            <div class="col-sm-12" align="center">
                                <?php if (isset($emisorinfo->ruc)) { ?>
                                    <?php if($emisorinfo->ruc!=''){ ?>
                                <img src="<?php echo base_url(); ?>assets/img/logos/<?php echo $emisorinfo->ruc; ?>.png" alt="">
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subir o cambiar logo   [tamaño 350 x 125]</label>
                            <input class="form-control logobloc habi5" type="file" disabled="" id="txtlogo" name="txtlogo" >
                            <span class="help-block"></span>
                        </div>
                        <?php if(!$is_demo){ ?>
                            <?php if(isset($emisorinfo->id)){ 
                                if($emisorinfo->id!=''){ ?>
                            <button type="submit" id="updatelogo" class="btn btn-success waves-effect waves-light m-r-10 habi5" disabled="">Guadar</button>
                            <?php } } ?>
                        <?php } ?>
                        <button type="button" id="habilitar5" class="btn btn-inverse waves-effect waves-light  pull-right">Habilitar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 