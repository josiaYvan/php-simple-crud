<?php include('./function/conn.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>List || </title>
</head>

<body>
    <div class="container">
        <h1>Listes des users</h1>
        <?php
        $req = 'SELECT * FROM users';
    
        $res = conn()->query($req);
        echo "<table>
            <tr>
                <th>ID </th>
                <th>Nom </th>
                <th>Prenom </th>
                <th>Telephone </th>
                <th>Email</th>
                <th>Genre </th>
                <th colspan=2>Actions </th>
            </tr>";
        while ($data = mysqli_fetch_array($res)) {
            echo "<tr><td>" . $data['id'] . "</td><td>" . $data['nom'] . "</td><td>" . $data['prenom'] . "</td><td>" . $data['tel'] . "</td><td>" . $data['email'] . "</td><td>" . $data['genre'] . "</td><td><a href='http://localhost/ODC/update.php?id=" . $data['id'] . "'>modifier</a></td><td><a href='?id=" . $data['id'] . "'>Supprimer</a></td></tr>";
        }
        echo "</table>";
        if (isset($_GET['id'])) {
            $req = 'DELETE FROM users WHERE id = ' . $_GET['id'] . ' ';
            conn()->query($req);
    
            header("Status: 301 Moved Permanently", false, 301);
            header("Location: http://localhost/ODC/list.php");
        }
        ?>
        <a class="btn " href="index.php">Retour à l'insertion</a>
    </div>
</body>

</html>