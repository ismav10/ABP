<?php

//VISTA PARA LA INSERCIÓN DE INSTALACIONES
class INSTALACION_Insertar {

    private $volver;
    private $cont;

    function __construct($valores, $volver) {
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='<?php echo $this->cont; ?>'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Insertar Instalacion']; ?></label><br>
                </div>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombreInstalacion']; ?></label><br>
                    <input class="form-control" id="nombreInstalacion" name="nombreInstalacion" size="80" type="text" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['descripcionInstalacion']; ?></label><br>
                    <input class="form" id="descripcionInstalacion" name="descripcionInstalacion" size="160" type="text"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['aforoInstalacion']; ?></label><br>
                    <input class="form-control" id="aforoInstalacion" name="aforoInstalacion" size="10" type="int" required="true"/>
                </div>


                <input type='submit' onclick="return valida_envia_INSTALACION()" name='accion'  value="<?php echo $strings['Insertar']; ?>">
                <a class="form-link" href='INSTALACION_Controller.php'><?php echo $strings['Volver']; ?></a>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
