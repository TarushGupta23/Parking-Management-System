<?php
include("./../connection.php");

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
