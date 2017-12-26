<?php

class DEPORTISTA_ASIGNAR_TABLA {

    private $TablasUser;
    private $datos;
    private $volver;

    function __construct($TablasUser, $array, $volver) {
        $this->TablasUser = $TablasUser;
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        ?>
        <form method="POST" action="?accion=<?php echo $strings['Asignar'] ?>&userName=<?php echo $_REQUEST['userName']?>" id="frmTableEjercicios">
            <div class="container">
                <button id="savefrm" type="button" class="btn btn-primary btn-lg btn-block"><?php echo $strings['Guardar']; ?></button>
                <br>
                <button type="button" class="btn btn-success" id="addrow"><?php echo $strings['AñadirTabla']; ?></button> 
                <?php
                $lista = array('nombreTabla', 'tipo', 'descripcionTabla');
                ?> 
                <div class="col-lg-12">
                    <table class="table" id="tblEjercicios">
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
                                for ($j = 0; $j < count($this->TablasUser); $j++) {
                                    echo "<tr>";
                                    foreach ($this->TablasUser [$j] as $clave => $valor) {
                                        for ($i = 0; $i < count($lista); $i++) {
                                            if ($clave === $lista[$i]) {
                                                echo "<td>";
                                                if ($clave === 'nombreTabla') {
                                                    ?>
                                            <a href='TABLA_Controller.php?id=<?php echo ConsultarIDTabla($this->TablasUser[$j]['nombreTabla']) . '&accion=' . $strings['ver']; ?>'><font color="#088A4B"><?php echo $valor; ?></font></a> <?php
                                        } else {
                                            echo $valor;
                                        }

                                        echo "</td>";
                                    }
                                }
                            }
                            if (ConsultarTipoUsuarioLogin() == 1) {
                                ?>
                                <td><button type="button" class="btn btn-danger"><a href='DEPORTISTA_Controller.php?idTabla=<?php echo ConsultarIDTabla($this->TablasUser[$j]['nombreTabla']) . '&userName=' . $_REQUEST['userName']. '&accion=' . $strings['Desasignar']; ?>'><?php echo $strings['Desasignar']; ?></a></button></td>
                                    <?php
                                    }
                                }
                                ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <?php
        include 'footer.php'
        ?>
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var counter = 0;

                $("#addrow").on("click", function () {

                    var newRow = $("<tr>");
                    var cols = "";

                    //cols += '<td>' + counter + '</td>';
                    cols += '<td><select class="form-control" id="sel1" name="select' + counter + '"><?php echo $this->datos['selectedTablas']; ?></select></td>';

                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="<?php echo $strings['EliminarTabla']; ?>"></td>';
                    newRow.append(cols);
                    $("#tblEjercicios").append(newRow);
                    counter++;
                });



                $("#tblEjercicios").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });

                $("#savefrm").on("click", function () {
                    document.getElementById('frmTableEjercicios').submit();

                });


            });
        </script>
        <?php
    }

}
?>
