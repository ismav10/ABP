<?php

//VISTA PARA LA INSERCIÓN DE USUARIOS ENTRENADORES
class DEPORTISTA_Insertar {

    private $volver;
    private $cont;

    function __construct($volver, $cont) {
        $this->volver = $volver;
        $this->cont = $cont;
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/validate.js"></script>

        <?php include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='<?php echo $this->cont; ?>'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Insertar deportista']; ?></label><br>
                </div>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['userName']; ?></label><br>
                    <input class="form" id="userName" name="userName" size="25" type="text" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['password']; ?></label><br>
                    <input class="form" id="password" name="password" size="25" type="password" required="true"/>
                </div>

                <div class="form-group">
                    <input type='hidden' class="form" id="tipoUsuario" name="tipoUsuario" size="25" type="text" required="true" value='Deportista'/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombre']; ?></label><br>
                    <input class="form" id="nombre" name="nombre" size="25" type="text" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['apellidos']; ?></label><br>
                    <input class="form" id="apellidos" name="apellidos" size="50" type="text" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['dni']; ?></label><br>
                    <input class="form" id="dni" name="dni" size="9" type="text" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['fechaNac']; ?></label><br>
                    <input class="form" id="fechaNac" name="fechaNac" type="date" required="true"/>
                </div>


                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['direccion']; ?></label><br>
                    <input class="form" id="direccion" name="direccion" size="50" type="text" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['email']; ?></label><br>
                    <input class="form" id="email" name="email" size="50" type="email" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['telefono']; ?></label><br>
                    <input class="form" id="telefono" name="telefono" size="9" type="numeric" required="true"/>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['foto']; ?></label><br>
                    <input type="file" name="foto" accept="image/*">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['tipoDeportista']; ?></label><br>
                    <select name="tipoDeportista" id="tipoDeportista"> 
                        <option value="PEF" selected><?php echo $strings['PEF']; ?></option> 
                        <option value="TDU"><?php echo $strings['TDU']; ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['metodoPago']; ?></label><br>
                    <input class="form" id="metodoPago" name="metodoPago" size="12" type="numeric" required="true"/>
                </div>

                <br>

                <input type='submit' onclick="return valida_envia_DEPOR()" name='accion'  value="<?php echo $strings['Insertar']; ?>">
                <a class="form-link" href="<?php echo $this->volver ?>"><?php echo $strings['Volver']; ?></a>
            </form>
        </div>
        
        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
