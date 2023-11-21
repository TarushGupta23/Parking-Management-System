

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bookingForm.css">
</head>
<body>
<div id="popup" class="popup glass">
        <form action="./php/bookSlot.php" method="post">
            <div class="form-group column">
                <!-- <h2></h2>
                <label for="delete">Which Vehicle do you want this slot for?</label> 
                <input type="text" style="display:none;" id="slotName" name="slotName">
            </div>
            <div class="form-group">
                <label for="radio" id="plsWork">Your Vehicles</label> -->
            
                <?php
                session_start();
                if (isset($_GET['slot'])) {
                    // Retrieve the value of the 'slot' parameter
                    $slotValue = $_GET['slot'];
                    // echo "Value of 'slot': " . $slotValue;
                } else {
                    echo "'slot' parameter not found in the URL.";
                }
                $servername = "localhost";
                $username = "root";
                $pwd = "";
                $dbname = "ParkingManagement";

                $conn = new mysqli($servername, $username, $pwd, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }                   
                echo "<h2>Slot Selected: $slotValue</h2>";
                echo '
                    <label for="delete" style="font-size: 1.3rem;">Which Vehicle do you want this slot for?</label> 
                    <input type="text" style="display:none;" id="slotName" name="slotName">
                </div>
                <div class="form-group vehicle-list">
                    <label for="radio" id="plsWork" style="font-size: 1.6rem;">Your Vehicles</label>';
                    $userEmail = $_SESSION['user_email'];
                    $sql = "SELECT * FROM vehicles
                        WHERE type = (SELECT type FROM slots where slotId = '$slotValue') and
                        owner='$userEmail' and isParked = 0";
                    $result = $conn->query($sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <div>
                            <input type='radio' class='vehicle-item' name='toPark' value='{$row['vehicle']}'>
                            <label for='toPark'>{$row['vehicle']}</label>
                        </div>
                        ";
                    
                }
                echo '
                
            </div>
            <div class="form-group column">
                <label for="duration" style="font-size: 1.6rem;">Book Till</label>
                <div>
                    <input type="date" id="book-date" name="date">
                    <input type="time" id="book-time" name="time">
                </div>
            </div>
            <div class="form-group btns">
                <input type="button" value="Create Bill" onclick="createBill()">
                <input type="button" value="Cancel" onclick="cancel()">
            </div>
            <div id="bill-info" style="display:none;">
            <!-- <div id="bill-info"> -->
                <div id="bill-amt" style="font-size: 1.6rem;">hello</div>
                <input type="submit" value="Confirm">
                <input type="text" id="amt-input" name="amount" style="display:none;">
                ';
                echo "<input type='text' name='slotSelect' style='display:none;' value='$slotValue'>"
                ?>
            </div>
        </form>
    </div>
</body>
<script>
    function cancel() {
        window.location.href='bookslot.php';
    }
    function createBill() {
        var date = document.getElementById('book-date');
        var time = document.getElementById('book-time');
        var radioButtons = document.getElementsByClassName('vehicle-item');
        var selectedValue = null;
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked) {
                selectedValue = radioButtons[i].value;
                break;
            }
        }
        if (date.value !== "" && time.value !== "" && selectedValue != null) {
            document.getElementById('bill-info').style.display = "block";
        }
        var combinedDateTimeString = date.value + ' ' + time.value;
        var inputDateTime = new Date(combinedDateTimeString);
        var currentDateTime = new Date();
        var timeDifference = inputDateTime - currentDateTime;
        var cost = Math.abs(timeDifference / 1000)*0.001;
        var roundedNumber = cost.toFixed(2);
        
        const amttxt = document.getElementById("bill-amt");
        var txt = "Total Amount: $" + parseFloat(roundedNumber);;
        amttxt.textContent = txt;
        const amtinp = document.getElementById("amt-input");
        amtinp.value = parseFloat(roundedNumber);;
    }
</script>
</html>