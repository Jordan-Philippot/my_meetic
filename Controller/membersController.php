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
        $_POST['nom'] = htmlspecialchars($_POST['nom']);
        $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
        $_POST['email'] = htmlspecialchars($_POST['email']);
        $_POST['ville'] = htmlspecialchars($_POST['ville']);
        $_POST['password'] = htmlspecialchars($_POST['password']);
        $_POST['password_confirm'] = htmlspecialchars($_POST['password_confirm']);
        $_POST['loisir1'] = htmlspecialchars($_POST['loisir1']);
        $_POST['loisir2'] = htmlspecialchars($_POST['loisir2']);
        $_POST['loisir3'] = htmlspecialchars($_POST['loisir3']);
        $success['registration'] = "Votre inscription a bien été pris en compte";
        
        if(empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nom']) || !is_string($_POST['nom'])){
            $errors['nom'] = "Votre nom n'est pas valide";
        }
        if(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['prenom']) || !is_string($_POST['prenom'])){
            $errors['prenom'] = "Votre prenom n'est pas valide";
        }
        
        if(!isset($_POST['date_naissance']) || empty($_POST['date_naissance'])){
            $errors['date_naissance'] = "Veuillez renseigner une date de naissance";
        }
        else{
            $date = new DateTime();
            $date_18 = $date->sub(new DateInterval('P18Y'));
            $date_naissance = new DateTime($_POST['date_naissance']);
            if($date_naissance > $date_18){
                $errors['majeur'] = "Vous devez être majeur pour vous inscrire";
            }
        }
        
        if(!isset($_POST['genre']) || empty($_POST['genre'])){
            $errors['genre'] = "Veuillez renseigner votre genre";
        }
        
        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Votre email n'est pas valide";
        }
        else{
            $member = new MembersModel();
            $membre = $member->emailModel($_POST['email']);
            if($membre){
                $errors['email_double'] = 'Cet email est déjà utilisé pour un autre compte.';
            }
        }
        if(!isset($_POST['ville']) || empty($_POST['ville'])){
            $errors['ville'] = "Veuillez renseigner votre ville";
        }
        
        if(!isset($_POST['loisir1']) || $_POST['loisir1'] == $_POST['loisir2'] || $_POST['loisir1'] == $_POST['loisir3']){
            $errors['loisir1'] = "Veuillez renseigner vos loisirs";
        }
        
        if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm'] || !is_string($_POST['password'])){
            $errors['password'] = "Vous devez rentrer un mot de passe valide";
        }
        
        if(empty($errors)){
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $member = new MembersModel();
            $member->subscribeModel($_POST['loisir1'], $_POST['loisir2'], $_POST['loisir3'], $_POST['ville'], $_POST['nom'], $_POST['prenom'], $_POST['date_naissance'], $_POST['genre'], $_POST['email'], $_POST['password']);
            
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