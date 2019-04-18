      <section class="full-box dashboard-contentPage">
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
          </section>