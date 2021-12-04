<?php
    require 'database.php';

    if(!empty($_GET['id']))
    {
        $id = checkInput($_GET['id']);
    }

    $db = Database::connect();
    $statement = $db->prepare("SELECT * FROM user WHERE id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();

    $statementt = $db->prepare("SELECT * FROM role WHERE id = ?");
    $statementt->execute(array($id));
    $itemm = $statement->fetch();
    Database::disconnect();

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

    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-user"></span> Admin - Compte <span class="glyphicon glyphicon-user"></span></h1>
         <div class="container admin">
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong>Voir l'utilisateur</strong></h1>
                    <br>
                    <form>
                      <div class="form-group">
                        <label>Identifiant :</label><?php echo '  '.$item['id'];?>
                      </div>
                      <div class="form-group">
                        <label>Nom:</label><?php echo '  '.$item['name'];?>
                      </div>
                      <div class="form-group">
                        <label>Prénom:</label><?php echo '  '.$item['firstname'];?>
                      </div>
                      <div class="form-group">
                        <label>E-mail:</label><?php echo '  '.$item['email'];?>
                      </div>
                      <div class="form-group">
                        <label>Téléphone:</label><?php echo '  '.$item['phone'];?>
                      </div>
                      <div class="form-group">
                        <label>Adresse:</label><?php echo '  '.$item['address'];?>
                      </div>
                      <div class="form-group">
                        <label>Ville:</label><?php echo '  '.$item['city'];?>
                      </div>
                      <div class="form-group">
                        <label>Code postal:</label><?php echo '  '.$item['postal_code'];?>
                      </div>
                      <div class="form-group">
                        <label>Rôle:</label><?php echo '  '.$item['role'];?>
                      </div>
                    </form>
                    <br>
                    <div class="form-actions">
                      <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                </div>
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img src="<?php echo '../images/'.$item['image'];?>" alt="...">
                        <div class="price"><?php echo 'Récapitulatif';?></div>
                          <div class="caption">
                            <h4><?php echo $item['nom'];?> - <?php echo $item['prenom'];?> </h4>
                            <p><?php echo $item['role'];?></p>

                          </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
