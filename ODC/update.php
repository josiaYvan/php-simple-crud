<?php include('./function/conn.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update</title>
</head>
<body>
    <?php 
        $req = "SELECT * FROM users WHERE id=".$_GET['id']." ";
        $res = conn()->query($req);
        $data = mysqli_fetch_array($res);
        
?>
    <div class="container">
        <form action=""  method="post" class="container">
            <h1>update user <i>"<?php   echo($data['nom']) ?>"</i> </h1>
            <!-- <span> <a href="list.php">Voir la liste</a> </span> -->
            <div class="input-field">
              <input type="text" name="nom" placeholder="Nom" value="<?php   echo($data['nom']) ?>" required />
            </div>
            <div class="input-field">
              <input type="text" name="prenom" placeholder="Prenom" value="<?php   echo($data['prenom']) ?>" required >
            </div>
            <div class="input-field">
              <input type="text" name="tel" placeholder="Telephone" value="<?php   echo($data['tel']) ?>" required />
            </div>
            <div class="input-field">
              <input type="text" name="email" placeholder="Email" value="<?php   echo($data['email']) ?>" />
            </div>
            <div class="input-field">
              <p>Genre</p>
              <p>
                <label>
                  <input type="radio" value="M" <?php echo($data['genre'] == 'M') ? 'checked' :  "" ?> name="genre" />
                  <span>Mâle</span>
                </label>
              </p>
              <p>
                <label>
                  <input type="radio" value="F" <?php echo($data['genre'] == 'F') ? 'checked' : "" ?> name="genre" />
                  <span>Femelle</span>
                </label>
              </p>
            </div>
            <div class="input-field">
              <button type="submit" class="btn">Mettre à jour</button>
              <a href="list.php">Liste des users</a>
            </div>
          </form>
    
          <?php
                if(isset($_POST['nom'])){
                    $req = "UPDATE users SET nom ='".$_POST['nom']."', prenom ='".$_POST['prenom']."', tel ='".$_POST['tel']."', email ='".$_POST['email']."', genre ='".$_POST['genre']."' WHERE id='".$_GET['id']."' ";
                    $res = conn()->query($req);
                    print_r($_POST);
                    header("Status: 301 Moved Permanently", false, 301);
                    header("Location: http://localhost/ODC/list.php");
                }
          ?>

    </div>
</body>
</html>