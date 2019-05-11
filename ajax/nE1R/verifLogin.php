<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$log=$_POST['login'];
$mdp=$_POST['mdp'];
require_once './inc/fonctions.inc';

//verifLogin($log, $mdp);
verifMdp($log, $mdp);
