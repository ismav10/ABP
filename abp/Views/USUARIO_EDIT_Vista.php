<?php

class USUARIO_Modificar{

private $valores;
private $volver;
//VISTA PARA LA MODIFICACIÓN DE USUARIOS
function __construct($valores,$volver){
	$this->valores = $valores;
	$this->volver = $volver;
	$this->render();
}

function render(){

	include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
	include '../Functions/USUARIOShowAllDefForm.php';

	//include '../Functions/LibraryFunctions.php';
	//Array con los nombres de los campos a modificar
	$lista = array('USUARIO_TIPO','USUARIO_USER', 'USUARIO_PASSWORD',  'USUARIO_NOMBRE', 'USUARIO_APELLIDO', 'USUARIO_DNI','USUARIO_FECH_NAC', 'USUARIO_EMAIL', 'USUARIO_TELEFONO', 'USUARIO_CUENTA', 'USUARIO_DIRECCION', 'USUARIO_COMENTARIOS', 'USUARIO_ESTADO','USUARIO_FOTO');

?>
<html>
	<head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"></script>
		<meta charset="UTF-8">
	</head>
	<div class="wrap">
<body>
<div id="centrado"><span class="form-title">
	<?php echo $strings['Modificar usuario']?></span></div>

<form id="form" name="form"  action = 'USUARIO_Controller.php'  method = 'post' enctype="multipart/form-data"><br>
	<ul class="form-style-1">
	<?php
//Generación automática del formulario
	if(consultarRol($_SESSION['login'])=='4'){
		createForm($lista, $DefForm, $strings, $this->valores, array('USUARIO_COMENTARIOS' => false, 'USUARIO_FOTO' => false), array('USUARIO_USER'=>true, 'USUARIO_PASSWORD'=>true,  'USUARIO_NOMBRE'=>true, 'USUARIO_APELLIDO'=>true, 'USUARIO_DNI'=>true,'USUARIO_FECH_NAC'=>true, 'USUARIO_EMAIL'=>true, 'USUARIO_TELEFONO'=>true, 'USUARIO_CUENTA'=>true, 'USUARIO_DIRECCION'=>true, 'USUARIO_COMENTARIOS'=>true, 'USUARIO_ESTADO'=>true,'USUARIO_FOTO'=>true));
	}
	else {
		createForm($lista, $DefForm, $strings, $this->valores, array('USUARIO_COMENTARIOS' => false, 'USUARIO_FOTO' => false), array('USUARIO_USER' => true, 'USUARIO_DNI' => true));
	}?>

<input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_USUARIO()" >
</form>


<a class="form-link" href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a>
</p>
</body>
</div>

</html>
<?php
} // fin del metodo render
} // fin de la clase
?>
