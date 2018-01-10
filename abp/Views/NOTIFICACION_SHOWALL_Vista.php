<?php

//VISTA PARA LISTAR NOTIFICACIONES
class NOTIFICACION_Listar {

    private $datos;
    private $volver;
    private $tipoUsuario;
    private $cont;
    private $vuelta;
    private $enviados;

    function __construct($datos, $tipoUsuario, $enviados,$volver) {
        $this->datos = $datos;
        $this->tipoUsuario = $tipoUsuario;
        $this->enviados = $enviados;
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
            $lista = array('estado', 'remitenteNotificacion', 'destinatarioNotificacion','fechaHoraNotificacion', 'asuntoNotificacion');
            ?>
            <br><br>


            <div class="container">
                <div class="col-lg-12">
                    <?php
                    if ($this->tipoUsuario == 1) {
                        ?>
                        <button type="button" class="btn btn-success btn-lg"><a href='NOTIFICACION_Controller.php?accion=<?php echo $strings['Crear']; ?>'><?php echo $strings['Crear'] ?></a></button>
                        <?php
                    } else if ($this->tipoUsuario == 2) {
                        ?>
                        <button type="button" class="btn btn-success btn-lg"><a href='NOTIFICACION_Controller.php?accion=<?php echo $strings['Crear']; ?>'><?php echo $strings['Crear'] ?></a></button>  
                        <?php
                    }
                    if($this->enviados == 0)
                    {
                        ?>
                    <button type="button" class="btn btn-primary btn-lg"><a href='NOTIFICACION_Controller.php?accion=<?php echo $strings['Consultar']; ?>'><?php echo $strings['Consultar'] ?></a></button>  
                    <?php
                }
            if($this->enviados == 1)
            {
                ?>
                <button type="button" class="btn btn-warning btn-lg"><a href='NOTIFICACION_Controller.php?accion=<?php echo $strings['Recibidos']; ?>'><?php echo $strings['Recibidos'] ?></a></button>  
                <?php
            }
            else
            {
                    ?>
                <button type="button" class="btn btn-warning btn-lg"><a href='NOTIFICACION_Controller.php?accion=<?php echo $strings['Enviados']; ?>'><?php echo $strings['Enviados'] ?></a></button>  
                <?php
            }
            ?>
            <?php
            if($this->enviados == 1)
            {
                ?>
               <div class="container" >
            <form  id="form" name="form" action='NOTIFICACION_Controller.php'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Notificaciones enviadas']; ?></label><br>
                </div> 
                <?php
            }
            else
            {
                ?>
               <div class="container" >
            <form  id="form" name="form" action='NOTIFICACION_Controller.php'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Notificaciones recibidas']; ?></label><br>
                </div> 
                <?php
            }
            ?>
            


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
                                                if ($clave === 'estado' && $this->enviados == 0) {
                                                    if ($valor == 1) {
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
                                            <a href = 'NOTIFICACION_Controller.php?idNotificacion=<?php echo $this->datos[$j]['idNotificacion'] . '&accion=' . $strings['Borrar']; ?>'><img src = "../img/BorrarNoti.jpg" width = "30px" height = "30px"></a><?php
                                            break;
                                        }
                                        else if( $clave == 'estado' && $this->enviados == 1)
                                        {
                                            if($valor == 1)
                                            {
                                                $this->setCont(1);
                                                        ?>
                                                <a href='NOTIFICACION_Controller.php?idNotificacion=<?php echo $this->datos[$j]['idNotificacion'] . '&usuario=envio&accion=' . $strings['Ver']; ?>'><img src="../img/CheckSimple.png" width="30px" height="30px"></a>  
                                                <?php
                                            } else {
                                                ?>
                                                <a href='NOTIFICACION_Controller.php?idNotificacion=<?php echo $this->datos[$j]['idNotificacion'] . '&usuario=envio&accion=' . $strings['Ver']; ?>'><img src="../img/CheckDoble.png" width="30px" height="30px"></a> 
                                                <?php
                                                $this->setCont(0);
                                            }
                                            break;
                                            } 
                                        else {
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
