This is my index.php

<?php
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = isset($_GET['name']) ? sanitize_input($_GET['name']) : "User";
?>

This is my search.php

<?php
if(isset($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $name = "User";
}
$src = $_POST['departure'];
$dst = $_POST['destination'];
$date = $_POST['date'];

$user = 'root';
$password = '';
$database = 'registration';
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user, $password, $database);

if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

$sql = " SELECT * FROM trains where source = '$src' and destination ='$dst'";
$result = $mysqli->query($sql);
$mysqli->close();

?>

This is my check_login.php

<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: ./booking.php");
    exit;
} else {
    header("Location: ./login.php");
    exit;
}
?>

This is my login.php

<?php
$user = 'root';
$password = '';
$database = 'rail';
$servername='localhost:3306';
$db = new mysqli($servername, $user, $password, $database);
session_start();
$error='';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($db, $_POST['user']);
    $mypassword = mysqli_real_escape_string($db, $_POST['pass']); 

    $sql = "SELECT * FROM users WHERE username = '$myusername' AND password = '$mypassword'";
    $result = mysqli_query($db, $sql);      
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $_SESSION['login_user'] = $myusername;
        $_SESSION['name'] = $name;
        header("location: ./index.php?name=$name");
    } else {
        $error = "Invalid login...";
        header("location: login.php?error=$error");
    }
}
?>

This is my logout.php

<?php
session_start();
if (isset($_SESSION['login_user'])) {
    $_SESSION = array();
    session_destroy();
    header("location: login.php");
    exit;
} else {
    header("location: search.php");
    exit;
}
?>



<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
if(isset($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $name = "User";
}
$src = $_POST['departure'];
$dst = $_POST['destination'];
$date = $_POST['date'];

$user = 'root';
$password = '';
$database = 'registration';
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user, $password, $database);

if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

$sql = " SELECT * FROM trains where source = '$src' and destination ='$dst'";
$result = $mysqli->query($sql);
$mysqli->close();

?>