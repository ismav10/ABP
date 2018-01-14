<?php
//Controlador para la gestión de usuarios
include '../Models/SESION_Model.php';

session_start();

$sesion = new SESION_Model($_SESSION['login'], '', '', '', '', '', '', '');
//$sesion = new SESION_Model('deportista1', '', '', '', '', '', '', '');
$sesiones = $sesion->Listar();

$sesiones_array = array();

foreach($sesiones as $sesion)
{
				//print_r($sesion["idTabla"]);
				array_push($sesiones_array, array("idTabla" => $sesion["idTabla"],
												"horaInicio" => $sesion[5],
												"horaFin" => $sesion[6],
											 ));
											 
											 
}
			

header('Content-Type: application/json');
echo json_encode($sesiones_array);
header($_SERVER['SERVER_PROTOCOL'].' 200 Ok');
exit(0);

?>