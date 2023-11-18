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
    // session_start();
    // $userEmail = $_SESSION['user_email'];

    $vId = $_POST['carName'];
    // $vType = $_POST['type'];

    $sql = "DELETE FROM vehicles WHERE `vehicles`.`vehicle` = '$vId'";

    $conn->query($sql);
    header("Location: ./../user.php");
    exit();
}
$conn->close();
?>
