<?php

//VISTA PARA LA INSERCIÓN DE ACTIVIDADES INDIVIDUALES
class ACTIVIDAD_INDIVIDUAL_Insertar {

    private $volver;
    private $cont;
    
    function __construct($valores, $volver) {
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='<?php echo $this->cont; ?>'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Insertar Actividad Individual']; ?></label><br>
                </div>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreActividadIndividual']; ?></label><br>
                    <input class="form-control" id="nombreActividadIndividual" name="nombreActividadIndividual" size="80" type="text" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionActividadIndividual']; ?></label><br>
                    <input class="form" id="descripcionActividadIndividual" name="descripcionActividadIndividual" size="160" type="text" required="false"/>
                </div>
                           

                <input type='submit' onclick="return valida_envia_ACTIVIDAD_INDIVIDUAL()" name='accion'  value="<?php echo $strings['Insertar']; ?>">
                <button type="button" class="btn btn-info"><a href='ACTIVIDAD_INDIVIDUAL_Controller.php'>Volver</a></button>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
