<?php 

Class ConnectModel{

    public function connectionModel($email){
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    
        $statement = $bdd->prepare('SELECT * FROM membre WHERE email = :email');
        $statement->bindValue(':email', $email);
        $statement->execute();
        $membre = $statement->fetch();
        
        return $membre;
    }
}
