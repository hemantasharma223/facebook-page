<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";

session_start();
$conn = new mysqli($servername, $username, $password, $dbname);
if (!isset($_SESSION['user_email'])) {
    header("Location: forgot.html");
    exit();
}


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['user_email'];
    $sql = "SELECT * FROM usersdata WHERE email = '$email' ";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
    $captcha_first = $_POST['captcha-first'];
    $captcha_second = $_POST['captcha-second'];
    $captcha_third = $_POST['captcha-third'];

    $sql = "SELECT * FROM usersdata WHERE first_captcha = '$captcha_first' AND second_captcha = '$captcha_second' AND third_captcha = '$captcha_third' ";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        header("location: reset_password.html");
        
    } else {
    echo"Captcha Verification Failed.";
   
}
        
    } else {
    echo"Please Provide email first.";
   
}
}

$conn->close();
?>