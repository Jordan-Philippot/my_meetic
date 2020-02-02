<?php 
require_once '../View/header.php';
require_once '../Model/getConnectModel.php';
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}
Class ConnectController extends ConnectModel{
    
    public function connectionController(){
     
        $errors_connect = array();
        $_POST['email'] = htmlspecialchars($_POST['email']);
        $_POST['password'] = htmlspecialchars($_POST['password']);
        $success_co['success'] = "Bienvenue ! Vous êtes maintenant connnecté.";
        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors_connect['email'] = "Votre email n'est pas valide";
        }
        if(empty($_POST['password']) || !is_string($_POST['password'])){
            $errors_connect['password'] = "Vous devez rentrer un mot de passe valide";
        }
        if(empty($errors_connect)){
            $member = new ConnectModel();
            $membre = $member->connectionModel($_POST['email']);
            if(password_verify($_POST['password'], $membre['password']) && $membre['etat'] != 0){
                $_SESSION['auth'] = $membre['id_membre'];
                $_SESSION['success_co'] = $success_co;
                header('Location: ../View/index_member.php');
            }
            elseif($membre['etat'] == 0){
                $inactive['inactived'] = "Votre compte n'est plus actif";
                $_SESSION['inactive'] = $inactive;
                header ("Location: ../View/connection.php");
            }
            else{
                $errors_connect['password_verify'] = "Votre mot de passe est incorrecte";
                $_SESSION['error_connect'] = $errors_connect;
                header ("Location: ../View/connection.php");
            };
        }
        else{
            $_SESSION['error_connect'] = $errors_connect;
            header ("Location: ../View/connection.php");
        };
    }
}
$member = new ConnectController();
$membre = $member->connectionController();

require_once '../View/footer.php';