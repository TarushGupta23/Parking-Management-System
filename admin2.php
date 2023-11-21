<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <!-- <li id="active">Home</li> -->
            <li onclick="window.location.href='admin.php'">Slots</li>
            <li onclick="window.location.href='admin2.php'">Customers</li>
            <li onclick="window.location.href='index.html';">Log Out</li>
        </ul>
    </nav>

    <?php
            $servername = "localhost";
            $username = "root";
            $pwd = "";
            $dbname = "ParkingManagement";

            $conn = new mysqli($servername, $username, $pwd, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            // $row = mysqli_fetch_assoc($result);

            echo "<div class='name'>Logged in as: Administrator | admin@gmail.com</div>";

            $sql = "SELECT * FROM costumers";
            $result = $conn->query($sql);

            echo "<div class='table-vehicles-owned table-container'> <h1>Customers</h1>";
            if ($result->num_rows == 0) {
                echo '<div style="margin-top:20px; font-size:2em;">No Customers</div>';
            } else {
                echo "<table border='1'>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                    </tr>";
    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr onclick=\"pop = document.getElementById('popup-viewUser'); pop.style.display = 'block'; pop.querySelector('label').innerText = '{$row['name']}'; pop.querySelector('#carName').value='{$row['email']}'\">
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                        </tr>";
                    }
                echo "</table></div>";
            }

            $sql = "SELECT * FROM reviews";
            $result = $conn->query($sql);

            echo "<div class='table-vehicles-owned table-container'> <h1>Reviews</h1>";
            if ($result->num_rows == 0) {
                echo '<div style="margin-top:20px; font-size:2em;">No Reviews</div>';
            } else {
                echo "<table border='1'>
                    <tr>
                        <th>User</th>
                        <th>Comment</th>
                        <th>Date</th>
                    </tr>";
    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr onclick=\"pop = document.getElementById('popup-delReview'); pop.style.display = 'block'; pop.querySelector('label').innerText = '{$row['comment']}'; pop.querySelector('#carName').value='{$row['id']}'\">
                            <td>{$row['user']}</td>
                            <td>{$row['comment']}</td>
                            <td>{$row['date']}</td>
                        </tr>";
                    }
                echo "</table></div>";
            }


            // for ($x = 1; $x <= 4; $x++) {
            //     $sql = "SELECT * FROM slots where floor = $x";
            //     $result = $conn->query($sql);
    
            //     echo "<div class='table-vehicles-owned table-container'> <h1>Slots - floor: $x</h1>";
            //     if ($result->num_rows == 0) {
            //         echo '<div style="margin-top:20px; font-size:2em;">Error loading slots</div>';
            //     } else {
            //         echo "<table border='1'>
            //             <tr>
            //                 <th>Slot Id</th>
            //                 <th>Slot Type</th>
            //                 <th>Booked By</th>
            //                 <th>Booked Till</th>
            //             </tr>";
        
            //             while ($row = mysqli_fetch_assoc($result)) {
            //                 if ($row['isBooked'] == 0) {
            //                     echo "<tr>
            //                         <td>{$row['slotId']}</td>
            //                         <td>{$row['type']}</td>";
            //                     echo "<td> - </td>
            //                         <td> - </td>
            //                         </tr>";
            //                 } else {
            //                     echo "<tr onclick=\"pop = document.getElementById('popup-freeSlot'); pop.style.display = 'block'; pop.querySelector('h2').innerText = '{$row['slotId']}'; pop.querySelector('#carName').value='{$row['slotId']}'\">
            //                         <td>{$row['slotId']}</td>
            //                         <td>{$row['type']}</td>";
            //                     echo "<td>{$row['bookedBy']}</td>
            //                         <td>{$row['bookedTill']}</td>
            //                     </tr>";
            //                 }
            //             }
            //         echo "</table></div>";
            //     }
            // }
            
    ?>
    <div id="popup-viewUser" class="popup glass">
        <form action="admin3.php" method="post">
            <div class="form-group">
                <h2>View User Profile?</h2>
                <label for="delete"></label> 
                <input type="text" style="display:none;" id="carName" name="carName">
            </div>
            <div class="form-group btns">
                <input type="submit" value="Confirm">
                <input type="button" value="Cancel" onclick="closePopup()">
            </div>
        </form>
    </div>

    <div id="popup-delReview" class="popup glass">
        <form action="./php/delReview.php" method="post">
            <div class="form-group">
                <h2>Delete the review saying:</h2>
                <label for="delete"></label> 
                <input type="text" style="display:none;" id="carName" name="carName">
            </div>
            <div class="form-group btns">
                <input type="submit" value="Confirm">
                <input type="button" value="Cancel" onclick="closePopup()">
            </div>
        </form>
    </div>
    

</div>
<script>
function closePopup() {
    document.getElementById('popup-delReview').style.display = 'none';
    document.getElementById('popup-viewUser').style.display = 'none';
}
</script>
</body>
</html>