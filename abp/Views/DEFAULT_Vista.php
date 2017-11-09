<!DOCTYPE html>
    <!--VISTA PRINCIPAL-->
<?php
include '../Functions/LibraryFunctions.php';
 if (!IsAuthenticated()){
     header('Location:../index.php');
 }
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';



?>
<html
<head>
    <title>GymGest</title>
    <meta charset="utf-8">
    <meta name="description" content="Place your description here">
    <meta name="keywords" content="put, your, keyword, here">
    <meta name="author" content="Templates.com - website templates provider">
    <link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="../js/jquery-1.4.2.min.js" ></script>
    <script type="text/javascript" src="../js/cufon-yui.js"></script>
    <script type="text/javascript" src="../js/cufon-replace.js"></script>
    <script type="text/javascript" src="../js/Myriad_Pro_300.font.js"></script>
    <script type="text/javascript" src="../js/Myriad_Pro_400.font.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <!--[if lt IE 7]>
    <link rel="stylesheet" href="../css/ie/ie6.css" type="text/css" media="screen">
    <script type="text/javascript" src=../"js/ie_png.js"></script>
    <script type="text/javascript">
        ie_png.fix('.png, footer, header nav ul li a, .nav-bg, .list li img');
    </script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../js/html5.js"></script>
    <![endif]-->
</head>
<body id="page2">
<div class="wrap">
    <!-- header -->
    <header>

        <div class="container">
            <h1><a href="../Views/DEFAULT_Vista.php"></a></h1>
			  
            <nav>
                <ul>
                  <li ><a class="m2"><?php echo $strings['Usuario'].": ". $_SESSION['login']; ?></a></li> 
                    <li><a href="../Functions/Desconectar.php" class="m1"><?php echo  $strings['Cerrar Sesión']; ?></a></li> 
                </ul>
            </nav>


        </div>
    </header>
    <div class="container">
        <!-- aside -->
        <aside>
            <h3><?php echo $strings['MENU']?></h3>
            <ul class="categories">
               <?php echo añadirFuncionalidades($_SESSION);?>

                </ul>

        </aside>
        <!-- content -->
		<!--
        <section id="content">
            <div id="banner">
                <h2><?php echo $strings['Educacion']?> <span><?php echo $strings['Online']?><span><?php echo $strings['2016']?></span></span></h2>
            </div>
            <div class="inside">

                <h2><?php echo $strings['Estudia']?> <span><?php echo $strings['Con Nosotros']?></span></h2>
                <div class="img-box"><img src="../images/2page-img4.jpg"><span class="txt1">FaitIUc</span>
               <?php echo $strings['texto']?></div>

            </div>
        </section>
		-->
    </div>
</div>
<!-- footer -->
<footer>
    <div class="container">
        <div class="inside">
            <div class="wrapper">

                <div class="aligncenter"> Servizo de Gimnasio copyright © 2017 </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
