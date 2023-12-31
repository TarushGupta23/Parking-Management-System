<?php
session_start();
if(isset($_SESSION['user_email'])) {
    $userEmail = $_SESSION['user_email'];
} else {
    header("Location: ./index.html");
    exit();
}
?>