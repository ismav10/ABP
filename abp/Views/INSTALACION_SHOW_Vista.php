<?php

class INSTALACION_VerDetalle {

    private $valores;
    private $volver;

//VISTA PARA LA VISUALIZACION DE INSTALACIONES
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
                    <label class="control-label" ><?php echo $strings['Ver Instalacion']; ?></label><br>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreInstalacion']; ?></label><br>
                    <input class="form" id="nombreInstalacion" name="nombreInstalacion" size="28" type="text" readonly="true" value="<?php echo $this->valores['nombreInstalacion']; ?>">
                </div>


                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['aforoInstalacion']; ?></label><br>
                    <input class="form" id="aforoInstalacion" name="aforoInstalacion" size="3" type="int" readonly="true" value="<?php echo $this->valores['aforoInstalacion']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionInstalacion']; ?></label><br>
                    <textarea name="descripcionInstalacion" rows="10" cols="100" readonly="true"><?php echo $this->valores['descripcionInstalacion']; ?></textarea>
                </div>

                <a class="form-link" href='INSTALACION_Controller.php'><?php echo $strings['Volver']; ?></a>
            </form>

        </div>
        <?php
        include '../Views/footer.php';
    }

// fin del metodo render
}
?>
