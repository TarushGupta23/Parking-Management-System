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
    session_start();
    $userEmail = $_SESSION['user_email'];
    $review = $_POST['review'];
    

    $sql = "INSERT INTO `reviews` (`id`, `comment`, `user`) VALUES (current_timestamp(), '$review', '$userEmail');";
    $conn->query($sql);
    header("Location: ./../user.php");
    exit();
}
$conn->close();
?>
