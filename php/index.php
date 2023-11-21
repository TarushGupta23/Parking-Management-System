<?php
$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "ParkingManagement";

$conn = new mysqli($servername, $username, $pwd, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

        session_start(); // Start the session to use session variables
        // Store user information in session variables
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
