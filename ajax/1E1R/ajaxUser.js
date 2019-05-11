/* 
ajaxUser.js
 */

$(function()
{
    // génération de la liste déroulante au chargement de la page

        $.ajax({
            url: 'getUsers.php',
            type: 'GET',
            dataType: 'json',
            success: // si la requete fonctionne, mise à jour de la liste des noms
                    function(objetJson) {
                        $.each(objetJson, function(index, ligne) {
                            // liste-user sera nom prénom et value sera l'id
                            $("#liste-user").append('<option value="' + ligne.id + '">' + ligne.nom + ' ' + ligne.prenom + '</option>');
                        });
                    }
        });



    // gestion de la selection d'un nom dans la liste
    $("#liste-user").change(function() {
        var idUser = $(this).val(); // on récupère la valeur de l'id de la liste

        if (idUser != '-1') { // si l'utilisateur n'est pas le premier (choisissez....)
            // appel à la page majAdresse via ajax
            $.ajax({
                url: 'majAdresse.php',
                data: $(this).serialize(),
                type: 'GET',
                dataType: 'json',
                success: // si la requete fonctionne, mise à jour du champs adresse
                        function(objetJson) {
                            $("#adresse").text(objetJson);
                        }
            });
        }
		if (idUser != '-1') { // si l'utilisateur n'est pas le premier (choisissez....)
            // appel à la page majAdresse via ajax
            $.ajax({
                url: 'majNom.php',
                data: $(this).serialize(),
                type: 'GET',
                dataType: 'json',
                success: // si la requete fonctionne, mise à jour du champs texte nom
                        function(objetJson) {
                            $("#nom").val(objetJson);
                        }
            });
        }
		

    });
})
