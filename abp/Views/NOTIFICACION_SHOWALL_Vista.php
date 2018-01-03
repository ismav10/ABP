<?php

//VISTA PARA LISTAR NOTIFICACIONES
class NOTIFICACION_Listar {

    private $datos;
    private $volver;
    private $tipoUsuario;
    private $cont;
    private $vuelta;

    function __construct($datos, $tipoUsuario, $volver) {
        $this->datos = $datos;
        $this->tipoUsuario = $tipoUsuario;
        $this->volver = $volver;
        $this->cont = 0;
        $this->vuelta = 0;
        $this->render();
    }

    function setCont($cont) {
        $this->cont = $cont;
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        //var_dump($this->datos);
        ?> 
        <div class="container">
            <?php
            $lista = array('estado', 'remitenteNotificacion', 'fechaHoraNotificacion', 'asuntoNotificacion');
            ?>
            <br><br>


            <div class="container">
                <div class="col-lg-12">
                    <?php
                    if ($this->tipoUsuario == 1) {
                        ?>
                        <button type="button" class="btn btn-default btn-lg"><a href='NOTIFICACION_Controller.php?accion=<?php echo $strings['Insertar']; ?>'><?php echo $strings['Insertar'] ?></a></button>
                        <?php
                    } else if ($this->tipoUsuario == 2) {
                        ?>
                        <button type="button" class="btn btn-default btn-lg"><a href='NOTIFICACION_Controller.php?accion=<?php echo $strings['Insertar']; ?>'><?php echo $strings['Insertar'] ?></a></button>  
                        <?php
                    }
                    ?>
                    <button type="button" class="btn btn-default btn-lg"><a href='NOTIFICACION_Controller.php?accion=<?php echo $strings['Consultar']; ?>'><?php echo $strings['Consultar'] ?></a></button>  

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <?php
                                foreach ($lista as $titulo) {
                                    echo "<th>";
                                    if ($titulo != 'estado') {
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
                                                if ($clave === 'estado') {
                                                    if ($valor == 0) {
                                                        $this->setCont(1);
                                                        ?>
                                                <a href='NOTIFICACION_Controller.php?idNotificacion=<?php echo $this->datos[$j]['idNotificacion'] . '&accion=' . $strings['Ver']; ?>'><img src="../img/noleido.png" width="30px" height="30px"></a>  
                                                <?php
                                            } else {
                                                ?>
                                                <a href='NOTIFICACION_Controller.php?idNotificacion=<?php echo $this->datos[$j]['idNotificacion'] . '&accion=' . $strings['Ver']; ?>'><img src="../img/leido.png" width="30px" height="30px"></a> 
                                                <?php
                                                $this->setCont(0);
                                            }
                                            ?>
                                            <a href = 'NOTIFICACION_Controller.php?idNotificacion=<?php echo $this->datos[$j]['idNotificacion'] . '&accion = ' . $strings['Borrar']; ?>'><img src = "../img/BorrarNoti.jpg" width = "30px" height = "30px"></a><?php
                                            break;
                                        } else {
                                            if ($this->cont == 1) {
                                                echo "<strong>$valor</strong> ";
                                            } else {
                                                echo $valor;
                                            }
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
