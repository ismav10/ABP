<?php

class NOTIFICACION_Seleccionar {
    private $valores;
    private $volver;

//VISTA PARA LA VISTA EN DETALLE DE NOTIFICACIONES
    function __construct($valores, $volver) {
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render() {

        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        ?>

        <div class="container" >
            <form  id="form" name="form" action='NOTIFICACION_Controller.php'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Ver Notificacion']; ?></label><br>
                </div>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['idNotificacion']; ?></label><br>
                    <input class="form" id="idNotificacion" name="idNotificacion" size="10" type="text" readonly="true" value="<?php echo $this->valores['idNotificacion']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['remitenteNotificacion']; ?></label><br>
                    <input class="form" id="remitenteNotificacion" name="remitenteNotificacion" size="50" type="text" readonly="true" value="<?php echo $this->valores['remitenteNotificacion']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['destinatarioNotificacion']; ?></label><br>
                    <input class="form" id="destinatarioNotificacion" name="destinatarioNotificacion" size="50" type="text" readonly="true" value="<?php echo $this->valores['destinatarioNotificacion']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['fechaHoraNotificacion']; ?></label><br>
                    <input class="form" id="fechaHoraNotificacion" name="fechaHoraNotificacion" size="50" type="text" readonly="true" value="<?php echo $this->valores['fechaHoraNotificacion']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['asuntoNotificacion']; ?></label><br>
                     <input class="form" id="asuntoNotificacion" name="asuntoNotificacion"  size="50" readonly="true" value="<?php echo $this->valores['asuntoNotificacion']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['mensajeNotificacion']; ?></label><br>
                    <textarea rows="25" cols="70" name="mensajeNotificacion" readonly="true"><?php echo $this->valores['mensajeNotificacion'];?></textarea>
                    
                </div>


                <div class="form-group">
                    <input type="hidden" class="form" id="userName" name="userName" size="25" type="text" readonly="true" value="<?php echo $this->valores['userName']; ?>">
                </div>
        <br>

        <a class="form-link" href='<?php echo $this->volver ?> '><?php echo $strings['Volver']; ?> </a>
        </form>

        </div>
        <?php
        include '../Views/footer.php';
    }

// fin del metodo render
}
?>
