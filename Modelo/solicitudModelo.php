<?php namespace Modelo;
class solicitudModelo
{
	 private $idSolicitud;
	 private $fechaRegistro;
	 private $otorgadoX;
	 private $aFavor;
	 private $fechaDoc;
	 private $pathVoucher;
	 private $fechaPago;
	 private $fechaEntrega;
	 private $codAcceso;
	 private $Estados_idEstado;
	 private $Notarios_RUC;
	 private $Solicitantes_DNI;
	 private $Usuarios_DNI;
	 private $con;

	 public function __construct()
	 {
	 	$this->con = new Conexion();
	 }
	
	 public function set($atributo, $contenido)
	 {
	 	$this->$atributo = $contenido;
	 }

	 public function get($atributo)
	 {
	 	return $this->$atributo;
	 }

	 public function listar()
	 {
	 	$sql = "CALL sp_listar_solicitudes();";
	 	$datos = $this->con->consultaRetorno($sql);
	 	return $datos;
	 }

	 public function add()
	 {
	 	$sql = "CALL sp_c_solicitudes('{$this->otorgadoX}','{$this->aFavor}','{$this->Notarios_RUC}','{$this->Solicitantes_DNI}',
	 		'{$this->Usuarios_DNI}');";
	 	$this->con->consultaSimple($sql);
	 }

	 public function edit_voucher()
	 {
	 	$sql = "UPDATE solicitudes SET pathVoucher = '{$this->pathVoucher}' WHERE idSolicitud = '{$this->idSolicitud}'";
	 	$this->con->consultaSimple($sql);
	 }

	 public function access_by_idSol_codAc() {
	 	$sql = "CALL access_by_idSol_codAc('{$this->idSolicitud}','{$this->codAcceso}');";
	 	$datos = $this->con->consultaRetorno($sql);
	 	$row = mysqli_num_rows($datos);
	 	return $row;
	 }

	 public function view_by_idSol_codAc() {
	 	$sql = "CALL view_by_idSol_codAc('{$this->idSolicitud}');";
	 	$datos = $this->con->consultaRetorno($sql);
	 	$row = mysqli_fetch_assoc($datos);
	 	return $row;
	 }

	 public function view_by_dni_sol()
	 {
	 	$sql = "CALL view_by_dni_sol('{$this->Solicitantes_DNI}');";
	 	$datos = $this->con->consultaRetorno($sql);
	 	$row = mysqli_fetch_assoc($datos);
	 	return $row;
	 }
}