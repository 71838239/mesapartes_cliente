<?php
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

$dni= $_POST['dni'];
$url = "https://api.reniec.cloud/dni/".$dni;
$resultado = json_decode(file_get_contents($url,false,stream_context_create($arrContextOptions)));

echo json_encode($resultado->apellido_paterno);