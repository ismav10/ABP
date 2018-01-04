
<!DOCTYPE html>
<!--VISTA PRINCIPAL-->
<?php
include '../Functions/LibraryFunctions.php';
if (!IsAuthenticated()) {
    header('Location:../index.php');
}
include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
include './header.php';
?>
<html>
    <head>
        <script type="text/javascript" src="../css/lib/alertify.js"></script>
        <link rel="stylesheet" href="../css/themes/alertify.core.css" />
        <link rel="stylesheet" href="../css/themes/alertify.default.css" />
        <script>
            function alerta() {
<?php if (ConsultarNotificacionesPendientes($_SESSION['login']) == 1) { ?>
                    alertify.alert("<b>Tienes Notificaciones nuevas. </b> Accede a Notificaciones para verlas.")
<?php } ?>
            }

        </script>
    </head>
    <?php if ($_SESSION['sesion'] == 0) { ?>
        <body onload="alerta()">
            <?php
            $_SESSION['sesion'] = 1;
        } else {
            ?> <body> <?php }
        ?>
    </p>
</body>
<?php
include './footer.php';
?>