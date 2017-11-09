
<?php
//VISTA PARA EL REGISTRO DE ALUMNOS
class USUARIO_Registrar
{


	function __construct()
	{
		$this->render();
	}

	function render()
	{

		?>

		<div class="wrap">

			<head>
				<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
				<link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen"/>
				<script type="text/javascript" src="../js/Castellano_validate.js"></script>
			</head>

			<?php
			include '../Locates/Strings_Castellano.php';
			include '../Functions/USUARIOSRegisterForm.php';


			//Array con los nombres de los campos a insertar
			$lista = array('USUARIO_USER', 'USUARIO_PASSWORD', 'USUARIO_NOMBRE', 'USUARIO_APELLIDO', 'USUARIO_DNI', 'USUARIO_FECH_NAC', 'USUARIO_EMAIL', 'USUARIO_TELEFONO', 'USUARIO_CUENTA', 'USUARIO_DIRECCION', 'USUARIO_FOTO');

			?>


			<form id="form" name="form" action='../Controllers/REGISTRO_Controller.php' method='post'
				  enctype="multipart/form-data">
				<div id="centrado"><span class="form-title">
			<?php echo $strings['Registro'] ?><br></span></div>

				<ul class="form-style-1">
					<?php
					//Generación automática del formulario
					createForm($lista, $form, $strings, '', array('USUARIO_COMENTARIOS' => false, 'USUARIO_FOTO' => false), false);

					?>
					<input type='submit' onclick="return valida_envia_USUARIO()" name='accion'
						   value=<?php echo $strings['Registro'] ?>
						   <ul>
			</form>
			<?php
			echo '<a class="form-link" href="../index.php">' . $strings['Volver'] . " </a>";
			?>


		</div>

		<?php
	}
}