<script type="text/javascript">
    function changeIdAction(id)
    {
        document.getElementById("frmAsignar").action += id;
    }
</script>

<script type="text/javascript">
    function changeIdAction1(id)
    {
        document.getElementById("frmAsignar1").action += id;
    }
</script>


<?php

class DEPORTISTA_Show {

//VISTA PARA LISTAR TODOS LOS USUARIOS
    private $datos;
    private $volver;
    private $tablasEstandar;
    private $tablasPersonalizadas;

    function __construct($array, $tablasEstandar, $tablasPersonalizadas, $volver) {
        $this->datos = $array;
        $this->volver = $volver;
        $this->tablasEstandar = $tablasEstandar;
        $this->tablasPersonalizadas = $tablasPersonalizadas;
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        ?> 
        <div class="container">
            <?php
            $lista = array('foto', 'userName', 'nombre', 'apellidos', 'dni', 'fechaNac', 'direccion', 'telefono', 'email', 'tipoDeportista', 'metodoPago');
            ?>
            <br><br>

            <div class="container">
                <div align='left'>
                    <?php if(ConsultarTipoUsuarioLogin() == 1){ ?>
                    <a href='DEPORTISTA_Controller.php?accion=<?php echo $strings['Insertar']; ?>'><img src="../img/useradd.png" width="50px" height="50px"></a>
                    <?php } ?>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form id="frmAsignar" method="POST" action="?accion=<?php echo $strings['Asignar']; ?>&userName=">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $strings['AsignarTablaDeportista']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="sel1"><?php echo $strings['SeleccionaTabla']; ?></label>
                                        <select multiple class="form-control" id="sel2" name="asignacionTablas[]">
                                            <?php
                                            foreach ($this->tablasEstandar['tablas'] as $valor) {
                                                echo '<option>' . ConsultarNombreTabla($valor['0']) .'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $strings['Cerrar']; ?></button>
                                    <button type="submit" class="btn btn-primary"><?php echo $strings['Guardar']; ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                
                
                
                <!-- Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form id="frmAsignar1" method="POST" action="?accion=<?php echo $strings['Asignar']; ?>&userName=">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1"><?php echo $strings['AsignarTablaDeportista']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="sel1"><?php echo $strings['SeleccionaTabla']; ?></label>
                                        <select multiple class="form-control" id="sel1" name="asignacionTablas[]">
                                            <?php
                                            foreach ($this->tablasPersonalizadas['tablas'] as $valor) {
                                                echo '<option>'. ConsultarNombreTabla($valor['0']) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $strings['Cerrar']; ?></button>
                                    <button type="submit" class="btn btn-primary"><?php echo $strings['Guardar']; ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                
                


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
                                            if (($clave === 'foto')) {
                                                if (is_file($valor)) {
                                                    ?><a target='_blank' href='<?php echo $valor ?>'><img src='<?php echo $valor ?>' width="50" height="50"></a> <?php
                                                } else {
                                                    ?><a target='_blank' href="../img/user.jpg"><img src="../img/user.jpg" width="50" height="50"></a> <?php
                                            }
                                            break;
                                        }
                                        if ($clave == 'metodoPago') {
                                            $post = substr($valor, -4);
                                            $resultado = "••••••••••••" . $post;
                                            echo $resultado;
                                            break;
                                        }if ($clave === 'tipoUsuario') {
                                            echo $strings[ConsultarNOMRol($valor)];
                                            break;
                                        }
                                        if ($clave === 'userName') {
                                            ?>
                                        <a href='DEPORTISTA_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['Ver']; ?>'><font color="#088A4B"><?php echo $valor; ?></font></a> <?php
                        } else {
                            echo $valor;
                        }
                        echo "</td>";
                    }
                }
            }
                            ?>

                         <?php if(ConsultarTipoUsuarioLogin() == 1){ ?>
                        <td><button type="button" class="btn btn-info"><a href='DEPORTISTA_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['Modificar']; ?>'><?php echo $strings['Modificar']; ?></a></button></td>
                        <td><button type="button" class="btn btn-danger"><a href='DEPORTISTA_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['Borrar']; ?>'><?php echo $strings['Borrar']; ?></a></button></td>
                         <?php } ?>
                        <?php if (ConsultarTipoDeportista($this->datos[$j]['userName']) == 'TDU') { ?>
                            <td><a data-toggle="modal" href="#myModal" onclick="changeIdAction('<?php echo $this->datos[$j]['userName'] ?>')"><button type="button" class="btn btn-success"><?php echo $strings['AsignarT']; ?></button></a></td>
                        <?php } else { ?>
                            <td><a data-toggle="modal" href="#myModal1" onclick="changeIdAction1('<?php echo $this->datos[$j]['userName'] ?>')"><button type="button" class="btn btn-success"><?php echo $strings['AsignarT']; ?></button></a></td>
                                    <?php
                                }
                                ?>
                                 <td><button type="button" class="btn btn"><a href='ESTADISTICAS_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['VerEstadisticas']; ?>'><?php echo $strings['VerEstadisticas']; ?></a></button></td>
                                <?php
                            }
                            ?>
                    </tbody>
                </table>

            </div>
        </div>

        <?php
        include '../Views/footer.php';
    }

}
