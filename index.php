<?php
session_start();
require("./controller/indexController.php");
require("./components/addCartToast.php");
$indexController = new IndexController();
$menus = $indexController->getResultOfSelectAllMenu();
$chichas = $indexController->getResultOfSelectAllChicha();
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
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="" /></div>
    </div>

    <div class="wrapper">
        <!-- end loader -->

        <!-- <div class="sidebar"> -->
        <!-- Sidebar  -->
        <!-- <nav id="sidebar">

                <div id="cart">
                    <i class="fa fa-arrow-left"></i>
                </div>

            </nav>
        </div> -->

        <div id="content">
            <!-- header -->
            <?php require './components/navbar.php'; ?>
            <!-- end header -->
            <!-- start slider section -->
            <div class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="full">
                                <div id="main_slider" class="carousel vert slide" data-ride="carousel" data-interval="5000">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="slider_cont">
                                                        <h3>Découvrez notre restaurant.</h3>
                                                        <p>Une atmosphère informelle et réjouissante, une autre manière de savourer la cuisine du restaurant signature de ChichaBurger Amsterdam.</p>
                                                        <a class="main_bt_border" href="#">Découvrir</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="slider_image full text_align_center">
                                                        <img class="img-responsive" src="images/5151-2.png" alt="#" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end slider section -->








            <!-- section -->
            <section class="resip_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ourheading">
                                <h2>Nos menus</h2>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="owl-carousel owl-theme">
                                        <?php
                                        for ($i = 0; $i < sizeof($menus); $i++) {
                                            echo "
                                                <div class=\"item\">
                                                    <div class=\"product_blog_img\">
                                                        <img src=\"" . $menus[$i]["image"] . "\" alt=\"#\" />
                                                    </div>
                                                    <div class=\"product_blog_cont\">
                                                        <h3>" . $menus[$i]["name"] . "</h3>
                                                        <h4>" . $menus[$i]["price"] . " <span class=\"theme_color\">€</span></h4>
                                                        <button id=\"" . $menus[$i]["id"] . "\" type=\"button\" class=\"btn btn-success add-cart\">Acheter</button>
                                                    </div>
                                                </div>
                                                ";
                                        };
                                        ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="bg_bg">
                <!-- about -->
                <!-- <div class="about">
                    <div class="container">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ourheading">
                                        <h2 style="color:black">Nos accompagnements</h2>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="owl-carousel code owl-theme">

                                                <?php
                                                for ($i = 0; $i < sizeof($chichas); $i++) {
                                                    echo "
                                                        <div class=\"item\">
                                                            <div class=\"product_blog_img\">
                                                                <img src=\"" . $chichas[$i]["image"] . "\" alt=\"#\" />
                                                            </div>
                                                            <div class=\"product_blog_cont\">
                                                                <h3 style=\"color:black\">" . $chichas[$i]["name"] . "</h3>
                                                                <h4 style=\"color:black\">" . $chichas[$i]["price"] . " <span class=\"theme_color\">€</span></h4>
                                                                <button type=\"button\" class=\"btn btn-dark\">Acheter</button>
                                                            </div>
                                                        </div>
                                                        ";
                                                }

                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- end about -->

                <!-- blog -->
                <div class="blog">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title">
                                    <i><img src="images/title.png" alt="#" /></i>
                                    <h2>Avis clients</h2>
                                    <span>Découvriez les derniers avis et témoignages des clients.</span>
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
                                    <h3>KOBA LA D</h3>
                                    <p>J'ai fêté mon anniversaire hier dans ce merveilleux restaurant, le bonheur à l'état pur :) la perfection avec en plus un personnel attentif discret, sans chichis, toujours souriant, et comme la dernière fois, un chef qui vient tout simplement, à chaque table vous saluer ...une cuisine inimaginable , des présentations merveilleuses et des goûts préservés sans mélanges incompréhensibles...harmonie parfaite !Merci pour ces moments exceptionnels ! </p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mar_bottom">
                                <div class="blog_box">
                                    <div class="blog_img_box">
                                        <figure><img src="images/837f03bb3b53bf6af49cc83794cfde1c.1000x1000x1.jpeg" alt="#" />
                                            <span>15 OCT 2021</span>
                                        </figure>
                                    </div>
                                    <h3>1PLIKÉ140</h3>
                                    <p>Nous avons été ravis par cette expérience. Cuisine à la fois traditionnelle et créative. Nous avons été surpris et nous nous sommes régalés. On n'a pas envie que le défilé de plats du menu dégustation s’arrête. Tarif tout à fait correct pour un 3*** et le service reçu. Bon niveau de français, mon conjoint ne parlais pas espagnols et l'ensemble du personnel était bilingue. Seule chose à revoir, rien du tout car tout était parfait ! Merci messieurs. </p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="blog_box">
                                    <div class="blog_img_box">
                                        <figure><img src="images/Jul _ Bagarres et agressions pendant son concert, le chanteur s'excuse.jpg" alt="#" />
                                            <span>02 SEP 2021</span>
                                        </figure>
                                    </div>
                                    <h3>JUL</h3>
                                    <p>Menu parfait du début à la fin , le cadre est incroyable !
                                        le clou du spectacle : le chef vient nous rencontrer à la fin pour nous remercier et nous demander si on a passé un bon moment .
                                        Ayant fait d’autres restaurants du même standing c’est vraiment le plus aboutie et la meilleure expérience pour nous ! 5ème visite ici et toujours autant de plaisir à retrouver ce chef étoilé 3 fois.
                                        La terrasse et la salle ouvrant, le personnel attentif, un vrai plaisir de revenir. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end blog -->


                <!-- end Our Client -->
            </div>
            <!-- footer -->
            <fooetr>
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class=" col-md-12">
                                <h2>Je veux <strong class="white">réserver !</strong></h2>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                <form class="main_form">
                                    <div class="row">

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <input class="form-control" placeholder="Nom" type="text" name="Name">
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <input class="form-control" placeholder="E-mail" type="text" name="Email">
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <input class="form-control" placeholder="Sujet" type="text" name="Phone">
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <button class="send">Envoyer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="img-box">
                                    <figure><img src="images/img.jpg" alt="img" /></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright">
                        <div class="container">
                            <p>© 2021 Tous droits réservés. Design par<a href="https://html.design/"> Antoine, Thomas, Ryan</a></p>
                        </div>
                    </div>
                </div>
            </fooetr>
            <!-- end footer -->

        </div>
    </div>
    <div class="overlay"></div>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-cart').click(function() {
                $.ajax({
                    type: "POST",
                    url: "ajax/addToCart.php",
                    data: {
                        menu_id: this.id
                    },
                    success: function(response) {
                        console.log("It's a success");
                        console.log(response);
                        const toastBody = document.querySelector(".toast-body");
                        toastBody.innerHTML = response;
                        $('#liveToast').toast('show')
                        // var toastLiveExample = document.getElementById('liveToast');
                        // var toast = new bootstrap.Toast(toastLiveExample);

                        // toast.show();

                    },
                    error: function(error) {
                        alert(error);
                    }

                });
            });
        });
    </script>

</body>

</html>