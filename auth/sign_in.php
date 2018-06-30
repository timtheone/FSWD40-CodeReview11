<?php 

if(isset($_POST['signin-submit'])) {

    $email_sign_in = trim($_POST['email_sign_in']);
    $email_sign_in = strip_tags($email_sign_in);
    $email_sign_in = htmlspecialchars($email_sign_in);

    $pass_sign_in = trim($_POST['pass_sign_in']);
    $pass_sign_in = strip_tags($pass_sign_in);
    $pass_sign_in = htmlspecialchars($pass_sign_in);


    if(empty($email_sign_in)){
      $error = true;
      $email_sign_inError = "Please enter your email address.";
     } else if ( !filter_var($email_sign_in,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $email_sign_inError = "Please enter valid email address.";
     }

    if(empty($pass_sign_in)) {
      $error = true;
      $pass_sign_inError = "Please enter your password!" ;
    }

    if(!$error) {
      $password_in = hash('sha256', $pass_sign_in);
      $res = mysqli_query($conn, "SELECT `client_id`,email,pwd FROM client WHERE email='$email_sign_in'");
      $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
      $count = mysqli_num_rows($res);
      if($count == 1 && $row['pwd'] == $password_in) {
        $_SESSION['user'] = $row['client_id'];
        header("Location: home.php");
      } else {
        $errTyp = "danger";  
        $errMSGG = "Incorrect Credentials, Try again...";
      }
    }
    
  }

?>