  </nav> 
</div>

  <!-- body -->
  <div class="d-flex justify-content-center">
    <div class="col-xl-6 col-lg-12 col-md-9">
      <!-- Illustrations -->
      <div class="card o-hidden shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="p-4">
                <form class="user" method="POST" name="formulario" id="formulario">
                  <div class="container m-0" id="cont_formularios">
                    <div id="form_paso_a">
                      <h4 class="h2 text-gray-900 mb-4 col-md-6 col-lg-12">
                        <i class="far fa-user fa-fw fa-lg"></i>
                        <span>Validación de Datos del Ciudadano</span> 
                      </h4>
                      <div class="col-xl-12 col-lg-8 col-md-6">
                        <span>
                          </br>Estimado usuario para realizar tu servicio en línea, primero debes validar tus datos.</br>
                          </br>
                          - Ingrese el número de DNI y presionar el boton Validar con RENIEC</br>
                          - Rellene los campos obligatorios (*)</br>
                        </span>
                      </div>
                      </br>
                      <form id="form_a" name="form_a" class="user">
                        <fieldset id="info_personal" class="mt-2">
                          <div class="form-row">
                            <div class="d-block form-group col-sm-12 col-md-3 col-lg-3 col-xl-6">
                              <input type="text" class="form-control form-control-user {required:true,number:true,rangelength: [1, 8]} span3" id="dni" name="dni" placeholder="DNI" onkeypress="return valideKey(event);">
                            </div>
                            <div class="d-block form-group col-sm-12 col-md-3 col-lg-3 col-xl-6">
                              <a href="#" id="datos_ciudadano" class="btn btn-info btn-user btn-block">Validar con RENIEC</a>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-4">
                              <input type="text" class="form-control form-control-user" name="apaterno" placeholder="Apellido Paterno" readonly>
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-4">
                              <input type="text" class="form-control form-control-user" name="amaterno" placeholder="Apellido Materno" readonly>
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-4">
                              <input type="text" class="form-control form-control-user" name="nombres" placeholder="Nombres" readonly>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-6">
                              <input type="text" class="form-control form-control-user" id="telefono" name="telefono" placeholder="Celular*" onkeypress="return valideKey(event);">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-6">
                              <input type="email" class="form-control form-control-user" name="email" placeholder="Email*">
                            </div>
                          </div>
                        </fieldset>
                        <fieldset id="botonera_personales" class="form-group d-flex justify-content-start">
                          <a href="#" id="go_paso_b" type="submit" class="btn btn-primary btn-user col-xl-3">
                            Continuar<i class="fas fa-arrow-right fa-fw"></i>
                          </a>
                        </fieldset>
                      </form>
                    </div>
                    <div class="hide" id="form_paso_b">
                      <h4 class="h2 text-gray-900 mb-4 col-md-6 col-lg-12">
                        <i class="far fa-file-alt"></i>
                        Datos de la solicitud
                      </h4>
                      <span>A continuación, debe rellene los campos obligatorios (*).</span>
                      <fieldset id="info_solicitud" class="mt-2">
                        <div class="form-row"></br>
                          <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-6">
                            <input type="text" class="form-control form-control-user {required:true,rangelength: [8, 120]} span3" name="otorgadox" placeholder="Otorgado por*">
                          </div>
                          <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-6">
                            <input type="text" class="form-control form-control-user {required:true,rangelength: [8, 120]} span3" id="afavor" name="afavor" placeholder="A favor de*">
                          </div>
                          <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-6">
                            <select name="Notarios_RUC" class="form-control form-control select2" style="width: 85%;">
                              <option value="">Notario</option>
                              <?php if (!$_POST) { while ($fila = mysqli_fetch_array($datos)) { ?>
                                <option value="<?php echo $fila['RUC'];?>"><?php echo $fila['nombres'];?></option>
                              <?php } }?>
                            </select>
                          </div>
                        </div>
                      </fieldset>
                      <fieldset id="botonera_solicitud" class="form-group d-flex justify-content-start">
                          <!-- <div class="form-group">
                            <input type="text" class="form-control" name="fecha" placeholder="fecha">
                          </div> -->
                        <a href="#" id="back_paso_a" class="btn btn-primary btn-user form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 mr-2"><i class="fas fa-arrow-left fa-fw"></i>Regresar</a>
                        <button type="submit" data-toggle="modal" data-target="#resumenModal" name="btnRegistrarSolicitud" class="btn btn-primary btn-user form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">Registrar Solicitud</button>
                        <div class="form-group">
                          <!-- <a href="#" data-toggle="modal" data-target="#resumenModal" name="btnRegistrar" class="btn btn-primary btn-block">Registrar Solicitud</a> -->
                        </div>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>                  
        </div>
      </div>
    </div>
  </div>
<script src="<?php echo URL; ?>Vista/Registro/reniec.js"></script>
<script src="<?php echo URL; ?>Vista/Registro/registroXPasos.js"></script>
<!-- Logout Modal-->
<!-- <div class="modal fade" id="resumenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Resumen de la Solicitud</h1>
          </div>
          <form class="user" method="post">
            <div class="container">
              <div class="form-group row">
                <div class="col-5">
                  <label><strong>Numero de trámite:</strong></label>
                </div>
                <div class="col-3">
                  <label>20</label>
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-5">
                  <label><strong>Fecha de registro:</strong></label>
                </div>
                <div class="col-3">
                  <label>12-12-20</label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-7">
                  <label><strong>Fecha estimada de respuesta:</strong></label>
                </div>
                <div class="col-3">
                  <label>12-12-20</label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-3">
                  <label><strong>Estado:</strong></label>
                </div>
                <div class="col-3">
                  <label>En proceso</label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-4">
                  <label><strong>A nombre de:</strong></label>
                </div>
                <div class="col-3">
                  <label>Pepe</label>
                </div>
              </div>
              <div class="form-group row">
                <span>
                  Se le ha enviado el <strong>código</strong> a su <strong>correo</strong> y <strong>número de teléfono</strong>, esto le servirá para realizar la consulta del estado de su documento solicitado.
                </span>
              </div>
              <button type="submit" name="btnIngresar" class="btn btn-primary btn-user btn-block">
                Aceptar
              </button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
        
        </div>
      </div>
    </div>
  </div> -->