<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./css/user.css">
</head>

<body>
<div class="bg-cars">
    <img src="./res/1234.jpg" alt="">
</div>
    <div class="body">
        <nav>
            <div class="title">Parking Management System</div>
            <ul class="pages">
            <li onclick="window.location.href='admin.php'">Slots</li>
            <li onclick="window.location.href='admin2.php'">Customers</li>
            <li onclick="window.location.href='index.html';">Log Out</li>
            </ul>
        </nav>
        <div class="u-info">
    <?php
        // session_start(); // Start the session to use session variables
        // if(isset($_SESSION['user_email'])) {
            // $userEmail = $_SESSION['user_email'];
            $userEmail = $_POST['carName'];
            // $userEmail = 'alpha@gmail.com';
            $servername = "localhost";
            $username = "root";
            $pwd = "";
            $dbname = "ParkingManagement";

            $conn = new mysqli($servername, $username, $pwd, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM costumers WHERE email='{$userEmail}'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);

            echo "<div class='name'>Logged in as: Administrator | admin@gmail.com</div>";
            echo "<div class='name'>Viewing User: {$row['name']} | $userEmail</div>";

            $sql2 = "SELECT * FROM vehicles WHERE owner='{$userEmail}'";
            $result = $conn->query($sql2);
            echo "<div class='table-vehicles-owned table-container'> <h1>Vehicles Owned </h1>";
            if ($result->num_rows == 0) {
                echo '<div style="margin-top:20px; font-size:2em;">No Vehicles Owned</div>';
            } else {
                echo "<table border='1'>
                    <tr>
                        <th>Vehicle No.</th>
                        <th>Vehicle Type</th>
                    </tr>";
    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['vehicle']}</td>
                            <td>{$row['type']}</td>
                        </tr>";
                    }
                echo "</table></div>";
            }
            $sql3 = "SELECT * FROM vehicles WHERE owner='{$userEmail}' and isParked <> 0";
            $result = $conn->query($sql3);
            echo "<div class='table-vehicles-parked table-container'> <h1>Vehicles Parked</h1></h1>";
            if ($result->num_rows == 0) {
                echo '<div style="margin-top:20px; font-size:2em;">No Vehicles parked</div>';
            } else {
                echo "<table border='1'>
                    <tr>
                        <th>Vehicle No.</th>
                        <th>Parked At</th>
                    </tr>";
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['isParked'] != 0) {
                            echo "<tr>
                                <td>{$row['vehicle']}</td>
                                <td>{$row['parkedAt']}</td>
                            </tr>";
                        }
                    }
                echo "</table></div>";
            }
            $sql3 = "SELECT * FROM bills WHERE owner='{$userEmail}'";
            $result = $conn->query($sql3);
            echo "<div class='table-vehicles-parked table-container'> <h1>Bills</h1> ";
            if ($result->num_rows == 0) {
                echo '<div style="margin-top:20px; font-size:2em;">No Bills</div>';
            } else {
                echo "<table border='1'>
                    <tr>
                        <th>Vehicle No.</th>
                        <th>Parked At</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>";
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        
                            echo "<tr>
                                <td>{$row['Vehicle']}</td>
                                <td>{$row['slotId']}</td>
                                <td>{$row['amount']}</td>
                                <td>{$row['date']}</td>
                            </tr>";
                        
                    }
                echo "</table></div>";
            }
       
    ?>
        </div>




    <div class="add-container">
        <div class="glass">
            <h2>Add Vehicle</h2>
            <form action="./php/addVehicle.php" method="post">
                <div class="form-group">
                    <label for="vId">Vehicle Number</label>
                    <input type="text" name="vId" id="vId" pattern="[a-z]{2}\d{2}[a-z\s]{1}[a-z]{1}\d{4}" placeholder="eg: 'pb10aa0001'" required>
                </div>
                <div class="form-group">
                    <label for="vId">Vehicle Type</label>
                    <div class="container">
                        <input type='radio' id='type-2' checked='checked' name='type' value="2">
                        <label for='type-2'>
                            <svg fill="#000000" height="30px" width="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>bike1</title> <path d="M24 9h-4v-2h4c0.552 0 1 0.447 1 1 0 0.552-0.448 1-1 1zM21 0c0-1.657-1.343-3-3-3h-5c-1.657 0-3 1.343-3 3v6h-1v-6c0-2.209 1.791-4 4-4h5c2.209 0 4 1.791 4 4v6h-1v-6zM11 9h-4c-0.553 0-1-0.448-1-1 0-0.553 0.447-1 1-1h4v2zM15.5 11.5c-1.934 0-3.5-1.567-3.5-3.5 0-1.934 1.566-3.5 3.5-3.5s3.5 1.566 3.5 3.5c0 1.933-1.567 3.5-3.5 3.5zM15.5 6c-1.104 0-2 0.896-2 2s0.896 2 2 2 2-0.896 2-2-0.896-2-2-2zM12.112 10.106c0.706 1.133 1.954 1.894 3.388 1.894s2.681-0.761 3.388-1.894c1.78 0.405 3.112 1.991 3.112 3.894v10c0 1.861-1.278 3.412-3 3.858v-5.421c0-1.933-1.567-3.5-3.5-3.5s-3.5 1.567-3.5 3.5v5.421c-1.723-0.446-3-1.997-3-3.858v-10c0-1.903 1.332-3.489 3.112-3.894zM15.5 20c1.381 0 2.5 1.119 2.5 2.5v7c0 1.381-1.119 2.5-2.5 2.5s-2.5-1.119-2.5-2.5v-7c0-1.381 1.119-2.5 2.5-2.5z"></path> </g></svg>
                        </label>
                        <input type='radio' id='type-4' name='type' value="4">
                        <label for='type-4'>
                        <svg fill="#000000" height="30px" width="30px" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>car</title> <path d="M19.938 7.188l3.563 7.156c0.063 0.094 0.094 0.219 0.125 0.313 0.219 0.563 0.375 1.344 0.375 1.844v3.406c0 1.063-0.719 1.938-1.719 2.188v2c0 0.969-0.781 1.719-1.719 1.719-0.969 0-1.719-0.75-1.719-1.719v-1.938h-13.688v1.938c0 0.969-0.75 1.719-1.719 1.719-0.938 0-1.719-0.75-1.719-1.719v-2c-1-0.25-1.719-1.125-1.719-2.188v-3.406c0-0.5 0.156-1.281 0.375-1.844 0.031-0.094 0.063-0.219 0.125-0.313l3.563-7.156c0.281-0.531 1.031-1.031 1.656-1.031h12.563c0.625 0 1.375 0.5 1.656 1.031zM5.531 9.344l-1.906 4.344c-0.094 0.156-0.094 0.344-0.094 0.469h16.938c0-0.125 0-0.313-0.094-0.469l-1.906-4.344c-0.25-0.563-1-1.063-1.594-1.063h-9.75c-0.594 0-1.344 0.5-1.594 1.063zM4.688 19.906c1 0 1.781-0.813 1.781-1.844 0-1-0.781-1.781-1.781-1.781s-1.844 0.781-1.844 1.781c0 1.031 0.844 1.844 1.844 1.844zM19.313 19.906c1 0 1.844-0.813 1.844-1.844 0-1-0.844-1.781-1.844-1.781s-1.781 0.781-1.781 1.781c0 1.031 0.781 1.844 1.781 1.844z"></path> </g></svg>
                        </label>
                    </div>
                </div>
                <div class="form-group btns">
                    <input type="submit" value="Add">
                    <input type="button" value="Cancel" onclick="window.location.href='user.php';">
                </div>
            </form>
            <div class="error">
                <!-- This is Error Message -->
            </div>
        </div>
    </div>

    <div class="review-container">
        <div class="glass">
            <h2>Add Review</h2>
            <form action="./php/review.php" method="post">
                <div class="form-group">
                    <label for="vId">Your Review</label>
                    <input type="text" name="review" id="vId" required>
                </div>
                <div class="form-group btns">
                    <input type="submit" value="Add">
                    <input type="button" value="Cancel" onclick="window.location.href='user.php';">
                </div>
            </form>
        </div>
    </div>

    <div id="popup" class="popup glass">
        <form action="./php/removeVehicle.php" method="post">
            <div class="form-group">
                <h2></h2>
                <label for="delete">Do you want to remove this vehicle?</label> 
                <input type="text" style="display:none;" id="carName" name="carName">
            </div>
            <div class="form-group btns">
                <input type="submit" value="Confirm">
                <input type="button" value="Cancel" onclick="closePopup()">
            </div>
        </form>
    </div>
    </div>
    <script src="./script/addVehicle.js"></script>
</body>

</html>
