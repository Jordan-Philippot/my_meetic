<?php
require_once 'bdd.php';

class form extends Connexion{
    protected function test($nom, $prenom, $age, $email){
    $sql = 'SELECT nom, prenom, date_naissance, email, etat FROM membre WHERE id_membre LIKE "%jean%"';
    $statement = $this->connexion()->prepare($sql);
    $statement->bindParam(":nom", $philippot, PDO::PARAM_STR());
    $statement->bindParam(":prenom", $jordan, PDO::PARAM_STR());
    $statement->bindParam(':etat', $etat, PDO::PARAM_INT);
    $statement->execute();
    }


    
    protected function subscrib($nom, $prenom, $age, $email){
    $sql = 'INSERT INTO membre VALUES nom, prenom, date_naissance, genre, email, ville, loisir, password';
    $statement = $this->connexion()->prepare($sql);
    $statement->bindParam(":nom", $philippot, PDO::PARAM_STR());
    $statement->bindParam(":prenom", $jordan, PDO::PARAM_STR());
    $statement->bindParam(':etat', $etat, PDO::PARAM_INT);
    $statement->execute();
    }


}