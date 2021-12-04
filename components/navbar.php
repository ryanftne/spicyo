<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="full">
                    <a class="logo" href="index.php"><img src="images/logo500.png" alt="#" /></a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="full">
                    <div class="right_header_info" id="#liverpool">
                        <ul>
                            <li class="dinone">Contactez-nous : <img style="margin-right: 15px;margin-left: 15px;" src="images/phone_icon.png" alt="#"><a href="#">987-654-3210</a></li>
                            <li class="dinone"><img style="margin-right: 15px;" src="images/mail_icon.png" alt="#"><a href="#">cburger@gmx.com</a></li>
                            <li class="dinone"><img style="margin-right: 15px;height: 21px;position: relative;top: -2px;" src="images/location_icon.png" alt="#"><a href="#">Red quarter, Amsterdam</a></li>
                            <?php
                            if (empty($_SESSION["id"])) {
                                echo "<li class=\"button_user\"><a class=\"button active\" href=\"login.php\">Connexion</a><a class=\"button\" href=\"register.php\">Inscription</a></li>";
                            } else {
                                echo "<li class=\"button_user\"><a class=\"button active\" href=\"logout.php\">Deconnexion</a><a class=\"button\" href=\"profile.php\">Profil</a></li>";
                            }
                            ?>
                            <li>
                                <a href="./cart.php" id="sidebarCollapse">
                                    <img src="images/panier-pique-nique.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>