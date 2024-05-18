<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'registration');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $otp = $_POST['otp'];

    // Check if the OTP matches the one stored in the database
    $stmt = $db->prepare("SELECT otp FROM users WHERE username = ? AND status = 'locked'");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($stored_otp);
    $stmt->fetch();
    $stmt->close();
    if ($stored_otp && $stored_otp == $otp) {
        // OTP is correct, unlock the account
        $stmt = $db->prepare("UPDATE users SET status = '',loginAttempts = 0, otp = NULL WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->close();
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: changepassword.php');
    } else {
        echo "Invalid OTP or username.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>IRRS-Login</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./assets/logo-new.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 
</head>
<body>
<nav class="head-container">
    <div class="left">
        <div class="logo">
            <a href="./index.php">
                <i class="fa-solid fa-train-subway"></i>
            </a>
        </div>
        <p>IRRS</p>
    </div>
    <?php if(!isset($_SESSION['username'])): ?>
        <ul class="nav-links">
            <li><a href="./login.php"class="active">LOGIN</a></li>
            <li><a href="./register.php">REGISTER</a></li>
            <!-- <li><a href="./fake.html">CONTACT US</a></li> -->
        </ul>
    <?php else: ?>
        <ul class="nav-links">
            <li><a href="./index.php">HOME</a></li>
            <li><a href="./userDetails.php" >LOGOUT</a></li>
            <!-- <li><a href="./fake.html">CONTACT US</a></li> -->
        </ul>
    <?php endif; ?>
        <div class="right">
            <div class="user">
                <a href="./userDetails.php">
                    <i class="fa-regular fa-user"></i>
                </a>
            </div>
            <p class="username"><?php if(isset($_SESSION['username'])) { echo $_SESSION['username'];}?><p>
        </div>
</nav>
  <div class="header">
        <h2>Account Locked</h2>
  </div>      
  <form method="post" action="">
        <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" id="username" required>
        </div>
        <div class="input-group">
                <label>OTP</label>
                <input type="text" name="otp"id="otp" required>
        </div>
        <div class="input-group">
                <button type="submit" class="btn" value="Unlock Account">Unlock</button>
        </div>
        <p>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>
  </form>
</body>
</html>