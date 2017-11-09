<?php
//Controlador para la gestión del registro de nuevos alumnos
include '../Models/USUARIO_Model.php';

include '../Views/MENSAJE_REG_Vista.php';
include '../Views/LOGIN_Vista.php';
include '../Views/USUARIO_REGISTER_Vista.php';




include '../Locates/Strings_Castellano.php';


//Método que recoge la información del formulario
function get_data_form(){


    $USUARIO_USER=$_REQUEST['USUARIO_USER'];
    $USUARIO_PASSWORD=$_REQUEST['USUARIO_PASSWORD'];
    $USUARIO_CUENTA=$_REQUEST['USUARIO_CUENTA'];
    $USUARIO_TIPO=$_REQUEST['USUARIO_TIPO'];

    $USUARIO_ESTADO=$_REQUEST['USUARIO_ESTADO'];
    $USUARIO_DNI = $_REQUEST['USUARIO_DNI'];
    $USUARIO_EMAIL = $_REQUEST['USUARIO_EMAIL'];
    $USUARIO_FECH_NAC = $_REQUEST['USUARIO_FECH_NAC'];
    $USUARIO_DIRECCION = $_REQUEST['USUARIO_DIRECCION'];
    $USUARIO_NOMBRE = $_REQUEST['USUARIO_NOMBRE'];
    $USUARIO_APELLIDO = $_REQUEST['USUARIO_APELLIDO'];
    $USUARIO_TELEFONO = $_REQUEST['USUARIO_TELEFONO'];
    $USUARIO_COMENTARIOS = $_REQUEST['USUARIO_COMENTARIOS'];

//Si no se ha introducido un nuevo archivo se deja el que había
    if (isset($_FILES['USUARIO_FOTO']['name']) && ($_FILES['USUARIO_FOTO']['name']!=='')) {

        $USUARIO_FOTO = '../Documents/Empleados/' . $_REQUEST['USUARIO_DNI'] . '/Foto/' . $_FILES['USUARIO_FOTO']['name'];

    }
    else {

        $USUARIO_FOTO='';

    }

    $accion = $_REQUEST['accion'];
//crea el usuario con los datos anteriores
    $usuario = new USUARIO_Modelo($USUARIO_USER, $USUARIO_PASSWORD, $USUARIO_FECH_NAC, $USUARIO_EMAIL, $USUARIO_NOMBRE, $USUARIO_APELLIDO, $USUARIO_DNI, $USUARIO_TELEFONO, $USUARIO_CUENTA, $USUARIO_DIRECCION, $USUARIO_COMENTARIOS, $USUARIO_TIPO, $USUARIO_ESTADO,$USUARIO_FOTO);

    return $usuario;
}

if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}
//Actúa según la acción elegida
Switch ($_REQUEST['accion']){

    case  $strings['Registro']:
        if (!isset($_REQUEST['USUARIO_USER'])){ //Si aún no se ha establecido el usuario

                new USUARIO_Registrar();

        }
        else{


            $_REQUEST['USUARIO_ESTADO']='Activo'; //Siempre que se inserta estará activo en un principio
            $_REQUEST['USUARIO_TIPO']='3'; //Los usuarios que e insertan por registro son alumnos
            $_REQUEST['USUARIO_COMENTARIOS']=''; //Este campo no se toma del formulario
            $usuario = get_data_form();
            //Creamos las carpetas para guardar los archivos
            $carpetaFoto='../Documents/Empleados/'.$_REQUEST['USUARIO_DNI'].'/Foto/';


            if($_FILES['USUARIO_FOTO']['name']!=='') {
                if (!file_exists($carpetaFoto)) {
                    mkdir($carpetaFoto, 0777, true);
                }

                move_uploaded_file($_FILES['USUARIO_FOTO']['tmp_name'], $carpetaFoto . $_FILES['USUARIO_FOTO']['name']);
            }


            //Insertamos el usuario
            $respuesta = $usuario->Insertar();
            new Mensaje($respuesta, '../index.php');
        }
        break;

    default:
//Por defecto se muestra el login


            new Login();


}



?>
