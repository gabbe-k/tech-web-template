<?php
  require_once('data_valid.php');
  require_once('user_auth.php');

  session_start();

  try {

      if (!validForm($_POST)) {
        throw new Exception('You have not filled out the form correctly - please try again.');
      }

      if (!isValidEmail($_POST["email"])) {
        throw new Exception('That is not a valid email address');
      }

      //pass not same
      if ($_POST["passwd"] != $_POST["passwordconfirm"]) {
        throw new Exception('The passwords does not match');
        header("Location: index.php");
      }

      //check if length ok
      if (strlen($_POST["passwd"]) < 6 || strlen($_POST["passwordconfirm"]) > 16) {
        throw new Exception('Your password must be between 6 and 16 characters');
      }

      //attempt to register, can throw an exception
      Register($_POST["username"], $_POST["email"], password_hash($_POST["passwd"], PASSWORD_DEFAULT));

      $_SESSION['valid_user'] = $_POST["username"];

      //provide link to members page


      //header("Location: ../index.php");
      echo "Registration successful.";


  }

  catch (\Exception $e)
  {
    echo "Error", $e;
  }



 ?>
