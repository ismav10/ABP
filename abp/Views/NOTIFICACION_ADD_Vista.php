<?php

//VISTA PARA LA INSERCIÓN DE USUARIOS
class NOTIFICACION_Insertar {
    private $volver;

    function __construct($volver) {
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='NOTIFICACION_Controller.php'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Insertar Notificacion']; ?></label><br>
                </div>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['destinatarioNotificacion']; ?></label><br>
                    <input class="form" id="destinatarioNotificacion" name="destinatarioNotificacion" size="50" type="email" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['asuntoNotificacion']; ?></label><br>
                    <input class="form" id="asuntoNotificacion" name="asuntoNotificacion" size="50" type="text" required="true"/>
                </div>

                 <div class="form-group">
                    <label class="control-label" ><?php echo $strings['mensajeNotificacion']; ?></label><br>
                    <input class="form" id="mensajeNotificacion" name="mensajeNotificacion" type="textarea" rows="10" cols="40" required="true"/>
                </div>
                
                 <div class="form-group">
                    <input type="hidden" id="username" name="username" size="25" type="text" required="true" value='usuario'/>
                </div>

                <input type='submit' onclick="" name='accion'  value="<?php echo $strings['Insertar']; ?>">
                <a class="form-link" href="<?php echo $this->volver?>"><?php echo $strings['Volver']; ?>
            </form>
        </div>
        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
