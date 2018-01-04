<?php

class ACTIVIDAD_GRUPAL_LISTAR_USERS {

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
            $lista = array('foto', 'userName', 'nombre', 'apellidos', 'dni', 'fechaNac', 'telefono', 'estado');
            ?>
            <br><br>

            <div class="container">
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
                                    if ($clave === 'estado') {
                                        if ($valor == 1) {
                                            echo $strings['11'];
                                            break;
                                        }
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

        <?php
        include '../Views/footer.php';
    }

}
