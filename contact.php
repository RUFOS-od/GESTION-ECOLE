<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_contact->execute([$name, $email, $number, $msg]);

   if ($select_contact->rowCount() > 0) {
      $message[] = 'message sent already!';
   } else {
      $insert_message = $conn->prepare("INSERT INTO `contact`(name, email, number, message) VALUES(?,?,?,?)");
      $insert_message->execute([$name, $email, $number, $msg]);
      $message[] = 'message sent successfully!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <!-- contact section starts  -->

    <section class="contact">

        <div class="row">

            <div class="image">
                <img src="images/contact-img.svg" alt="">
            </div>

            <form action="" method="post">
                <h3>prendre contact avec nous</h3>
                <input type="text" placeholder="Entrez votre Nom" required maxlength="100" name="name" class="box">
                <input type="email" placeholder="Entrez votre email" required maxlength="100" name="email" class="box">
                <input type="number" min="0" max="9999999999" placeholder="Entrez votre numéro" required maxlength="10"
                    name="number" class="box">
                <textarea name="msg" class="box" placeholder="Entrez votre message" required cols="30" rows="10"
                    maxlength="1000"></textarea>
                <input type="submit" value="Envoyer message" class="inline-btn" name="submit">
            </form>

        </div>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>Numéro de téléphone</h3>
                <a href="tel:002250703785519">+2250703785519</a>
                <a href="tel:002250584291701">+2250584291701</a>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>email address</h3>
                <a href="mailto:odetokirufos@gmail.com">odetokirufos@gmail.com</a>
                <a href="mailto:rufos.odetoki@uvci.edu.ci">rufos.odetoki@uvci.edu.ci</a>
            </div>

            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>address</h3>
                <a href="#">Yopougon Sideci </a>
                <a href="#">Kouté Terminus 40</a>
            </div>


        </div>

    </section>

    <!-- contact section ends -->











    <?php include 'components/footer.php'; ?>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>