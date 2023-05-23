<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

    <section class="flex">

        <a href="home.php" class="logo">Vicky.</a>

        <form action="search_course.php" method="post" class="search-form">
            <input type="text" name="search_course" placeholder="rechercher des cours..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_course_btn"></button>
        </form>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
        </div>

        <div class="profile">
            <?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_profile->execute([$user_id]);
         if ($select_profile->rowCount() > 0) {
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
            <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
            <h3><?= $fetch_profile['name']; ?></h3>
            <span>Etudiant</span>
            <a href="profile.php" class="btn">Voir profil</a>
            <div class="flex-btn">
                <a href="login.php" class="option-btn">login</a>
                <a href="register.php" class="option-btn">register</a>
            </div>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');"
                class="delete-btn">logout</a>
            <?php
         } else {
         ?>
            <h3>Login or Register</h3>
            <div class="flex-btn">
                <a href="login.php" class="option-btn">login</a>
                <a href="register.php" class="option-btn">register</a>
            </div>
            <?php
         }
         ?>
        </div>

    </section>

</header>

<!-- La section de l'en-tête se termine -->

<!-- La section de la barre latérale commence -->
<div class="side-bar">

    <div class="close-side-bar">
        <i class="fas fa-times"></i>
    </div>

    <div class="profile">
        <?php
      $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
      $select_profile->execute([$user_id]);
      if ($select_profile->rowCount() > 0) {
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
        <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
        <h3><?= $fetch_profile['name']; ?></h3>
        <span>student</span>
        <a href="profile.php" class="btn">view profile</a>
        <?php
      } else {
      ?>
        <h3>Login or Register</h3>
        <div class="flex-btn" style="padding-top: .5rem;">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
        </div>
        <?php
      }
      ?>
    </div>

    <nav class="navbar">
        <a href="home.php"><i class="fas fa-home"></i><span>Acceuil</span></a>
        <a href="about.php"><i class="fas fa-question"></i><span>A propos de nous</span></a>
        <a href="courses.php"><i class="fas fa-graduation-cap"></i><span>cours/sujets</span></a>
        <a href="teachers.php"><i class="fas fa-chalkboard-user"></i><span>Enseignants</span></a>
        <a href="contact.php"><i class="fas fa-headset"></i><span>Nous contacter</span></a>
    </nav>

</div>

<!-- side bar section ends -->