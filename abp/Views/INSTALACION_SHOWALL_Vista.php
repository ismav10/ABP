<?php

class INSTALACION_Listar {

//VISTA PARA LISTAR TODAS LAS INSTALACIONES
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
            $lista = array('nombreInstalacion', 'descripcionInstalacion', 'aforoInstalacion');
            ?>
            <br>

            <div class="container">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-default btn-lg"><a href='INSTALACION_Controller.php?accion=<?php echo $strings['Consultar']; ?>'><?php echo $strings['Consultar'] ?></a></button>
                    <?php
                    if (ConsultarTipoUsuario($_SESSION['login']) != 3) {
                        ?><button type="button" class="btn btn-default btn-lg"><a href='INSTALACION_Controller.php?accion=<?php echo $strings['Insertar']; ?>'><?php echo $strings['Insertar'] ?></a></button>
                            <?php
                        } else {
                            echo "";
                        }
                        ?>								
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
                                    foreach ($this->datos[$j] as $clave => $valor) {
                                        for ($i = 0; $i < count($lista); $i++) {
                                            if ($clave === $lista[$i]) {
                                                echo "<td>";
                                                if ($clave === 'nombreInstalacion') {
                                                    ?>
                                            <a href='INSTALACION_Controller.php?idInstalacion=<?php echo $this->datos[$j]['idInstalacion'] . '&accion=' . $strings['Ver']; ?>'><font color="#088A4B"><?php echo $valor; ?></font></a> <?php
                                        } else {
                                            echo $valor;
                                        }

                                        echo "</td>";
                                    }
                                }
                            }
                            ?>
                            <?php if (ConsultarTipoUsuario($_SESSION['login']) == 1) { ?>	
                                <td><button type="button" class="btn btn-info"><a href='INSTALACION_Controller.php?idInstalacion=<?php echo $this->datos[$j]['idInstalacion'] . '&accion=' . $strings['Modificar']; ?>'><?php echo $strings['Modificar']; ?></a></button></td>
                                <td><button type="button" class="btn btn-danger"><a href='INSTALACION_Controller.php?idInstalacion=<?php echo $this->datos[$j]['idInstalacion'] . '&accion=' . $strings['Borrar']; ?>'><?php echo $strings['Borrar']; ?></a></button></td>
                                <?php } 
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
