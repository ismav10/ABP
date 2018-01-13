<?php

//VISTA PARA LA MODIFICACION DE ACTIVIDADES GRUPALES
class ACTIVIDAD_GRUPAL_Modificar {

    private $valores;
    private $volver;
    private $entrenadores;
    private $instaaciones;

    function __construct($valores, $volver, $array1, $array2) {
        $this->valores = $valores;
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
                    <label class="control-label" ><?php echo $strings['Modificar Actividad Grupal']; ?></label><br>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreActividadGrupal']; ?></label><br>
                    <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="80" type="text" required="true" value="<?php echo $this->valores['nombreActividadGrupal']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionActividadGrupal']; ?></label><br>
                    <input class="form" id="descripcionActividadGrupal" name="descripcionActividadGrupal" size="160"  type="text" value="<?php echo $this->valores['descripcionActividadGrupal']; ?>">
                </div>

                <div class="form-group">
                    <!--            <label class="control-label" ></label><br>-->
                    <input class="form" type='hidden' id="numPlazasActividadGrupal" name="numPlazasActividadGrupal" size="10" type="int" required="true" value="<?php echo $this->valores['numPlazasActividadGrupal']; ?>">
                </div>


                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['diaActividadGrupal']; ?></label><br>
                    <select name="diaActividadGrupal" id="diaActividadGrupal">
                        <?php if ($this->valores['diaActividadGrupal'] == 'Lunes') { ?>
                            <option selected value="Lunes"><?php echo $strings['Lunes']; ?></option> 
                        <?php } else { ?>
                            <option value="Lunes"><?php echo $strings['Lunes']; ?></option> 
                        <?php
                        }

                        if ($this->valores['diaActividadGrupal'] == 'Martes') {
                            ?>
                            <option selected value="Martes"><?php echo $strings['Martes']; ?></option> 
                        <?php } else { ?>
                            <option value="Martes"><?php echo $strings['Martes']; ?></option> 
                        <?php
                        }

                        if ($this->valores['diaActividadGrupal'] == 'Miércoles') {
                            ?>
                            <option selected value="Miércoles"><?php echo $strings['Miércoles']; ?></option> 
                        <?php } else { ?>
                            <option value="Miércoles"><?php echo $strings['Miércoles']; ?></option> 
                        <?php
                        }

                        if ($this->valores['diaActividadGrupal'] == 'Jueves') {
                            ?>
                            <option selected value="Jueves"><?php echo $strings['Jueves']; ?></option> 
                        <?php } else { ?>
                            <option value="Jueves"><?php echo $strings['Jueves']; ?></option> 
                        <?php
                        }

                        if ($this->valores['diaActividadGrupal'] == 'Viernes') {
                            ?>
                            <option selected value="Viernes"><?php echo $strings['Viernes']; ?></option> 
        <?php } else { ?>
                            <option value="Viernes"><?php echo $strings['Viernes']; ?></option> 
        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['horaInicioActividadGrupal']; ?></label><br>
                    <input class="form" id="horaInicioActividadGrupal" name="horaInicioActividadGrupal" size="15" type="time" required="true" value="<?php echo $this->valores['horaInicioActividadGrupal']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['horaFinActividadGrupal']; ?></label><br>
                    <input class="form" id="horaFinActividadGrupal" name="horaFinActividadGrupal" type="time" required="true" value="<?php echo $this->valores['horaFinActividadGrupal']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['fechaInicioActividadGrupal']; ?></label><br>
                    <input class="form" id="fechaInicioActividadGrupal" name="fechaInicioActividadGrupal" size="15" type="date" required="true" value="<?php echo $this->valores['fechaInicioActividadGrupal']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['fechaFinActividadGrupal']; ?></label><br>
                    <input class="form" id="fechaFinActividadGrupal" name="fechaFinActividadGrupal" size="15" type="date" required="true" value="<?php echo $this->valores['fechaFinActividadGrupal']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['username']; ?></label><br>
                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="username" name="username" required="true"> 

                        <?php
                        for ($j = 0; $j < count($this->entrenadores); $j++) {
                            echo "<tr>";
                            foreach ($this->entrenadores [$j] as $clave => $valor) {
                                echo "<td>";
                                if ($valor == $this->valores['username']) {
                                    ?>
                                    <option selected><?php echo $valor; ?></option>
                                <?php } else {
                                    ?>
                                    <option><?php echo $valor; ?></option>
                                    <?php
                                }
                            }
                        }
                        ?>	
                    </select>
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



                <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_ACTIVIDAD_GRUPAL()" >
                <a class="form-link" href='ACTIVIDAD_GRUPAL_Controller.php'><?php echo $strings['Volver']; ?></a>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
