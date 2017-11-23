<?php

//Controlador para la gestión de actividades individuales
include '../Models/ACTIVIDAD_INDIVIDUAL_Model.php';
include '../Views/MENSAJE_Vista.php';


if (!IsAuthenticated()) {
    header('Location:../index.php');
}
include '../Views/header.php';
include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';

$pags = generarIncludes(); //Realizamos los includes de las páginas a las que tiene acceso
for ($z = 0; $z < count($pags); $z++) {
    include $pags[$z];
}

function get_data_form() {

    //Atributos de actividad individual
	
    if(!isset($_REQUEST['idActividadIndividual'])){
		$idActividadIndividual = '';
	}else {
		$idActividadIndividual = $_REQUEST['idActividadIndividual'];
	}
	
    $nombreActividadIndividual = $_REQUEST['nombreActividadIndividual'];
    $descripcionActividadIndividual = $_REQUEST['descripcionActividadIndividual'];

    $actividadIndividual = new ACTIVIDAD_INDIVIDUAL_Model($idActividadIndividual, $nombreActividadIndividual, $descripcionActividadIndividual);

    return $actividadIndividual;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}


Switch ($_REQUEST['accion']) { //Actúa según la acción elegida

	case 'guardar':
	         print_r($_POST);
			 exit(0);
			 $idActividad = $_REQUEST['idActividadIndividual'];
			 $actividad = get_data_form();
			 $actividad->guardarCambios( $idActividad );
			 
	break;
		
    case $strings['Insertar']:

        if (!isset($_REQUEST['nombreActividadIndividual'])) { //Si no se ha introducido ningun valor, mostramos la vista con el formulario
				$actividadIndividual = new ACTIVIDAD_INDIVIDUAL_Model('', '', '');
                $datos = $actividadIndividual->RellenaDatos();
                new ACTIVIDAD_INDIVIDUAL_Insertar($datos, '../Views/DEFAULT_Vista.php');
        } else {
                //Recogemos los datos del formulario
                $actividadIndividual = get_data_form(); 
                $respuesta = $actividadIndividual->Insertar();
                new Mensaje($respuesta, 'ACTIVIDAD_INDIVIDUAL_Controller.php');
        }break;

    case $strings['Modificar']:

        
        if (!tienePermisos('ACTIVIDAD_INDIVIDUAL_Modificar')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            if (!isset($_REQUEST['nombreActividadIndividual'])) {
                $actividadIndividual = new ACTIVIDAD_INDIVIDUAL_Model($_REQUEST['idActividadIndividual'], '', '');
                $datos = $actividadIndividual->RellenaDatos();
                new ACTIVIDAD_INDIVIDUAL_Modificar($datos, '../Views/DEFAULT_Vista.php');
            } else {
				 $idActividadIndividual = $_REQUEST['idActividadIndividual'];
				 $actividadIndividual = get_data_form();
				 $actividadIndividual->guardarCambios( $idActividadIndividual );
				 $datos = $actividadIndividual->Listar();
				 new ACTIVIDAD_INDIVIDUAL_Listar($datos, '../Controllers/ACTIVIDAD_INDIVIDUAL_Controller.php');				 
				
            }
        }
        break;
		


    case $strings['Borrar']:
        	
        if(!isset($_REQUEST['idActividadIndividual'])){
            $actividadIndividual = new ACTIVIDAD_INDIVIDUAL_Model($_REQUEST['idActividadIndividual'], '','');
            $valores = $actividadIndividual->RellenaDatos();
            if(!tienePermisos('ACTIVIDAD_INDIVIDUAL_Borrar'))
            {
                new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
            }else{
                new ACTIVIDAD_INDIVIDUAL_Borrar($valores, 'ACTIVIDAD_INDIVIDUAL_Controller.php');
            }
        }else{
            $actividadIndividual = new ACTIVIDAD_INDIVIDUAL_Model($_REQUEST['idActividadIndividual'],'','');
            $respuesta = $actividadIndividual->Borrar();
            new Mensaje($respuesta, '../Controllers/ACTIVIDAD_INDIVIDUAL_Controller.php');
        }
        break;
		
    
    case  $strings['Consultar']:
	
		if( (!isset($_REQUEST['nombreActividadIndividual']))){
	
			if (!tienePermisos('ACTIVIDAD_INDIVIDUAL_Consultar')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
			
		}
		new ACTIVIDAD_INDIVIDUAL_Consultar('../Views/ACTIVIDAD_INDIVIDUAL_Controller.php');
		} else {
			
			if(!isset($_REQUEST['nombreActividadIndividual'])){
				$nombreActividadIndividual = '';
			}else {
				$nombreActividadIndividual = $_REQUEST['nombreActividadIndividual'];
			}
			
            $actividadIndividual = new ACTIVIDAD_INDIVIDUAL_Model('', $nombreActividadGrupal, '');
            $datos = $actividadIndividual->Consultar();
            new ACTIVIDAD_INDIVIDUAL_Listar($datos, '../Views/ACTIVIDAD_INDIVIDUAL_Controller.php');
        }
		break;
     
	 
	case $strings['Ver']:
        
            if (isset($_REQUEST['idActividadIndividual']))
			{
                $actividadIndividual = new ACTIVIDAD_INDIVIDUAL_Model($_REQUEST['idActividadIndividual'], '', '');
                $datos = $actividadIndividual->RellenaDatos();
				if (!tienePermisos('ACTIVIDAD_INDIVIDUAL_VerDetalle')) {
					new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
				}else {
				new ACTIVIDAD_INDIVIDUAL_VerDetalle($datos, '../Views/DEFAULT_Vista.php');
				}
			}  
		
        break;

    default: //Por defecto se realiza el show all
        if (!tienePermisos('ACTIVIDAD_INDIVIDUAL_Listar')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            $actividadIndividual = new ACTIVIDAD_INDIVIDUAL_Model('', '', '');
            $datos = $actividadIndividual->Listar();
            new ACTIVIDAD_INDIVIDUAL_Listar($datos, '../Views/DEFAULT_Vista.php');
        }
		
		
}
?>
