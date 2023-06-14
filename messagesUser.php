<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php' ?>
    <title>Liste des Messages</title>
</head>
<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
    <h2>Liste des Messages</h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Client</th>
            <th>Sujet</th>
            <th>Message</th>
            <th>Date</th>
            <th>Opérations</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'include/database.php';
        $messages = $pdo->query('SELECT contact.*,utilisateur.login as "login" FROM contact INNER JOIN utilisateur ON contact.id_utilisateur = utilisateur.id ORDER BY contact.date_message DESC')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($messages as $message) {
            ?>
            <tr>
                <td><?php echo $message['id'] ?></td>
                <td><?php echo $message['login'] ?></td>
                <td><?php echo $message['sujet'] ?></td>
                <td><?php echo $message['message'] ?></td>
                <td><?php echo $message['date_creation'] ?></td>
                <td><a class="btn btn-primary btn-sm" href="message.php?id=<?php echo $message['id']?>">Afficher détails</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>