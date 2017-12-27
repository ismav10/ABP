<?php
class NOTIFICACION_Consultar
{
	private $volver;
	function __construct($volver)
	{
		$this->volver = $volver;
		$this->render();
	}
    function render()
    {?>

    	<script type="text/javascript" src="../js/validate.js"></script>

        <?php
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>
    <div class="container" >
            <form  id="form" name="form" action='NOTIFICACION_Controller.php'  method='post'   enctype="multipart/form-data">
	<div class="form-group">

     <label class="control-label" ><?php echo $strings['Remitente']; ?></label><br>
      <input class="form" id="Remitente" name="Remitente" size="25" type="text"/>
      </div>
      <div class="form-group">
     <label class="control-label" ><?php echo $strings['Asunto']; ?></label><br>
      <input class="form" id="Asunto" name="Asunto" size="25" type="text"/>
      </div>
      <div class="form-group">
       <div class="form-group">
                    <input type="hidden" id="consulta" name="consulta" size="25" type="text" required="true" value='consulta'/>
                </div>
      <br>

                    <input type='submit' onclick="return valida_envia_USUARIO()" name='accion'  value="<?php echo $strings['Consultar']; ?>">
                <a class="form-link" href="NOTIFICACION_Controller.php"><?php echo $strings['Volver']; ?>
            </form>
        </div>
      <?php
    }

}
?>