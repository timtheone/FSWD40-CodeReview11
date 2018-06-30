<?php 
ob_start();
session_start();

$adressError = ""; 
$telephoneError = "";
$first_name_sign_upError = "";
$last_name_sign_upError = "";
$email_sign_upError = "";
$pass_sign_upError = "";
$error = false;
if(isset($_POST['signup-submit'])) {
  $first_name_sign_up = trim($_POST['first_name_sign_up']);
  $first_name_sign_up = strip_tags($first_name_sign_up);
  $first_name_sign_up = htmlspecialchars($first_name_sign_up);

  $last_name_sign_up = trim($_POST['last_name_sign_up']);
  $last_name_sign_up = strip_tags($last_name_sign_up);
  $last_name_sign_up = htmlspecialchars($last_name_sign_up);

  $address_sign_up = trim($_POST['address_sign_up']);
  $address_sign_up = strip_tags($address_sign_up);
  $address_sign_up = htmlspecialchars($address_sign_up);

  $telephone_sign_up = trim($_POST['telephone_sign_up']);
  $telephone_sign_up = strip_tags($telephone_sign_up);
  $telephone_sign_up = htmlspecialchars($telephone_sign_up);
  
  $email_sign_up = trim($_POST['email_sign_up']);
  $email_sign_up = strip_tags($email_sign_up);
  $email_sign_up = htmlspecialchars($email_sign_up);

  $pass_sign_up = trim($_POST['pass_sign_up']);
  $pass_sign_up = strip_tags($pass_sign_up);
  $pass_sign_up = htmlspecialchars($pass_sign_up);


  if ( !filter_var($email_sign_up,FILTER_VALIDATE_EMAIL) ) {
    $error = true;
    $email_sign_upError = "Please enter valid email address.";
   } else {
    // check whether the email exist or not
    $query = "SELECT email FROM client WHERE email='$email_sign_up'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if($count!=0){
     $error = true;
     $email_sign_upError = "Provided Email is already in use.";
    }
   }
   // password validation
   if (empty($pass_sign_up)){
    $error = true;
    $pass_sign_upError = "Please enter password.";
   } else if(strlen($pass_sign_up) < 6) {
    $error = true;
    $pass_sign_upError = "Password must have atleast 6 characters.";
   }

   if (empty($first_name_sign_up)) {
    $error = true;
    $first_name_sign_upError = "Please enter your Name";
   } 
   
   if(empty($last_name_sign_up)) {
    $error = true;
    $last_name_sign_upError = "Please enter your Last Name";
   }

   if(empty($address_sign_up)) {
    $error = true;
    $adressError = "Please enter your Last Name";
   }

   if(empty($telephone_sign_up)) {
    $error = true;
    $telephoneError = "Please enter your Last Name";
   }
   
   $password = hash('sha256', $pass_sign_up);

   if( !$error ) {
    $sql = "INSERT INTO client(email,pwd,first_name,last_name,`tel_number`,`address`)
            VALUES ('$email_sign_up', '$password', '$first_name_sign_up', '$last_name_sign_up', '$telephone_sign_up', '$address_sign_up')";      
    $res = mysqli_query($conn, $sql);
  
    if ($res) {
      $errTyp = "success";
      $errMSG = "Successfully registered, you may login now";
      $alert = true;
      unset($email_sign_up);
      unset($pass_sign_up);
      unset($first_name_sign_up);
      unset($last_name_sign_up);
      unset($address_sign_up);
      unset($telephone_sign_up);
    } else {
      $errTyp = "danger";
      $errMSG = "Something went wrong";
      
    }
   } else {
        $alert2 = true;
   }
}

ob_end_flush();
?>