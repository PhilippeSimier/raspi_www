<!DOCTYPE html>
<html>
    <head>
        <title>Sun light ?</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="TD2 google map sun light">
		<meta name="author" content="Philippe Simier">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="/css/half-slider.css" rel="stylesheet">
		
		<!-- Style pour la carte coins arrondis bordure blanche ombre -->
		<style type="text/css"> #popin {
				background-color: #fff;
				border-radius: 8px;
				box-shadow: 0 0 20px #999;
				padding: 10px;
		}
		</style>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBKUqx5vjYkrX15OOMAxFbOkGjDfAPL1J8"></script>
		<script type="text/javascript" src="js/SunriseSunset.js"></script>
		<script type="text/javascript" src="js/SunriseSunsetLayer.js"></script>
		<script type="text/javascript" src="js/codeSun.js"></script>
		
    
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
			
			<section class="col-sm-12" style="padding:20px;">
				<div id="popin">
					<div id="map-canvas" style = "height: 500px; width: 100%;" ></div>
				</div>
				<iframe width="480" height="270" src="https://www.ustream.tv/embed/17074538?html5ui" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe>
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
 
    <script>
    $('.carousel').carousel({
        interval: 10000 //changes the speed
    })
    </script>
	
    </body>
</html>
