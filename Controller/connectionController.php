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

        $errors = array();

        $_GET['email'] = htmlspecialchars($_GET['email']);
        $_GET['password'] = htmlspecialchars($_GET['password']);
        $_SESSION['error'] = 'E-mail ou mot de passe incorrecte';
        $_SESSION['welcome'] = '<p>Bienvenue sur meetic '. $prenom.' !</p>';

        if(empty($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){ // filter_var permet de verifier le type du contenu (plus pratique que preg_match)
                $errors['email'] = "Votre email n'est pas valide";
        }

        if(empty($_GET['password']) || !is_string($_GET['password'])){
            $errors['password'] = "Vous devez rentrer un mot de passe valide";
        }

        if(empty($errors)){
            $member = new ConnectModel();
            $membre = $member->connectionModel($_GET['email']);
            
            if(password_verify($_GET['password'], $membre['password'])){
                $_SESSION['auth'] = $membre;
                header('Location: ../View/index_member.php');
                echo $_SESSION['welcome'];
                //die($_SESSION['welcome']);
            }
            else{
                header ("Location: ../View/connection.php");
                echo $SESSION['error'];
                echo '<div class="alert-danger">
                <p>Vous n\'avez pas rempli le formulaire correctement</p>
                <ul>';
                foreach($errors as $error){
                    echo'<li>'.$error.' </li>';
                }
                echo'</ul>
                </div>';
            };
        }
        else{
            header ("Location: ../View/connection.php");
            echo $SESSION['error'];
             echo '<div class="alert-danger">
            <p>Vous n\'avez pas rempli le formulaire correctement</p>
            <ul>';
            foreach($errors as $error){
                echo'<li>'.$error.' </li>';
            }
            echo'</ul>
            </div>';
        };
         /*else{
            die();
            exit();
        }
       */
     
    }
}

$member = new ConnectController();
$membre = $member->connectionController($_GET['email']);

require_once '../View/footer.php';
