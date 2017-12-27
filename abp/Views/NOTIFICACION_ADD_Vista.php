
<script type="text/javascript">
function changeIdAction(id)
{
    document.getElementById("frmAsignar");
}
</script>
<?php

//VISTA PARA LA INSERCIÓN DE USUARIOS
class NOTIFICACION_Insertar {
    private $volver;
    private $datos;

    function __construct($datos,$volver) {
        $this->volver = $volver;
        $this->datos = $datos;
        $this->render();
    }

    function render() {
        var_dump($this->datos);
        
        //Bucle para poner las opciones en el Pop up
        $i=0;
        foreach($this->datos as $clave=>$valor)
        {
            var_dump($this->datos[$i]);
            $i++;
        }

        ?> <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>

        <?php
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php'; ?>

        <div class="container" >
            <form  id="form" name="form" action='NOTIFICACION_Controller.php'  method='post'   enctype="multipart/form-data">
                <div class="form-group" >
                    <label class="control-label" ><?php echo $strings['Insertar Notificacion']; ?></label><br>
                </div>
                <div class = "form-group">
                <td><a href="?accion=frmasignar"><button type="button" class="btn btn-success">Elegir destinatario</button></a></td>
            </div>

                <?php
                echo '<!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <form id="frmAsignar" method="POST" action="?accion=asignar">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">'.$strings['asignartabla'].'</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                             <div class="form-group">
                              <label for="sel1">'.$strings['seleccionaejercicios'].'</label>
                              <select multiple class="form-control" id="sel2" name="asignacionEjercicios[]">
                                ';
                            foreach($this->datos as $clave => $valor)
                            {
                                echo '<option>'.$valor['1'].'</option>';
                            }                               
        echo '                      
                              </select>
                            </div> 
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">'.$strings['closetabla'].'</button>
                        <button type="submit" class="btn btn-primary">'.$strings['savetabla'].'</button>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>';
                ?>
                <div class="form-group">
                    <label class="control-label" ><?php echo $strings['asuntoNotificacion']; ?></label><br>
                    <input class="form" id="asuntoNotificacion" name="asuntoNotificacion" size="50" type="text" required="true"/>
                </div>

                 <div class="form-group">
                    <label class="control-label" ><?php echo $strings['mensajeNotificacion']; ?></label><br>
                    <input class="form" id="mensajeNotificacion" name="mensajeNotificacion" type="textarea" rows="10" cols="40" required="true"/>
                </div>
                
                 <div class="form-group">
                    <input type="hidden" id="username" name="username" size="25" type="text" required="true" value='usuario'/>
                </div>

                <input type='submit' onclick="" name='accion'  value="<?php echo $strings['Insertar']; ?>">
                <a class="form-link" href="<?php echo $this->volver?>"><?php echo $strings['Volver']; ?>
            </form>
        </div>
        <?php
        include '../Views/footer.php';
    }

//fin metodo render
}
