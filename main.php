<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<?php 
    include("./partial/connection.php"); 
    include("./partial/session.php");
?>
<?php 
    $sql1 = "SELECT COUNT(*) as num FROM costumers";
    $result1 = $conn->query($sql1);
    $row1 = mysqli_fetch_assoc($result1);

    $sql2 = "SELECT COUNT(*) as num FROM slots";
    $result2 = $conn->query($sql2);
    $row2 = mysqli_fetch_assoc($result2);

    $sql3 = "SELECT COUNT(*) as num FROM slots where isBooked = 0";
    $result3 = $conn->query($sql3);
    $row3 = mysqli_fetch_assoc($result3);
?>
<body>
<div class="bg-cars">
    <img src="./res/1234.jpg" alt="">
</div>
<div class="body">
    <nav>
        <div class="title">Parking Management System</div>
        <ul class="pages">
            <li id="active">Home</li>
            <li onclick="window.location.href='user.php'">Profile</li>
            <li onclick="window.location.href='bookslot.php'">Book Slot</li>
            <li onclick="window.location.href='./php/logout.php'">Log Out</li>
        </ul>
    </nav>


    <div class="top-container">
        <div class="top">
            <div class="info">
                <h1>Seamless Parking Solutions for Your Convenience</h1>
                <h3>Welcome to <i id="info-name"> Parkade </i>, where hassle-free parking meets modern convenience. Find the perfect spot effortlessly with our intuitive platform.</h3>
                <button id="parkNow" onclick="window.location.href='bookslot.php'">Park Now</button>
            </div>
            <div id="img-container">
                <img src="./res/23181.png" alt="" id="home-img">
            </div>
        </div>
    </div>


    <div class="data-container">
        <div class="data-flex">
            <div class="data">
            <div id='availableSlots' class='data-item'>
                    <h3>slots available</h3>
                    <h1><?php echo $row3['num'];?></h1>
                    
                </div>
                <div id='currVehicles' class='data-item'>
                    <h3>total slots</h3>
                    <h1><?php echo $row2['num'];?></h1>
                </div>
                <div id='totalUsers' class='data-item'>
                    <h3>total customers</h3>
                    <h1><?php echo $row1['num'] ?></h1>
                </div>
            
                
            </div>
            <div class="collab data-item">
                <h3>Collaborators</h3>
                <div>
                    <img src="./res/BMW_logo_PNG7.png" alt="" class="collabImg">
                    <img src="./res/Mercedes_logo_PNG1.png" alt="" class="collabImg">
                    <img src="./res/Volkswagen_logo_PNG3.png" alt="" class="collabImg">
                </div>
            </div>
        </div>
    </div>
    <div class="mid">Infrastructure</div>
    <div class="mid-container">
    <div class="map-container solid-glass">
    <?php 
        for ($x = 1; $x <= 4; $x++) {
            $sql = "SELECT * FROM slots where floor=$x";
            $result = $conn->query($sql);

            echo "<div class='map-grid' id='$x'>";
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['type'] == 2) {
                    $svg = '<svg fill="#000000" height="30px" width="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>bike1</title> <path d="M24 9h-4v-2h4c0.552 0 1 0.447 1 1 0 0.552-0.448 1-1 1zM21 0c0-1.657-1.343-3-3-3h-5c-1.657 0-3 1.343-3 3v6h-1v-6c0-2.209 1.791-4 4-4h5c2.209 0 4 1.791 4 4v6h-1v-6zM11 9h-4c-0.553 0-1-0.448-1-1 0-0.553 0.447-1 1-1h4v2zM15.5 11.5c-1.934 0-3.5-1.567-3.5-3.5 0-1.934 1.566-3.5 3.5-3.5s3.5 1.566 3.5 3.5c0 1.933-1.567 3.5-3.5 3.5zM15.5 6c-1.104 0-2 0.896-2 2s0.896 2 2 2 2-0.896 2-2-0.896-2-2-2zM12.112 10.106c0.706 1.133 1.954 1.894 3.388 1.894s2.681-0.761 3.388-1.894c1.78 0.405 3.112 1.991 3.112 3.894v10c0 1.861-1.278 3.412-3 3.858v-5.421c0-1.933-1.567-3.5-3.5-3.5s-3.5 1.567-3.5 3.5v5.421c-1.723-0.446-3-1.997-3-3.858v-10c0-1.903 1.332-3.489 3.112-3.894zM15.5 20c1.381 0 2.5 1.119 2.5 2.5v7c0 1.381-1.119 2.5-2.5 2.5s-2.5-1.119-2.5-2.5v-7c0-1.381 1.119-2.5 2.5-2.5z"></path> </g></svg>';
                } else {
                    $svg = '<svg fill="#000000" height="30px" width="30px" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>car</title> <path d="M19.938 7.188l3.563 7.156c0.063 0.094 0.094 0.219 0.125 0.313 0.219 0.563 0.375 1.344 0.375 1.844v3.406c0 1.063-0.719 1.938-1.719 2.188v2c0 0.969-0.781 1.719-1.719 1.719-0.969 0-1.719-0.75-1.719-1.719v-1.938h-13.688v1.938c0 0.969-0.75 1.719-1.719 1.719-0.938 0-1.719-0.75-1.719-1.719v-2c-1-0.25-1.719-1.125-1.719-2.188v-3.406c0-0.5 0.156-1.281 0.375-1.844 0.031-0.094 0.063-0.219 0.125-0.313l3.563-7.156c0.281-0.531 1.031-1.031 1.656-1.031h12.563c0.625 0 1.375 0.5 1.656 1.031zM5.531 9.344l-1.906 4.344c-0.094 0.156-0.094 0.344-0.094 0.469h16.938c0-0.125 0-0.313-0.094-0.469l-1.906-4.344c-0.25-0.563-1-1.063-1.594-1.063h-9.75c-0.594 0-1.344 0.5-1.594 1.063zM4.688 19.906c1 0 1.781-0.813 1.781-1.844 0-1-0.781-1.781-1.781-1.781s-1.844 0.781-1.844 1.781c0 1.031 0.844 1.844 1.844 1.844zM19.313 19.906c1 0 1.844-0.813 1.844-1.844 0-1-0.844-1.781-1.844-1.781s-1.781 0.781-1.781 1.781c0 1.031 0.781 1.844 1.781 1.844z"></path> </g></svg>';
                }
    ?>
                <div class='slot slot-<?php echo $row['type']?>'>
                    <div class='slot-holder'>
                    <?php
                        echo $svg;
                        echo $row['slotId'];
                    ?>
                    </div>
                </div>
            <?php } ?>
            </div>
        <?php } ?>
    </div>

        <div class="floor-container solid-glass">
            <div id="f1" class="radio-div current" onclick="showDiv(1)"> floor 0 </div>
            <div id="f2" class="radio-div" onclick="showDiv(2)"> floor 1 </div>
            <div id="f3" class="radio-div" onclick="showDiv(3)"> floor 2 </div>
            <div id="f4" class="radio-div" onclick="showDiv(4)"> floor 3 </div>
        </div>
    </div>


    <div class='table-vehicles-parked table-container'> 
        <h1>Reviews From Others</h1>
    <?php
        $sql = "SELECT * FROM `reviews` where user <> '$userEmail'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) { ?>
        <div style="margin-top:20px; font-size:2em;">error loading reviews</div>
    <?php } else { ?>
            <table border='1'>
                <tr>
                    <th>Customer</th>
                    <th>Review</th>
                    <th>Date</th>
                </tr>
    <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $sql0 = "SELECT * FROM `costumers` where email='{$row['user']}'";
            $result0 = $conn->query($sql0);
            while ($row0 = mysqli_fetch_assoc($result0)) { ?>
                <tr>
                    <td><?php echo $row0['name']; ?></td>
                    <td><?php echo $row['comment']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                </tr>
    <?php
            } 
        } ?>
            </table>
        </div>
<?php } ?>
</div>
<script>
function showDiv(divNumber) {
    // Hide all divs
    var allDivs = document.querySelectorAll('.map-grid');
    allDivs.forEach(function(div) {
        div.classList.add('hidden');
    });
    var allFloors = document.querySelectorAll('.radio-div');
    allFloors.forEach(function(div) {
        div.classList.remove('current');
    });

    // Show the selected div
    var selectedDiv = document.getElementById(divNumber);
    if (selectedDiv) {
        selectedDiv.classList.remove('hidden');
    }
    var selectedFloor = document.getElementById("f"+divNumber);
    if (selectedFloor) {
        selectedFloor.classList.add('current');
    }
}

showDiv(1);
</script>
</body>
</html>