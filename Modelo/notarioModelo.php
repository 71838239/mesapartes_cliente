<?php namespace Modelo;
class notarioModelo
{
	 private $RUC;
	 private $nombres;
	 private $apellidos;
	 private $telefono;
	 private $ubicacion;
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
	 	$sql = "CALL sp_listar_notarios();";
	 	$datos = $this->con->consultaRetorno($sql);
	 	return $datos;
	 }

}