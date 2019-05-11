$(function () {
    /*****************  options de placement et de zoom **************/
    /*****************  creation et affichage de la map **************/
	
	var	map = new GMaps({
		div: '#map-iss',
		mapTypeId: google.maps.MapTypeId.TERRAIN,
		lat: 47.995759, 
		lng: 0.203440,
		zoom: 5
	});
	
	/************  placement d'une puce au milieu de la map ********/
	map.addMarker({
        lat: 47.995759, 
        lng: 0.203440,
        title: 'Lycée Touchard section SNIR',
        infoWindow: {
          content: '<p><img src="/images/LogoTouchard.jpg">Lycée Touchard Washington</p><p>coordonnées GPS : 47.995759 , 0.203440</p>' 
		  
        }
    });
	
	function affiche( data ) {
		console.log(data);  
		map.setCenter({
			lat: Number(data.iss_position.latitude),
			lng: Number(data.iss_position.longitude)
		});
		
		map.addMarker({
			lat: Number(data.iss_position.latitude),
			lng: Number(data.iss_position.longitude)
		});
	}	
	
	function requete_ajax(){
		// requete Ajax méthode getJSON 
		$.getJSON(
			"http://api.open-notify.org/iss-now.json", // Le fichier cible côté serveur. data au format Json
			affiche 
		);
	}
	
	setInterval(requete_ajax, 5000);  // appel de la fonction requete_ajax toutes les 10 secondes
});	