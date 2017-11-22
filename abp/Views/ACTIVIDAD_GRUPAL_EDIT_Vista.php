<?php
//VISTA PARA LA MODIFICACION DE ACTIVIDADES GRUPALES
class ACTIVIDAD_GRUPAL_Modificar {

    private $valores;
    private $volver;


    function __construct($valores, $volver) {
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='<?php $this->volver; ?>'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Modificar Actividad Grupal']; ?></label><br>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreActividadGrupal']; ?></label><br>
                    <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="80" type="text" required="true" value="<?php echo $this->valores['nombreActividadGrupal']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionActividadGrupal']; ?></label><br>
					<input class="form" id="descripcionActividadGrupal" name="descripcionActividadGrupal" size="150" type="text" required="false" value="<?php echo $this->valores['descripcionActividadGrupal']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['numPlazasActividadGrupal']; ?></label><br>
                    <input class="form" id="numPlazasActividadGrupal" name="numPlazasActividadGrupal" size="10" type="int" required="true" value="<?php echo $this->valores['numPlazasActividadGrupal']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['username']; ?></label><br>
                    <input class="form" id="username" name="username" type="text" required="true" value="<?php echo $this->valores['username']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['idInstalacion']; ?></label><br>
                    <input class="form" id="idInstalacion" name="idInstalacion" size="10" type="int" required="true" value="<?php echo $this->valores['idInstalacion']; ?>">
                </div>


                <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_USUARIO()" >
                <button type="button" class="btn btn-info"><a href='ACTIVIDAD_GRUPAL_Controller.php'>Volver</a></button>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
