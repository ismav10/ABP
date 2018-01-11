<script type="text/javascript">
function changeIdAction(id)
{
	document.getElementById("frmAsignar").action+=id;
}
</script>
<?php
class TABLA_Show
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
                echo '<br><br>';
		if(ConsultarTipoUsuario($_SESSION['login']) != 3)
		{
				echo '<a href="?accion=vistainsertar"><button type="button" class="btn btn-primary btn-lg btn-block">'.$strings['newtabla'].'</button></a>';
		}else{
				echo '<br>';
		}
		echo '<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <form id="frmAsignar" method="POST" action="?accion=asignar&id=">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">'.$strings['asignartabla'].'</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
							 <div class="form-group">
							  <label for="sel1">'.$strings['seleccionaejercicios'].'</label>
							  <select multiple class="form-control" id="sel2" name="asignacionEjercicios[]">
								';
							foreach($this->datos['ejercicios'] as $valor)
							{
								echo '<option>'.$valor['1'].'</option>';
							}								
		echo '						
							  </select>
							</div> 
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">'.$strings['closetabla'].'</button>
						<button type="submit" class="btn btn-primary">'.$strings['savetabla'].'</button>
					  </div>
					</div>
				  </div>
				  </form>
				</div>';
		
		echo'<table class="table">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">'.$strings['tablaname2'].'</th>
                                  <th scope="col">'.$strings['tablaTipo'].'</th>
				  <th scope="col">'.$strings['tabladesc2'].'</th>
				  <th scope="col"></th>
				  <th scope="col"></th>
				  <th scope="col"></th>
				</tr>
			  </thead><tbody>';

		foreach($this->datos['tablas'] as $valor)
		{
			echo '<tr>';
			echo '<th><a href="?accion=ver&id='.$valor['0'].'">'.$valor['1'].'</a></th>';
			echo '<td>'.$valor['2'].'</td>';
                        echo '<td>'.$valor['3'].'</td>';
			if(ConsultarTipoUsuario($_SESSION['login']) != 3)
			{
				echo '<td><a href="?accion=frmasignar&id='.$valor['0'].'"><button type="button" class="btn btn-success">Asignar Ejercicios</button></a></td>';
				echo '<td><a href="?accion=modificar&id='.$valor['0'].'"><button type="button" class="btn btn-primary">'.$strings['tablamodificar'].'</button></a></td>';
				echo '<td><a href="?accion=eliminar&id='.$valor['0'].'"><button type="button" class="btn btn-danger">'.$strings['tablaeliminar'].'</button></a></td>';
			}else{
				echo '<td><a href="SESION_Controller.php?accion='. $strings['InsertarSesion'].'&id='.$valor['0'].'"><button type="button" class="btn btn-success">'.$strings['IniciarSesion']. '</button></a></td>';
				echo '<td></td>';
				echo '<td></td>';
			}
			echo '</tr>';
		}			
				
	
		echo '</tbody>
			</table>';	
		echo '</div>';
		

        include '../Views/footer.php';
    }

}
?>