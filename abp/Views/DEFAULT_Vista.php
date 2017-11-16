<!DOCTYPE html>
    <!--VISTA PRINCIPAL-->
<?php
include '../Functions/LibraryFunctions.php';
include './header.php';
 if (!IsAuthenticated()){
     header('Location:../index.php');
 }
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
?>

