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
            <form  id="form" name="form" action='ACTIVIDAD_GRUPAL_Controller.php'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Insertar Actividad Grupal']; ?></label><br>
                </div>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreActividadGrupal']; ?></label><br>
                    <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="80" type="text" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionActividadGrupal']; ?></label><br>
                    <input class="form" id="descripcionActividadGrupal" name="descripcionActividadGrupal" size="100" type="text" >
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['numPlazasActividadGrupal']; ?></label><br>
                    <input class="form" id="numPlazasActividadGrupal" name="numPlazasActividadGrupal" size="10" type="int" required="true"/>
                </div>
                
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['diaActividadGrupal']; ?></label><br>
                    <input class="form" id="diaActividadGrupal" name="diaActividadGrupal" size="15" type="text" required="true"/>
                </div>
                
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['horaInicioActividadGrupal']; ?></label><br>
                    <input class="form" id="horaInicioActividadGrupal" name="horaInicioActividadGrupal" size="15" type="time" required="true"/>
                </div>
                
                   <div class="form-group">
                    <label class="control-label" ><?php echo $strings['horaFinActividadGrupal']; ?></label><br>
                    <input class="form" id="horaFinActividadGrupal" name="horaFinActividadGrupal" type="time" required="true"/>
                </div>
                
                   <div class="form-group">
                    <label class="control-label" ><?php echo $strings['fechaInicioActividadGrupal']; ?></label><br>
                    <input class="form" id="fechaInicioActividadGrupal" name="fechaInicioActividadGrupal" size="15" type="date" required="true"/>
                </div>
                
                   <div class="form-group">
                    <label class="control-label" ><?php echo $strings['fechaFinActividadGrupal']; ?></label><br>
                    <input class="form" id="fechaFinActividadGrupal" name="fechaFinActividadGrupal" size="15" type="date" required="true"/>
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


                <input type = 'submit' onclick="return valida_envia_ACTIVIDAD_GRUPAL()" name = 'accion' value = '<?php echo $strings['Insertar'] ?>'>
                <a class="form-link" href='ACTIVIDAD_GRUPAL_Controller.php'>Volver</a>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
