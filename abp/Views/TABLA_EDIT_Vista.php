<?php
class TABLA_Edit
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
				<form method="POST" action="../Controllers/TABLA_Controller.php?accion=guardarmod&id='.$this->datos['idTabla'].'">
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">Nombre Tabla</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="nombreTabla" value="'.$this->datos['nombreTabla'].'" id="example-text-input" required>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">Descripcion Tabla</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="descripcionTabla" value="'.$this->datos['descripcionTabla'].'" id="example-text-input" required>
				  </div>
				</div>

				<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>';

        include '../Views/footer.php';
    }

}
?>