<!DOCTYPE html>
    <!--VISTA PRINCIPAL-->
<?php
include '../Functions/LibraryFunctions.php';
 if (!IsAuthenticated()){
     header('Location:../index.php');
 }
 include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
 include './header.php';

include './footer.php';
?>