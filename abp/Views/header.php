<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MueveT</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/responsive-slider.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link href="../css/style.css" rel="stylesheet">	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header>
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<div class="navbar-brand">
								<a href="index.html"><h1>MueveT</h1></a>
							</div>
						</div>
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
                                                            <?php
                                                                showNavbar();
                                                                print_r($_SESSION['login']);
                                                            ?>
                                                            <!--
                                                                <li role="presentation" class="active"><a href="../Functions/Conectar.php" class="m1">Iniciar Sesion</a></li> 
								<li role="presentation"><a href="">Gestion 1</a></li>
								<li role="presentation"><a href="">Gestion 2</a></li>
								<li role="presentation"><a href="">Gestion 3</a></li>
								<li role="presentation"><a href="">Gestion 4</a></li>
								<li role="presentation"><a href="">Gestion 5</a></li>
								<li class="nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                      Gestion 6 Desp.
                                                                    </a>
                                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                                      <a class="dropdown-item" href="#">Action</a>
                                                                      <a class="dropdown-item" href="#">Another action</a>
                                                                      <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                  </li>

                                                        -->
							</ul>
						</div>
                                                  
					</div>			
				</nav>
			</div>
		</div>
	</header>