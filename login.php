<?php
require './controller/loginController.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Spicyo</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <div class="login-page">
        <div class="form">

            <form class="login-form">
                <input id="user_email" type="text" placeholder="adresse email" />
                <input id="user_password" type="password" placeholder="mot de passe" />
                <button class="connect">connexion</button>
                <p class="message">Pas de compte? <a href="#">J'en veux un</a></p>
                <br>
                <p class="message"><a href="index.php">Retour</a></p>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.connect').click(function() {
                $.ajax({
                    type: "POST",
                    url: "ajax/logIn.php",
                    data: {
                        user_email: $("#user_email").val(),
                        user_password: $("#user_password").val()
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "you're conncted") {
                            location.replace("index.php");
                        }

                    },
                    error: function(error) {
                        alert(error);
                    }

                });
                event.preventDefault();
            });
        });
    </script>

</body>

</html>