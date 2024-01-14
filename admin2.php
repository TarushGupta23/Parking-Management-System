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
        $sql1 = "SELECT * FROM costumers";
        $result1 = $conn->query($sql1);
        $sql2 = "SELECT * FROM reviews";
        $result2 = $conn->query($sql2); ?>
    
    <div class='name'>Logged in as: Administrator | admin@gmail.com</div>
        <div class='table-vehicles-owned table-container'> <h1>Customers</h1>
        <?php if ($result1->num_rows == 0) { ?>
            <div style="margin-top:20px; font-size:2em;">No Customers</div>
        <?php } else { ?>
            <table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>
            <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
                <tr onclick=\"pop = document.getElementById('popup-viewUser'); pop.style.display = 'block'; pop.querySelector('label').innerText = '{$row['name']}'; pop.querySelector('#carName').value='{$row['email']}'\">
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phone']?></td>
                </tr>
            <?php } ?>
            </table>
        <?php } ?>
        </div>
        <div class='table-vehicles-owned table-container'> <h1>Reviews</h1>
        <?php if ($result2->num_rows == 0) { ?>
            <div style="margin-top:20px; font-size:2em;">No Reviews</div>
        <?php } else { ?>
            <table border='1'>
                <tr>
                    <th>User</th>
                    <th>Comment</th>
                    <th>Date</th>
                </tr>
            <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
                <tr onclick="pop = document.getElementById('popup-delReview'); pop.style.display = 'block'; pop.querySelector('label').innerText = '<?php echo $row['comment']?>'; pop.querySelector('#carName').value='<?php echo $row['id']?>'">
                    <td>{$row['user']}</td>
                    <td>{$row['comment']}</td>
                    <td>{$row['date']}</td>
                </tr>
            <?php } ?>
            </table>
        <?php } ?>
        </div>

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