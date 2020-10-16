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
                <div class="text-center">
                  <h4 class="h2 text-gray-900 mb-4"><i class="fas fa-clipboard-list mr-2"></i>Revisión de estado de solicitud</h4>
                </div>
                <div class="text-left ml-4">
                  <span>
                    *Ingrese el número de solicitud y código de acceso</br>
                    *Revise la bandeja de entrada del correo registrado para obtener los datos de ingreso
                  </span>
                </div><br><br>
                <form class="user" method="POST" name="formulario" id="formulario">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="numSolcitud" placeholder="Número de solicitud">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="codAcceso" placeholder="Código de acceso">
                  </div>
                    <!-- <div class="form-group">
                      <input type="text" class="form-control" name="fecha" placeholder="fecha">
                    </div> -->
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck">Recordar mis datos</label>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" data-toggle="modal" data-target="#resumenModal" name="btnRegistrarSolicitud" class="btn btn-primary btn-user">Ingresar</button>
                    <div class="form-group">
                      <p class="mb-1 text-danger">
                      <?= $datos;?>
                      </p>
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