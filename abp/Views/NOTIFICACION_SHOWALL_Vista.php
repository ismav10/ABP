<?php

//VISTA PARA LISTAR NOTIFICACIONES
class NOTIFICACION_Listar {

    private $datos;
    private $volver;
    private $tipoUsuario;

    function __construct($datos, $tipoUsuario, $volver) {
        $this->datos = $datos;
        $this->tipoUsuario = $tipoUsuario;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        //var_dump($this->datos);
        ?> 
        <div class="container">
            <?php
            $lista = array('idNotificacion', 'remitenteNotificacion', 'destinatarioNotificacion', 'fechaHoraNotificacion', 'asuntoNotificacion');
            ?>
            <br><br>


            <div class="container">
                <div class="col-lg-12">
                    <?php
            if($this->tipoUsuario == 1)
            {
                ?>
                <button type="button" class="btn btn-default btn-lg"><a href='NOTIFICACION_Controller.php?accion=<?php echo $strings['Insertar']; ?>'><?php echo $strings['Insertar'] ?></a></button>
                <?php

            }
            else if($this->tipoUsuario == 2)
            {?>
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
                                                if ($clave === 'idNotificacion') {
                                                    ?>
                                            <a href='NOTIFICACION_Controller.php?idNotificacion=<?php echo $this->datos[$j]['idNotificacion'] . '&accion=' . $strings['Ver']; ?>'><img src="../img/notificacion.png" width="30px" height="30px"></a> 
                                            <a href='NOTIFICACION_Controller.php?idNotificacion=<?php echo $this->datos[$j]['idNotificacion'] . '&accion=' . $strings['Borrar']; ?>'><img src="../img/BorrarNoti.jpg" width="30px" height="30px"></a>                         
                                            <?php
                                            break;
                                        } else {
                                            echo $valor;
                                        }
                                        echo "</td>";
                                    }
                                }
                            }
                            ?>
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
