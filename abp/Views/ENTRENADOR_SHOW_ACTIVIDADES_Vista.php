<?php

class ENTRENADOR_SHOW_GRUPALES {

//VISTA PARA LISTAR TODAS LAS ACTIVIDADES GRUPALES
    private $datos;
    private $volver;

    function __construct($array, $volver) {
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        ?> 
        <div class="container">	
            <?php
            $lista = array('nombreActividadGrupal', 'diaActividadGrupal', 'horaInicioActividadGrupal', 'horaFinActividadGrupal', 'fechaInicioActividadGrupal', 'fechaFinActividadGrupal', 'idInstalacion');
            ?>
            <br><br>

            <div class="container">
                <div class="col-lg-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <?php
                                foreach ($lista as $titulo) {
                                    echo "<th>";
                                    echo $strings[$titulo];
                                    echo "</th>";
                                }
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                for ($j = 0; $j < count($this->datos); $j++) {
                                    echo "<tr>";
                                    foreach ($this->datos [$j] as $clave => $valor) {
                                        for ($i = 0; $i < count($lista); $i++) {
                                            if ($clave === $lista[$i]) {
                                                echo "<td>";
                                                if ($clave === 'nombreActividadGrupal') {
                                                    ?>
                                            <a href='ACTIVIDAD_GRUPAL_Controller.php?idActividadGrupal=<?php echo $this->datos[$j]['idActividadGrupal'] . '&accion=' . $strings['Ver']; ?>'><font color="#088A4B"><?php echo $valor; ?></font></a> <?php
                                        } else if ($clave === 'username') {
                                            ?>
                                            <a href='ENTRENADOR_Controller.php?userName=<?php echo $this->datos[$j]['username'] . '&accion=' . $strings['VerMonitor']; ?>'><font color="#088A4B"><?php echo $valor; ?></font></a> <?php
                                        } else if ($clave === 'horaInicioActividadGrupal') {
                                            echo CambiarFormatoTiempoHoraInicio($this->datos[$j]['idActividadGrupal']);
                                        } else if ($clave === 'horaFinActividadGrupal') {
                                            echo CambiarFormatoTiempoHoraFin($this->datos[$j]['idActividadGrupal']);
                                        } else if ($clave === 'idInstalacion') {
                                            echo ConsultarNombreInstalacion($this->datos[$j]['idInstalacion']);
                                        } else {
                                            echo $valor;
                                        }

                                        echo "</td>";
                                    }
                                }
                            }
                            ?>
                            <td><button type="button" class="btn btn-info"><a href='ENTRENADOR_Controller.php?idActividadGrupal=<?php echo $this->datos[$j]['idActividadGrupal'] . '&accion=' . $strings['VerDeportistas']; ?>'><?php echo $strings['VerDeportistas']; ?></a></button></td>
                                <?php }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
        include '../Views/footer.php';
    }

}
