<?php
class TABLA_ShowCurrent
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
   
		echo '<div class="container">
				<h4>'.$strings['tablaname'].': '.$this->datos['tabla']['nombreTabla'].'</h4>
                                <h5>'.$strings['tablaTipo'].': '.$this->datos['tabla']['tipo'].'</h5>
				<h6>'.$strings['tabladesc'].': '.$this->datos['tabla']['descripcionTabla'].'</</h6>';
                echo '<br><br><br><br>';
		echo'<table class="table">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">'.$strings['ejercicionametabla'].'</th>
				  <th scope="col">'.$strings['ejerciciodesctabla'].'</th>
				  <th scope="col">'.$strings['ejerciciogiftabla'].'</th>
				  <th scope="col">Repeticiones</th>
				  <th scope="col">Series</th>
				  <th scope="col">Duracion</th>
				  <th scope="col"></th>
				</tr>
			  </thead><tbody>';
		foreach($this->datos['ejercicios'] as $valor)
		{
			echo '<tr>';
			echo '<th>'.$valor['nombreEjercicio'].'</th>';
			echo '<td>'.$valor['descripcionEjercicio'].'</td>';
			echo '<td><img width="100" height="100" src="'.$valor['giftEjercicio'].'"/></td>';
			echo '<td>'.$valor['numrepeticiones'].'</td>';
			echo '<td>'.$valor['numseries'].'</td>';
			echo '<td>'.$valor['duracion'].'</td>';
			echo '<td><a href="?accion=desasignar&idtabla='.$_GET["id"].'&idejercicio='.$valor['idEjercicio'].'"><button type="button" class="btn btn-danger btn-sm">Desasignar</button></a></td>';
			echo '</tr>';
		}			
	
		echo '</tbody>
			</table>
			 </div>';

        include '../Views/footer.php';
    }

}
?>