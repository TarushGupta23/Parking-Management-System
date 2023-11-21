var popupTriggers = document.querySelectorAll('.popup-trigger');

function showPopup(id) {
    pop = document.getElementById('popup'); 
    pop.querySelector('h2').innerText = 'Slot selected: '+id;
    pop.querySelector('#slotName').value=id;
    // addPhpAfterDiv(id);
};
// Attach click event listener to each table row
popupTriggers.forEach(function (trigger) {
    trigger.addEventListener('click', function () {
        // Display the popup when a table row is clicked
        pop = document.getElementById('popup'); 
        pop.style.display = 'block';
    });
});

// Close the popup 
function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

// function addPhpAfterDiv(id) {
//     // Create an XMLHttpRequest object

//     var phpLikeCode = `
//         <?php
//         session_start();
//         echo "this worked";
//         if(isset($_SESSION['user_email'])) {
//             $userEmail = $_SESSION['user_email'];

//             $servername = "localhost";
//             $username = "root";
//             $pwd = "";
//             $dbname = "ParkingManagement";
            
//             $conn = new mysqli("localhost", "root", "", "ParkingManagement");
            
//             if ($conn->connect_error) {
//                 // die("Connection failed: " . $conn->connect_error);
//             } else {
//                 echo "this worked";
//             }

//             $sql = "SELECT * FROM vehicles 
//                 WHERE type = (SELECT type FROM slots where slotId = '${id}')
//                 AND owner='$userEmail' and isParked = 0";
//             $result = $conn->query($sql);

//             while ($row = mysqli_fetch_assoc($result)) {
//                 echo "
//                 <div>
//                     <input type='radio' name='toPark' value='{$row['vehicle']}'>
//                     <label for='toPark'>{$row['vehicle']}</label>
//                 </div>
//                 ";
//             }
//         }
//         ?>
//     `;
//     document.getElementById('plsWork').insertAdjacentHTML('afterend', phpLikeCode);
// }
