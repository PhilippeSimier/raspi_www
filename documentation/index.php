<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Serveur -  Raspberry Pi</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/css/half-slider.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
   <?php require_once '../menu.php'; ?>

    <!-- Half Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
		    <div style="position: absolute; width: 140px; height: 170px; z-index: 1; left: 10%; top: 25%">
				<img alt="Rapberry" src="/images/raspberry.png" style="width: 100%; height: 100%;"/>
			</div>
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('/images/raspberry.jpeg');"></div>
                <div class="carousel-caption">
                    <h2 style ="color: #000;">Raspberry pi</h2>

                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('/images/home_page.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Learning</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('/images/traffic-lights.jpg');"></div>
                <div class="carousel-caption">
                    <h2 style = "color: #000;">Traffic lights</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
	
	<!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h2>Fiches aide mémoire</h2>	

					<?php
					$dir    = '.';
					$nb_fichier = 0;
					$cdir = scandir($dir);


					echo '<div class="list-group">';
					foreach ($cdir as $key => $value){
						if (!in_array($value,array(".","..","index.php"))) {
							$nb_fichier++; // On incrémente le compteur de 1
							echo '<a href="./' . $value . '" class="list-group-item" >' . $value . "</a>\n";
						
						
						}
					}

					echo '</div><br />';
					echo 'Il y a <strong>' . $nb_fichier .'</strong> fichier(s) dans le dossier';

					?>
			</div>
		</div>
		<hr>

		<!-- Footer -->
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; Section Snir Lycée Touchard le Mans</p>
				</div>
			</div>
			<!-- /.row -->
		</footer>

	</div>
	<!-- /.container -->
	<!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>	