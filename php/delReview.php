<?php
$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "ParkingManagement";

$conn = new mysqli($servername, $username, $pwd, $dbname);
// echo "hello";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // session_start();
    // $userEmail = $_SESSION['user_email'];

    $review = $_POST['carName'];
    // $vType = $_POST['type'];

    $sql = "DELETE FROM reviews WHERE `reviews`.`id` = '$review'";

    $conn->query($sql);

    header("Location: ./../admin.php");
    exit();
}
$conn->close();
?>
