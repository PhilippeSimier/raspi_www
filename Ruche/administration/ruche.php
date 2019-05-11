<?php
include "authentification/authcheck.php" ;
	

require_once('../ini/ini.php');
require_once('../definition.inc.php');

//------------si des données  sont reçues on les enregistrent dans le fichier configuration.ini ---------
if( !empty($_POST['envoyer'])){

    //  lecture du fichier de configuration
    $array  = parse_ini_file(CONFIGURATION, true);
    //  Modification des valeurs pour la section [ruche]
    $array['ruche'] = array ('id'  => $_POST['ruche_id'],
                             'altitude' => $_POST['ruche_altitude'],
							 'latitude' => $_POST['ruche_latitude'],
							 'longitude' => $_POST['ruche_longitude']
                            );
					   
    //  Ecriture du fichier de configuration modifié
    $ini = new ini (CONFIGURATION);
    $ini->ajouter_array($array);
    $ini->ecrire(true);
	
	//-------Puis on met à jour le channel sur Thing Speak--------------------------------
	$url = "https://api.thingspeak.com/channels/" . $array['thingSpeak']['channel'] . ".json";
	
	$postfields  = "api_key=" . $array['thingSpeak']['userkey'];
	$postfields .= "&latitude=" . $_POST['ruche_latitude'];
	$postfields .= "&longitude=" . $_POST['ruche_longitude'];
	$postfields .= "&elevation=" . $_POST['ruche_altitude'];
	
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	CURLOPT_URL => $url, 
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "PUT",
	CURLOPT_POSTFIELDS => $postfields,
	CURLOPT_HTTPHEADER => array(
		"Content-Type: application/x-www-form-urlencoded",
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
		exit;
	} 

}

// -------------- sinon lecture du fichier de configuration  -----------------------------
else
{
   $ini  = parse_ini_file(CONFIGURATION, true);
   
   $_POST['ruche_id'] = $ini['ruche']['id'];
   $_POST['ruche_altitude']  = $ini['ruche']['altitude'];
   $_POST['ruche_latitude']  = $ini['ruche']['latitude'];
   $_POST['ruche_longitude']  = $ini['ruche']['longitude'];

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Configuration</title>
    <!-- Bootstrap CSS version 4.1.1 -->
	<link rel="stylesheet" href="/Ruche/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/Ruche/css/ruche.css" />
    
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="/Ruche/scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKUqx5vjYkrX15OOMAxFbOkGjDfAPL1J8"></script>
	<script src="/Ruche/scripts/gmaps.js"></script>
    

		
	<script>
			
	$(function () {
    
	function position(e){
            console.log(e.latLng.lat().toFixed(6));
		    console.log(e.latLng.lng().toFixed(6));
		    map.removeMarkers();
		    map.addMarker({
                lat: e.latLng.lat(),
                lng: e.latLng.lng(),
				draggable: true,
				//icon: ruche,
                title: 'Nouvelle position'
			});
			$('input[name=ruche_latitude]').val(e.latLng.lat().toFixed(6));
			$('input[name=ruche_latitude]').css("backgroundColor", "#00ff00");
			$('input[name=ruche_longitude]').val(e.latLng.lng().toFixed(6));
			$('input[name=ruche_longitude]').css("backgroundColor", "#00ff00");
			// Elevation de la position 
			map.getElevations({
				locations : [[e.latLng.lat(),e.latLng.lng()]],
				callback : function (result, status){
				if (status == google.maps.ElevationStatus.OK) {
					console.log(result["0"].elevation.toFixed(0));
					$('input[name=ruche_altitude]').val(result["0"].elevation.toFixed(1));
					$('input[name=ruche_altitude]').css("backgroundColor", "#00ff00");
				}
			}
			});
        }
	
	
	
	
    /*****************  creation et affichage de la map **************/
	
	var	map = new GMaps({
		div: '#map-canvas',
		lat: <?php echo  $_POST['ruche_latitude']; ?> , 
		lng: <?php echo  $_POST['ruche_longitude']; ?> ,
		zoom : 13 ,
		mapType : 'terrain',
	});
	
    var ruche = new google.maps.MarkerImage('images/map_ruche.png');
	
	/************  placement d'une puce au milieu de la map ********/
	map.addMarker({
        lat: <?php echo  $_POST['ruche_latitude']; ?>, 
        lng: <?php echo  $_POST['ruche_longitude']; ?>,
        title: <?php echo '"Ruche ' . $_POST['ruche_id'] . '"'; ?>,
		draggable: true,
		dragend : position,
        infoWindow: {
          content: '<p> <?php echo "<b>Ruche " . $_POST['ruche_id'] . "</b><br />Coordonnées GPS : </br> Lat : " . $_POST['ruche_latitude'] . "<br /> Lng : " . $_POST['ruche_longitude']; ?></p>' 
		  
        }
		
    });
	

    /******  gestion du formulaire positionner ********/
	
	$('#formulaire').submit(function(e){
        e.preventDefault();
		mon_adresse = $('#mon_adresse').val().trim(); 
			
        GMaps.geocode({
          address: mon_adresse,
          callback: function(results, status){
            if(status=='OK'){
              map.removeMarkers();
			  console.log(results["0"].formatted_address);
			  var latlng = results[0].geometry.location;
              map.setCenter(latlng.lat(), latlng.lng());
              var marker = map.addMarker({
                lat: latlng.lat(),
                lng: latlng.lng(),
				title: mon_adresse,
				draggable: true,
				dragend : position,
				infoWindow: {
					content: '<p>' + results["0"].formatted_address + '<br />Coordonnées GPS : ' + latlng.lat().toFixed(6) + ' , ' + latlng.lng().toFixed(6) + '</p>'
				}
				
              });
				$('input[name=ruche_latitude]').val(latlng.lat().toFixed(6));
				$('input[name=ruche_latitude]').css("backgroundColor", "#00ff00");
				$('input[name=ruche_longitude]').val(latlng.lng().toFixed(6));
				$('input[name=ruche_longitude]').css("backgroundColor", "#00ff00");
				$('#mon_adresse').val(results["0"].formatted_address);
				
				// Elevation de la position 
				map.getElevations({
					locations : [[latlng.lat(),latlng.lng()]],
					callback : function (result, status){
					if (status == google.maps.ElevationStatus.OK) {
						console.log(result["0"].elevation.toFixed(0));
						$('input[name=ruche_altitude]').val(result["0"].elevation.toFixed(1));
						$('input[name=ruche_altitude]').css("backgroundColor", "#00ff00");
					}
					}
				});
			  
            }
			else{
				alert("Oups cette adresse est inconnue !!!");
			}
          }
        });
      });
	
    /***** Menu *******************/

    map.setContextMenu({
        control: 'map',
        options: [{
            title: 'Changer la position',
            name: 'add_marker',
            action: function(e) {
                this.removeMarkers();
				this.addMarker({
                lat: e.latLng.lat(),
                lng: e.latLng.lng(),
                title: 'Nouvelle position'
				});
				$('input[name=ruche_latitude]').val(e.latLng.lat().toFixed(6));
				$('input[name=ruche_latitude]').css("backgroundColor", "#00ff00");
				$('input[name=ruche_longitude]').val(e.latLng.lng().toFixed(6));
				$('input[name=ruche_longitude]').css("backgroundColor", "#00ff00");
				
				
			}
		}, {
			title: 'Centrer la carte ici',
			name: 'center_here',
			action: function(e) {
				this.setCenter(e.latLng.lat(), e.latLng.lng());
			}
		}]
	})	
  
});
		
		</script>
				
</head>
<body>

<?php require_once '../menu.php'; ?>

<div class="container" style="padding-top: 65px;">
    

		
		<div class="row">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="popin">
					<form class="form-horizontal" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="configuration" >
						<h2>Ruche</h2>
						
							<div class="form-group">
								<label for="ruche_id"  class="font-weight-bold">Identifiant : </label>
								<input type="int"  name="ruche_id" class="form-control" <?php echo 'value="' . $_POST['ruche_id'] . '"'; ?> />
							</div>

							<div class="form-group">
								<label for="latitude"  class="font-weight-bold">Latitude : </label>
								<input id="latitude" type="int"  name="ruche_latitude" class="form-control" <?php echo 'value="' . $_POST['ruche_latitude'] . '"'; ?> />
							</div>
							
							<div class="form-group">
								<label for="longitude"  class="font-weight-bold">Longitude : </label>
								<input id="longitude" type="int"  name="ruche_longitude" class="form-control" <?php echo 'value="' . $_POST['ruche_longitude'] . '"'; ?> />
							</div>
							
							<div class="form-group">
								<label for="altitude"  class="font-weight-bold">Altitude : </label>
								<input id="altitude" type="int"  name="ruche_altitude" class="form-control" <?php echo 'value="' . $_POST['ruche_altitude'] . '"'; ?> />
							</div>
							
							<div class="form-group">
								</br>
								<button type="submit" class="btn btn-primary" value="Valider" name="envoyer" > Appliquer</button>
							</div>	
					</form>
				</div>
			</div>
			<!-- Localisation géographique -->
			<div class="col-md-9 col-sm-12 col-xs-12">	
				<div class="popin">
					<form method="post" id="formulaire" style="margin-bottom: 6px">
						<div class="form-group">
						<input type="text" id ="mon_adresse"  value="" placeholder="Adresse" class="form-control" required/>
						</div>
						<input type="submit" class="btn" value="Positionner" />
					</form>
					<div id="map-canvas" style = "height: 500px; width: 100%;" ></div>
				</div>
			</div>	
				
			
		
		</div>
		<div class="row">
			
		</div>
		<?php require_once '../piedDePage.php'; ?>
</div>
	
</body>

	
		