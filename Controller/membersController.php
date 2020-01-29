<?php 
require_once '../View/header.php';
require_once '../Model/getMembersModel.php';
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}
Class MembersController extends MembersModel{
    
    public function subscribeController(){
        
        $errors = array();
        $_GET['nom'] = htmlspecialchars($_GET['nom']);
        $_GET['prenom'] = htmlspecialchars($_GET['prenom']);
        $_GET['email'] = htmlspecialchars($_GET['email']);
        $_GET['ville'] = htmlspecialchars($_GET['ville']);
        $_GET['password'] = htmlspecialchars($_GET['password']);
        $_GET['password_confirm'] = htmlspecialchars($_GET['password_confirm']);
        $_GET['loisir1'] = htmlspecialchars($_GET['loisir1']);
        $_GET['loisir2'] = htmlspecialchars($_GET['loisir2']);
        $_GET['loisir3'] = htmlspecialchars($_GET['loisir3']);
        $success['registration'] = "Votre inscription a bien été pris en compte";
        
        if(empty($_GET['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_GET['nom']) || !is_string($_GET['nom'])){
            $errors['nom'] = "Votre nom n'est pas valide";
        }
        if(empty($_GET['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_GET['prenom']) || !is_string($_GET['prenom'])){
            $errors['prenom'] = "Votre prenom n'est pas valide";
        }
        
        if(!isset($_GET['date_naissance']) || empty($_GET['date_naissance'])){
            $errors['date_naissance'] = "Veuillez renseigner une date de naissance";
        }
        else{
            $date = new DateTime();
            $date_18 = $date->sub(new DateInterval('P18Y'));
            $date_naissance = new DateTime($_GET['date_naissance']);
            if($date_naissance > $date_18){
                $errors['majeur'] = "Vous devez être majeur pour vous inscrire";
            }
        }
        
        if(!isset($_GET['genre']) || empty($_GET['genre'])){
            $errors['genre'] = "Veuillez renseigner votre genre";
        }
        
        if(empty($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Votre email n'est pas valide";
        }
        else{
            $member = new MembersModel();
            $membre = $member->emailModel($_GET['email']);
            if($membre){
                $errors['email_double'] = 'Cet email est déjà utilisé pour un autre compte.';
            }
        }
        if(!isset($_GET['ville']) || empty($_GET['ville'])){
            $errors['ville'] = "Veuillez renseigner votre ville";
        }
        
        if(!isset($_GET['loisir1']) || $_GET['loisir1'] == $_GET['loisir2'] || $_GET['loisir1'] == $_GET['loisir3']){
            $errors['loisir1'] = "Veuillez renseigner vos loisirs";
        }
        
        if(empty($_GET['password']) || $_GET['password'] != $_GET['password_confirm'] || !is_string($_GET['password'])){
            $errors['password'] = "Vous devez rentrer un mot de passe valide";
        }
        
        if(empty($errors)){
            $_GET['password'] = password_hash($_GET['password'], PASSWORD_BCRYPT);
            $member = new MembersModel();
            $member->subscribeModel($_GET['loisir1'], $_GET['loisir2'], $_GET['loisir3'], $_GET['ville'], $_GET['nom'], $_GET['prenom'], $_GET['date_naissance'], $_GET['genre'], $_GET['email'], $_GET['password']);
            
            $_SESSION['success_signup'] = $success;
            header ("Location: ../View/connection.php");
        }
        else{
            $_SESSION['error'] = $errors;
            header ("Location: ../View/registration.php");
        }
    }
}
$members = new MembersController();
$members->subscribeController();

require_once '../View/footer.php';