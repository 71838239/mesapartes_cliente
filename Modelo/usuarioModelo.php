<?php namespace Modelo;
class usuarioModelo
{
	 private $DNI;
	 private $nombres;
	 private $apellidoPaterno;
	 private $apellidoMaterno;
	 private $telefono;
	 private $email;
	 private $direccion;
	 private $rol;
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
	 	$sql = "CALL sp_listar_usuarios();";
	 	$datos = $this->con->consultaRetorno($sql);
	 	return $datos;
	 }

	 public function add()
	 {
	 	$sql = "";
	 	$this->con->consultaSimple($sql);
	 }

	 public function delete()
	 {
	 	$sql = "";
	 	$this->con->consultaSimple($sql);
	 }

	 public function edit()
	 {
	 	$sql = "";
	 	$this->con->consultaSimple($sql);
	 }

	 public function ver_user_ac()
	 {
	 	$sql = "CALL ver_user_ac();";
	 	$datos = $this->con->consultaRetorno($sql);
	 	$row = mysqli_fetch_assoc($datos);
	 	return $row;
	 }
}