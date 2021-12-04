<?php
    require 'database.php';

    if(!empty($_GET['id']))
    {
        $id = checkInput($_GET['id']);
    }

    function checkInput($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Espace Admin</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>

<?php
  $db = Database::connect();
$id = $_GET['id'];
$req = $db->prepare('SELECT * FROM user WHERE id=? ');
$req->execute(array($id));
$item = $req->fetch();
 ?>
   <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-ok"></span> Admin - Ajouter <span class="glyphicon glyphicon-ok"></span></h1>
         <div class="container admin">
            <div class="row">
                <h1><strong>Modifier un utilisateur</strong></h1>
                <br>
                <form class="form" action="../../traitement/update.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo '  '.$item['name'];?>">
                        
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo '  '.$item['firstname'];?>">
                       
                    </div>
                    <div class="form-group">
                        <label for="name">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo '  '.$item['email'];?>">
                       
                    </div>
                    <div class="form-group">
                        <label for="name">Mot de passe:</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo '  '.$item['password'];?>">
                   
                    </div>
                    <div class="form-group">
                        <label for="name">Adresse:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo '  '.$item['address'];?>">
                       
                    </div>
                    <div class="form-group">
                        <label for="name">Téléphone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo '  '.$item['phone'];?>">
                        
                    </div>
                    <div class="form-group">
                        <label for="prenom">Ville:</label>
                        <input type="text" class="form-control" id="city" maxlength="15" name="city" value="<?php echo '  '.$item['city'];?>">
                 
                    </div>
                    <div class="form-group">
                        <label for="prenom">Code postal:</label>
                        <input type="text" class="form-control" id="postal" maxlength="15" name="postal" value="<?php echo '  '.$item['postal_code'];?>">
                 
                    </div>
                    <div class="form-group">
                        <label for="prenom">Rôle:</label>
                        <input type="text" class="form-control" id="role" maxlength="15" name="role" value="<?php echo '  '.$item['role'];?>">
                 
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                        <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form>
            </div>
        </div>
    </body>
</html>
