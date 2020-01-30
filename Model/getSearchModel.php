<?php //require_once '../bdd.php';
Class SearchModel{
    public function search_membersModel($etat, $genre, $ville, $loisir){
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }

        $sql = 'SELECT * FROM membre WHERE etat = :etat';

        if(!empty($_GET['genre'])){
            $sql .= ' AND genre = :genre';
        }
        if(!empty($_GET['ville'])){
            $sql .= ' AND ville = :ville';
        }
        if(!empty($_GET['loisir'])){
            $sql .= ' AND (loisir1 = :loisir OR loisir2 = :loisir OR loisir3 = :loisir)';
        }

        /*
 
        /*if(isset($_GET['age'])){
            $sql .= 'AND age = :age ';
        }*/
        // EXPLODE LOISIR = espace puis boucle sur explode 

        $statement = $bdd->prepare($sql);
        $statement->bindValue(':etat', $etat);
        if(!empty($_GET['genre'])){
            $statement->bindValue(':genre', $genre);
        }
        if(!empty($_GET['ville'])){
            $statement->bindValue(':ville', $ville);
        }
        if(!empty($_GET['loisir'])){
            $statement->bindValue(':loisir', $loisir);
        }
        /*if(isset($_GET['age'])){
            $statement->bindValue(':age', $age);
        }*/
        $statement->execute();
        $membre = $statement->fetchAll();
        return $membre;
    }



       /* public function ageModel($date_naissance){
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        $statement = $bdd->prepare('SELECT date_naissance FROM membre WHERE etat = 1');
        $statement->bindValue(':date_naissance', $date_naissance);
        $statement->execute();
        $date_naissance = $statement->fetch();
        
        return $date_naissance;
    }*/

       /* public function content_searchModel($id_membre){
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    
        $statement = $bdd->prepare('SELECT * FROM membre WHERE id_membre IN (:id_membre)');
        $statement->bindValue(':id_membre', $id_membre);
        $statement->execute();
        $membre = $statement->fetchAll();

        return $membre;*/
    }