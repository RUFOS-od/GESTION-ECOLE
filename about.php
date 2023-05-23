<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <!-- about section starts  -->

    <section class="about">

        <div class="row">

            <div class="image">
                <img src="images/about-img.svg" alt="">
            </div>

            <div class="content">
                <h3>Pourquoi nous choisir ?</h3>
                <p>Notre projet est une plateforme de gestion de contenus éducatifs destinée aux enseignants et aux
                    étudiants. L'objectif principal de cette plateforme est de fournir un espace en ligne où les
                    enseignants peuvent déposer, consulter et modifier des contenus éducatifs tels que des cours, des
                    devoirs, des tests, des évaluations et des ressources pédagogiques. De même, les étudiants peuvent
                    accéder à ces contenus, les consulter et les utiliser pour renforcer leur apprentissage.</p><br>
                <p></p>
                <a href="courses.html" class="inline-btn">Nos cours</a>
            </div>

        </div>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-graduation-cap"></i>
                <div>
                    <h3>+1k</h3>
                    <span>Cours en ligne</span>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-user-graduate"></i>
                <div>
                    <h3>+25k</h3>
                    <span>étudiants brillants</span>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-chalkboard-user"></i>
                <div>
                    <h3>+5k</h3>
                    <span>enseignants experts</span>
                </div>
            </div>

            <!-- <div class="box">
                <i class="fas fa-briefcase"></i>
                <!-- <div>
                    <h3>100%</h3>
                    <span>job placement</span>
                </div> -->
        </div> -->

        </div>

    </section>

    <!-- about section ends -->

    <!-- reviews section starts  -->

    <section class="reviews">

        <h1 class="heading">commentaires des étudiants</h1>

        <div class="box-container">

            <div class="box">
                <p>Je recommande vivement cette plateforme pour sa convivialité et ses fonctionnalités utiles.</p>
                <div class="user">
                    <img src="images/pic-2.jpg" alt="">
                    <div>
                        <h3>Chris Key</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <p>Cette plateforme est utile et facile à utiliser. Je la recommande vivement !</p>
                <div class="user">
                    <img src="images/pic-3.jpg" alt="">
                    <div>
                        <h3>Ruth Tenor</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <p>La plateforme de gestion est un outil incroyable pour les étudiants. Bravo !</p>
                <div class="user">
                    <img src="images/pic-4.jpg" alt="">
                    <div>
                        <h3>Landro Guitare</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <p>Cette plateforme est très pratique pour suivre mes cours. Merci beaucoup !</p>
                <div class="user">
                    <img src="images/pic-5.jpg" alt="">
                    <div>
                        <h3>Cedric Bat</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <p>Je suis impressionné par la simplicité de cette plateforme. C'est génial !</p>
                <div class="user">
                    <img src="images/pic-6.jpg" alt="">
                    <div>
                        <h3>Salomon Percu</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <p>La plateforme est un excellent outil pour améliorer mon apprentissage. Merci !</p>
                <div class="user">
                    <img src="images/pic-7.jpg" alt="">
                    <div>
                        <h3>Jonathan Base</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- reviews section ends -->










    <?php include 'components/footer.php'; ?>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>