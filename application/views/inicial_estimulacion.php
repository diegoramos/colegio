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
                          <h3><?=$tipo ?></h3>
                            <p>Por favor ingresa tus datos personales:</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="myform-bottom">
                      <form role="form" action="<?php echo base_url();?>inicial/add" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                            <input type="text" REQUIRED name="codigo" placeholder="CREAR CODIGO DE ALUMNO..." class="form-control" id="codigo">
                        </div>
                        <div class="form-group">
                            <input type="text" REQUIRED name="nombre" placeholder="Nombres..." class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" REQUIRED name="apellido" placeholder="Apellidos..." class="form-control" id="apellido">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" REQUIRED name="telefono" placeholder="Celular o teléfono..." class="form-control" id="telefono">
                        </div>
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
</html>