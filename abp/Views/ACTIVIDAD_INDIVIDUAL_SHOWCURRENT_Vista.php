<?php

//VISTA PARA LA CONSULTA DE ACTIVIDADES INDIVIDUALES
class ACTIVIDAD_INDIVIDUAL_Consultar {

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
                    <label class="control-label" ><?php echo $strings['Consultar Actividades Individuales']; ?></label><br>
                </div>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreActividadIndividual']; ?></label><br>
                    <input class="form-control" id="nombreActividadIndividual" name="nombreActividadIndividual" size="80" type="text">
                </div>                              


                <input type='submit' onclick="return valida_envia_ACTIVIDAD_INDIVIDUAL()" name='accion'  value="<?php echo $strings['Consultar']; ?>">
                <button type="button" class="btn btn-info"><a href='ACTIVIDAD_INDIVIDUAL_Controller.php'>Volver</a></button>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
