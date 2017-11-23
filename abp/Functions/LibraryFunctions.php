<?php

//LIBRERIA DE FUNCIONES
//
//Evalúa si el usuario se ha autenticado
function IsAuthenticated() {
    session_start();
    if (!isset($_SESSION['login'])) {
        return false;
    } else {

        return true;
    }
}

//Añade los roles al desplegable de tipos
function AñadirTipos($array) {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = 'SELECT nombreRol from ROL';
    $result = $mysqli->query($sql);
    $str = array();
    while ($tipo = $result->fetch_array()) {
        array_push($str, $tipo['nombreRol']);
    }

    $añadido = array(
        'type' => 'select',
        'name' => 'tipoUsuario',
        'multiple' => 'false',
        'value' => '',
        'options' => $str,
        'required' => 'true',
        'readonly' => false
    );
    $array[count($array)] = $añadido;
    return $array;
}

//Añade al formulario de definicion las entradas correspondientes a las paginas disponibles
function AñadirPaginas($array) {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = 'SELECT nombrePagina from PAGINA';
    $result = $mysqli->query($sql);
    while ($tipo = $result->fetch_array()) {
        $array[count($array)] = array(
            'type' => 'checkbox',
            'name' => 'funcionalidad_paginas[]',
            'value' => $tipo['nombrePagina'],
            'size' => 20,
            'required' => true,
            'pattern' => '',
            'validation' => '',
            'readonly' => false);
    }
    return $array;
}

//Añade al array de definición de formulario las entradas correspondientes a las funcionalidades añadidas
function AñadirFunciones($array) {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = 'SELECT nombreFuncionalidad from FUNCIONALIDAD';
    $result = $mysqli->query($sql);
    while ($tipo = $result->fetch_array()) {
        $array[count($array)] = array(
            'type' => 'checkbox',
            'name' => 'rol_funcionalidades[]',
            'value' => $tipo['nombreFuncionalidad'],
            'size' => 20,
            'required' => true,
            'pattern' => '',
            'validation' => '',
            'readonly' => false);
    }
    return $array;
}

//Genera un link para la página a partir de un nombre
function GenerarLinkPagina($PAGINA_NOM) {
    $link = str_replace(" ", "_", $PAGINA_NOM);
    $s = '../Views/';
    $s .= $link;
    $s .= '_Vista.php';
    return $s;
}

/*
  //Genera el link de un controlador a partir del nombre de la funcionalidad
  function GenerarLinkControlador($CON_NOM) {
  $link = str_replace(" ", "_", $CON_NOM);
  $s = '../Controllers/';
  $s .= $link;
  $s .= '_Controller.php';
  return $s;
  }
 */

//Devuelve el nombre de una funcionalidad a partir de su id
function ConsultarNombreFuncionalidad($idFuncionalidad) {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT nombreFuncionalidad FROM FUNCIONALIDAD WHERE idFuncionalidad='" . $idFuncionalidad . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['nombreFuncionalidad'];
}

//Devuelve el nombre de un rol a partir de su id
function ConsultarIDRol($nombreRol) {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT idRol FROM ROL WHERE nombreRol='" . $nombreRol . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['idRol'];
}

function ConsultarNumPlazas($idActividadGrupal) {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT numPlazasActividadGrupal FROM ACTIVIDADGRUPAL WHERE idActividadGrupal='" . $idActividadGrupal . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['numPlazasActividadGrupal'];
}

//Devuelve el id de un rol a partir del userName del usuario
function ConsultarTipoUsuario($userName) {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT tipoUsuario FROM USUARIO WHERE USUARIO.userName='" . $userName . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['tipoUsuario'];
}

//Devuelve el id de un rol a partir del userName del usuario
function ConsultarTipoUsuarioLogin() {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT tipoUsuario FROM USUARIO WHERE USUARIO.userName='" . $_SESSION['login'] . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['tipoUsuario'];
}

//Devuelve el nombre de rol a partir del id de rol
function ConsultarNOMRol($idRol) {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT nombreRol FROM ROL WHERE idRol='" . $idRol . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['nombreRol'];
}

function ConsultarNombreTabla($idTabla) {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT nombreTabla FROM Tabla WHERE idTabla='" . $idTabla . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['nombreTabla'];
}

function ConsultarNombreActividadGrupal($idActividadGrupal) {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT nombreActividadGrupal FROM ACTIVIDADGRUPAL WHERE idActividadGrupal='" . $idActividadGrupal . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['nombreActividadGrupal'];
}

function ConsultarNombreActividadIndividual($idActividadGrupal) {
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT nombreActividadIndividual FROM ACTIVIDADINDIVIDUAL WHERE idActividadIndividual='" . $idActividadGrupal . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['nombreActividadIndividual'];
}

//añade a la pagina default los enlaces correspondientes a las funcionalidades
function añadirFuncionalidades($NOM) {
    include '../Locates/Strings_' . $NOM['IDIOMA'] . '.php';
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $rol = "SELECT tipoUsuario FROM USUARIO  WHERE userName='" . $NOM['login'] . "'";
    $sql = "SELECT DISTINCT categoriaFuncionalidad FROM FUNCIONALIDAD, FUNCIONALIDAD_ROL WHERE FUNCIONALIDAD_ROL.idFuncionalidad = FUNCIONALIDAD.idFuncionalidad AND FUNCIONALIDAD_ROL.idRol=(" . $rol . ")";
//$sql = "SELECT idFuncionalidad FROM Funcionalidad_Rol WHERE idRol=(" . $rol . ")";
    if (!($resultado = $mysqli->query($sql))) {
        echo 'Error en la consulta sobre la base de datos';
    } else {
        while ($fila = $resultado->fetch_array()) {
            $funcionalidad = $fila['categoriaFuncionalidad'];

            switch ($funcionalidad) {

                case "Gestion Entrenadores":
                    if (ConsultarTipoUsuarioLogin() != 3) {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><?php echo $strings['Gestión de Usuarios'] ?> </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php if (ConsultarTipoUsuarioLogin() == 1) { ?>
                                    <a class = "dropdown-item" href = "../Controllers/ENTRENADOR_Controller.php?user=entrenador"><?php echo $strings['Gestión de Entrenadores'];
                                    ?></a>
                                <a class="dropdown-item" href="../Controllers/DEPORTISTA_Controller.php?user=deportista"><?php echo $strings['Gestión de Deportistas']; ?></a>
                                <a class="dropdown-item" href="../Controllers/USUARIO_Controller.php"><?php echo $strings['Gestión de Usuarios']; ?></a>
                            <?php } else if (ConsultarTipoUsuarioLogin() == 2) { ?>
                                <a class="dropdown-item" href="../Controllers/DEPORTISTA_Controller.php?user=deportista"><?php echo $strings['Gestión de Deportistas']; ?></a>
                        <?php } ?>
                   
                    </div>
                    </li>
                    <?php }
                    break;

                case "Gestion Actividad Grupal":
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $strings['Gestión de Actividades'] ?> </a>
                        <div align='center' class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../Controllers/ACTIVIDAD_INDIVIDUAL_Controller.php?"><?php echo $strings['Gestión de Actividades Individuales']; ?></a>
                            <a class="dropdown-item" href="../Controllers/ACTIVIDAD_GRUPAL_Controller.php"><?php echo $strings['Gestión de Actividades Grupales']; ?></a>
                        </div>
                    </li>

                    <?php
                    break;

                case "Gestion Ejercicios":
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><?php echo $strings['Entrenamiento'] ?> </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../Controllers/TABLA_Controller.php"><?php echo $strings['Gestión de tablas']; ?></a><br>
                            <a class="dropdown-item" href="../Controllers/EJERCICIO_Controller.php?"><?php echo $strings['Gestión de ejercicios']; ?></a><br>
                            <?php if (ConsultarTipoUsuarioLogin() == 3) { ?>
                                <a class="dropdown-item" href='../Controllers/SESION_Controller.php'><?php echo $strings['Gestión de sesiones']; ?></a>
                    <?php } ?>
                        </div>
                    </li>

                    <?php
                    break;


                case "Gestion Notificaciones":
                    ?><li><a style="font-size:15px;" href='../Controllers/NOTIFICACION_Controller.php'><?php echo $strings['Gestión de notificaciones']; ?></a></li> <?php
                    break;

                case "Gestion Inscripciones":
                    ?><li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $strings['Gestión de Inscripciones'] ?> </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../Controllers/INSCRIPCION_Controller.php?act=grupal"><?php echo $strings['Gestión de Actividades Grupales']; ?></a>
                            <a class="dropdown-item" href="../Controllers/INSCRIPCION_Controller.php?act=individual"><?php echo $strings['Gestión de Actividades Individuales']; ?></a>
                        </div>
                    </li>
                    <?php
                    break;

                default:
                    break;
            }
        }
    }
}

//Revisa si tiene permiso al comprobar si se ha incluido la clase a la que se quiere acceder
function tienePermisos($string) {
    return class_exists($string);
}

//Genera los includes correspondientes a las paginas a las que se tiene acceso
function generarIncludes() {
    $toret = array();
    $mysqli = new mysqli("localhost", "root", "", "muevet");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT DISTINCT pagina.linkPagina FROM Pagina, funcionalidad_pagina, funcionalidad_rol, usuario_rol WHERE pagina.idPagina=funcionalidad_pagina.idPagina AND funcionalidad_pagina.idFuncionalidad=funcionalidad_rol.idFuncionalidad AND funcionalidad_rol.idRol=usuario_rol.idRol AND usuario_rol.userName ='" . $_SESSION['login'] . "'";
    if (!($resultado = $mysqli->query($sql))) {
        echo 'Error en la consulta sobre la base de datos';
    } else {
        while ($tupla = $resultado->fetch_array()) {
            array_push($toret, $tupla['linkPagina']);
        }
    }
    return $toret;
}

//Funcionalidades en funcion de los permisos

function showNavbar() {

    if (!isset($_SESSION)) {
        echo '<br><br><li role="presentation" class="active"><a href="../Functions/Conectar.php" class="m1">Iniciar Sesion</a></li>';
        echo '<li role="presentation"><a href="" class="m1">Sobre Nosotros</a></li>';
        echo '<li role="presentation"><a href="" class="m1">Contacto</a></li>';
    } else {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        añadirFuncionalidades($_SESSION);
        ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $strings['Cuenta'] ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../Controllers/USUARIO_Controller.php?userName=<?php echo $_SESSION['login']; ?>&accion=<?php echo $strings['Modificar']; ?>"><?php echo $strings['Mi Perfil'] ?></a><br>
                <?php if (ConsultarTipoUsuarioLogin() == 3) { ?>
                    <a class="dropdown-item" href="../Controllers/ACTIVIDAD_GRUPAL_Controller.php?userName=<?php echo $_SESSION['login']; ?>&accion=<?php echo $strings['MisActividades']; ?>"><?php echo $strings['MisActividades'] ?></a><br>
        <?php } ?>
                <a class="dropdown-item" href="../Functions/Desconectar.php"><?php echo $strings['Cerrar Sesión'] ?></a> <br>
            </div>
        </li> 
        <?php
    }
}
?>

