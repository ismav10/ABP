<?php
class USUARIO_Edit_Accion{

    private $datos;
    private $volver;
//VISTA PARA LA MODIFICACIÓN DE LAS ACCIONES DE LOS USUARIOS
    function __construct($user,$array, $volver){
        $this->user=$user;
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }

    function render(){

        ?>
<head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>
<div class="wrap">
                    <?php

                    $list=array('USUARIO_USER');
        //Añadimos los nombres de las páginas para que aparezcan como opciones del check
                    $lista=AñadirPaginasTitulos($list);
                    include '../Functions/FUNCIONShowDefForm.php';
                    include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';

                    ?>


                        <form  id="form" name="form" action='USUARIO_Controller.php' method='post' >
                            <div id="centrado">   <span class="form-title">
      <?php echo $strings['Modificar Acciones']?><br></span></div>
                            <ul class="form-style-1">
                            <?php

//Generación automática del formulario
                            createForm3($lista,$DefForm2,$strings,array('USUARIO_USER'=>$this->user),false,array('USUARIO_USER'=>true), $this->datos);

                            ?>
                            <input type='submit' name='accion'  value=<?php echo $strings['Modificar acciones'] ?>
                                <ul></form>


                <?php
                echo '<a class="form-link" href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";

                ?>

        </div>


        <?php
    } //fin metodo render

}
