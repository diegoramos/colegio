<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Registro</title>
 
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css"> Iconos--> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
    
  </head>
  <body>  
     
    <div class="my-content" >
        <div class="container" > 
            <div class="row">
                <div class="col-sm-12" >
                  <h1><strong>Formulario de Registro</strong> </h1>
                  <div class="mydescription">
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                    <div class="myform-top">
                        <div class="myform-top-left">
                          <h3><?=$tipo?></h3>
                            <p>Por favor ingresa tus datos personales:</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="myform-bottom">
                      <form role="form" action="<?php echo base_url();?>primaria/add_update" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                            <input type="hidden" name="alumno_id" id="alumno_id" value="<?=isset($info->alumno_id)?$info->alumno_id:''?>">
                            <input type="hidden" name="tipo_alumno" id="tipo_alumno" value="<?=isset($info->tipo_alumno)?$info->tipo_alumno:$tipo_alumno?>">
                            <input type="text" REQUIRED name="codigo" placeholder="CREAR CODIGO DE ALUMNO..." class="form-control" id="codigo" value="<?=isset($info->codigo)?$info->codigo:''?>">
                        </div>
                        <div class="form-group">
                            <input type="text" REQUIRED name="nombre" placeholder="Nombres..." class="form-control" id="nombre" value="<?=isset($info->nombre)?$info->nombre:''?>">
                        </div>
                        <div class="form-group">
                            <input type="text" REQUIRED name="apellido" placeholder="Apellidos..." class="form-control" id="apellido" value="<?=isset($info->apellido)?$info->apellido:''?>">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" REQUIRED name="telefono" placeholder="Celular o teléfono..." class="form-control" id="telefono" value="<?=isset($info->telefono)?$info->telefono:''?>">
                        </div>
                        <?php if (isset($info->filename)) {  ?>
                          <div class="form-group">
                            <?php if ($info->filename!='') {  ?>
                              <img height="100" width="100" src="<?php echo base_url()."uploads/".$info->filename; ?>" alt="">
                            <?php } ?>
                          </div>
                        <?php } ?>
                        <div class="form-group">
                            <input type="file" name="archivo" id="archivo">
                        </div>
                        <button type="submit" class="mybtn" href="#">Registrarme</button>
                        <input name="action" type="hidden" value="<?=$action?>" /> 
                     </form>
                    </div>
              </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
      
    </script>
  </body>
=======
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Registro</title>
 
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css"> Iconos--> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
    
  </head>
  <body>  
     
    <div class="my-content" >
        <div class="container"> 
            <div class="row">
                <div class="col-sm-12" >
                  <h1><strong>Formulario de Registro</strong> </h1>
                  <div class="mydescription">
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                    <div class="myform-top">
                        <div class="myform-top-left">
                          <h3><?=$tipo?></h3>
                            <p>Por favor ingresa tus datos personales:</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="myform-bottom">
                      <form role="form" action="<?php echo base_url();?>secretary/save_secretaria" method="post" class="">
                        <div class="form-group">
                            <input type="hidden" name="id_persona" id="id_persona" value="<?=isset($info->id_persona)?$info->id_persona:''?>">
                            <input type="text" REQUIRED name="nombre" placeholder="Nombres..." class="form-control" id="nombre" value="<?=isset($info->nombres)?$info->nombres:''?>">
                        </div>
                        <div class="form-group">
                            <input type="text" REQUIRED name="apellidos" placeholder="Apellidos..." class="form-control" id="apellidos" value="<?=isset($info->appaterno)?$info->appaterno:''?>">
                        </div>
                        <div class="form-group">
                            <input type="number" max="99999999" REQUIRED name="dni" placeholder="DNI..." class="form-control" id="dni" value="<?=isset($info->dni)?$info->dni:''?>">
                        </div>
                         <div class="form-group col-md-offset-2 col-md-8">
                            <input type="email" REQUIRED name="usuario" placeholder="NOMBRE DE SECRETARIA..." class="form-control" id="usuario" value="<?=isset($info->usuario)?$info->usuario:''?>">
                        </div>
                        <div class="form-group col-md-offset-2 col-md-8">
                            <input type="password" <?php if(!isset($info->id_persona)){ ?> REQUIRED <?php } ?> name="password" placeholder="CONTRASEÑA DE DIRECTOR..." class="form-control" id="password">
                        </div>
                        <button type="submit" class="mybtn" href="#">Registrarme</button>
                        <input name="action" type="hidden" value="<?php echo isset($_GET['action']) ? $_GET['action']:$action; ?>" /> 
                     </form>
                    </div>
              </div>
            </div>
            
        </div>
    </div>
      

  </body>
>>>>>>> 5f9417112b2d81f9eb336ce09c1b889240d7e06f
</html>