  </nav> 
</div>

<!-- body -->
<div class="ontainer d-flex justify-content-center">
  <div class="col-xl-9 col-lg-12 col-md-9">
      <!-- Illustrations -->
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h2 text-gray-900 mb-4">Estado de solicitud</h1>
                </div>
                
                <form class="user" method="POST" name="formulario" id="formulario" enctype="multipart/form-data">
                  <div class="container">
                  </br>
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="col-sm-6 mt-1 mb-sm-0">
                              <label><b>Número de solicitud consultado</b></label>
                            </div>
                            <div class="col-sm-6 mt-1">
                              <label><?= $datos['idSolicitud']?></label>
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="form-group row">
                  </div>
                  <hr>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Estado de busqueda</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <label><?= $datos['TipoEstado']?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Fecha de registro</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <label><?= date("d/m/Y", strtotime($datos['fechaRegistro']))?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Fecha apróximada de respuesta</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <label><?= date("d/m/Y", strtotime($datos['fechaResp']))?></label>
                    </div>
                  </div>
                  <!-- Inicio de las condicionales para visualizar el estado de la solicitud -->
                  <?php if ($datos['docEncontrado']==1) { ?>
                  <hr>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Documento encontrado</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <label>Si</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Comentarios</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <span><?= $datos['comentarios'];?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Costo por busqueda</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <label>S/.25.00</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Costo por desarchivamiento</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <label>S/.30.00</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-4 mt-1 mb-sm-0">
                      <label><b>Pagar a nombre de: </b>Gobierno Regional</label>
                    </div>
                    <div class="col-sm-4 mt-1">
                      <label><b>Número de cuenta: </b>4455337766448822</label>
                    </div>
                    <div class="col-sm-4 mt-1">
                      <label><b>Banco de la Nación</b></label>
                    </div>
                  </div>
                  <?php if ($datos['idEstado']=="ESPPAGO") {?>
                  <div class="form-group row">
                    <?php if (is_null($datos['pathVoucher'])){ ?>
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <input type="file" name="archivo">
                      <div class="input-group-prepend">
                      <!-- <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-paperclip" aria-hidden="true"></i></span> -->
                      </div>
                    </div>
                    <?php } else {?>
                    <div class="col-sm-6 mt-1">
                      <label><?= $datos['pathVoucher']?></label>
                    </div>
                    <?php }?>
                  </div>
                  <?php } elseif ($datos['idEstado']=="PROCEMIS") {?>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Voucher adjuntado</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <label><?= $datos['pathVoucher']?></label>
                    </div>
                  </div>
                  <?php } } elseif ($datos['docEncontrado']==0 && $datos['docEncontrado']!="") {?>
                  <hr>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Documento encontrado</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <label>No</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Comentarios</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <span><?= $datos['comentarios'];?></span>
                    </div>
                  </div>
                  <?php } if ($datos['docEncontrado']==1 && ($datos['idEstado']=="PROCEMIS" || $datos['idEstado']=="DOCEMIT")) {?>
                  <hr>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Tipo Documento</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <label>Testimonio</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Folios</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <label>10</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mt-1 mb-sm-0">
                      <label><b>Fojas</b></label>
                    </div>
                    <div class="col-sm-6 mt-1">
                      <label>10</label>
                    </div>
                  </div>
                  <?php }?>
                  <div class="text-center">
                    <hr>
                    <?php if ($datos['idEstado']=='ESPPAGO' && is_null($datos['pathVoucher'])) {?>
                    <button type="submit" name="btnRegistrarSolicitud" class="btn btn-info btn-user" >Enviar voucher</button>
                    <?php }?>
                    <a href="<?= URL;?>Revision" class="btn btn-danger btn-user">Salir</a>
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