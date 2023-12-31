<?php
include("./../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $userEmail = $_SESSION['user_email'];
    $dateD = $_POST['date'];
    $dateT= $_POST['time'];
    $amount= $_POST['amount'];
    $slot= $_POST['slotSelect'];
    $vehicle = $_POST['toPark'];
    // echo $dateD." ".$dateT;
    

    $sql = "INSERT INTO `bills` (`date`, `amount`, `owner`, `slotId`, `Vehicle`) 
    VALUES ('$dateD $dateT:00.000000', '$amount', '$userEmail', '$slot', '$vehicle');";
    $sql2 = "UPDATE `vehicles` SET `isParked` = '1', `parkedAt` = '$slot' WHERE `vehicles`.`vehicle` = '$vehicle';";
    $sql3 = "UPDATE `slots` SET `isBooked` = '1', `bookedTill` = '$dateD $dateT:00.000000', `bookedBy` = '$vehicle' WHERE `slots`.`slotId` = '$slot';";
    $conn->query($sql);
    $conn->query($sql2);
    $conn->query($sql3);
    header("Location: ./../user.php");
    exit();
}
$conn->close();
?>
