<?php

include 'header.php';
//include '../Locates/Strings_Castellano.php';

class Login {

    var $view;

//VISTA REALIZAR EL LOGIN
    function __construct() {
        $this->render();
    }

    function render() {
        $this->view = '<div class="container text-center">
			<section id="content">
				<form action="./Acceso.php" method="post">
					Login
					<div>
						<input type="text" name="username" placeholder="Usuario" required="" id="username"/>
					</div>
					<div>
						<input type="password" name="password" placeholder="Contraseña" required=""
							   id="password"/>
					</div>

					<div><!--SELECCION DE IDIOMA-->
						<p><select name="IDIOMA">
								<option value="Castellano">Castellano</option>
								<option value="Galego">Galego</option>
								<option value="English">English</option>
							</select></p>

						<input type="submit" name = "accion" value="Login"/>

					</div>


				</form>

					<!-- form -->

			</section><!-- content -->
		</div><!-- container -->
		</body>';
        echo $this->view;
        $this->footer();
    }

    public function footer() {
        include 'footer.php';
    }
}
?>