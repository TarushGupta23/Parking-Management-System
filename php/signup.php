<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];

    $servername = "localhost";
    $username = "root";
    $pwd = "";
    $dbname = "ParkingManagement";

    // Create connection
    $conn = new mysqli($servername, $username, $pwd, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO costumers VALUE ('$name', '$email', '$password', '$phone')";
    $sql2 = "SELECT email FROM costumers WHERE email='$email'";
    $result = $conn->query($sql2);
    
    if ($result->num_rows == 0) {
        $conn->query($sql);
        session_start();
        $_SESSION['user_email'] = $email;
        $_SESSION['conn'] = $conn;
        header("Location: ./../main.php");
        exit();
    } else {
        echo "User Already Exists";
        header("Location: ./../signup.html?error=User already exists");
        exit();
    }

    $conn->close();
?>
