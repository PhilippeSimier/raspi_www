<!DOCTYPE html>
<html>
    <head>
        <title>Mesures Météo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Internet des Objets Thermostat">
		<meta name="author" content="Philippe Simier ">

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link href="/css/half-slider.css" rel="stylesheet">
		<!-- Style pour la boite (div id popin) coins arrondis bordure blanche ombre -->
		<style type="text/css"> 
		.popin {
				background-color: #fff;
				border-radius: 8px;
				box-shadow: 0 0 20px #999;
				padding: 10px;
		}
		
		</style>
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript">
			function affiche( data ) {               // fonction pour afficher les données reçues
				console.log(data);                   // affichage de data dans la console
				if(data.OK){
					$('#affichage').show();
					$('#erreur').hide();
					$('#temperature').text(data.TemperatureC); 
					$('#pression').text(data.Pression);
					$('#humidite').text(data.Humidite);
					$('#altitude').text(data.altitude);
					$('#pointRosee').text(data.PointRosee);
				}
				else{
					$('#affichage').hide();
					$('#erreur').show();
				}
			}	
		
			function requete_ajax(){
				// requete Ajax méthode getJSON 
				$.getJSON(
					"/cgi-bin/bme280Json", // Le fichier cible côté serveur. data au format Json
					affiche 
				);
			}
				
			$(document).ready(function(){
								
			    $.getJSON("/cgi-bin/bme280Json", affiche); // affichage des données quand la page est dispo
				setInterval(requete_ajax, 10000);  // appel de la fonction requete_ajax toutes les 10 secondes
				//setInterval("requete_ajax()", 10000);  écriture alternative  possible avec une chaîne "requete_ajax()"
			});
		</script>
  </head>
  <body>
	
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
                <div class="fill" style="background-image:url('../images/raspberry.jpeg');"></div>
                <div class="carousel-caption">
                    <h2>Raspberry pi</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('../images/home_page.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Learning</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('../images/traffic-lights.jpg');"></div>
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
					<h2>Le Mans (72) <small>- alt. <span id="altitude"></span></small></h2>
				</div>
				<div class="popin" id="affichage">
					
					<div class="row">
					    <div class="col-sm-6"><h3>Température:</h3></div>
						<div class="col-sm-6"><h3><span id="temperature"></span></h3></div>
					</div>
					<div class="row">
					    <div class="col-sm-6"><h3>Pression:</h3></div>
						<div class="col-sm-6"><h3><span id="pression"></span></h3></div>
					</div>
					<div class="row">
					    <div class="col-sm-6"><h3>Humidité:</h3></div>
						<div class="col-sm-6"><h3><span id="humidite"></span></h3></div>
					</div>
					<div class="row">
					    <div class="col-sm-6"><h3>Point de rosée:</h3></div>
						<div class="col-sm-6"><h3><span id="pointRosee"></span></h3></div>
					</div>	
				</div>
				
				<div class="popin" id="erreur" style="display: none;">
					<div class="row">
					    <div class="col-sm-6"><h3>Erreur de lecture du BME280</h3></div>
					</div>	
				</div>
				
			</section>
			<section class="col-sm-6">
				<div class="page-header">
					<h2>Capteur <small> BME280</small> </h2>
				</div>
				<div class="popin">
					<img src="/images/bme280.jpg" style="width:100%">
				</div>
				<br />
				<p> Le BME280 est un capteur environnemental pour mesurer la température, la pression barométrique et l'humidité relative! 
				    Ce capteur est idéal pour réaliser une petite station météo. Il peut  être connecté sur un bus I2C ou SPI! 
					La broche CSB doit être connecté à VDDIO pour sélectionner l'interface I²C.
					Son adresse sur le bus est 0x77 ou 0x76 en fonction du niveau de tension appliquée sur la broche SDO. 
				</p>		
			</section>
			<section class="col-sm-12">

				<div class="page-header">
					<h1>I2C <small>Inter-Integrated Circuit</small> </h1>
				</div>	
				<p>L'I2C est un bus de données qui permet de relier facilement un microprocesseur et différents circuits électroniques. 
				Conçu par Philips en 1982 pour les applications de domotique et d’électronique. 
				Il existe maintenant d’innombrables périphériques exploitant ce bus <p/>
				<p>
				I2C est un bus série synchrone bidirectionnel half-duplex.
				La connexion est réalisée par l’intermédiaire de deux lignes :
				    <ul>
						<li>SDA (<em>Serial Data Line</em>) : ligne de données bidirectionnelle,</li>
						<li>SCL (<em>Serial Clock Line</em>) : ligne d’horloge de synchronisation bidirectionnelle.</li>
					</ul>
				</div>
			</section>	
	</div>
			
	
	
    <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; PSR</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 10000 //changes the speed
    })
    </script>
	
    </body>
</html>
