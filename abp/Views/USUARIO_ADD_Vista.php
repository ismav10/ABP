<?php
//VISTA PARA LA INSERCIÓN DE USUARIOS
class USUARIO_Insertar{


function __construct(){	
	$this->render();
}

function render(){

?><div class="wrap">

	<head>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
	<script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"></script></head>

<?php
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
				include '../Functions/USUARIOShowAllDefForm.php';
				//Array con los nombres de los campos a insertar
				$lista = array('USUARIO_USER','USUARIO_PASSWORD', 'USUARIO_NOMBRE', 'USUARIO_APELLIDO', 'USUARIO_DNI', 'USUARIO_FECH_NAC', 'USUARIO_EMAIL','USUARIO_TELEFONO', 'USUARIO_CUENTA', 'USUARIO_DIRECCION', 'USUARIO_COMENTARIOS', 'USUARIO_TIPO', 'USUARIO_FOTO');

?>
			

				<form  id="form" name="form" action='USUARIO_Controller.php' method='post'   enctype="multipart/form-data">
					<div id="centrado"><span class="form-title">
			<?php echo $strings['Insertar usuario']?><br></span></div>

					<ul class="form-style-1">
<?php
					//Generación automática del formulario
					createForm($lista,$DefForm,$strings,'',array('USUARIO_COMENTARIOS'=>false,'USUARIO_FOTO'=>false),false);

?>
					<input type='submit' onclick="return valida_envia_USUARIO()" name='accion'  value=<?php echo $strings['Insertar'] ?>
					<ul>
				</form>
<?php
				echo '<a class="form-link" href=\'USUARIO_Controller.php\'>' . $strings['Volver'] . " </a>";
?>


	</div>

<?php
} //fin metodo render

}

