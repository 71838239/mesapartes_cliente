<?php
namespace Config;
class Enrutador{
	public static function run(Request $request) {
		$controlador = $request->getControlador(). "Controlador";
		$ruta = ROOT . "Controladores" . DS . $controlador. ".php";
		$metodo = $request->getMetodo();
		if ($metodo == "index.php") {
			$metodo = "index";
		}
		$argumento = $request->getArgumento();
		if (is_readable($ruta)) {
			require_once $ruta;
			$mostrar = "Controladores\\".$controlador;
			$controlador = new $mostrar;
			if (!isset($argumento)) {
				$datos = call_user_func(array($controlador,$metodo));
			}else{
				$datos = call_user_func_array(array($controlador,$metodo), $argumento);
			}
		}
		//cargar vista
		$ruta = ROOT . "Vista" . DS . $request->getControlador() . DS . $request->getMetodo().".php";
		if (is_readable($ruta)) {
			require_once $ruta;
		} else {
			print "no se encontró la vista";
		}
	}
}