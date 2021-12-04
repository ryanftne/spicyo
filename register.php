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
                <input id="firstname" type="text" placeholder="prénom" />
                <input id="name" type="text" placeholder="nom" />
                <input id="email" type="email" placeholder="e-mail" />
                <input id="phone" type="number" placeholder="téléphone" />
                <input id="address" type="text" placeholder="adresse" />
                <input id="city" type="text" placeholder="ville" />
                <input id="postal" type="number" placeholder="code postal" />
                <input id="password" type="password" placeholder="mot de passe" />
                <button class="register">inscription</button>
                <p class="message">J'ai déjà un compte? <a href="login.php">Je me connecte</a></p>
                <br>
                <p class="message"><a href="index.php">Retour</a></p>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.register').click(function() {
                var registerData = {
                    name: $("#name").val(),
                    firstname: $("#firstname").val(),
                    email: $("#email").val(),
                    phone: $("#phone").val(),
                    address: $("#address").val(),
                    city: $("#city").val(),
                    postal: $("#postal").val(),
                    password: $("#password").val(),
                };
                $.ajax({
                    type: "POST",
                    url: "ajax/registerNewUser.php",
                    data: {
                        formData: registerData,
                    },
                    success: function(response) {
                        console.log(response);
                        location.replace("login.php");

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