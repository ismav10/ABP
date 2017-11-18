<?php

class USUARIO_Select {

//VISTA PARA LISTAR TODOS LOS USUARIOS
    private $datos;
    private $volver;

    function __construct() {
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        ?> 
        <div class="container" align='center'>
            
            <a href='USUARIO_Controller.php?accion=<?php echo $strings['Seleccionar']; ?>&user=admin'><img src="../img/useradd.png" width="50px" height="50px"><?php echo $strings['Administrador']; ?></a>
            <a href='USUARIO_Controller.php?accion=<?php echo $strings['Seleccionar']; ?>&user=entrenador'><img src="../img/useradd.png" width="50px" height="50px"><?php echo $strings['Entrenador']; ?></a>
            <a href='USUARIO_Controller.php?accion=<?php echo $strings['Seleccionar']; ?>&user=deportista'><img src="../img/useradd.png" width="50px" height="50px"><?php echo $strings['Deportista']; ?></a>

        </div>

        <?php
        include '../Views/footer.php';
    }

}
