<?php
class EJERCICIO_Show
{

//VISTA PARA LISTAR TODOS LOS USUARIOS
    private $datos;
    private $volver;

    function __construct($array, $volver) {
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }

    function render()
	{
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
      
		echo '<div class="container">';
		echo '<a href="../Views/EJERCICIO_ADD_Vista.php"><button type="button" class="btn btn-primary btn-lg btn-block">Nuevo ejercicio</button></a>';
		echo'<table class="table">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">Nombre</th>
				  <th scope="col">Descripcion</th>
				  <th scope="col">Ejecución</th>
				  <th scope="col"></th>
				  <th scope="col"></th>
				</tr>
			  </thead><tbody>';

		foreach($this->datos as $valor)
		{
			echo '<tr>';
			echo '<th>'.$valor['1'].'</th>';
			echo '<td>'.$valor['2'].'</td>';
			echo '<td><img width="100" height="100" src="'.$valor['3'].'"/></td>';
			echo '<td><a href="?accion=modificar&id='.$valor['0'].'"><button type="button" class="btn btn-primary">Modificar</button></a></td>';
			echo '<td><a href="?accion=eliminar&id='.$valor['0'].'"><button type="button" class="btn btn-danger">Eliminar</button></a></td>';
			echo '</tr>';
		}			
				
	
		echo '</tbody>
			</table>';
		echo '</div>';

        include '../Views/footer.php';
    }

}
?>