/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function()
{
    // gestion du changement de region
    $("#verifLogin").click(function() {
        
        // appel à la page login via ajax
        $.ajax({          
            url: 'verifLogin.php',
            data: $("#formulaireLogin").serialize(), // serialisation des données du formulaire
            type: 'POST',
            dataType: 'json',
            success: // si la requete fonctionne, mise à jour de la couleur de pastille
                    function(objetJson) {
                        $("#pastille").removeClass();
                        switch (objetJson){
                            case 'v': $("#pastille").toggleClass("pastilleVerte", true); break;
                            case 'r': $("#pastille").toggleClass("pastilleRouge", true); break;
                            case 'o': $("#pastille").toggleClass("pastilleOrange", true); break;
                        }                   
                    }
        });

        
    });
});
