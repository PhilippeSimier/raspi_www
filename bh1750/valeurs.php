<!DOCTYPE html>
<html>
    <head>
        <title>Eclairement</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Internet des Objets Capteur d'éclairement">
		<meta name="author" content="Philippe Simier ">

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link href="/css/half-slider.css" rel="stylesheet">
		<!-- Style pour la boite (div id popin) coins arrondis bordure blanche ombre -->
		<style type="text/css"> 
		#popin {
				background-color: #fff;
				border-radius: 8px;
				box-shadow: 0 0 20px #999;
				padding: 10px;
	}

		</style>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript">
			var energie = 0.0; 

			function affiche( data ) {               // fonction pour afficher les données reçues
				console.log(data);                   // affichage de data dans la console
				$('#level').text(data.Eclairement + " " + data.unite); 

			}

			function requete_ajax(){
				// requete Ajax méthode getJSON 
				$.getJSON(
					"/cgi-bin/bh1750Json", // Le fichier cible côté serveur. data au format Json
					affiche 
				);
			}

			$(document).ready(function(){
				console.log("OK"); 				
			    $.getJSON("/cgi-bin/bh1750Json", affiche); // affichage des données quand la page est dispo
				setInterval(requete_ajax, 1000);  // appel de la fonction requete_ajax toutes les 10 secondes
				//setInterval("requete_ajax()", 1000);  écriture alternative  possible avec une chaîne "requete_ajax()"
			});
		</script>
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
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('/images/raspberry.jpeg');"></div>
                <div class="carousel-caption">
                    <h2>Raspberry pi</h2>
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
                    <h2>Traffic light</h2>
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

	<div class="container" style="padding:15px;">
		<div class="row">
			<section class="col-sm-6">
				<div class="page-header">
				    <h2>Eclairement lumineux </h2>
				</div>
				<div id="popin">

					<div class="row">
					    <div class="col-sm-6"><h3>Eclairement <small> lumineux</small></h3></div>
						<div class="col-sm-6"><h3><span id="level"></span></h3></div>
					</div>


				</div>
			</section>
			<section class="col-sm-6">
				<div class="page-header">
					<h2>Capteur <small> BH1750</small> </h2>
				</div>
				<div id="popin">
					<img src="/images/BH1750.png">
				</div>
				<br />

			</section>
	</div>

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
    <!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 10000 //changes the speed
    })
    </script>

    </body>
</html>
