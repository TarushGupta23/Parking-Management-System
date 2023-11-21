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

    $slot = $_POST['carName'];
    // $vType = $_POST['type'];

    $sql = "UPDATE `slots` SET `isBooked` = '0' WHERE `slots`.`slotId` = '$slot'";
    $sql1 = "UPDATE `vehicles` SET `isParked` = '0' WHERE `vehicles`.`vehicle` = (SELECT bookedBy FROM slots where slotId = '$slot')";

    $conn->query($sql);
    $conn->query($sql1);
    header("Location: ./../admin.php");
    exit();
}
$conn->close();
?>
