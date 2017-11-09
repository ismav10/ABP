<?php

class USUARIO_Borrar{

private $valores;
private $volver;
//VISTA PARA EL BORRADO DE USUARIOS
function __construct($valores,$volver){
	$this->valores = $valores;
	$this->volver = $volver;
	$this->render();
}

function render(){

	include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
	include '../Functions/USUARIOShowAllDefForm.php';
	include '../Functions/USUARIODeleteDefForm.php';

//Array con los nombres de los campos
	$lista = array('USUARIO_USER', 'USUARIO_NOMBRE', 'USUARIO_APELLIDO', 'USUARIO_DNI','USUARIO_FECH_NAC', 'USUARIO_EMAIL','USUARIO_TELEFONO', 'USUARIO_CUENTA', 'USUARIO_DIRECCION', 'USUARIO_COMENTARIOS', 'USUARIO_TIPO');
	//En caso de que tenga foto subida, también incluímos ese campo
    if ($this->valores['USUARIO_FOTO']!==''){
		array_push($lista,'USUARIO_FOTO');
	}

?>
<html>
	<head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
		<meta charset="UTF-8">
	</head> 

		<div class="wrap">



			<form action = 'USUARIO_Controller.php' method = 'get'><br>
				<div id="centrado"><span class="form-title">
			<?php echo $strings['Borrar usuario']?><br></span></div>
				<ul class="form-style-1">
				<?php
//Generación automática del array
	createForm($lista,$DefForm3,$strings,$this->valores,true,true);
?>
				<input type = 'submit' name = 'accion' value =<?php echo $strings['Borrar'] ?> ></form> <a class="form-link" href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a>
			</p>

		</div>

</html>
<?php
} // fin del metodo render
} // fin de la clase
?>
