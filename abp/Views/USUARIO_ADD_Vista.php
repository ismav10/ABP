<?php

//VISTA PARA LA INSERCIÓN DE USUARIOS
class USUARIO_Insertar {

    private $id;

    function __construct($id) {
        $this->id = $id;
        $this->render();
    }

    function render() {
        ?><div class="wrap">

            <head>
                <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
                <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
                <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script></head>

            <?php
            include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
            include '../Functions/USUARIOShowAllDefForm.php';

            //Array con los nombres de los campos a insertar en funcion del usuario que vayamos a insertar
            if ($this->id == "2") {
                $lista = array('userName', 'password', 'nombre', 'apellidos', 'dni', 'fechaNac', 'direccion', 'email', 'telefono', 'cuentaBanc', 'foto');
            } else if ($this->id == "3") {
                $lista = array('userName', 'password', 'nombre', 'apellidos', 'dni', 'fechaNac', 'direccion', 'email', 'telefono', 'foto', 'tipoDeportista', 'metodoPago');
            } else if ($this->id != "2" && $this->id != "3") {
                $lista = array('userName', 'password', 'tipoUsuario', 'nombre', 'apellidos', 'dni', 'fechaNac', 'direccion', 'email', 'telefono', 'foto');
            }
            ?>


            <form  id="form" name="form" action='USUARIO_Controller.php?id=<?php echo $this->id?>'  method='post'   enctype="multipart/form-data">
                <div id="centrado"><span class="form-title">
                <?php 
                    if ($this->id == "2") { ?>
                        <br><?php echo $strings['Insertar entrenador'] ?><br></span></div><?php 
                        
                    } else if ($this->id == "3") {  ?>
                        <br><?php echo $strings['Insertar deportista'] ?><br></span></div><?php 
                        
                    } else if ($this->id != "entrenador" || $this->id != "deportista") {?>
                        <br><?php echo $strings['Insertar usuario'] ?><br></span></div><?php
                }   
                ?>
                <ul class="form-style-1">
                    <?php
                    //Generación automática del formulario
                    createForm($lista, $DefForm, $strings, '', array('foto' => false), false);
                    ?>
                    <input type='submit' onclick="return valida_envia_USUARIO()" name='accion'  value=<?php echo $strings['Insertar'] ?>
                           <ul>
                        </form>
                        <?php
                        echo '<a class="form-link" href=\'USUARIO_Controller.php?id='.$this->id.'\'>' . $strings['Volver'] . " </a>";
                        ?>

                        <?php
                    }

//fin metodo render
                }
                