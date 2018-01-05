<?php

class INSTALACION_Borrar {

    private $valores;
    private $volver;

//VISTA PARA LA ELIMINACION DE INSTALACIONES
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
                    <label class="control-label" ><?php echo $strings['Borrar Instalacion']; ?></label><br>
                </div>        

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreInstalacion']; ?></label><br>
                    <input class="form" id="nombreInstalacion" name="nombreInstalacion" size="80" type="text" readonly="true" value="<?php echo $this->valores['nombreInstalacion']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionInstalacion']; ?></label><br>
					<textarea rows="10" cols="60" name="descripcionInstalacion" readonly="true"><?php echo $this->valores['descripcionInstalacion'];?></textarea>
                </div>  

				<div class="form-group">
                    <label class="control-label" ><?php echo $strings['aforoInstalacion']; ?></label><br>
                    <input class="form" id="aforoInstalacion" name="aforoInstalacion" size="10" type="int" readonly="true" value="<?php echo $this->valores['aforoInstalacion']; ?>">
                </div>


                <input type = 'submit' name = 'accion' value = '<?php echo $strings['Borrar'] ?>'>
                <button type="button" class="btn btn-info"><a href='INSTALACION_Controller.php'><?php echo $strings['Volver']; ?></a></button>
            </form>

        </div>
        <?php
        include '../Views/footer.php';
    }

// fin del metodo render
}
?>
