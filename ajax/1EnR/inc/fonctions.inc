<?php

require_once 'manipBD.inc';



function afficheListeRegion() {
    // connexion BD
    $bdd = connexionBD();

     $requete = $bdd->query("select * from regions order by region_nom;");

     $tabRegion=array();
    
    while ($tab = $requete->fetch()) {
        array_push($tabRegion,array('idRegion'=>$tab['regions_id'], 'nomRegion'=>  utf8_encode($tab['region_nom'])));        
    }
    
    $requete->closeCursor();
    echo json_encode($tabRegion);
}

function majListeDepartement($idRegion) {
    $bdd = connexionBD();

     $requete = $bdd->prepare("select departement_id,departement_nom from departements where departement_region_id = :idreg order by departement_nom;");
     $requete->bindParam(":idreg", $idRegion);
    $requete->execute() or die(print_r($requete->errorInfo()));

    $tabDept=array();
    
    while ($tab = $requete->fetch()) {
        array_push($tabDept,array('idDepartement'=>$tab['departement_id'], 'nomDepartement'=>  utf8_encode($tab['departement_nom'])));        
    }
    
    $requete->closeCursor();
    echo json_encode($tabDept);

}


function majListeVille($idDepartement) {
	$bdd = connexionBD();

    $requete = $bdd->prepare("select ville_id,ville_nom_reel from villes where ville_departement_id = :idDep order by ville_nom_reel;");
    $requete->bindParam(":idDep", $idDepartement);
    $requete->execute() or die(print_r($requete->errorInfo()));

    $tabVille=array();
    
    while ($tab = $requete->fetch()) {
        array_push($tabVille, array('idVille'=>$tab['ville_id'], 'nomVille'=>  utf8_encode($tab['ville_nom_reel'])));        
    }
    
    $requete->closeCursor();
    echo json_encode($tabVille);
}
