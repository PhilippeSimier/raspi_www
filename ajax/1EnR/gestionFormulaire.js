/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(function()
{
    // generation de la liste deroulante des regions
    $.ajax({
                url: 'controleur.php',                
                data: $("#typeDemande").serialize(), // on envoie $_GET['typeDemande']
                type: 'GET',
                dataType: 'json',
                success: // si la requete fonctionne, mise à jour de la liste des regions
                        function(objetJson) {

                            $.each(objetJson, function(index, ligne) {                                
                                $("#regions").append('<option value="' + ligne.idRegion + '">' + ligne.nomRegion + '</option>');
                            });
                        }
            });
    
    // gestion du changement de region
    $("#regions").change(function() {
        var idRegion = $(this).val(); // on récupère la valeur de la région
		// changement de la valeur du type de demande pour faire appel à la fonction majListeDepartement
        $("#typeDemande").val('d');

        $("#departements").empty(); // on vide la liste des départements
        $("#departements").append('<option value="-1">Choisissez un departement</option>');
        $("#villes").empty(); // on vide la liste des villes
        $("#villes").append('<option value="-1">Choisissez une ville </option>');

        if (idRegion != '-1') { // si la region selectionné existe (pas le "choisissez une region")
            // appel à la page majListeDept via ajax
            $.ajax({
                url: 'controleur.php',
                data: $("#typeDemande,#regions").serialize(), // on envoie $_GET['typeDemande'] et $_GET['regions']
                type: 'GET',
                dataType: 'json',
                success: // si la requete fonctionne, mise à jour de la liste des departements
                        function(objetJson) {

                            $.each(objetJson, function(index, ligne) {                                
                                $("#departements").append('<option value="' + ligne.idDepartement + '">' + ligne.nomDepartement + '</option>');
                            });
                        }
            });
        }

    });
    
    // gestion du changement de departement
     $("#departements").change(function() {
        var idDepartement = $(this).val(); // on récupère l'identifiant du département
		// changement de la valeur du type de demande pour faire appel à la fonction majListeVilles
        $("#typeDemande").val('v');

        $("#villes").empty(); // on vide la liste des villes
        $("#villes").append('<option value="-1">Choisissez une ville</option>');
        

        if (idDepartement != '-1') { // si le département selectionné existe (pas le "choisissez un département")
            // appel à la page majListeVille via ajax
            $.ajax({
                url: 'controleur.php',
                data: $("#typeDemande,#departements").serialize(), // on envoie $_GET['typeDemande'] et $_GET['regions']
                type: 'GET',
                dataType: 'json',
                success: // si la requete fonctionne, mise à jour de la liste des villes
                        function(objetJson) {

                            $.each(objetJson, function(index, ligne) {                                
                                $("#villes").append('<option value="' + ligne.idVille + '">' + ligne.nomVille + '</option>');
                            });
                        }
            });
        }

    });


});
