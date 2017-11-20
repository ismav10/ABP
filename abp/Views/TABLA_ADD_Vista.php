<?php

include_once '../Functions/LibraryFunctions.php';
 if (!IsAuthenticated()){
     header('Location:../index.php');
 }

 include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
 include './header.php';
?>

<div class="container">
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
</div>

<?php
include 'footer.php';
?>