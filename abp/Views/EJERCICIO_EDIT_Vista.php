<?php
class EJERCICIO_EDIT
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
				<form method="POST" action="../Controllers/EJERCICIO_Controller.php?accion=guardarmod&id='.$this->datos['idEjercicio'].'">
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">Nombre ejercicio</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="nombreEjercicio" value="'.$this->datos['nombreEjercicio'].'" id="example-text-input" required>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">Descripcion ejercicio</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="descripcionEjercicio" value="'.$this->datos['descripcionEjercicio'].'" id="example-text-input" required>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">GIF Ejercicio</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="gifEjercicio" value="'.$this->datos['giftEjercicio'].'" id="example-text-input" required>
				  </div>
				</div>
				<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>';

        include '../Views/footer.php';
    }

}
?>