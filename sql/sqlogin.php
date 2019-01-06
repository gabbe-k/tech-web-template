
<?php

  session_start();

  require_once('user_auth.php');
  require_once('data_valid.php');
  require_once('sqconnect.php');

  $conn = Connect();

  if(validForm($_POST))
  {

    //filter out code in username
    $user = ClearTags($conn, $_POST['username']);

    $sql = "SELECT * FROM accounts WHERE username='$user'";
    $result = mysqli_query($conn, $sql);
    $resultLen = mysqli_num_rows($result);

    if ($resultLen == 1)
    {

        $row = mysqli_fetch_assoc($result);
        $passCorrect = password_verify(ClearTags($conn, $_POST['password']), $row['password']);

        if ($passCorrect)
        {
            $_SESSION['u_id'] = $row['id'];
            $_SESSION['u_email'] = $row['email'];
            $_SESSION['u_user'] = $row['username'];
            Header("Location: ../index.php?success");
            exit();
        }
        else
        {
          Header("Location: ../index.php?error");
          exit();
        }

    }
    else
    {
      Header("Location: ../index.php?error");
      exit();
    }

  }
  else
  {
    Header("Location: ../index.php?error");
    exit();
  }

  Disconnect($conn);
























?>
