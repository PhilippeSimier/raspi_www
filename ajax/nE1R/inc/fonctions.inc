<?php

require_once 'manipBD.inc';

function verifLogin($log, $mdp) {
    $bdd = connexionBD();
// recherche du couple login/mdp dans la table user
$requete = $bdd->prepare("select id from user where login = :log and mdp = :mdp ;");
$requete->bindParam(":log", $log);
$requete->bindParam(":mdp", $mdp);
$requete->execute() or die(print_r($requete->errorInfo()));
// comptage du nombre de resultats
$nbLigne=$requete->rowCount();
$requete->closeCursor();

if ($nbLigne==0){// le couple login/mdp n'est pas présent dans la table user
    // il faudra retourner 'r'
    $retour='r';
}
else{   // le couple login/mdp est présent dans la table user
    // il faudra retourner 'v'
    $retour='v';
}

echo json_encode($retour);
}

function verifMdp($log, $mdp) { 
    $bdd = connexionBD();
	// recherche du couple login/mdp dans la table user
	$requete = $bdd->prepare("select * from user where login = :log;");
	$requete->bindParam(":log", $log);
	$requete->execute() or die(print_r($requete->errorInfo()));
	// comptage du nombre de resultats
	$nbLigne = $requete->rowCount();
	$ligne = $requete->fetch();
	$requete->closeCursor();

if ($nbLigne==0){// le  login n'est pas présent dans la table user
    // il faudra retourner 'r'
    $retour='r';
	}
else {   
	// le login est présent dans la table user
    if ($ligne[mdp] != $mdp) {
		$retour='o';
		}
	else {
        // il faudra retourner 'v'
		$retour='v';
		}
	}

echo json_encode($retour);
}
