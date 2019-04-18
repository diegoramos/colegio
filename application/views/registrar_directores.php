<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario Login</title>
 
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/font-awesome.min.css"> <!--Iconos--> 
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
                          <h3>Regístrar</h3>
                            <p>Por favor ingresa tus datos personales:</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="myform-bottom">
                      <form role="form" action="registrar_usuario_director.php" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                        
                            <input type="text" REQUIRED name="NOMBRE" placeholder="Nombres..." class="form-control" id="form-firtsname">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" REQUIRED name="APELLIDO" placeholder="Apellidos..." class="form-control" id="form-lastname">
                        </div>
                         <div class="form-group col-md-offset-2 col-md-8">
                        
                            <input type="text" REQUIRED name="usuario" placeholder="NOMBRE DE USUARIO..." class="form-control" id="form-usuario">
                        </div>
                        <div class="form-group col-md-offset-2 col-md-8">
                            <input type="text" REQUIRED name="contrasena" placeholder="CONTRASEÑA DE DIRECTOR..." class="form-control" id="form-contrasena">
                        </div>
                        
                        
                        
                        <button type="submit" class="mybtn" href="#">Registrarme</button>
                        <input name="action" type="hidden" value="upload" /> 
                     </form>
                    </div>
              </div>
            </div>
            
        </div>
      </div>
      

  </body>
</html>