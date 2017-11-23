<?php

//VISTA PARA LA INSERCIÓN DE ACTIVIDADES GRUPALES
class ACTIVIDAD_GRUPAL_Insertar {

    private $instalaciones;
    private $entrenadores;
    private $entrenador;

    function __construct($array1, $array2) {
        $this->entrenadores = $array1;
        $this->instalaciones = $array2;
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
                    <input class="form-control" id="nombreActividadGrupal" name="nombreActividadGrupal" size="80" type="text" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionActividadGrupal']; ?></label><br>
                    <input class="form" id="descripcionActividadGrupal" name="descripcionActividadGrupal" size="160" type="text" >
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['numPlazasActividadGrupal']; ?></label><br>
                    <input class="form-control" id="numPlazasActividadGrupal" name="numPlazasActividadGrupal" size="10" type="int" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['username']; ?></label><br>
                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="username" name="username" required="true"> 
                        <option selected></option>
                        <?php
                        for ($j = 0; $j < count($this->entrenadores); $j++) {
                            echo "<tr>";
                            foreach ($this->entrenadores [$j] as $clave => $valor) {
                                echo "<td>";
                                ?>
                                <option><?php echo $valor; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['idInstalacion']; ?></label><br>
                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="idInstalacion" name="idInstalacion" required="true"> 
                        <option selected></option>
                        <?php
                        for ($j = 0; $j < count($this->instalaciones); $j++) {
                            echo "<tr>";
                            foreach ($this->instalaciones [$j] as $clave => $valor) {
                                echo "<td>";
                                ?>
                                <option><?php echo $valor; ?></option>
                                <?php
                            }
                        }
                        ?>			 
                    </select>
                </div>


                <input type = 'submit' name = 'accion' value = '<?php echo $strings['Insertar'] ?>'  onclick="return valida_envia_ACTIVIDAD_GRUPAL()" >
                <button type="button" class="btn btn-info"><a href='ACTIVIDAD_GRUPAL_Controller.php'>Volver</a></button>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
