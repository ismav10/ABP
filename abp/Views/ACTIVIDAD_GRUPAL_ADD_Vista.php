<?php

//VISTA PARA LA INSERCIÓN DE ACTIVIDADES GRUPALES
class ACTIVIDAD_GRUPAL_Insertar {

    private $volver;
    private $cont;
    
    function __construct() {
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='<?php echo $this->cont; ?>'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Insertar Actividad Grupal']; ?></label><br>
                </div>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreActividadGrupal']; ?></label><br>
                    <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="80" type="text" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionActividadGrupal']; ?></label><br>
                    <input class="form" id="descripcionActividadGrupal" name="descripcionActividadGrupal" size="150" type="text" required="false"/>
                </div>
                
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['numPlazasActividadGrupal']; ?></label><br>
                    <input class="form" id="numPlazasActividadGrupal" name="numPlazasActividadGrupal" size="10" type="int" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['username']; ?></label><br>
                    <input class="form" id="username" name="username" size="20" type="text" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['idInstalacion']; ?></label><br>
                    <input class="form" id="idInstalacion" name="idInstalacion" size="10" type="int" required="true"/>
                </div>


                <input type='submit' onclick="return valida_envia_ACTIVIDAD_GRUPAL()" name='accion'  value="<?php echo $strings['Insertar']; ?>">
                <button type="button" class="btn btn-info"><a href='ACTIVIDAD_GRUPAL_Controller.php'>Volver</a></button>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
