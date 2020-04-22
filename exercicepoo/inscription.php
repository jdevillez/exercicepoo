<?php 

require_once('php/class/class_inscription.php');
require_once('php/class/class_database.php');
$connexion = new database ('db5000303633.hosting-data.io', 'dbs296620', 'dbu526547', '[&4zSW6x');
$bdd = $connexion->PDOConnect();

$user = new inscription();
?>