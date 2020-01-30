<?php 
require_once '../View/header.php';
require_once '../Model/getResultModel.php';
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}

Class ResultController{
    
    public function Result_membersController(){
        if(!empty($_SESSION['auth'])){
        $member = new ResultModel();
        $membre = $member->result_membersModel($_SESSION['auth']);
        return $membre;
        }
        elseif(empty($_SESSION['auth'])){
            $_SESSION['error'] = true;
            header ("Location: ../View/connection.php");
        }
    }
}
$members = new ResultController();
$members->result_membersController();

require_once '../View/footer.php';
