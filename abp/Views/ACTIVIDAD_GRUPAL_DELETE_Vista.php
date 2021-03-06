<?php

class ACTIVIDAD_GRUPAL_Borrar {

    private $valores;
    private $volver;

//VISTA PARA LA ELIMINACION DE ACTIVIDADES GRUPALES
    function __construct($valores, $volver) {
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render() {

        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        ?>

        <div class="container" >
            <form  id="form" name="form" action='<?php $this->volver; ?>'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Borrar Actividad Grupal']; ?></label><br>
                </div>        

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreActividadGrupal']; ?></label><br>
                    <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="80" type="text" readonly="true" value="<?php echo $this->valores['nombreActividadGrupal']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionActividadGrupal']; ?></label><br>
					<textarea rows="10" cols="60" name="descripcionActividadGrupal" readonly="true"><?php echo $this->valores['descripcionActividadGrupal'];?></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['numPlazasActividadGrupal']; ?></label><br>
                    <input class="form" id="numPlazasActividadGrupal" name=""numPlazasActividadGrupal size="10" type="int" readonly="true" value="<?php echo $this->valores['numPlazasActividadGrupal']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['username']; ?></label><br>
                    <input class="form" id="username" name="username" size="25" type="text" readonly="true" value="<?php echo $this->valores['username']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['idInstalacion']; ?></label><br>
                    <input class="form" id="idInstalacion" name="idInstalacion" size="10" type="int" readonly="true" value="<?php echo $this->valores['idInstalacion']; ?>">
                </div>


                <input type = 'submit' name = 'accion' value = '<?php echo $strings['Borrar'] ?>'>
                <button type="button" class="btn btn-info"><a href='ACTIVIDAD_GRUPAL_Controller.php'><?php echo $strings['Volver']; ?></a></button>
            </form>

        </div>
        <?php
        include '../Views/footer.php';
    }

// fin del metodo render
}
?>
