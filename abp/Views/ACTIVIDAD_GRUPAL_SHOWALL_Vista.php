<?php

class ACTIVIDAD_GRUPAL_Listar {

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
            $lista = array('nombreActividadGrupal', 'numPlazasActividadGrupal', 'diaActividadGrupal', 'horaInicioActividadGrupal', 'horaFinActividadGrupal', 'fechaInicioActividadGrupal', 'fechaFinActividadGrupal' ,'username', 'idInstalacion');
            ?>
            
            <div class="container">
                <div class="col-lg-12">
                    <?php if (ConsultarTipoUsuarioLogin() == 1) { ?>
                        <a href='ACTIVIDAD_GRUPAL_Controller.php?accion=<?php echo $strings['Insertar']; ?>'><img src="../img/actividadadd.png" width="50px" height="50px"></a>			
                    <?php } ?>
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
                                            } else if($clave === 'horaInicioActividadGrupal'){
                                            echo CambiarFormatoTiempoHoraInicio($this->datos[$j]['idActividadGrupal']);
                                        }else if($clave === 'horaFinActividadGrupal'){
                                            echo CambiarFormatoTiempoHoraFin($this->datos[$j]['idActividadGrupal']);
                                        }else if($clave === 'idInstalacion'){
                                            echo ConsultarNombreInstalacion($this->datos[$j]['idInstalacion']);
                                        }else {
                                            echo $valor;
                                        }

                                        echo "</td>";
                                    }
                                }
                            }
                            if (ConsultarTipoUsuarioLogin() == 1) {
                                ?>
                                <td><button type="button" class="btn btn-info"><a href='ACTIVIDAD_GRUPAL_Controller.php?idActividadGrupal=<?php echo $this->datos[$j]['idActividadGrupal'] . '&accion=' . $strings['Modificar']; ?>'><?php echo $strings['Modificar']; ?></a></button></td>
                                <td><button type="button" class="btn btn-danger"><a href='ACTIVIDAD_GRUPAL_Controller.php?idActividadGrupal=<?php echo $this->datos[$j]['idActividadGrupal'] . '&accion=' . $strings['Borrar']; ?>'><?php echo $strings['Borrar']; ?></a></button></td>
                                <?php
                            } if (ConsultarTipoUsuarioLogin() == 3) {
                                if (ConsultarSolicitudGrupal($this->datos[$j]['idActividadGrupal']) == 0) {
                                    ?>
                                    <td><button type="button" class="btn btn-warning"><a href='ACTIVIDAD_GRUPAL_Controller.php?idActividadGrupal=<?php echo $this->datos[$j]['idActividadGrupal'] . '&accion=' . $strings['Asignar'] . '&userName=' . $_SESSION['login']; ?>'><?php echo $strings['EnTramite']; ?></a></button></td>
                                <?php } else if (ConsultarSolicitudGrupal($this->datos[$j]['idActividadGrupal']) == 1) {
                                    ?>
                                    <td><button type="button" class="btn btn-info"><a href='ACTIVIDAD_GRUPAL_Controller.php?idActividadGrupal=<?php echo $this->datos[$j]['idActividadGrupal'] . '&accion=' . $strings['Asignar'] . '&userName=' . $_SESSION['login']; ?>'><?php echo $strings['YaInscrito']; ?></a></button></td>
                                <?php } else if (ConsultarSolicitudGrupal($this->datos[$j]['idActividadGrupal']) != 1 || ConsultarSolicitudGrupal($this->datos[$j]['idActividadGrupal']) != 0) {
                                    ?>
                                    <td><button type="button" class="btn btn-success"><a href='ACTIVIDAD_GRUPAL_Controller.php?idActividadGrupal=<?php echo $this->datos[$j]['idActividadGrupal'] . '&accion=' . $strings['Asignar'] . '&userName=' . $_SESSION['login']; ?>'><?php echo $strings['MandarSolicitud']; ?></a></button></td>
                                            <?php
                                            }
                                            }
                                            }
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
            