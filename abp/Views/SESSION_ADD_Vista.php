<?php

//VISTA PARA LA INSERCIÓN DE USUARIOS
class SESION_Insertar {

//private $tablas;
//private $actividades;
    private $volver;

    function __construct($tablas,$actividades,$idTablas, $idActividades,$volver) {
        $this->volver = $volver;
        //$this->$tablas = $tablas;
        //$this->$actividades = $actividades;
        $this->render($tablas,$actividades,$idTablas, $idActividades);
    }

    function render($tablas,$actividades,$idTablas, $idActividades) {
        
        
        $hoy = getDate();
        $hoy1 = localTime(time(),true);
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='SESION_Controller.php'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Iniciar sesion']; ?></label><br>
                </div>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['fechaSesion']; ?></label><br>
                    <input class="form" id="fechaSesion" name="fechaSesion" size="25" type="text" required="true" readonly="true" value=<?php echo $hoy['year']."/".$hoy1['tm_mon']."/".$hoy1['tm_mday']?> />
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['horaInicio']; ?></label><br>
                    <input class="form" id="horaInicio" name="horaInicio" size="25" type="text" required="true" readonly="true" value=<?php echo $hoy['hours'].":".$hoy['minutes'].""?> />
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['idTabla']; ?></label><br>
                    <?php
                    for($i=0;$i<count($tablas);$i++)
                    {
                       echo '<label class="control-label" >'.$tablas[$i]['idTabla'].'</label><br>';
                       echo '<input class="form" id="idTabla" name="idTabla" size="50" type="radio" value='.$idTablas[$i]['idTabla']. 'required="true"/><br>';
                       echo '<br>';
                    }
                    ?>            
                </div>

                 <div class="form-group">
                    <label class="control-label" ><?php echo $strings['idActividadIndividual']; ?></label><br>
                    <?php
                    for($i=0;$i<count($actividades);$i++)
                    {
                       echo '<label class="control-label" >'.$actividades[$i]['idActividadIndividual'].'</label><br>';
                       echo '<input class="form" id="idActividadIndividual" name="idActividadIndividual" size="50" type="radio" value='.$idActividades[$i]['idActividadIndividual']. 'required="true"/><br>';
                       echo '<br>';
                    }
                    ?>            
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['comentarioSesion']; ?></label><br>
                    <input class="form" id="comentarioSesion" name="comentarioSesion" type="textarea" rows="10" cols="40" />
                </div>
                <input type='submit' onclick="" name='accion'  value="<?php echo $strings['Insertar']; ?>">
                <a class="form-link" href="<?php echo $this->volver?>"><?php echo $strings['Volver']; ?>
            </form>
        </div>
        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}

?>