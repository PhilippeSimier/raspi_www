/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function()
{    
    
    $("#ville").autocomplete({
        minLength : 3,
        source: ["paris","le mans","le havre", "alençon","ales","valence"]

    });
     
    


})
