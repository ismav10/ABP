<script type="text/javascript">
    function changeIdAction(id)
    {
        document.getElementById("frmAsignar").action += id;
    }
</script>
    
<?php

class DEPORTISTA_SELECT_SHOW {

    private $valores;
    private $datos;
    private $volver;

//VISTA PARA LA MODIFICACIÓN DE USUARIOS
    function __construct($valores, $datos, $volver) {
        $this->valores = $valores;
        $this->datos = $datos;
        $this->volver = $volver;
        $this->render();
    }

    function render() {

        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        ?>

        <div class="container" >
            
               <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form id="frmAsignar" method="POST" action="?accion=<?php echo $strings['Ver']; ?>&userName=">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $strings['VerTablas']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <select multiple class="form-control" id="sel2" name="asignacionTablas[]">
                                            <?php
                                            foreach ($this->datos['tablas'] as $valor) {
                                                echo '<option>' . ConsultarNombreTabla($valor['1']) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $strings['Cerrar']; ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            
            
            
            
            <form  id="form" name="form" action='DEPORTISTA_Controller.php'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Ver Deportista']; ?></label><br>
                </div>
                
                 <div class="form-group">
                    <a target='_blank' href='<?php echo $this->valores['foto']; ?>'><img src='<?php echo $this->valores['foto']; ?>' width="250" height="250"></a>
                </div>
                
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['userName']; ?></label><br>
                    <input class="form" id="userName" name="userName" size="25" type="text" readonly="true" value="<?php echo $this->valores['userName']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['tipoUsuario']; ?></label><br>
                    <input class="form" id="tipoUsuario" name="tipoUsuario" size="25" type="text" readonly="true" value="<?php echo ConsultarNOMRol($this->valores['tipoUsuario']); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['nombre']; ?></label><br>
                    <input class="form" id="nombre" name="nombre" size="50" type="text" readonly="true" value="<?php echo $this->valores['nombre']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['apellidos']; ?></label><br>
                    <input class="form" id="apellidos" name="apellidos" size="50" type="text" readonly="true" value="<?php echo $this->valores['apellidos']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['dni']; ?></label><br>
                    <input class="form" id="dni" name="dni" size="9" type="text" readonly="true" value="<?php echo $this->valores['dni']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['fechaNac']; ?></label><br>
                    <input class="form" id="fechaNac" name="fechaNac" type="date" readonly="true" value="<?php echo $this->valores['fechaNac']; ?>">
                </div>


                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['direccion']; ?></label><br>
                    <input class="form" id="direccion" name="direccion" size="50" type="text" readonly="true" value="<?php echo $this->valores['direccion']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['email']; ?></label><br>
                    <input class="form" id="email" name="email" size="50" type="email" readonly="true" value="<?php echo $this->valores['email']; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['telefono']; ?></label><br>
                    <input class="form" id="telefono" name="telefono" size="15" type="numeric" readonly="true" value="<?php echo $this->valores['telefono']; ?>">
                </div>

                <div class="form-group">
                    <label class = "control-label" ><?php echo $strings['tipoDeportista']; ?></label><br>
                    <input class="form" id="tipoDeportista" name="tipoDeportista" size="3" type="text" readonly="true" value="<?php echo $this->valores['tipoDeportista']; ?>">
                </div>

                <div class = "form-group">
                    <label class = "control-label" ><?php echo $strings['metodoPago']; ?></label><br>
                    <input class="form" id="metodoPago" name="metodoPago" size="30" type="text" readonly="true" value="<?php echo $this->valores['metodoPago']; ?>">
                </div>
                
                <br>
                <td><a data-toggle="modal" href="#myModal" ><button type="button" class="btn btn-success"><?php echo $strings['VerTablas']; ?></button></a>
                <br>
                <br>

                <a class="form-link" href='<?php echo $this->volver ?> '><?php echo $strings['Volver']; ?> </a>
            </form>

        </div>
        <?php
        include '../Views/footer.php';
    }

// fin del metodo render
}
?>
