<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/feedback.css" />
</head>
<body>
  <script>
    // Fonction pour fermer la popup
    function closePopup() {
      document.getElementById('popup').style.display = 'none';
      document.getElementById('overlay').style.display = 'none';
    }
  </script>

  <div id="popup" class="popup">
    <span onclick="closePopup()" style="float: right; cursor: pointer;">X</span>
    <h2 class="popup-title">Partagez votre opinion (Your feedback) </h2>
    <p class="popup-text">Votre avis est essentiel pour nous ! Nous nous engageons à améliorer c
        ontinuellement l'expérience de nos clients, et nous souhaiterions connaître 
        votre opinion. Vos retours nous permettront de perfectionner nos produits et 
        services afin de mieux répondre à vos besoins. N'hésitez pas à partager vos 
        commentaires, suggestions ou idées avec nous. Nous sommes reconnaissants de 
        votre soutien et nous nous efforçons de vous offrir une expérience 
        exceptionnelle.</p>
    <span>Veuillez choisir votre niveau de satisfaction en sélectionnant 
        de 1 à 5 étoiles :</span>

    <form method="post">
      <div class="rating">
        <input type="radio" id="star5" name="rating" value="5">
        <label for="star5"></label>
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4"></label>
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3"></label>
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2"></label>
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1"></label>
       </div>

       <br>

        <label for="comment">Commentaire :</label>
        <br>
        <textarea id="comment" name="comment"></textarea>
        <br><br>

        <button type="submit" name="soumettre">Soumettre</button>
    </form>
  </div>
  <div id="overlay" class="overlay"></div>

  <?php

 
  try {
    require_once '../include/database.php';

    $close = false;
    if(isset($_POST['soumettre'])){
      $rating = $_POST['rating'];
      $comment = $_POST['comment'];
      $idCommande = $_GET['idCommande'] ?? null;

      $query = "INSERT INTO feedback (idcommande, idUtilisateur, rating, comment, created_at) VALUES (:idCommande, :idUtilisateur, :rating, :comment, CURRENT_TIMESTAMP)";

      $statement = $pdo->prepare($query);
      $statement->bindParam(':idCommande', $idCommande);
      $statement->bindParam(':idUtilisateur', $idUtilisateur);
      $statement->bindParam(':rating', $rating);
      $statement->bindParam(':comment', $comment);
      $statement->execute();

      $pdo = null;

      $close = true;

      if($close){
        // Afficher un script JavaScript pour fermer la popup après la soumission des données
        echo '<script>closePopup();</script>';
      }
    }
  } catch (PDOException $e) {
    echo 'Une erreur s\'est produite : ' . $e->getMessage();
  }
  ?>
</body>
</html>
