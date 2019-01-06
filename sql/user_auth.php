<?php
    require_once('sqconnect.php');
    require_once('data_valid.php');

    function Register($username, $email, $password)
    {
        $conn = Connect();

        $result = $conn->query("SELECT * FROM accounts WHERE username='$username'");


        if (!$result)
        {
            throw new Exception('Could not execute query');
        }

        if ($result -> num_rows >  0)
        {
            throw new Exception('Username is taken.');
        }

        $dupe = true;

        while ($dupe) {

          $id = rand(0, 9999);

          if (!DupeSearch($conn, "accounts", "id", $id)) {
            $dupe = false;
          }

        }

        //if ok, put in db
        $result = $conn->query("INSERT INTO accounts(id, username, email, password) VALUES('$id', '$username', '$email', '$password')");

        if(!$result)
        {
            throw new Exception('Could not register.');
        }

        Disconnect($conn);

        return true;
    }

?>
