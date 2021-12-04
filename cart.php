<?php
session_start();
$sessionID = $_SESSION["id"];
if (empty($sessionID) && $sessionID == null) {
    header('location: index.php');
}

require './controller/cartController.php';
$cartController = new CartController();

$panier = $cartController->getResultOfSelectPanier();
if (!empty($panier) && $panier != null) {
    $tab = [];
    for ($i = 0; $i < sizeof($panier); $i++) {
        array_push($tab, $panier[$i]);
    }
    $makeOrderArray = [];
    $keyToDelete = [];
    for ($i = 0; $i < sizeof($tab); $i++) {
        foreach ($tab[$i] as $key => $value) {
            array_push($makeOrderArray, $value);
            array_push($keyToDelete, $key);
        }
    }
}



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
    <title>Spicyo - Cart</title>
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
    <div id="content">
        <?php require './components/navbar.php'; ?>
    </div>
    <br><br>
    <div class="bg_bg">
        <div class="about">
            <div class="container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ourheading">
                                <h2 style="color:black">Mon panier</h2>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="owl-carousel code owl-theme">

                                        <?php
                                        if (!empty($tab)) {
                                            for ($i = 0; $i < sizeof($tab); $i++) {
                                                foreach ($tab[$i] as $key => $value) {
                                                    echo "
                                                            <div class=\"item\">
                                                                <div class=\"product_blog_img\">
                                                                    <img src=\"" . $value["image"] . "\" alt=\"#\" />
                                                                </div>
                                                                <div class=\"product_blog_cont\">
                                                                    <h3 style=\"color:black\">" . $value["name"] . "</h3>
                                                                    <h4 style=\"color:black\">" . $value["price"] . " <span class=\"theme_color\">€</span></h4>
                                                                    <button id=\"" . $key . "\" type=\"button\" class=\"btn btn-danger del-cart\">Supprimer</button>
                                                                </div>
                                                            </div>
                                                            ";
                                                }
                                            }
                                        }



                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <button class="btn btn-primary make-order" type="button" style="width: 100%; color: #0D6EFD; background: white; border: 2px solid #0D6EFD;">Passer ma commande</button>
                    <a href="payement.html">Paie moi!</a>
                    <br><br>
                </div>
            </div>
        </div>
        <!-- end about -->

    </div>

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
                loop: false,
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('.del-cart').click(function() {
                $.ajax({
                    type: "POST",
                    url: "ajax/deleteFromCart.php",
                    data: {
                        id_panier_menu: this.id
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function(error) {
                        alert(error);
                    }

                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.make-order').click(function() {
                console.log("Okay");
                $.ajax({
                    type: "POST",
                    url: "ajax/makeOrder.php",
                    data: {
                        arr: <?= json_encode($makeOrderArray) ?>,
                        keyToDelete: <?= json_encode($keyToDelete) ?>
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function(error) {
                        alert(error);
                    }

                });
            });
        });
    </script>

    <script>
        const makeOrder = document.querySelector(".make-order");
        const item = document.querySelector(".item");
        if (item != null) {

        } else {
            makeOrder.disabled = true;
        }
    </script>



</body>

</html>
