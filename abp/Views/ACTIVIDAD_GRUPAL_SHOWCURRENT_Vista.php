<?php

//VISTA PARA LA INSERCIÓN DE ACTIVIDADES GRUPALES
class ACTIVIDAD_GRUPAL_Consultar {

    private $volver;
    private $cont;
    
    function __construct() {
        
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='<?php echo $this->cont; ?>'  method='POST'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Consultar Actividades Grupales']; ?></label><br>
                </div>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreActividadGrupal']; ?></label><br>
                    <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="80" type="text"
                </div>
                
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['numPlazasActividadGrupal']; ?></label><br>
                    <input class="form" id="numPlazasActividadGrupal" name="numPlazasActividadGrupal" size="10" type="int" />
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['username']; ?></label><br>
                    <input class="form" id="username" name="username" size="20" type="text" />
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['idInstalacion']; ?></label><br>
                    <input class="form" id="idInstalacion" name="idInstalacion" size="10" type="int"/>
                </div>


                <input type='submit' onclick="return valida_envia_ACTIVIDAD_GRUPAL()" name='accion'  value="<?php echo $strings['Consultar']; ?>">
                <button type="button" class="btn btn-info"><a href='ACTIVIDAD_GRUPAL_Controller.php'>Volver</a></button>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
