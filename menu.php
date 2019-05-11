<!----------------------------------------------------------------------------------
    @fichier  menu.php							    		
    @auteur   Philippe SIMIER (Touchard Washington le Mans)
    @date     Janvier 2019
    @version  v1.0 - First release						
    @details  menu /Menu pour toutes les pages du site philippes.ddns.net 
------------------------------------------------------------------------------------>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="/index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                    <li class="dropdown navbar-inverse">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mesures<span class="caret"></span></a>
						<ul class="dropdown-menu">
													
							<li><a href="/bme280/valeurs.php">Mesures BME280</a></li>
							<li role="separator" class="divider"></li>
							
							<li><a href="/bh1750/valeurs.php">Mesures éclairement</a></li>
							<li role="separator" class="divider"></li>
							
							<li><a href="/ina219/valeurs.php">Mesures Batterie</a></li>
							<li role="separator" class="divider"></li>
							
							<li><a href="/documentation/">Fiches aide mémoire</a></li>
							
						</ul>
					</li>
					<li class="dropdown navbar-inverse">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">JavaScript<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/jQuery/calculatrice.html">Calculatrice</a></li>
							<li><a href="/jQuery/digicode.html">Digicode</a></li>
							<li><a href="/gmaps.php">Google Map</a></li>
							<li><a href="http://philippes.ddns.net/gmap/sun.php">ISS Sun Light</a></li>
						</ul>
					</li>
	                <li><a href="/Ruche">Ruche connectée</a></li>
					<li><a href="/phpmyadmin">phpMyAdmin</a></li>
                    <li><a href="https://github.com/PhilippeSimier">GitHub</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>