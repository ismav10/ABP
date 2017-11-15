<?php

class USUARIO_Modificar{

private $valores;
private $id;
private $volver;
//VISTA PARA LA MODIFICACIÓN DE USUARIOS
function __construct($valores, $id, $volver){
	$this->valores = $valores;
        $this->id = $id;
	$this->volver = $volver;
	$this->render();
}

function render(){

	include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
	include '../Functions/USUARIOShowAllDefForm.php';

	//include '../Functions/LibraryFunctions.php';
	//Array con los nombres de los campos a modificar
	if ($this->id == "2" || $this->valores['tipoUsuario'] == 2) {
            $lista = array('userName', 'password', 'tipoUsuario', 'nombre', 'apellidos', 'dni', 'fechaNac', 'direccion', 'email', 'telefono', 'cuentaBanc', 'foto');
        } else if ($this->id == "3" || $this->valores['tipoUsuario'] == 3) {
            $lista = array('userName', 'password', 'tipoUsuario', 'nombre', 'apellidos', 'dni', 'fechaNac', 'direccion', 'email', 'telefono', 'foto', 'tipoDeportista', 'metodoPago');
        } else if ($this->id != "2" && $this->id != "3") {
            $lista = array('userName', 'password', 'tipoUsuario', 'nombre', 'apellidos', 'dni', 'fechaNac', 'direccion', 'email', 'telefono', 'foto');
        }
    
      
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
	 <?php 
                    if ($this->id == "2") { ?>
                        <br><?php echo $strings['Modificar entrenador'] ?><br></span></div><?php 
                        
                    } else if ($this->id == "3") {  ?>
                        <br><?php echo $strings['Modificar deportista'] ?><br></span></div><?php 
                        
                    } else if ($this->id != "2" || $this->id != "3") {?>
                        <br><?php echo $strings['Modificar usuario'] ?><br></span></div><?php
                }   
                ?>

        <form id="form" name="form"  action = 'USUARIO_Controller.php?id=<?php echo $this->id?>'  method = 'post' enctype="multipart/form-data"><br>
            <ul class="form-style-1">
                
	<?php
//        if(ConsultarTipoUsuarioLogin()==1 && $this->id != "2" && $this->id != "3"){
//            createForm($lista, $DefForm, $strings, $this->valores, array('foto' => false), array('userName' => false, 'password' => false, 'tipoUsuario'=> false, 'nombre' => false, 'apellidos' => false, 'dni' => false, 'fechaNac' => false, 'direccion' => false, 'email' => false, 'telefono' => false));
//        }
//        else if(ConsultarTipoUsuarioLogin()==1 && $this->id == "2"){
//             createForm($lista, $DefForm, $strings, $this->valores, array('foto' => false), array('userName' => false, 'password' => false, 'tipoUsuario'=> false, 'nombre' => false, 'apellidos' => false, 'dni' => false, 'fechaNac' => false, 'direccion' => false, 'email' => false, 'telefono' => false, 'cuentaBanc'=>false));
//        } 
//        else if(ConsultarTipoUsuarioLogin()==1 && $this->id == "3"){
//             createForm($lista, $DefForm, $strings, $this->valores, array('foto' => false), array('userName' => false, 'password' => false, 'tipoUsuario'=> false, 'nombre' => false, 'apellidos' => false, 'dni' => false, 'fechaNac' => false, 'direccion' => false, 'email' => false, 'telefono' => false, 'tipoDeportista'=>false, 'metodoPago' => false));
//        }
        //else 
            if(ConsultarTipoUsuarioLogin()==2 && $this->valores['userName'] == $_SESSION['login']){
              createForm($lista, $DefForm, $strings, $this->valores, array('foto' => false), array('userName' => false, 'password' => false, 'nombre' => false, 'apellidos' => false, 'dni' => false, 'fechaNac' => false, 'direccion' => false, 'email' => false, 'telefono' => false, 'cuentaBanc'=>false));
        }
        else if(ConsultarTipoUsuarioLogin()==3 && $this->id == "3"){
             createForm($lista, $DefForm, $strings, $this->valores, array('foto' => false), array('userName' => false, 'password' => false, 'nombre' => false, 'apellidos' => false, 'dni' => false, 'fechaNac' => false, 'direccion' => false, 'email' => false, 'telefono' => false, 'tipoDeportista'=>false, 'metodoPago' => false));
        }
        ?>

       
                
        <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_USUARIO()" >
        </form>

        <a class="form-link" href='<?php echo $this->volver. $this->id ;?> '><?php echo $strings['Volver']; ?> </a>
        
    </p>
</body>
</div>

</html>
<?php
} // fin del metodo render
} // fin de la clase
?>
