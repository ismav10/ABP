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
				<h4>Nombre Tabla: '.$this->datos['tabla']['nombreTabla'].'</h4>
				<h5>Descripcion: '.$this->datos['tabla']['descripcionTabla'].'</</h5>';
		echo'<table class="table">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">Nombre</th>
				  <th scope="col">Descripcion</th>
				  <th scope="col">Ejecución</th>
				</tr>
			  </thead><tbody>';
		foreach($this->datos['ejercicios'] as $valor)
		{
			echo '<tr>';
			echo '<th>'.$valor['nombreEjercicio'].'</th>';
			echo '<td>'.$valor['descripcionEjercicio'].'</td>';
			echo '<td><img width="100" height="100" src="'.$valor['giftEjercicio'].'"/></td>';
			echo '</tr>';
		}			
	
		echo '</tbody>
			</table>;
			 </div>';

        include '../Views/footer.php';
    }

}
?>