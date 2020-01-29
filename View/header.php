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
require_once '../bdd.php';
if(session_status() == PHP_SESSION_NONE){
  session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../webroot/css/style.css" type="text/css">
        <link rel="stylesheet" href="../webroot/css/style_co.css" type="text/css">
        <link rel="stylesheet" href="../webroot/css/style_index.css" type="text/css">
        <link rel="stylesheet" href="../webroot/css/style_profil.css" type="text/css">
        <link rel="stylesheet" href="../webroot/css/style_edit.css" type="text/css">
        <link rel="stylesheet" href="../webroot/css/style_search.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
        <title>My_meetic</title>
    </head>
    <body>
        <header>
            <img id="background" src="../webroot/Images/couple3.jpg" alt="couple au sommet d'une montage">
            <nav id="nav_header">
                <ul>
                    <li><img id="meetic" src="../webroot/Images/meetic.png" alt="logo meetic"></li>
                    <?php if(isset($_SESSION['auth'])){ ?>
                    <li><a href="index.php">Déconnexion</a></li>
                    <li><a href="index_member.php">Espace membre</a></li>
                    <?php } else{ ?>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="connection.php">Se connecter</a></li>
                    <li><a href="registration.php">S'inscrire</a></li>
                     <?php } ?>
                </ul>
            </nav>
        </header>