<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
   header('location:login.php');
}

if (isset($_POST['submit'])) {

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
   $select_user->execute([$user_id]);
   $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

   $prev_pass = $fetch_user['password'];
   $prev_image = $fetch_user['image'];

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   if (!empty($name)) {
      $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id = ?");
      $update_name->execute([$name, $user_id]);
      $message[] = 'username updated successfully!';
   }

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   if (!empty($email)) {
      $select_email = $conn->prepare("SELECT email FROM `users` WHERE email = ?");
      $select_email->execute([$email]);
      if ($select_email->rowCount() > 0) {
         $message[] = 'email already taken!';
      } else {
         $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id = ?");
         $update_email->execute([$email, $user_id]);
         $message[] = 'Email mis à jour avec succes!';
      }
   }

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id() . '.' . $ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_files/' . $rename;

   if (!empty($image)) {
      if ($image_size > 2000000) {
         $message[] = 'Image trop grande!';
      } else {
         $update_image = $conn->prepare("UPDATE `users` SET `image` = ? WHERE id = ?");
         $update_image->execute([$rename, $user_id]);
         move_uploaded_file($image_tmp_name, $image_folder);
         if ($prev_image != '' and $prev_image != $rename) {
            unlink('uploaded_files/' . $prev_image);
         }
         $message[] = 'Image mise à jour avec succes!';
      }
   }

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   if ($old_pass != $empty_pass) {
      if ($old_pass != $prev_pass) {
         $message[] = "L'ancien mot de passe est incorrect";
      } elseif ($new_pass != $cpass) {
         $message[] = 'Confirmation de mot de passe no macth!';
      } else {
         if ($new_pass != $empty_pass) {
            $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
            $update_pass->execute([$cpass, $user_id]);
            $message[] = 'Mot de passe mis à jour avec succes!';
         } else {
            $message[] = 'Entrez un nouveau mot de passe';
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis à jour du profil</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <section class="form-container" style="min-height: calc(100vh - 19rem);">

        <form action="" method="post" enctype="multipart/form-data">
            <h3>Mis à jour du profil</h3>
            <div class="flex">
                <div class="col">
                    <p>Votre nom</p>
                    <input type="text" name="name" placeholder="<?= $fetch_profile['name']; ?>" maxlength="100"
                        class="box">
                    <p>otre email</p>
                    <input type="email" name="email" placeholder="<?= $fetch_profile['email']; ?>" maxlength="100"
                        class="box">
                    <p>telecharger nouvelle image</p>
                    <input type="file" name="image" accept="image/*" class="box">
                </div>
                <div class="col">
                    <p>Ancien mot de passe</p>
                    <input type="password" name="old_pass" placeholder="Entrez l'ancien mot de passe" maxlength="50"
                        class="box">
                    <p>Nouveau mot de passe</p>
                    <input type="password" name="new_pass" placeholder="enter your new password" maxlength="50"
                        class="box">
                    <p>Confirmez mot de passe</p>
                    <input type="password" name="cpass" placeholder="confirm your new password" maxlength="50"
                        class="box">
                </div>
            </div>
            <input type="submit" name="submit" value="mise à jour du profil" class="btn">
        </form>

    </section>

    <!-- update profile section ends -->













    <?php include 'components/footer.php'; ?>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>