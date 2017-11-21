<script type="text/javascript">
function loadImg()
{
	var txt = document.getElementById('gifUrl').value;
	document.getElementById('imgElement').src = txt;
	
}
</script>
<?php

class EJERCICIO_ADD
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
				<form method="POST" action="../Controllers/EJERCICIO_Controller.php?accion=insertar">
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">Nombre ejercicio</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="nombreEjercicio" id="" required>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">Descripcion ejercicio</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="descripcionEjercicio" id="" required>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">GIF Ejercicio</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="gifEjercicio" id="gifUrl" onkeydown="loadImg();" required>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">Previsualización</label>
				  <div class="col-10">
					<img id="imgElement" width="200" height="200" src="http://download.seaicons.com/download/i97314/iconsmind/outline/iconsmind-outline-url-window.ico" />
				  </div>
				  
				</div>
				<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>';
			
			include 'footer.php';
	}
}

?>
