<?php

class TABLA_ASIGN {

    private $datos;
    private $volver;

    function __construct($array, $volver) {
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
		
    }
    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
		echo '<form method="POST" action="?accion=asignar&id='.$_GET["id"].'" id="frmTableEjercicios"';
        echo '<div class="container">';
		echo '<button id="savefrm" type="button" class="btn btn-primary btn-lg btn-block">Guardar</button>';
		echo '<br>';
		echo '<button type="button" class="btn btn-success" id="addrow">Añadir fila</button>';
		
		echo '<table class="table" id="tblEjercicios">
				  <thead class="thead-dark">
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Ejercicio</th>
					  <th scope="col">Num. Repeticiones</th>
					  <th scope="col">Num. Series</th>
					  <th scope="col">Duración</th>
					  <th scope="col"></th>
					</tr>
				  </thead>
				  <tbody>
					
				  </tbody>
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

        cols += '<td>'+counter+ '</td>';
        cols += '<td><select class="form-control" id="sel1" name="select'+counter+'"><?php echo $this->datos['selectejercicios']; ?></select></td>';
        cols += '<td><input type="text" class="form-control" placeholder="Repeticiones" name="repeticiones' + counter + '"/></td>';
		cols += '<td><input type="text" class="form-control" placeholder="Series" name="series' + counter + '"/></td>';
		cols += '<td><input type="text" class="form-control" placeholder="Duracion" name="duracion' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Eliminar fila"></td>';
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
