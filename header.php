<!-- ##################################################################
#######################################################################
######                                                          #######
######       Auteur : Jordan Philippot.                         #######                                                                                                                                                    #####
######       Projet : my_meetic.                                #######
######       Rendu  : 04 / 02 / 2020.                           #######
######                                                          #######
#######################################################################
####################################################################-->
<?php 
if(session_status() == PHP_SESSION_NONE){
  session_start();
}
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
}
catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="webroot/style.css" type="text/css">
        <link rel="stylesheet" href="webroot/style_co.css" type="text/css">
        <link rel="stylesheet" href="webroot/style_index.css" type="text/css">
        <link rel="stylesheet" href="webroot/style_profil.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
        <title>My_meetic</title>
    </head>
    <body>
        <header>
            <img id="background" src="webroot/Images/couple3.jpg">
            <nav id="nav_header">
                <ul>
                    <li><img id="meetic" src="webroot/Images/meetic.png" alt="logo meetic"></li>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="connection.php">Se connecter</a></li>
                    <li><a href="registration.php">S'inscrire</a></li>
                </ul>
            </nav>
        </header>