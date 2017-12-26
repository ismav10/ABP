<?php

class TABLA_ASIGN {

    private $otros;
    private $datos;
    private $volver;

    function __construct($otros, $array, $volver) {
        $this->otros = $otros;
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        echo '<form method="POST" action="?accion=asignar&id=' . $_GET["id"] . '" id="frmTableEjercicios"';
        echo '<div class="container">
                                <h4> <b>' . $strings['tablaname'] . ': </b>' . $this->otros['tabla']['nombreTabla'] . '</h4>
                                <h5> <b>' . $strings['tablaTipo'] . ': </b>' . $this->otros['tabla']['tipo'] . '</h5>
				<h6> <b>' . $strings['tabladesc'] . ': </b>' . $this->otros['tabla']['descripcionTabla'] . '</</h6>';
        echo '<br><br><br><br>
        <button id = "savefrm" type = "button" class = "btn btn-primary btn-lg btn-block">Guardar</button>';
        echo '<br>';
        echo '<button type = "button" class = "btn btn-success" id = "addrow">Añadir Ejercicio</button>
<div class="container">
        <h5><table class = "table" id = "tblEjercicios">
        <thead class = "thead-dark">
        <tr>
        <th scope = "col">Ejercicio</th>
        <th scope = "col">Num. Series</th>
        <th scope = "col">Num. Repeticiones</th>
        <th scope = "col">Duración</th>
        <th scope = "col"></th>
        </tr>
        </thead><tbody>';
        foreach ($this->otros['ejercicios'] as $valor) {
            echo '<tr>';
            echo '<th>' . $valor['nombreEjercicio'] . '</th>';
            echo '<td>' . $valor['numseries'] . '</td>';
            echo '<td>' . $valor['numrepeticiones'] . '</td>';
            echo '<td>' . $valor['duracion'] . '</td>';

            echo '</tr>';
        }

        echo ' </tbody>
        </table>';
        echo '</form>';
        echo '</div>';
        include 'footer.php';
        ?>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var counter = 0;

                $("#addrow").on("click", function () {

                    var newRow = $("<tr>");
                    var cols = "";

                    //cols += '<td>' + counter + '</td>';
                    cols += '<td><select class = "form-control" id = "sel1" name = "select' + counter + '"><?php echo $this->datos['selectejercicios'];
        ?></select></td>';
                    cols += '<td><input type="text" class="form-control" placeholder="Series" name="series' + counter + '"/></td>';
                    cols += '<td><input type="text" class="form-control" placeholder="Repeticiones" name="repeticiones' + counter + '"/></td>';
                    cols += '<td><input type="text" class="form-control" placeholder="Duracion" name="duracion' + counter + '"/></td>';

                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Eliminar Ejercicio"></td>';
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
