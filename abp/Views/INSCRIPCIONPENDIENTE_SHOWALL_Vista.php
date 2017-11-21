<?php

class INSCRIPCIONPENDIENTE_Show {

//VISTA PARA LISTAR TODOS LOS USUARIOS
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
            $lista = array('userName', 'idActividadGrupal', 'estado', 'plazasDisponibles');
            ?>

            <div class="container">
                <div class="col-lg-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <?php
                                foreach ($lista as $titulo) {
                                    echo "<th>";
                                    if ($titulo == 'idActividadGrupal') {
                                        $titulo = 'nombreActividadGrupal';
                                        echo $strings[$titulo];
                                    } else {
                                        echo $strings[$titulo];
                                    }
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
                                                if (($clave === 'idActividadGrupal')) {
                                                    echo ConsultarNombreActividadGrupal($valor);

                                                    break;
                                                }

                                                if (($clave === 'estado')) {
                                                    echo $strings[$valor];
                                                    break;
                                                } else {
                                                    echo $valor;
                                                }
                                                echo "</td>";
                                            }
                                        }
                                    }
                                    ?>

                                    <td><button type="button" class="btn btn-success"><a href='INSCRIPCION_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&actividad=' . $this->datos[$j]['idActividadGrupal'] . '&accion=' . $strings['Aceptar']; ?>'><?php echo $strings['Aceptar']; ?></a></button></td>
                                    <td><button type="button" class="btn btn-danger"> <a href='INSCRIPCION_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&actividad=' . $this->datos[$j]['idActividadGrupal'] . '&accion=' . $strings['Rechazar']; ?>'><?php echo $strings['Rechazar']; ?></a></button></td>
                                            <?php
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
