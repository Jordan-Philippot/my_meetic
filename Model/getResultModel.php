<?php //require_once '../bdd.php'; 

Class ResultModel{
    public function result_membersModel($id_membre){
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }


        $statement = $bdd->prepare('SELECT * FROM membre WHERE id_membre = :id_membre');
        $statement->bindValue(':id_membre', $id_membre);
        
        $statement->execute();
        $result = $statement->fetch();
        
        return $result;
    }

}