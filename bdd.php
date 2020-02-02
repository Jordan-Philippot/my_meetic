<?php 

class Connexion {
	function connect(){

		try{
			$bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
		return $bdd;
	} 
}
