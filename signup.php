<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['new-email'];

    $sql = "SELECT * FROM usersdata WHERE email = '$email' ";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        die("User already exists");
    } else {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['new-email'];
    $password = $_POST['new-password'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $captcha_first = $_POST['captcha-first'];
    $captcha_second = $_POST['captcha-second'];
    $captcha_third = $_POST['captcha-third']; 


    $sql = "INSERT INTO usersdata (first_name, last_name, email, password, birthday, gender, first_captcha, second_captcha, third_captcha)
    VALUES ('$firstName', '$lastName', '$email', '$password', '$birthday', '$gender','$captcha_first', '$captcha_second', '$captcha_third')";

    if ($conn->query($sql) === TRUE) {
        sleep(1);
        echo("Registration successful!");
        header("location: index.html");
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
}

$conn->close();
?>


