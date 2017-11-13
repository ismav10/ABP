<?php


class Login
{


//VISTA REALIZAR EL LOGIN
	function __construct()
	{
		$this->render();
	}

	function render()
	{ include '../Locates/Strings_Castellano.php';
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<title>Login</title>


			<link rel="stylesheet" href="../css/stylel.css">


		</head>

		<body>
		<body>
		<div class="container">
			<section id="content">
				<form action='./Acceso.php' method='post'>
					<h1><img src="../images/logo.png"></h1>
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

						<input type="submit" name = 'accion' value="Login"/>

					</div>


				</form>
				<div>
					<!--BOTON REGISTRARSE-->
				<h1><a style="color: #1e4477;" href="./Controllers/REGISTRO_Controller.php?accion=<?php echo $strings['Registro']?>"><?php echo $strings['Registro']?></a></h1>
				</div>
					<!-- form -->

			</section><!-- content -->
		</div><!-- container -->
		</body>

		<script src="../js/index.js"></script>

		</body> <?php
	}
}
?>