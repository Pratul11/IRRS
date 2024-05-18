<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'registration');

// LOGIN USER
  
  if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $username_lowercase = strtolower($username);
        $query = "SELECT * FROM users WHERE LOWER(username)='$username_lowercase' AND password='$password' AND status != 'locked'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
            incrementLoginAttempts($username);
            if (getLoginAttempts($username) >= 3) {
                array_push($errors, "Account is locked");
                lockAccount($username);
                $otp = generateOTP();
                // sendOTP($username, $otp);
            }
        }
    }
}

?>
