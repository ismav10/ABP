<?php
//VISTA PARA LA MODIFICACION DE INSTALACIONES
class INSTALACION_Modificar {

    private $valores;
    private $volver;


    function __construct($valores, $volver) {
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='<?php $this->volver; ?>'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Modificar Instalacion']; ?></label><br>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreInstalacion']; ?></label><br>
                    <input class="form-control" id="nombreInstalacion" name="nombreInstalacion" size="80" type="text" required="true" value="<?php echo $this->valores['nombreInstalacion']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionInstalacion']; ?></label><br>
                    <input class="form" id="descripcionInstalacion" name="descripcionInstalacion" size="160"  type="text" value="<?php echo $this->valores['descripcionInstalacion']; ?>">
                </div>                             

				<div class="form-group">
                    <label class="control-label" ><?php echo $strings['aforoInstalacion']; ?></label><br>
                    <input class="form-control" id="aforoInstalacion" name="aforoInstalacion" size="10" type="int" required="true" value="<?php echo $this->valores['aforoInstalacion']; ?>">
                </div>

                <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_INSTALACION()" >
                     <a class="form-link" href='INSTALACION_Controller.php'><?php echo $strings['Volver']; ?></a>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
