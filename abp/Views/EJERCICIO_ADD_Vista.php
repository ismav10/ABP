<?php

include_once '../Functions/LibraryFunctions.php';
 if (!IsAuthenticated()){
     header('Location:../index.php');
 }

 include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
 include './header.php';
?>
<script type="text/javascript">
function loadImg()
{
	var txt = document.getElementById('gifUrl').value;
	document.getElementById('imgElement').src = txt;
	
}
</script>
<div class="container">
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
</div>

<?php
include 'footer.php';
?>