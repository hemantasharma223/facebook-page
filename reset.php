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
    $email = $_SESSION['user_email'];
    $new_password = $_POST['new-password'];

    $sql = "SELECT * FROM usersdata WHERE email = '$email' ";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        $sql = "UPDATE `usersdata` SET `password` = '$new_password' WHERE `usersdata`.`email` = '$email'";
        $result = $conn->query($sql);
        header("Location: index.html");
    } else {
        echo "Something went wrong.";
    }
}

$conn->close();
?>
