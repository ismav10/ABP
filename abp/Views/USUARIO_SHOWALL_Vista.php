<?php
include '../Views/header.php';

class USUARIO_Show {

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
            $lista = array('userName', 'password', 'tipoUsuario', 'nombre', 'apellidos', 'dni', 'fechaNac', 'direccion', 'telefono', 'email', 'foto');
            ?>
            <br><br>

            <div class="container">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-default btn-lg"><a href='USUARIO_Controller.php?accion=<?php echo $strings['Insertar']; ?>'><?php echo $strings['Insertar'] ?></a></button>
                    <button type="button" class="btn btn-default btn-lg"><a href='USUARIO_Controller.php?accion=<?php echo $strings['Consultar']; ?>'><?php echo $strings['Consultar'] ?></a></button>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <?php
                                foreach ($lista as $titulo) {
                                    if ($titulo === 'password') {
                                        echo "<th colspan='1'>";
                                        } else {
                                            echo "<th>";
                                        }
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
                                            if ($clave === 'password') {
                                           echo "<td colspan='1'>";
                                            } else {
                                                echo "<td>";
                                            }
                                            if (($clave === 'foto')) {
                                                if (is_file($valor)) {
                                                    echo "<a target='_blank' href='" . $valor . "'>" . $strings['Ver'] . "</a>";
                                                }
                                            } if ($clave === 'tipoUsuario') {
                                                echo $strings[ConsultarNOMRol($valor)];
                                                break;
                                            }
                                            if ($clave === 'userName') { ?>
                                                <a href='USUARIO_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['Ver']; ?>'><font color="#088A4B"><?php echo $valor; ?></font></a> <?php
                                            } else {
                                                echo $valor;
                                            }
                                            echo "</td>";
                                        }
                                    }
                                }
                                ?>

                        <!--<td><button type="button" class="btn btn-success"><a href='USUARIO_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['Ver']; ?>'><?php echo $strings['Ver']; ?></a></button></td>   -->          
                            <td><button type="button" class="btn btn-info"><a href='USUARIO_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['Modificar']; ?>'><?php echo $strings['Modificar']; ?></a></button></td>
                            <td><button type="button" class="btn btn-danger"><a href='USUARIO_Controller.php?userName=<?php echo $this->datos[$j]['userName'] . '&accion=' . $strings['Borrar']; ?>'><?php echo $strings['Borrar']; ?></a></button></td>
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
