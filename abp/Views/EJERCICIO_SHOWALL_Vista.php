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
                echo '<br>';
                echo '<br>';
                
                if(ConsultarTipoUsuario($_SESSION['login']) != 3){
		echo '<a href="?accion=vistainsertar"><button type="button" class="btn btn-primary btn-lg btn-block">'.$strings['newejercicio'].'</button></a>';
                } else {
                     echo "<br><br>";
                }
                
		echo'<table class="table">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">'.$strings['ejercicionametabla'].'</th>
				  <th scope="col">'.$strings['ejerciciodesctabla'].'</th>
				  <th scope="col">'.$strings['ejerciciogiftabla'].'</th>
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
			echo '<td><a href="?accion=modificar&id='.$valor['0'].'"><button type="button" class="btn btn-primary">'.$strings['ejerciciomodificar'].'</button></a></td>';
			echo '<td><a href="?accion=eliminar&id='.$valor['0'].'"><button type="button" class="btn btn-danger">'.$strings['ejercicioeliminar'].'</button></a></td>';
			echo '</tr>';
		}			
				
	
		echo '</tbody>
			</table>';
		echo '</div>';

        include '../Views/footer.php';
    }

}
?>