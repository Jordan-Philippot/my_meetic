<?php //require_once '../bdd.php'; 
Class EditModel{

    public function edit_mailModel($id_membre, $email){
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    
        $statement = $bdd->prepare('UPDATE membre SET email = :email WHERE id_membre = :id_membre');
        $statement->bindValue(':id_membre', $id_membre);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $membre = $statement->fetch();
        
        return $membre;
    }

    public function edit_passwordModel($id_membre, $password){
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    
        $statement = $bdd->prepare('UPDATE membre SET password = :password WHERE id_membre = :id_membre');
        $statement->bindValue(':id_membre', $id_membre);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $membre = $statement->fetch();
        
        return $membre;
    }

    public function edit_email_verifyModel($email_verify){
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        $statement = $bdd->prepare('SELECT email FROM membre WHERE email = :email');
        $statement->bindValue(':email', $email_verify);
        $statement->execute();
        $email_verify = $statement->fetch();
        
        return $email_verify;
    }

     public function edit_deleteModel($id_membre){
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        $statement = $bdd->prepare('UPDATE membre SET etat = 0 WHERE id_membre = :id_membre');
        $statement->bindValue(':id_membre', $id_membre);
        $statement->execute();
        $id_membre = $statement->fetch();
        
        return $id_membre;
    }
}