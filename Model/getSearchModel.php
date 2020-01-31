<?php //require_once '../bdd.php';
Class SearchModel{
    public function search_membersModel($etat, $genre, $ville, $loisir, $age1, $age2){
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }

        $sql = 'SELECT *, FLOOR(DATEDIFF(NOW(), date_naissance) / 365.25) AS "age_membre" FROM membre WHERE etat = :etat';

        if(!empty($_GET['genre'])){
            $sql .= ' AND genre = :genre';
        }
        if(!empty($_GET['ville'])){
            $sql .= ' AND ville = :ville';
        }
        if(!empty($_GET['loisir'])){
            $sql .= ' AND (loisir1 = :loisir OR loisir2 = :loisir OR loisir3 = :loisir)';
        }

        if(!empty($_GET['age'])){
            $sql .= ' AND FLOOR(DATEDIFF(NOW(), date_naissance) / 365.25) BETWEEN :age1 AND :age2';
        }

       
        // EXPLODE LOISIR = espace puis boucle sur explode */

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
        if(!empty($_GET['age'])){
            $statement->bindValue(':age1', $age1);
            $statement->bindValue(':age2', $age2);
        }
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