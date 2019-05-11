/* 
Gestion page avec googlemap
 */

$(function () {
    /*****************  options de placement et de zoom **************/
    /*****************  creation et affichage de la map **************/
	
	var	map = new GMaps({
		div: '#map-canvas',
		lat: 47.995759 , 
		lng: 0.203440
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
	
	/************ Ajout d'un bouton Où suis-je ? *****************/
	map.addControl({
        position: 'top_right',
        content: 'Où suis-je?',
        style: {
          margin: '11px',
          padding: '8px',
          background: '#fff'
        },
        events: {
			click: function(){
				GMaps.geolocate({
				success: function(position){
					map.setCenter(position.coords.latitude, position.coords.longitude);
					map.addMarker({
						lat: position.coords.latitude, 
						lng: position.coords.longitude,
						title: 'Vous êtes içi !',
						infoWindow: {
							content: '<p>coordonnées GPS : ' + position.coords.latitude + ' , ' + position.coords.longitude + '</p>'
						}
					});
				},
				error: function(error){
					alert('Geolocation failed: ' + error.message);
				},
				not_supported: function(){
					alert("Votre navigateur ne supporte pas la géolocation");
				}
				});
			}	
        }
    });
    
	
	
    /******  gestion du submit du formulaire (id formulaire) ********/
	
	$('#formulaire').submit(function(e){
        e.preventDefault();
		mon_adresse = $('#mon_adresse').val().trim(); 
			
        GMaps.geocode({
          address: mon_adresse,
          callback: function(results, status){
            if(status=='OK'){
              var latlng = results[0].geometry.location;
              map.setCenter(latlng.lat(), latlng.lng());
              var marker = map.addMarker({
                lat: latlng.lat(),
                lng: latlng.lng(),
				title: mon_adresse,
				infoWindow: {
					content: '<p>' + mon_adresse + '</p><p>coordonnées GPS : ' + latlng.lat().toFixed(6) + ' , ' + latlng.lng().toFixed(6) + '</p>'
				}
				
              });	  
            }
			else{
				alert("Oups cette adresse est inconnue !!!");
			}
          }
        });
      });
		
  
});
