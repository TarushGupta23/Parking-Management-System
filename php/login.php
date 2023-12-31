<?php
include("./../partial/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == "admin@gmail.com" && $password == "admin") {
        header("Location: ./../admin.php");
        exit();
    }

    $sql = "SELECT email, password FROM costumers WHERE email='$email' AND password='$password'" ;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['user_email'] = $email;
        $_SESSION['conn'] = $conn;
        header("Location: ./../main.php");
        exit();
    } else {
        header("Location: ./../index.html?error=Invalid email or password");
        exit();
    }
}
$conn->close();
?>
