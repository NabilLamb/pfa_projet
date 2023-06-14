<?php
$sqlStm = $pdo->prepare('SELECT * FROM feedback ORDER BY created_at DESC');
$sqlStm->execute();
$comments = $sqlStm->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tableau de feedback</title>
  <!-- Inclure le CSS Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    /* Style personnalisé */
    .table-container {
      margin: 0 auto;
    }

    h2 {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="table-container">
      <h2>Tableau de feedback</h2>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th># ID</th>
            <th>ID Commande</th>
            <th>ID Utilisateur</th>
            <th>Rating</th>
            <th>Commentaire</th>
            <th>Date de création</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($comments as $comment) : ?>
            <tr>
              <td><?php echo $comment->id; ?></td>
              <td><?php echo $comment->idcommande; ?></td>
              <td><?php echo $comment->idUtilisateur; ?></td>
              <td><?php echo $comment->rating; ?></td>
              <td><?php echo $comment->comment; ?></td>
              <td><?php echo $comment->created_at; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
