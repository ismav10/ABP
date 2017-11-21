<?php
class TABLA_ADD
{
	private $datos;
    private $volver;

    function __construct($array, $volver)
	{
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }
	function render()
	{
		echo '<div class="container">
				<form method="POST" action="../Controllers/TABLA_Controller.php?accion=insertar">
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">Nombre Tabla</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="nombreTabla" id="example-text-input" required>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">Descripcion Tabla</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="descripcionTabla" id="example-text-input" required>
				  </div>
				</div>

				<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>';
		include 'footer.php';
	}
}

?>
