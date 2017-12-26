<?php

class DEPORTISTA_INSCRIBIR_ACTIVIDAD {

    //private $TablasUser;
    private $datos;
    private $volver;

    function __construct($datos, $volver) {
        //$this->TablasUser = $TablasUser;
        $this->datos = $datos;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        ?>
        <form method="POST" action="?accion=<?php echo $strings['Asignar'] ?>&userName=<?php echo $_REQUEST['userName'] ?>" id="frmTableEjercicios">
            <div class="container">	
                <?php
                $lista = array('nombreActividadGrupal', 'numPlazasActividadGrupal', 'diaActividadGrupal', 'horaInicioActividadGrupal', 'horaFinActividadGrupal', 'fechaInicioActividadGrupal', 'fechaFinActividadGrupal', 'username', 'idInstalacion');
                ?>

                <div class="container">
                    <div class="col-lg-12">
                        <table class="table" id='frmTableEjercicios'>
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
                                ?><td><button type="button" class="btn btn-danger"><a href='DEPORTISTA_Controller.php?idActividadGrupal=<?php echo $this->datos[$j]['idActividadGrupal'] . '&userName=' . $_REQUEST['userName']. '&accion=' . $strings['DesasignarActividad']; ?>'><?php echo $strings['Desasignar']; ?></a></button></td>
                           <?php }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php
            include 'footer.php'
            ?>
            ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    var counter = 0;

                    $("#addrow").on("click", function () {

                        var newRow = $("<tr>");
                        var cols = "";

                        //cols += '<td>' + counter + '</td>';
                        cols += '<td><select class="form-control" id="sel1" name="select' + counter + '"><?php echo $this->datos['selectedTablas']; ?></select></td>';

                        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Eliminar fila"></td>';
                        newRow.append(cols);
                        $("#tblEjercicios").append(newRow);
                        counter++;
                    });



                    $("#tblEjercicios").on("click", ".ibtnDel", function (event) {
                        $(this).closest("tr").remove();
                        counter -= 1
                    });

                    $("#savefrm").on("click", function () {
                        document.getElementById('frmTableEjercicios').submit();

                    });


                });
            </script>
            <?php
        }

    }
    ?>
