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
        $errors_result = array();
        $tranche_age = explode("-", $_GET['age']);
        $loisir = explode(" ", $_GET['loisir']);
        $ville = explode(" ", $_GET['ville']);
        $_GET['ville'] = htmlspecialchars($_GET['ville']);
        $_GET['loisir'] = htmlspecialchars($_GET['loisir']);
        $danger_session_search['danger'] = "Désolé, aucun résultat n'a été trouvé pour cette recherche";

        if(!empty($_GET['ville']) &&  !is_string($_GET['ville']) && !preg_match('/^[a-zA-Z0-9_]+$/', $_GET['ville'])){
            $errors_result['ville'] = "La ville que vous avez saisi n'est pas valide";
        }
        if(!empty($_GET['loisir']) && !is_string($_GET['loisir']) && !preg_match('/^[a-zA-Z0-9_]+$/', $_GET['loisir'])){         
            $errors_result['loisir'] = "Vous devez rentrer un loisir valide";
        }
        
        if(!empty($_SESSION['auth'])) {
            $member = new SearchModel();
            $membre = $member->search_membersModel( 1, $_GET['genre'], $ville[0], $loisir[0], $tranche_age[0], $tranche_age[1]);
            $_SESSION['search_null'] = $danger_session_search;
            $_SESSION['membres'] = $membre;
            var_dump($tranche_age);
            header('Location: ../View/result_search.php');
            return $membre;
        }
    }
}
$member = new SearchController();
$membre = $member->search_membersController();

require_once '../View/footer.php';