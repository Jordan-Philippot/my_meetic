<?php 
require_once '../View/header.php';
require_once '../Model/getSearchModel.php';
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}

Class SearchController extends SearchModel{
    
    public function search_membersController() {
        if(!empty($_SESSION['auth'])) {
            $member = new SearchModel();
            $membre = $member->search_membersModel( 1, $_GET['genre'], $_GET['ville'], $_GET['loisir']);
           
            $_SESSION['membres'] = $membre;
            
            header('Location: ../View/result_search.php');
            return $membre;
        }
    }
}
$member = new SearchController();
$membre = $member->search_membersController();

require_once '../View/footer.php';