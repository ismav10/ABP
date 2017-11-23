<?php

class ACTIVIDAD_INDIVIDUAL_VerDetalle {

    private $valores;
    private $volver;

//VISTA PARA LA VISUALIZACION DE ACTIVIDADES INDIVIDUALES
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
                    <label class="control-label" ><?php echo $strings['Ver Actividad Individual']; ?></label><br>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreActividadIndividual']; ?></label><br>
                    <input class="form-control" id="nombreActividadIndividual" name="nombreActividadIndividual" size="40" type="text" readonly="true" value="<?php echo $this->valores['nombreActividadIndividual']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionActividadIndividual']; ?></label><br>
                    <textarea name="descripcionActividadIndividual" rows="10" cols="100" readonly="true"><?php echo $this->valores['descripcionActividadIndividual']; ?></textarea>
                </div>
               

				<button type="button" class="btn btn-info"><a href='ACTIVIDAD_INDIVIDUAL_Controller.php'>Volver</a></button>
            </form>

        </div>
        <?php
        include '../Views/footer.php';
    }

// fin del metodo render
}
?>
