<?php require_once '../View/header.php';?>

    <div id="container_profil">
        <h1> Profil </h1>

    <?php
    if(isset($_GET['profil'])){

      $members = $bdd->query('SELECT membre.id_perso AS "id_perso", membre.nom AS "nom", membre.prenom AS "prenom", membre.date_naissance AS "date_naissance", 
      membre.ville AS "ville", membre.email AS "email", membre.cpostal AS "cpostal", membre.date_inscription AS "date_inscription", membre.id_membre AS "id_membre", 
      membre.id_abo AS "id_abo", membre.date_abo AS "date_abo" FROM membre INNER JOIN membre ON membre.id_perso = membre.id_fiche_perso 
      WHERE nom LIKE "%'.$search_members.'%" ORDER BY nom ASC LIMIT '.$begin.','.$resultPerPage.'');
      
    if($member->rowCount() > 0){
      echo '<div class="member_profil">';
      
      while($member_profil = $member->fetch()){
      echo '<div class="card">
          <a href="'.$member_profil['nom'].'"><img width="100%" src="'.$member_profil['prenom'].'" alt="'.$member_profil['date_naissance'].'"></a>
          <div class="member_body">
            <h5>'.$member_profil['genre'].' </h5>
            <p class="member_footer">'.$member_profil['email'].'</p>
            <small class="text-muted">'.$member_profil['date_inscription'].'</small>
        </div>
      </div>';
      }
    else {
        echo '<div class="error_member">
            Veuillez nous excusez, aucun résultat n\'a été trouvé pour ce membre: "'.$search.'" ...
          </div>';
    }
  }?>
    </div>

<?php require_once '../View/footer.php';