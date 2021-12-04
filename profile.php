<?php
session_start();
require './controller/profileController.php';
$sessionID = $_SESSION["id"];
if (empty($sessionID) && $sessionID == null) {
    header('location: index.php');
}

$profileController = new ProfileController();
$userInfos = $profileController->getUserInfos();
$foodOrder = $profileController->getFoodOrder();
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- owl css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <div class="content">
        <?php require './components/navbar.php'; ?>
    </div>
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <i><img src="images/title.png" alt="#" /></i>
                        <h2>Mon profil</h2>
                        <span>Ici vous pouvez modifier votre profil et voir l'état de vos commandes.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mar_bottom">
                    <div class="blog_box">
                        <div class="blog_img_box">
                            <figure><img src="images/Koba_la_D_bijoux_1000x.webp" alt="#" />
                                <span>01 DEC 2021</span>
                            </figure>
                        </div>
                        <label for="name" class="form-label p-2">Nom</label>
                        <div class="input-group mb-1 p-2">
                            <input id="name<?= $userInfos["id"] ?>" type="text" class="form-control" placeholder="" aria-label="name" aria-describedby="basic-addon1" value="<?= $userInfos["name"] ?>">
                        </div>
                        <label for="firstname" class="form-label p-2">Prénom</label>
                        <div class="input-group mb-1 p-2">
                            <input id="firstname<?= $userInfos["id"] ?>" type="text" class="form-control" placeholder="" aria-label="firstname" aria-describedby="basic-addon1" value="<?= $userInfos["firstname"] ?>">
                        </div>
                        <label for="email" class="form-label p-2">Email</label>
                        <div class="input-group mb-1 p-2">
                            <input id="email<?= $userInfos["id"] ?>" type="text" class="form-control" placeholder="" aria-label="email" aria-describedby="basic-addon1" value="<?= $userInfos["email"] ?>">
                        </div>
                        <label for="phone" class="form-label p-2">Phone</label>
                        <div class="input-group mb-1 p-2">
                            <input id="phone<?= $userInfos["id"] ?>" type="text" class="form-control" placeholder="" aria-label="phone" aria-describedby="basic-addon1" value="<?= $userInfos["phone"] ?>">
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mar_bottom">

                    <h1 style="width: 100%;">Mes Commandes</h1>
                    <div class="owl-carousel code owl-theme">
                        <?php
                        for ($i = 0; $i < sizeof($foodOrder); $i++) {
                            echo "
                                <div class=\"item\">
                                    <div class=\"product_blog_img\">
                                        <img src=\"images/facture-dachat.png\" alt=\"#\" />
                                    </div>
                                    <div class=\"product_blog_cont\">
                                            <h3 style=\"color:black\">" . $foodOrder[$i]["datetime"] . "</h3>
                                            <h4 style=\"color:black\"><span class=\"theme_color\">" . $foodOrder[$i]["status"] . "</span></h4>
                                            <button id=\"\" type=\"button\" class=\"btn btn-info fac\">Facture</button>
                                    </div>
                                </div>
                        ";
                        }


                        ?>
                    </div>
                    <br><br>
                    <h1 style="width: 100%;">Mon adresse</h1>
                    <label for="address" class="form-label p-2">Adresse</label>
                    <div class="input-group mb-1 p-2">
                        <input id="address<?= $userInfos["id"] ?>" type="text" class="form-control" placeholder="" aria-label="address" aria-describedby="basic-addon1" value="<?= $userInfos["address"] ?>">
                    </div>
                    <label for="city" class="form-label p-2">Ville</label>
                    <div class="input-group mb-1 p-2">
                        <input id="city<?= $userInfos["id"] ?>" type="text" class="form-control" placeholder="" aria-label="city" aria-describedby="basic-addon1" value="<?= $userInfos["city"] ?>">
                    </div>
                    <label for="postal_code" class="form-label p-2">Code Postal</label>
                    <div class="input-group mb-1 p-2">
                        <input id="postal_code<?= $userInfos["id"] ?>" type="text" class="form-control" placeholder="" aria-label="postal_code" aria-describedby="basic-addon1" value="<?= $userInfos["postal_code"] ?>">
                    </div>
                </div>
            </div>
            <br><br>
            <button id="<?= $userInfos["id"] ?>" class="btn btn-primary edit" type="button" style="width: 100%; color: #0D6EFD; background: white; border: 2px solid #0D6EFD;">Modifier mon profil</button>
            <br><br>
        </div>
    </div> <br><br>
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <style>
        #owl-demo .item {
            margin: 3px;
        }

        #owl-demo .item img {
            display: block;
            width: 100%;
            height: auto;
        }
    </style>


    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        })

        $(document).ready(function() {
            var owl = $('.owl-carousel code');
            owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $(".edit").click(function(event) {

                var formData = {
                    name: $("#name" + this.id).val(),
                    firstname: $("#firstname" + this.id).val(),
                    email: $("#email" + this.id).val(),
                    phone: $("#phone" + this.id).val(),
                    address: $("#address" + this.id).val(),
                    city: $("#city" + this.id).val(),
                    postal_code: $("#postal_code" + this.id).val(),
                };
                $.ajax({
                    type: "POST",
                    url: "ajax/updateProfile.php",
                    data: {
                        datas: formData
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();

                    },
                    error: function(error) {
                        alert(error);
                    }

                });
                event.preventDefault();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".fac").click(function(event) {

                location.href = "images/facture.png";
                event.preventDefault();
            });
        });
    </script>
</body>

</html>