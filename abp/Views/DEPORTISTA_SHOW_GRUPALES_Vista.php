<?php

class DEPORTISTA_SHOW_GRUPALES {

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
            $lista = array('nombreActividadGrupal', 'username', 'idInstalacion');
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
                                            <a href='ACTIVIDAD_GRUPAL_Controller.php?idActividadGrupal=<?php echo $this->datos[$j]['idActividadGrupal'] . '&accion=' . $strings['Ver1']; ?>'><font color="#088A4B"><?php echo $valor; ?></font></a> <?php
                                            break;
                                        } if ($clave === 'username') {
                                            ?>
                                            <a href='ENTRENADOR_Controller.php?userName=<?php echo $this->datos[$j]['username'] . '&accion=' . $strings['Ver1']; ?>'><font color="#088A4B"><?php echo $valor; ?></font></a> <?php
                                            break;
                                        }if ($clave === 'idInstalacion') {
                                            ?>
                                            <a href='INSTALACION_Controller.php?userName=<?php echo $this->datos[$j]['idInstalacion'] . '&accion=' . $strings['Ver']; ?>'><font color="#088A4B"><?php echo ConsultarNombreInstalacion($valor); ?></font></a> <?php
                                            break;
                                        } else {
                                            echo $valor;
                                        }

                                        echo "</td>";
                                    }
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
