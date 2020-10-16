<?php namespace Controladores;

use Modelo\solicitudModelo as Solicitud;
	
class revisionControlador{

	private $solicitud;
	
	public function __construct(){
		$this->solicitud = new Solicitud();
	}

	public function index()	{
		if ($_POST) {
			$this->solicitud->set("idSolicitud",$_POST['numSolcitud']);
			$this->solicitud->set("codAcceso",$_POST['codAcceso']);
			$datos = $this->solicitud->access_by_idSol_codAc();

			if ($datos == 1) {
				$_SESSION['numSolicitud'] = $_POST['numSolcitud'];
				header ("Location: ".URL."Revision/estado");
			} else {
				$datos = "Número de solicitud o código de acceso incorrecto";
				return $datos;
			}
		}	
	}

	public function estado() {
		if (!$_POST) {
			$numSolic = $_SESSION['numSolicitud'];
			$this->solicitud->set("idSolicitud",$numSolic);
			$datos = $this->solicitud->view_by_idSol_codAc();
			return $datos;
		} else {
			$numSolic = $_SESSION['numSolicitud'];
			@$nombre = trim($_FILES['archivo']['name']);
			@$tmp_file = $_FILES['archivo']['tmp_name'];
			@$tamano = $_FILES["file"]["size"];
			$directory = './vouchers/';
			$path = $directory.$nombre;

			$tipoArchivo = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));
			
			if ($tipoArchivo == "pdf" || $tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png") {
			    if ($tamano < 1800000) {
			        if (!file_exists($directory)) {
			            mkdir($directory,0777,true);
			            if (move_uploaded_file($tmp_file, $path)) {
			                $this->solicitud->set("idSolicitud",$numSolic);
			                $this->solicitud->set("pathVoucher",$path);
			                $this->solicitud->edit_voucher();
			                header ("Location: ".URL."Revision");
			            } else {
			                echo "No se pudo guardar el archivo";
			            }
			        } else {
			            if (move_uploaded_file($tmp_file, $directory.'/'.$nombre)) {
			            	$this->solicitud->set("idSolicitud",$numSolic);
			                $this->solicitud->set("pathVoucher",$path);
			                $this->solicitud->edit_voucher();
			                header ("Location: ".URL."Revision");
			            } else {
			                echo "No se pudo guardar el archivo";			                
			            }
			        }
			    } else {
			        echo "Tamaño de archivo no permitido";
			    }
			} else {
			    echo "Archivo no permitido";
			}
		}
	}
}