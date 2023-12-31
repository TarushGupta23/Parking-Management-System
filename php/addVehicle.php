<?php
include("./../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $userEmail = $_SESSION['user_email'];

    $vId = $_POST['vId'];
    $vType = $_POST['type'];

    $sql = "INSERT INTO vehicles VALUE ('$vId', '$userEmail', $vType, 0, '0')";
    $sql2 = "SELECT * FROM vehicles WHERE vehicle='$vId'";

    $result = $conn->query($sql2);
    if ($result->num_rows == 0) {
        $conn->query($sql);
        header("Location: ./../user.php");
        exit();
    } else {
        header("Location: ./../user.php?error=Vehicle already registered&addVehicle=true");
        exit();
    }
}
$conn->close();
?>
