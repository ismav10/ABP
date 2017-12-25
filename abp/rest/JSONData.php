<?php
//Controlador para la gestión de usuarios
include '../Models/SESION_Model.php';

session_start();

$sesion = new SESION_Model($_SESSION['login'], '', '', '', '', '', '', '');
//$sesion = new SESION_Model('deportista1', '', '', '', '', '', '', '');
$sesiones = $sesion->Listar();
header('Content-Type: application/json');
echo json_encode($sesiones);
exit(0);

?>