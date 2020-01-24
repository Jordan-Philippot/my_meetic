<?php require_once '../bdd.php';
 require_once '../View/header.php';

  // MODEL SEUL LIEN AVEC BDD 
 // CONTROLLER SEUL LIEN AVEC LE MODEL ET FAIT LE LIEN ENTRE MODEL ET VIEW 
 //DANS CONTROLLER JINSTANCIE UN NOUVEL MODEL A CHACUNE DE MES FONCTIONS  
//require_once 'bdd.php';
//require_once 'bdd.php';
Class SubscribeController extends Connexion{

    protected function SubscribeController($id_loisir, $id_loisir2, $id_loisir3, $id_ville, $nom, $prenom, $date_naissance, $genre, $email, $password, $date_inscription, $etat){
    
      if(!empty($_POST)){

        $errors = array(); // Je met chaque erreur dans ce tableau et tant qu'il est vide c'est que tout est ok

        if(empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nom']) || !is_string($_POST['nom'])){
            $errors['nom'] = "Votre nom n'est pas valide";
        }
        if(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['prenom']) || !is_string($_POST['prenom'])){
            $errors['prenom'] = "Votre prenom n'est pas valide";
        }
        else{
          $request = $bdd->prepare('SELECT id_membre FROM membre WHERE nom = ?');
          $request_name = $bdd->prepare('SELECT id_membre FROM membre WHERE prenom = ?');
          $request->execute([$_POST['nom']]);
          $request_name->execute([$_POST['prenom']]);
          $user = $request->fetch();
          $user_name = $request_name->fetch();
          if($user && $user_name){
            $errors['prenom'.' '.'nom'] = 'Cette personne existe déjà dans nos fichiers.';
          }
        }

        if(!isset($_POST['date_naissance']) || empty($_POST['date_naissance'])){
            $errors['date_naissance'] = "Veuillez renseigner une date de naissance";
        }

        if(!isset($_POST['genre']) || empty($_POST['genre'])){
            $errors['genre'] = "Veuillez renseigner votre genre";
        }

        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ // filter_var permet de verifier le type du contenu (plus pratique que preg_match)
            $errors['email'] = "Votre email n'est pas valide";
        }
        else{
          $request = $bdd->prepare('SELECT id_membre FROM membre WHERE email = ?');
          $request->execute([$_POST['email']]);
          $user = $request->fetch();
          if($user){
            $errors['email'] = 'Cet email est déjà utilisé pour un autre compte.';
          }
        }

        if(!isset($_POST['ville']) || empty($_POST['ville'])){
            $errors['ville'] = "Veuillez renseigner votre ville";
        }

        if(!isset($_POST['loisir1']) || $_POST['loisir1'] == $_POST['loisir2'] || $_POST['loisir1'] == $_POST['loisir3'] || $_POST['loisir2'] == $_POST['loisir3']){
            $errors['loisir1'] = "Veuillez renseigner votre/vos loisir(s) ( 3 Maximum)";
        }

        if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm'] || !is_string($_POST['password'])){
          $errors['password'] = "Vous devez rentrer un mot de passe valide";
        }

        if(empty($errors)){
            $sql = 'INSERT INTO membre (id_loisir, id_loisir2, id_loisir3, id_ville, nom, prenom, date_naissance, genre, email, password, date_inscription, etat) 
            VALUES id_loisir = ?, id_loisir2 = ?, id_loisir3 = ?, id_ville = ?, nom = ?, prenom = ?, date_naissance =?, genre = ?, email = ?, password = ?, date_inscription = NOW(), etat = 1';
            $statement = $this->Connexion()->prepare($sql);

            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $statement->bindParam(":id_loisir", $id_loisir, PDO::PARAM_INT);
            $statement->bindParam(":id_loisir2", $id_loisir2, PDO::PARAM_INT);
            $statement->bindParam(':id_loisir3', $id_loisir3, PDO::PARAM_INT);
            $statement->bindParam(":id_ville", $id_ville, PDO::PARAM_INT);
            $statement->bindParam(":nom", $nom, PDO::PARAM_STR());
            $statement->bindParam(':prenom', $prenom, PDO::PARAM_STTR());
            $statement->bindParam(":date_naissance", $date_naissance, PDO::PARAM_STR());
            $statement->bindParam(":genre", $genre, PDO::PARAM_STR());
            $statement->bindParam(':email', $email, PDO::PARAM_STR());
            $statement->bindParam(":password", $password, PDO::PARAM_STR());
            $statement->bindParam(":date_inscription", $date_inscription, PDO::PARAM_STR());
            $statement->bindParam(':etat', $etat, PDO::PARAM_INT);
            $statement->execute([$_POST['loisir1'], $_POST['loisir2'], $_POST['loisir3'], $_POST['ville'], $_POST['nom'], $_POST['prenom'], $_POST['date_naissance'],  $_POST['genre'], $_POST['email'], $password, $_POST['date_inscription'], $_POST['etat']]);

            die('Votre compte a bien été créé');
            echo'bonjour';
        }


      }




  
  /*$request = $bdd->prepare('INSERT INTO membre (id_loisir, id_loisir2, id_loisir3, id_ville, nom, prenom, date_naissance, genre, email, password, date_inscription, etat) 
  VALUES id_loisir = ?, id_loisir2 = ?, id_loisir3 = ?, id_ville = ?, nom = ?, prenom = ?, date_naissance =?, genre = ?, email = ?, password = ?, date_inscription = NOW(), etat = 1'); // Si tout est Ok : Je prepare ma requete, je crypte le mdp et j'execute.
  

  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  $request->execute([$_POST['loisir1'], $_POST['loisir2'], $_POST['loisir3'], $_POST['ville'], $_POST['nom'], $_POST['prenom'], $_POST['date_naissance'],  $_POST['genre'], $_POST['email'], $password, $_POST['date_inscription'], $_POST['etat']]);

  //$_SESSION['flash']['success'] = 'Votre compte a bien été crée, vous pouvez dès a présent vous connecter';
// IF LOISIR 1 != LOISIR 2 && LOISIR 1!= LOISIR 3 && LOISIR 2 != LOISIR 3
 // header('Location: connection.php');*/
  


  }

}

        
if(!empty($errors)): ?> 
  <div class='error'>
    <p>Vous n'avez pas rempli le formulaire correctement</p>
    <ul>
      <?php foreach($errors as $error): ?>
        <li><?= $error; ?></li>
      <?php endforeach;?>
    </ul>
  </div>
<?php endif;
require_once 'footer.php'; 
