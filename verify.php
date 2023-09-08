<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";

session_start();
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $sql = "SELECT * FROM usersdata WHERE email = '$email' ";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['user_email'] = $email;
        header("Location: forgot2.html");
    } else {
    echo"Sorry ! Your Email doesn't exists.";
   
}
}

$conn->close();
?>