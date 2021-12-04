<?php

require __DIR__ . '/../controller/cookController.php';

$cookController = new CookController();

$resultOfSelectAllFood_order = $cookController->getResultOfSelectAllFoodOrder();
$resultOfSelectAllStatus = $cookController->getResultOfSelectAllStatus();
// var_dump($resultOfSelectAllFood_order);
$menus = [];
for ($i = 0; $i < sizeof($resultOfSelectAllFood_order); $i++) {
    array_push($menus, json_decode($resultOfSelectAllFood_order[$i]["food_order"], true));
}
// var_dump($menus);
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- owl css -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- responsive-->
    <link rel="stylesheet" href="../css/responsive.css">
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
    <br><br>
    <?php

    for ($i = 0; $i < sizeof($resultOfSelectAllFood_order); $i++) {
        echo "
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col-xl-4 col-lg-4 col-md-4 col-sm-12 mar_bottom\">
                            <div class=\"blog_box\">
                                <div class=\"blog_img_box\">
                                    <figure><img src=\"../images/Koba_la_D_bijoux_1000x.webp\" alt=\"#\" />
                                        <span>" . $resultOfSelectAllFood_order[$i]["datetime"] . "</span>
                                    </figure>
                                </div>
                            </div>
                        </div>

                        <div class=\"col-xl-8 col-lg-8 col-md-8 col-sm-12 mar_bottom\">
                            <div class=\"owl-carousel code owl-theme\">
                            ";
        for ($x = 0; $x < sizeof(json_decode($resultOfSelectAllFood_order[$i]["food_order"], true)); $x++) {
            $food_order_display = json_decode($resultOfSelectAllFood_order[$i]["food_order"], true);
            echo "
           
                <div class=\"item\">
                                        <div class=\"product_blog_img\">
                                            <img src=\"" . $food_order_display[$x]["image"] . "\" alt=\"#\" />
                                        </div>
                                        <div class=\"product_blog_cont\">
                                            <h3 style=\"color:black\">" . $food_order_display[$x]["name"] . "</h3>
                                        </div>
                                </div>
            ";
        };
        echo "
                            </div><br><br>
                            <label for=\"pet-select\">Indication du status:</label>

                            <select name=\"pets\" id=\"pet-select\">
                            <option value=\"\">--Please choose an option--</option>
                            ";
        for ($b = 0; $b < sizeof($resultOfSelectAllStatus); $b++) {
            echo "
                                    
                                    <option value=\"dog\">" . $resultOfSelectAllStatus[$b]["name"] . "</option>
                                    ";
        }

        echo "
                            </select>
                            <button class=\"btn btn-success\">Valider</button>

                        </div>
                    </div>
                </div>
            ";
    }

    ?>


    <!-- Javascript files-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="../js/jquery-3.0.0.min.js"></script>
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

</body>

</html>