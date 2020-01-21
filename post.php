<?php require_once 'header.php'; 
 
//require_once 'bdd.php';

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

if(!isset($_POST['loisir']) || empty($_POST['loisir'])){
    $errors['loisir'] = "Veuillez renseigner votre/vos loisir(s) ( 3 Maximum)";
}


if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm'] || !is_string($_POST['password'])){
  $errors['password'] = "Vous devez rentrer un mot de passe valide";
}

if(empty($errors)){
  
  $request = $bdd->prepare('INSERT INTO membre (nom, prenom, date_naissance, genre, email, ville, loisir, password) VALUES nom = ?, prenom = ?, date_naissance = ?, genre =?, email = ?, ville = ?, loisir = ?, password = ?'); // Si tout est Ok : Je prepare ma requete, je crypte le mdp et j'execute.
  
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  $request->execute([$_POST['nom'], $_POST['prenom'], $_POST['date_naissance'],  $_POST['genre'], $_POST['email'], $_POST['ville'],  $_POST['loisir'], $password]);

  //$_SESSION['flash']['success'] = 'Votre compte a bien été crée, vous pouvez dès a présent vous connecter';
// IF LOISIR 1 != LOISIR 2 && LOISIR 1!= LOISIR 3 && LOISIR 2 != LOISIR 3
 // header('Location: connection.php');
  
  die('Votre compte a bien été créé');

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

