<?php

class ADMIN_STATS {

    private $volver;

    function __construct($volver) {
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='<?php $this->volver; ?>'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" text-align="center" > <b><?php echo $strings['EstadísticasMuevet']; ?></b></label><br>
                </div>

                <div class="form-group">
                    <?php
                    foreach (ActividadMasUsuarios() as $clave) {
                        foreach ($clave as $valor) {
                            ?>
                            <label class = "control-label" ><?php echo $strings['ActividadMas']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="10" type="text" style="text-align:center;" readonly="true" value="<?php echo ConsultarNombreActividadGrupal($valor); ?>">
                            <label class="control-label" ><?php echo $strings['PlazasOcupadas']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="3" type="text" style="text-align:center;" readonly="true" value="<?php echo PlazasOcupadas($valor); ?>">
                            <label class="control-label" ><?php echo $strings['Ocupacion']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="8" type="text" style="text-align:center;" readonly="true" value="<?php
                            echo Ocupacion($valor, PlazasOcupadas($valor));
                            echo " % "
                            ?>"><br>
                                   <?php
                               }
                           }
                           ?>
                </div>


                <div class="form-group">
                    <?php
                    foreach (ActividadMenosUsuarios() as $clave) {
                        foreach ($clave as $valor) {
                            ?>
                            <label class = "control-label" ><?php echo $strings['ActividadMenos']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="10" type="text" style="text-align:center;" readonly="true" value="<?php echo ConsultarNombreActividadGrupal($valor); ?>">
                            <label class="control-label" ><?php echo $strings['PlazasOcupadas']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="3" type="text" style="text-align:center;" readonly="true" value="<?php echo PlazasOcupadas($valor); ?>">
                            <label class="control-label" ><?php echo $strings['Ocupacion']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="8" type="text" style="text-align:center;" readonly="true" value="<?php
                                   echo Ocupacion($valor, PlazasOcupadas($valor));
                                   echo " % "
                                   ?>"><br>
                                   <?php
                               }
                           }
                           ?>
                </div>



                <div class="form-group">
                    <?php
                    foreach (EntrenadorMasActividades() as $clave) {
                        foreach ($clave as $valor) {
                            ?>
                            <label class = "control-label" ><?php echo $strings['EntrenadorMas']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="10" type="text" style="text-align:center;" readonly="true" value="<?php echo $valor; ?>">
                            <label class="control-label" ><?php echo $strings['NumActividadesEntrenador']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="3" type="text" style="text-align:center;" readonly="true" value="<?php echo NumActividadesEntrenador($valor); ?>">
                            <?php
                        }
                    }
                    ?>
                </div>


                <div class="form-group">
                    <?php
                    foreach (EntrenadorMenosActividades() as $clave) {
                        foreach ($clave as $valor) {
                            ?>
                            <label class = "control-label" ><?php echo $strings['EntrenadorMenos']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="10" type="text" style="text-align:center;" readonly="true" value="<?php echo $valor; ?>">
                            <label class="control-label" ><?php echo $strings['NumActividadesEntrenador']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="3" type="text" style="text-align:center;" readonly="true" value="<?php echo NumActividadesEntrenador($valor); ?>"><br>
                            <?php
                        }
                    }
                    ?>
                </div>


                <div class="form-group">
                    <?php
                    foreach (DeportistaMasSesiones() as $clave) {
                        foreach ($clave as $valor) {
                            ?>
                            <label class = "control-label" ><?php echo $strings['DeportistaMas']; ?></label>
                            <input font color='red' size="10" type="text" style="text-align:center;" readonly="true" value="<?php echo $valor; ?>">
                            <label class="control-label" ><?php echo $strings['NumSesiones']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="3" type="text" style="text-align:center;" readonly="true" value="<?php echo NumSesionesEntrenador($valor); ?>"><br>
                            <?php
                        }
                    }
                    ?>
                </div>


                <div class="form-group">
                    <?php
                    foreach (DeportistaMasActividades() as $clave) {
                        foreach ($clave as $valor) {
                            ?>
                            <label class = "control-label" ><?php echo $strings['DeportistaMasActividades']; ?></label>
                            <input font color='red' size="10" type="text" style="text-align:center;" readonly="true" value="<?php echo $valor; ?>">
                            <label class="control-label" ><?php echo $strings['NumActividades']; ?></label>
                            <input class="form" id="nombreActividadGrupal" name="nombreActividadGrupal" size="3" type="text" style="text-align:center;" readonly="true" value="<?php echo NumActividadesDeportista($valor); ?>"><br>
                            <?php
                        }
                    }
                    ?>
                </div>

                <div>
                    <br><br><a class="form-link" href='../Views/DEFAULT_Vista.php'><?php echo $strings['Volver']; ?></a>
                </div>
            </form>
        </div>





        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
