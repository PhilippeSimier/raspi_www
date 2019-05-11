<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site perso">
    <meta name="author" content="PhilippeS">
    <title>Présentation</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/half-slider.css" rel="stylesheet">
</head>

<body>

    <?php require_once 'menu.php'; ?>

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
				<img alt="Rapberry" src="images/raspberry.png" style="width: 100%; height: 100%;"/>
			</div>
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/raspberry.jpeg');"></div>
                <div class="carousel-caption">
                    <h2 style ="color: #000;">Raspberry pi</h2>

                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/home_page.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Learning</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/traffic-lights.jpg');"></div>
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
                <h1>le responsive design</h1>
                <p>Le Responsive Web design est une approche de conception Web qui vise à l'élaboration de sites 
				offrant une expérience de lecture et de navigation optimales pour l'utilisateur quelle que soit 
				sa gamme d'appareil (téléphones mobiles, tablettes, liseuses, moniteurs d'ordinateur de bureau).</p>
				
				<p>Une expérience utilisateur "Responsive" réussie implique l'absence de redimensionnement ( pas de zoom),
				de recadrage, et de défilements multidirectionnels de pages sur les petits écrans de nos smartphone.</p>

				<p>Le terme de "Responsive Web design" a été introduit par Ethan Marcotte dans un article de A List Apart publié en mai 2010.
				Il décrira par la suite sa théorie et pratique du responsive dans son ouvrage "Responsive Web Design" publié en 2011. 
				Celle-ci se limite à des adaptations côté client (grilles flexibles en pourcentages, images fluides et CSS3 Media Queries).</p>
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 10000 //changes the speed
    })
    </script>

</body>

</html>
