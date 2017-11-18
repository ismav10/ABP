<?php
//VISTA PARA LA INSERCIÓN DE USUARIOS ENTRENADORES
class DEPORTISTA_Modificar {

    private $valores;
    private $volver;

//VISTA PARA LA MODIFICACIÓN DE USUARIOS
    function __construct($valores, $volver) {
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='USUARIO_Controller.php?user=deportista'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Modificar deportista']; ?></label><br>
                </div>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['userName']; ?></label><br>
                    <input class="form" id="userName" name="userName" size="25" type="text" required="true" readonly="true" value="<?php echo $this->valores['userName']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['password']; ?></label><br>
                    <input class="form" id="password" name="password" size="25" type="password" required="true">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['tipoUsuario']; ?></label><br>
                    <select name="tipoUsuario" id="tipoUsuario"> 
                        <option value="<?php echo ConsultarNOMRol($this->valores['tipoUsuario']); ?>" selected><?php echo ConsultarNOMRol($this->valores['tipoUsuario']); ?></option> 
                        <option value="Administrador"><?php echo $strings['Administrador']; ?></option>
                        <option value="Deportista"><?php echo $strings['Deportista']; ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombre']; ?></label><br>
                    <input class="form" id="nombre" name="nombre" size="50" type="text" required="true" value="<?php echo $this->valores['nombre']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['apellidos']; ?></label><br>
                    <input class="form" id="apellidos" name="apellidos" size="50" type="text" required="true" value="<?php echo $this->valores['apellidos']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['dni']; ?></label><br>
                    <input class="form" id="dni" name="dni" size="9" type="text" required="true" value="<?php echo $this->valores['dni']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['fechaNac']; ?></label><br>
                    <input class="form" id="fechaNac" name="fechaNac" type="date" required="true" value="<?php echo $this->valores['fechaNac']; ?>">
                </div>


                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['direccion']; ?></label><br>
                    <input class="form" id="direccion" name="direccion" size="50" type="text" required="true" value="<?php echo $this->valores['direccion']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['email']; ?></label><br>
                    <input class="form" id="email" name="email" size="50" type="email" required="true" value="<?php echo $this->valores['email']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['telefono']; ?></label><br>
                    <input class="form" id="telefono" name="telefono" size="15" type="numeric" required="true" value="<?php echo $this->valores['telefono']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['foto']; ?></label><br>
                    <input type="file" name="foto" accept="image/*" value="<?php echo $this->valores['foto']; ?>"/>
                </div>


                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['tipoDeportista']; ?></label><br>
                    <select name="tipoDeportista" id="tipoDeportista">
                        <?php if ($strings['PEF'] == $this->valores['tipoDeportista']) { ?>
                            <option value="PEF" selected><?php echo $strings['PEF']; ?></option> 
                            <option value="TDU"><?php echo $strings['TDU']; ?></option>
                        <?php } else { ?>
                            <option value="TDU" selected><?php echo $strings['TDU']; ?></option> 
                            <option value="PEF"><?php echo $strings['PEF']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class = "form-group">
                    <label class = "control-label" ><?php echo $strings['metodoPago']; ?></label><br>
                    <input class="form" id="metodoPago" name="metodoPago" size="30" type="text" required="true" value="<?php echo $this->valores['metodoPago']; ?>">
                </div>
                <br>

                <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_USUARIO()" >
                <a class="form-link" href='<?php echo $this->volver ?> '><?php echo $strings['Volver']; ?> </a>
            </form>
        </div>



        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
