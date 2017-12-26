


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
                        <td><button type="button" class="btn btn-success"><a href='DEPORTISTA_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['AsignarT']; ?>'><?php echo $strings['Tablas']; ?></a></button></td>
                        <td><button type="button" class="btn btn-primary"><a href='DEPORTISTA_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['ActividadesGrupales']; ?>'><?php echo $strings['ActividadesGrupales']; ?></a></button></td>
                        <td><button type="button" class="btn btn"><a href='ESTADISTICAS_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['VerEstadisticas']; ?>'><?php echo $strings['VerEstadisticas']; ?></a></button></td>
                         <?php }
                         
                         
                            }?>

                    </tbody>
                </table>

            </div>
        </div>

        <?php
        include '../Views/footer.php';
    }

}
