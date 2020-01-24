<?php require_once '../bdd.php'; 

Class MembersModel extends Connexion{

    public function subscribeModel($id_loisir, $id_loisir2, $id_loisir3, $id_ville, $nom, $prenom, $date_naissance, $genre, $email, $password, $etat){

        $sql = 'INSERT INTO membre (id_loisir, id_loisir2, id_loisir3, id_ville, nom, prenom, date_naissance, genre, email, password)
        VALUES ( :id_loisir, :id_loisir2, :id_loisir3, :id_ville, :nom, :prenom, :date_naissance, :genre, :email, :password';

        $statement = $this->Connexion()->prepare($sql);

        $password = password_hash(":password", PASSWORD_BCRYPT);

        $statement->bindParam(':id_loisir', $id_loisir, PDO::PARAM_INT);
        $statement->bindParam(':id_loisir2', $id_loisir2, PDO::PARAM_INT);
        $statement->bindParam(':id_loisir3', $id_loisir3, PDO::PARAM_INT);
        $statement->bindParam(':id_ville', $id_ville, PDO::PARAM_INT);
        $statement->bindParam(":nom", $nom, PDO::PARAM_STR());
        $statement->bindParam(":prenom", $prenom, PDO::PARAM_STTR());
        $statement->bindParam(":date_naissance", $date_naissance, PDO::PARAM_DATE());
        $statement->bindParam(":genre", $genre, PDO::PARAM_STR());
        $statement->bindParam(":email", $email, PDO::PARAM_STR());
        $statement->bindParam(":password", $password, PDO::PARAM_STR());
        return $statement->execute();
    }

 
    public function emailModel(){
        $sql = 'SELECT id_membre FROM membre WHERE email = :email';
        $statement = $this->Connexion()->prepare($sql);
        $statement->execute();
        $statement = $statement->fetch();
    }

    public function connection(){
        $sql = 'SELECT email, password FROM membre WHERE email = :email AND password = :password';
        $statement = $this->Connexion()->prepare($sql);
        $statement->execute();
        $statement = $statement->fetch();
    }


}