<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$source=$_GET['typeDemande'];
require_once './inc/fonctions.inc';

switch ($source){
    case 'r':afficheListeRegion(); break;
    case 'd':majListeDepartement($_GET['idRegion']);break;
    case 'v':majListeVille($_GET['idDepartement']);break;
}