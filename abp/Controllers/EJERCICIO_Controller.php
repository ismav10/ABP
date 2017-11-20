<?php
//Controlador para la gestión de ejercicios
include '../Models/EJERCICIO_Model.php';



if (!IsAuthenticated()) {
    header('Location:../index.php');
}
include '../Views/header.php';
include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';

/*
$pags = generarIncludes(); //Realizamos los includes de las páginas a las que tiene acceso
for ($z = 0; $z < count($pags); $z++) {
    include $pags[$z];
}
*/
function get_data_form()
{
	if( isset($_REQUEST['nombreEjercicio']) )
	{
		$nombreEjercicio = $_REQUEST['nombreEjercicio'];
	}else{
		$nombreEjercicio = "";
	}
	if( isset($_REQUEST['descripcionEjercicio']) )
	{
		$descripcionEjercicio =$_REQUEST['descripcionEjercicio'];
	}else{ $descripcionEjercicio = ""; }
	if( isset($_REQUEST['gifEjercicio']) )
	{
		$gifEjercicio = $_REQUEST['gifEjercicio'];
	}else { $gifEjercicio=""; }
	$ejercicio = new EJERCICIO_Model($nombreEjercicio, $descripcionEjercicio, $gifEjercicio);
	return $ejercicio;
}

if ( !isset($_REQUEST['accion']) )
{
    $_REQUEST['accion'] = '';
}

switch ($_REQUEST['accion']) { //Actúa según la acción elegida
    case 'insertar':
		$ejercicio = get_data_form();
		$ejercicio->insertarEjercicio();
		header("Location: ../Controllers/EJERCICIO_Controller.php");
    break;




    case 'modificar':
		$ejercicio = get_data_form();
		$datos = $ejercicio->getEjercicio( $_REQUEST['id'] );
		require_once '../Views/EJERCICIO_EDIT_Vista.php';
        new EJERCICIO_Show($datos, '../Views/EJERCICIO_EDIT_Vista.php');
    break;
	
	case 'guardarmod':
		$ejercicio = get_data_form();
		$datos = $ejercicio->modificarEjercicio( $_REQUEST['id'] );
		header("Location: ../Controllers/EJERCICIO_Controller.php");
    break;


    case 'eliminar':
        $ejercicio = get_data_form();
		$datos = $ejercicio->eliminarEjercicio( $_REQUEST['id'] );
		$datos = $ejercicio->obtenerEjercicios();
		require_once '../Views/EJERCICIO_SHOWALL_Vista.php';
        new EJERCICIO_Show($datos, '../Views/EJERCICIO_SHOWALL_Vista.php');
    break;
    
    default: //Por defecto se realiza el show all
      
	    $ejercicio = get_data_form();
        $datos = $ejercicio->obtenerEjercicios();
	
        //if (!tienePermisos('EJERCICIO_Show')) {
            //new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        //} else {
			require_once '../Views/EJERCICIO_SHOWALL_Vista.php';
            new EJERCICIO_Show($datos, '../Views/EJERCICIO_SHOWALL_Vista.php');
        //}
}


?>