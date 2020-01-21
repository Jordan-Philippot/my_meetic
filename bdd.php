<?php 

class Connexion {
    private $host="localhost";
	private $login="root";
	private $pass="root";
    private $db="my_meetic";


	protected function connexion(){
		try
		{
			$bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->login, $this->pass);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		}
		catch (PDOException $e)
		{
			$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
			die($msg);
        }
        return $bdd;
	}
    
}
