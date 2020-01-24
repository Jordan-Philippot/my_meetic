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

            $errors = array(); // Je met chaque erreur dans ce tableau et tant qu'il est vide c'est que tout est ok

            $_GET['nom'] = htmlspecialchars($_GET['nom']);
            $_GET['prenom'] = htmlspecialchars($_GET['prenom']);
            $_GET['emai'] = htmlspecialchars($_GET['email']);
            $_GET['ville'] = htmlspecialchars($_GET['ville']);
            $_GET['password'] = htmlspecialchars($_GET['password']);
            $_GET['password_confirm'] = htmlspecialchars($_GET['password_confirm']);

            if(empty($_GET['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_GET['nom']) || !is_string($_GET['nom'])){
                $errors['nom'] = "Votre nom n'est pas valide";
            }
            if(empty($_GET['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_GET['prenom']) || !is_string($_GET['prenom'])){
                $errors['prenom'] = "Votre prenom n'est pas valide";
            }

            if(!isset($_GET['date_naissance']) || empty($_GET['date_naissance'])){
                $errors['date_naissance'] = "Veuillez renseigner une date de naissance";
            }

            if(!isset($_GET['genre']) || empty($_GET['genre'])){
                $errors['genre'] = "Veuillez renseigner votre genre";
            }

            if(empty($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){ // filter_var permet de verifier le type du contenu (plus pratique que preg_match)
                $errors['email'] = "Votre email n'est pas valide";
            }
            /*else{
                $member = new MembersModel();
                $member->emailModel($_GET['email']);
                if($member){ // header ('Location : ../View/connection.php');
                    $errors['email'] = 'Cet email est déjà utilisé pour un autre compte.';
                }
            }*/

            if(!isset($_GET['ville']) || empty($_GET['ville'])){
                $errors['ville'] = "Veuillez renseigner votre ville";
            }

            if(!isset($_GET['loisir1']) || $_GET['loisir1'] == $_GET['loisir2'] || $_GET['loisir1'] == $_GET['loisir3'] || $_GET['loisir2'] == $_GET['loisir3']){
                $errors['loisir1'] = "Veuillez renseigner votre/vos loisir(s) ( 3 Maximum)";
            }

            if(empty($_GET['password']) || $_GET['password'] != $_GET['password_confirm'] || !is_string($_GET['password'])){
            $errors['password'] = "Vous devez rentrer un mot de passe valide";
            }
            var_dump($errors);
            if(empty($errors)){
                $member = new MembersModel();
                $member->subscribeModel($_GET['loisir1'], $_GET['loisir2'], $_GET['loisir3'], $_GET['ville'], $_GET['nom'], $_GET['prenom'], $_GET['date_naissance'], $_GET['genre'], $_GET['email'], $_GET['password']);
                
                //die('Votre compte a bien été créé');
               
                //header ('Location : View/connection.php');
            }
        
        
        
    }
     
}

$members = new MembersController();
$members->subscribeController($_GET['loisir1'], $_GET['loisir2'], $_GET['loisir3'], $_GET['ville'], $_GET['nom'], $_GET['prenom'], $_GET['date_naissance'], $_GET['genre'], $_GET['email'], $_GET['password']);
var_dump($members);


require_once '../View/footer.php';