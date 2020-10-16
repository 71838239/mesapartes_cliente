<?php
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('URL', "http://localhost:8080/app_mesa_partes/");

	require_once "Config/Autoload.php";
	Config\Autoload::run();
	require_once "Vista/template.php";
	Config\Enrutador::run(new Config\Request());
	