<?php
require_once '../View/header.php';
require_once '../Model/getEditModel.php';

Class EditController extends EditModel{
    
    public function edittController(){
        $errors_edit = array();
        $_POST['email_modif'] = htmlspecialchars($_POST['email_modif']);
        $_POST['password_modif'] = htmlspecialchars($_POST['password_modif']);
        $success_edit['success'] = "Votre modification à bien été prise en compte.";

        if(!empty($_POST['email_modif']) && !filter_var($_POST['email_modif'], FILTER_VALIDATE_EMAIL)){
            $errors_edit['email_modif'] = "Votre email n'est pas valide";
        }
        if(!empty($_POST['password_modif']) && !is_string($_POST['password_modif'])){           //&& !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password_modif'])
            $errors_edit['password_modif'] = "Vous devez rentrer un mot de passe valide";
        }

        if(!empty($_POST['email_modif']) && empty($errors_edit)){
            $member = new EditModel();
            $email_verify = $member->edit_email_verifyModel($_POST['email_modif']);
            var_dump($email_verify);

            if(empty($email_verify)){
                $_SESSION['success_edit'] = $success_edit;
                $member = new EditModel();
                $membre = $member->edit_mailModel($_SESSION['auth'], $_POST['email_modif']);
                header('Location: ../View/profil.php');
                var_dump($email_verify);
            }
            else{
                $errors_edit['email_double'] = 'Cet email est déjà utilisé pour un autre compte.';
                $_SESSION['error_edit'] = $errors_edit;
                header('Location: ../View/edit.php');
            }
        }

        if(!empty($_POST['password_modif']) && empty($errors_edit)){
            $_POST['password_modif'] = password_hash($_POST['password_modif'], PASSWORD_BCRYPT);
            $_SESSION['success_edit'] = $success_edit;
            $member = new EditModel();
            $membre = $member->edit_passwordModel($_SESSION['auth'], $_POST['password_modif']);
            //if(password_verify($_POST['password_modif'], $membre['password'])){
            header('Location: ../View/profil.php');
        }
    
        if(!empty($errors_edit)){
            $_SESSION['error_edit'] = $errors_edit;
            header ("Location: ../View/edit.php");
        };  


        if(isset($_POST['delete'])){
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

