
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
            function notificaciones() {
<?php if (ConsultarNotificacionesPendientes($_SESSION['login']) == 1) { ?>
                    alertify.alert("<b>Tienes nuevas Notificaciones. </b><br/> Accede a Notificaciones en Mi Cuenta para verlas.")
<?php } ?>
            }

            function solicitudes() {
<?php if (ConsultarSolicitudes() != 0) { ?>
                    alertify.alert("<b>Existen solicitudes que requieren su atención. </b><br/> Accede a Solicitudes para verlas.")
<?php } ?>
            }

        </script>
    </head>
    <?php if ($_SESSION['sesion'] == 0 && ($_SESSION['soli'] == 0)) { ?>
        <body onload="notificaciones()">
            <?php
            $_SESSION['sesion'] = 1;
        } else if ($_SESSION['sesion'] == 0 && ($_SESSION['soli'] == 1)) {
            ?>
        <body onload="solicitudes();
                    notificaciones();">
            <?php
            $_SESSION['soli'] = 0;
            $_SESSION['sesion'] = 1;
        } else if ($_SESSION['sesion'] == 1 && ($_SESSION['soli'] == 0)) {
            ?> <body>
                <?php
        } else if ($_SESSION['sesion'] == 1 && ($_SESSION['soli'] == 1)) {
                ?> <body onload="solicitudes()">
                <?php
                $_SESSION['soli'] = 0;
            }
            ?>
    </p>
</body>
<?php
include './footer.php';
?>