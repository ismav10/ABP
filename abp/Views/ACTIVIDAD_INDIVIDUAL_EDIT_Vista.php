<?php

//VISTA PARA LA MODIFICACION DE ACTIVIDADES INDIVIDUALES
class ACTIVIDAD_INDIVIDUAL_Modificar {

    private $valores;
    private $instalaciones;
    private $volver;

    function __construct($valores, $instalaciones, $volver) {
        $this->valores = $valores;
        $this->instalaciones = $instalaciones;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='<?php $this->volver; ?>'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Modificar Actividad Individual']; ?></label><br>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreActividadIndividual']; ?></label><br>
                    <input class="form-control" id="nombreActividadIndividual" name="nombreActividadIndividual" size="80" type="text" required="true" value="<?php echo $this->valores['nombreActividadIndividual']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionActividadIndividual']; ?></label><br>
                    <input class="form" id="descripcionActividadIndividual" name="descripcionActividadIndividual" size="160"  type="text" required="false" value="<?php echo $this->valores['descripcionActividadIndividual']; ?>">
                </div>                             


                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['idInstalacion']; ?></label><br>
                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="idInstalacion" name="idInstalacion" required="true"> 
                        <?php
                        for ($j = 0; $j < count($this->instalaciones); $j++) {
                            echo "<tr>";
                            foreach ($this->instalaciones [$j] as $clave => $valor) {
                                echo "<td>";
                                if ($valor == $this->valores['idInstalacion']) {
                                    ?>
                                    <option selected><?php echo ConsultarNombreInstalacion($valor); ?></option>
                                <?php } else {
                                    ?>
                                    <option><?php echo ConsultarNombreInstalacion($valor); ?></option>
                                    <?php
                                }
                            }
                        }
                        ?>	
                    </select>
                </div>


                <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_ACTIVIDAD_INDIVIDUAL()" >
                <button type="button" class="btn btn-info"><a href='ACTIVIDAD_INDIVIDUAL_Controller.php'><?php echo $strings['Volver']; ?></a></button>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
