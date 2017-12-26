<?php

//VISTA PARA LA INSERCIÓN DE ACTIVIDADES GRUPALES
class ACTIVIDAD_GRUPAL_Consultar {

    private $volver;
    private $instalaciones;
    private $entrenadores;

    function __construct($volver,$array1, $array2) {
        $this->volver = $volver;
        $this->entrenadores = $array1;
        $this->instalaciones = $array2;
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='<?php $this->volver; ?>'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Consultar Actividades Grupales']; ?></label><br>
                </div>
                
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreActividadGrupal']; ?></label><br>
                    <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="80" type="text"/>
                </div>

               
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['diaActividadGrupal']; ?></label><br>
                    <select name="diaActividadGrupal" id="diaActividadGrupal">
                        <option selected></option>
                        <option value="Lunes"><?php echo $strings['Lunes']; ?></option> 
                        <option value="Martes"><?php echo $strings['Martes']; ?></option>
                        <option value="Miércoles"><?php echo $strings['Miércoles']; ?></option> 
                        <option value="Jueves"><?php echo $strings['Jueves']; ?></option>
                        <option value="Viernes"><?php echo $strings['Viernes']; ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['horaInicioActividadGrupal']; ?></label><br>
                    <input class="form" id="horaInicioActividadGrupal" name="horaInicioActividadGrupal" size="15" type="time"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['horaFinActividadGrupal']; ?></label><br>
                    <input class="form" id="horaFinActividadGrupal" name="horaFinActividadGrupal" type="time"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['fechaInicioActividadGrupal']; ?></label><br>
                    <input class="form" id="fechaInicioActividadGrupal" name="fechaInicioActividadGrupal" size="15" type="date"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['fechaFinActividadGrupal']; ?></label><br>
                    <input class="form" id="fechaFinActividadGrupal" name="fechaFinActividadGrupal" size="15" type="date"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['username']; ?></label><br>
                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="username" name="username"> 
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
                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="idInstalacion" name="idInstalacion"> 
                        <option selected></option>
                        <?php
                        for ($j = 0; $j < count($this->instalaciones); $j++) {
                            echo "<tr>";
                            foreach ($this->instalaciones [$j] as $clave => $valor) {
                                echo "<td>";
                                ?>
                                <option><?php echo ConsultarNombreInstalacion($valor); ?></option>
                                <?php
                            }
                        }
                        ?>			 
                    </select>
                </div>


                <input type='submit' onclick="return valida_envia_ACTIVIDAD_GRUPAL()" name='accion'  value="<?php echo $strings['Consultar2']; ?>">
               <a class="form-link" href='ACTIVIDAD_GRUPAL_Controller.php'><?php echo $strings['Volver']; ?></a>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
