<?php

class TABLA_ADD {

    private $datos;
    private $volver;

    function __construct($array, $volver) {
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        echo '<div class="container">
				<form method="POST" action="../Controllers/TABLA_Controller.php?accion=insertar">
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">' . $strings['tablaname'] . '</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="nombreTabla" id="example-text-input" required>
				  </div>
				</div>
                                <div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">' . $strings['tablaTipo'] . '</label>
				  <div class="col-10">
					<select name="tablaTipo" id="tablaTipo"> 
                                             <option value=Estándar selected>' . $strings['Estandar'] . '</option> 
                                             <option value=Personalizada>' . $strings['Personalizada'] . '</option> 
                                        </select>
				  </div>
                                  </div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-2 col-form-label">' . $strings['tabladesc'] . '</label>
				  <div class="col-10">
					<input class="form-control" type="text" name="descripcionTabla" id="example-text-input" required>
				  </div>
				</div>

				<button type="submit" class="btn btn-primary">' . $strings['savetabla'] . '</button>
				</form>
			</div>';
        include 'footer.php';
    }

}

?>
