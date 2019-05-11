/* 
Gestion page avec googlemap
 */

$(function () {
    var element = window.document.getElementById("map-canvas");
	var map_options = {
		zoom: 4,
		center: new google.maps.LatLng(0, 0.203440),
		mapTypeId: google.maps.MapTypeId.TERRAIN,
		};
	
	map = new google.maps.Map(element, map_options);
	
	sunriseSunsetLayer = new SunriseSunsetLayer(map,'GOOGLE');
	sunriseSunsetLayer.autoUpdate = true;
	sunriseSunsetLayer.draw();
	
	function affiche( data ) {
		console.log(data);  
		
		var myLatlng = new google.maps.LatLng(data.iss_position.latitude, data.iss_position.longitude);
		
		// création d'un nouveau marker
		var marker = new google.maps.Marker({
			position: myLatlng
		});
		// ajout du marker sur la carte
		marker.setMap(map);
		// nouveau centrage de la carte
		map.setCenter(myLatlng);
	}
	
	function requete_ajax(){
		// requete Ajax méthode getJSON 
		$.getJSON(
			"/gmap/iss.php", // Le fichier cible côté serveur. data au format Json
			affiche 
		);
	}
	
	setInterval(requete_ajax, 5000);  // appel de la fonction requete_ajax toutes les 5 secondes
	
	requete_ajax();
  
});
