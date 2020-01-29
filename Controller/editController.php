<?php
require_once '../View/header.php';
require_once '../Model/getEditModel.php';
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_meetic;charset=utf8', 'root', 'root');
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}

Class EditController extends EditModel{
    
    public function edittController(){
        $errors_edit = array();
        $_GET['email_modif'] = htmlspecialchars($_GET['email_modif']);
        $_GET['password_modif'] = htmlspecialchars($_GET['password_modif']);
        $success_edit['success'] = "Votre modification à bien été prise en compte.";

        if(!empty($_GET['email_modif']) && !filter_var($_GET['email_modif'], FILTER_VALIDATE_EMAIL)){
            $errors_edit['email_modif'] = "Votre email n'est pas valide";
        }
        if((!empty($_GET['password_modif']) && !is_string($_GET['password_modif']))){ /*|| (!empty($_GET['password_modif']) && !preg_match('/^[a-zA-Z0-9_]+$/', $_GET['password_modif']))*/
            $errors_edit['password_modif'] = "Vous devez rentrer un mot de passe valide";
        }


        if(!empty($_GET['email_modif']) && empty($errors_edit)){
            $member = new EditModel();
            $email_verify = $member->edit_email_verifyModel($_GET['email_modif']);
            var_dump($email_verify);

            if(empty($email_verify)){
                $_SESSION['success_edit'] = $success_edit;
                $member = new EditModel();
                $membre = $member->edit_mailModel($_SESSION['auth'], $_GET['email_modif']);
                header('Location: ../View/profil.php');
                var_dump($email_verify);
            }
            else{
                $errors_edit['email_double'] = 'Cet email est déjà utilisé pour un autre compte.';
                $_SESSION['error_edit'] = $errors_edit;
                header('Location: ../View/edit.php');
            }
        }

        if(!empty($_GET['password_modif']) && empty($errors_edit)){
            $_GET['password_modif'] = password_hash($_GET['password_modif'], PASSWORD_BCRYPT);
            $_SESSION['success_edit'] = $success_edit;
            $member = new EditModel();
            $membre = $member->edit_passwordModel($_SESSION['auth'], $_GET['password_modif']);
            //if(password_verify($_GET['password_modif'], $membre['password'])){
            header('Location: ../View/profil.php');
        }
    
        if(!empty($errors_edit)){
            $_SESSION['error_edit'] = $errors_edit;
            header ("Location: ../View/edit.php");
        };  


        if(isset($_GET['delete'])){
            $delete_edit = "Votre compte à bien été desactivé.";
            $_SESSION['delete_edit'] = $delete_edit;
            $member = new EditModel();
            $membre = $member->edit_deleteModel($_SESSION['auth']);
            header('Location: ../View/connection.php');
        }
    }
}
$member = new EditController();
$membre = $member->edittController();

require_once '../View/footer.php';
