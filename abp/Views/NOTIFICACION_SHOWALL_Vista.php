<?php
//VISTA PARA LISTAR NOTIFICACIONES
class NOTIFICACION_Listar {

private $datos;
private $volver;

    function __construct($datos, $volver) {
    	$this->datos = $datos;
    	$this->volver = $volver;
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        ?> 
        <div class="container">
            <?php
            $lista = array('idNotificacion','remitenteNotificacion', 'destinatarioNotificacion', 'fechaHoraNotificacion', 'asuntoNotificacion');
            ?>
            <br><br>

            <div class="container">
                <div class="col-lg-12">
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
                                        	if($clave === $lista[$i])
                                        	{
                                          	echo "<td>";
                                          	if($clave === 'idNotificacion')
                                            {?>
                                                <a href='NOTIFICACION_Controller.php?idNotificacion=<?php echo $this->datos[$j]['idNotificacion'] . '&accion=' . $strings['Ver']; ?>'><font color="#088A4B"><?php echo $valor; ?></font></a>
                                                <?php
                                            }
                                            else
                                            {
                                                echo $valor;
                                            }
                                            echo "</td>";
                                          }       
                                    }
                                }?>
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