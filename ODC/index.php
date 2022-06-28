<?php include('./function/conn.php')  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ODC  ty ||</title>
</head>
<body>

<?php

if($_GET){
    $genre = null;
    if(isset($_GET['M'])) {
        $_GET['genre'] = 'M';
    } else if (isset($_GET['F'])) {
        $_GET['genre'] = 'F';
    }   
    $req = "INSERT INTO users(nom, prenom, tel, email, genre) VALUES ('".$_GET['nom']."', '".$_GET['prenom']."', '".$_GET['tel']."', '".$_GET['email']."', '".$_GET['genre']."') ";
    $res = conn()->query($req);
    
    if($res){
        echo('insertion OK');
        header("Status: 301 Moved Permanently", false, 301);
        header("Location: http://localhost/ODC/list.php");
    }else{
        echo('insertion BAD'. mysqli_error(conn()));
        
    }
    // echo "<pre>";
    // var_dump($_GET['genre']);
    // echo "</pre>";
}

?>
    
    <div class="container">
        <form action=""  method="GET" class="container">
            <h1>Formulaire d'insertion d'user</h1>
            <span> <a href="list.php">Voir la liste</a> </span>
            <div class="input-field">
              <input type="text" name="nom" placeholder="Nom" required />
            </div>
            <div class="input-field">
              <input type="text" name="prenom" placeholder="Prenom" required >
            </div>
            <div class="input-field">
              <input type="text" name="tel" placeholder="Telephone" required />
            </div>
            <div class="input-field">
              <input type="text" name="email" placeholder="Email" required />
            </div>
            <div class="input-field">
              <p>Genre</p>
              <p>
                <label>
                  <input type="radio" value="M" name="genre" />
                  <span>Mâle</span>
                </label>
              </p>
              <p>
                <label>
                  <input type="radio" value="F" name="genre" />
                  <span>Femelle</span>
                </label>
              </p>
            </div>
            <div class="input-field">
              <button type="submit" class="btn">Submit</button>
            </div>
          </form>
    </div>
</body>
</html>