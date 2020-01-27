<?php //require_once '../bdd.php'; 
require_once '../Controller/membersController.php'; 

Class MembersModel{

    public function subscribeModel($loisir1, $loisir2, $loisir3, $ville, $nom, $prenom, $date_naissance, $genre, $email, $password){
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
                die('Erreur : ' . $e->getMessage());
        }

        $statement = $bdd->prepare('INSERT INTO membre (loisir1, loisir2, loisir3, ville, nom, prenom, date_naissance, genre, email, password)
        VALUES ( :loisir1, :loisir2, :loisir3, :ville, :nom, :prenom, :date_naissance, :genre, :email, :password)');

        $statement->bindValue(':loisir1', $loisir1);
        $statement->bindValue(':loisir2', $loisir2);
        $statement->bindValue(':loisir3', $loisir3);
        $statement->bindValue(':ville', $ville);
        $statement->bindValue(':nom', $nom);
        $statement->bindValue(':prenom', $prenom);
        $statement->bindValue(':date_naissance', $date_naissance);
        $statement->bindValue(':genre', $genre);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);

        $statement->execute();
       
        return $statement;
    }

 
    /*public function emailModel($id_membre, $email){
       try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
                die('Erreur : ' . $e->getMessage());
        }
        $statement-> $bdd = ('SELECT id_membre FROM membre WHERE email = :email');
        $statement->bindValue(':email', $email);
        //$statement->bindValue(lastInsertId(), $id_membre);
        $statement->execute();

        $id_membre = $statement->lastInsertId();
        return $statement;
    }*/
}