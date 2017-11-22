<script type="text/javascript">
    function changeIdAction(id)
    {
        document.getElementById("frmAsignar").action += id;
    }
</script>

<?php

class DEPORTISTA_Show {

//VISTA PARA LISTAR TODOS LOS USUARIOS
    private $datos;
    private $volver;
    private $tablas;

    function __construct($array, $tablas, $volver) {
        $this->datos = $array;
        $this->volver = $volver;
        $this->tablas = $tablas;
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
                <div align='right'>
                    <a href='DEPORTISTA_Controller.php?accion=<?php echo $strings['Insertar']; ?>'><img src="../img/useradd.png" width="50px" height="50px"></a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form id="frmAsignar" method="POST" action="?accion=asignar&userName=">
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
                                            foreach ($this->tablas['tablas'] as $valor) {
                                                echo '<option>' . $valor['1'] . '</option>';
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

                                                                                                                                <!--<td><button type="button" class="btn btn-success"><a href='USUARIO_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['Ver']; ?>'><?php echo $strings['Ver']; ?></a></button></td>   -->          
                        <td><button type="button" class="btn btn-info"><a href='DEPORTISTA_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['Modificar']; ?>'><?php echo $strings['Modificar']; ?></a></button></td>
                        <td><button type="button" class="btn btn-danger"><a href='DEPORTISTA_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['Borrar']; ?>'><?php echo $strings['Borrar']; ?></a></button></td>
                        <td><a data-toggle="modal" href="#myModal" onclick="changeIdAction('<?php echo $this->datos[$j]['userName'] ?>')"><button type="button" class="btn btn-success">Asignar</button></a></td>';
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
