<?php

class Mensaje{
//VISTA PARA MOSTRAR AVISOS Y MENSAJES
private $string; 
private $volver;

function __construct($string, $volver){
	$this->string = $string;
	$this->volver = $volver;	
	$this->render();
}

function render(){
?>
<html>
 <head>
	 <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
	 <link rel="stylesheet" href="../css/stylel.css">
<meta charset="UTF-8">
</head>
<body>
<div>
<p>



<?php
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';?>
<div class="container"><section id="content"><?php
echo "<h2>".$strings[$this->string]."</h2>";
?>


<?php
echo '<a style="font-weight:bold;"  class="form-link" href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";
?>


</div>
</body>
</html>
<?php
} //fin metodo render

}
