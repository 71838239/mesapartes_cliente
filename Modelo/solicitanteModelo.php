<?php namespace Modelo;
class solicitanteModelo
{
	 private $DNI;
	 private $nombres;
	 private $apellidoPaterno;
	 private $apellidoMaterno;
	 private $telefono;
	 private $email;
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
	 	$sql = "CALL sp_listar_solicitantes();";
	 	$datos = $this->con->consultaRetorno($sql);
	 	return $datos;
	 }

	 public function add()
	 {
		$sql = "CALL sp_c_solicitantes('{$this->DNI}','{$this->nombres}','{$this->apellidoPaterno}','{$this->apellidoMaterno}',
			'{$this->telefono}','{$this->email}');";
	 	$this->con->consultaSimple($sql);
	 }

	 public function edit()
	 {
	 	$sql = "";
	 	
	 }

	 public function view()
	 {
	 	$sql = "";
	 }
}