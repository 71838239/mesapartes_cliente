  </nav> 
</div>

<!-- body -->
<div class="container d-flex justify-content-center">
  <div class="col-xl-9 col-lg-12 col-md-9">
      <!-- Illustrations -->
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center mt-3">
                  <h1 class="h3 text-gray-900 mb-4 col-md-6 col-lg-12">Resumen de registro</h1>
                </div>
                <div class="text-left">
                  <span>
                  </span>
                </div>
                <div class="container">
                    <div class="form-group row">
                      <div class="col-5">
                        <label><strong>Numero de solicitud:</strong></label>
                      </div>
                      <div class="col-3">
                        <label class="label label-danger"><?= $datos['idSolicitud']?></label>
                      </div>
                    </div>
                    <hr class="border-bottom-dark col-xl-11 col-lg-11 col-md-11 col-sm-11">
                    <br>
                    <div class="form-group row">
                      <div class="col-5">
                        <label><strong>Fecha de registro:</strong></label>
                      </div>
                      <div class="col-3">
                        <label class="label label-default"><?= date("d/m/Y", strtotime($datos['fechaRegistro']))?></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-7">
                        <label><strong>Fecha estimada de respuesta:</strong></label>
                      </div>
                      <div class="col-3">
                        <label class="label label-default"><?= date("d/m/Y", strtotime($datos['fechaResp']))?></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-3">
                        <label><strong>Estado:</strong></label>
                      </div>
                      <div class="col-5">
                        <label class="label label-default"><?= $datos['TipoEstado']?></label>
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <div class="col-4">
                        <label><strong>A nombre de:</strong></label>
                      </div>
                      <div class="col-3">
                        <label>Pepe</label>
                      </div>
                    </div> -->
                    <div class="form-group row">
                      <span>
                        Se le ha enviado el <strong>código</strong> a su <strong>email registrado</strong>, esto le servirá para realizar la consulta del estado de su documento solicitado.
                      </span>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                      <a href="<?= URL;?>" class="btn btn-danger btn-user">Salir</a>
                    </div>
                </div>
              </div>
            </div>
          </div>                  
        </div>
      </div>
    </div>
</div>
<script src="<?php echo URL; ?>Vista/Registro/reniec.js"></script>
<!-- Logout Modal-->
<!-- <div class="modal fade" id="resumenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Resumen de la Solicitud</h1>
          </div>
          
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
          
        </div>
        <div class="modal-footer">
        
        </div>
      </div>
    </div>
  </div> -->