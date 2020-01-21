<?php require_once 'header.php';?>

    <div id="container_profil">
        <h1> Profil </h1>

       <?php if($member->rowCount() > 0){
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
    }?>
    </div>

<?php require_once 'footer.php'; 