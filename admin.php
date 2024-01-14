<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Management</title>
    <link rel="stylesheet" href="./css/user.css">
</head>
<?php
    include("./partial/connection.php");
    include("./partial/session.php");
?>
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
        echo "<div class='name'>Logged in as: Administrator | admin@gmail.com</div>";
        for ($x = 1; $x <= 4; $x++) {
            $sql = "SELECT * FROM slots where floor = $x";
            $result = $conn->query($sql);
    ?>
    <div class='table-vehicles-owned table-container'> <h1>Slots - floor: <?php echo $x?></h1>
    <?php if ($result->num_rows == 0) { ?>
        <div style="margin-top:20px; font-size:2em;">Error loading slots</div>
    <?php } else { ?>
        <table border='1'>
            <tr>
                <th>Slot Id</th>
                <th>Slot Type</th>
                <th>Booked By</th>
                <th>Booked Till</th>
            </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { 
            if ($row['isBooked'] == 0) { ?>
            <tr>
                <td><?php echo $row['slotId']?></td>
                <td><?php echo $row['type'] ?></td>
                <td> - </td>
                <td> - </td>
            </tr>
            <?php } else { ?>
            <tr onclick="pop = document.getElementById('popup-freeSlot'); pop.style.display = 'block'; pop.querySelector('h2').innerText = '<?php echo $row['slotId']?>'; pop.querySelector('#carName').value='<?php $row['slotId']?>'">
                <td><?php echo $row['slotId']?></td>
                <td><?php echo $row['type']?></td>
                <td><?php echo $row['bookedBy']?></td>
                <td><?php echo $row['bookedTill']?></td>
            </tr>
            <?php } } ?>
        </table>
    </div>
    <?php }} ?>
    <div id="popup-freeSlot" class="popup glass">
        <form action="./php/freeSlot.php" method="post">
            <div class="form-group">
                <h2></h2>
                <label for="delete">Do you want to free this slot?</label> 
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
    document.getElementById('popup-freeSlot').style.display = 'none';
}
</script>
</body>
</html>