<?php 
require_once '../View/header.php';
require_once '../Model/getProfilModel.php';
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}

Class ProfilController{
    
    public function ProfilerController(){
        if(!empty($_SESSION['auth'])){
        $member = new ProfilModel();
        $membre = $member->ProfilerModel($_SESSION['auth']);
        return $membre;
        }
        elseif(empty($_SESSION['auth'])){
            $_SESSION['error'] = true;
            header ("Location: ../View/connection.php");
        }
    }
}
require_once '../View/footer.php';
