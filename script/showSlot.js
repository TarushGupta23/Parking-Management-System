// function showPopup(id) {
//     pop = document.getElementById('popup'); 
//     pop.querySelector('h2').innerText = 'Slot selected: '+id;
//     pop.querySelector('#slotName').value=id;

//     // var type = 'someType';

//     // Use AJAX to send a request to the server-side script
//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', './../bookslot.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             // Optionally, you can handle the response from the server
//             console.log(xhr.responseText);
//         }
//     };
//     xhr.send('type=' + encodeURIComponent(id));
// }

// Check if there is an error message in the URL
const urlParams = new URLSearchParams(window.location.search);
const slot = urlParams.get('slot');
// const addVehicle = urlParams.get('addVehicle');

// console.log(addVehicle);
// if (addVehicle) {
//     const addVehicleDiv = document.querySelector('.add-container');
//     addVehicleDiv.style.display = 'flex';
// }


// Display the error message in the div.error element
if (slot) {
    let pop = document.getElementById('popup'); 
    pop.style.display = 'block';
        //     pop = document.getElementById('popup'); 
    pop.querySelector('h2').innerText = 'Slot selected: '+slot;
    pop.querySelector('#slotName').value=slot;
}
else {
    // Clear the error message if there is no error parameter in the URL
    // errorDiv.textContent = '';
    let pop = document.getElementById('popup'); 
    pop.style.display = 'none';
}

function redirectToPageWithInfo(sId) {
    var redirectURL = 'bookslot.php?slot=' + encodeURIComponent(sId);

    // Redirect the user to the new page
    window.location.href = redirectURL;
}

// Call the function to redirect with information
// redirectToPageWithInfo();

var popupTriggers = document.querySelectorAll('.popup-trigger');

function showPopup(id) {
    pop = document.getElementById('popup'); 
    pop.querySelector('h2').innerText = 'Slot selected: '+id;
    pop.querySelector('#slotName').value=id;
};
// Attach click event listener to each table row
popupTriggers.forEach(function (trigger) {
    trigger.addEventListener('click', function () {
        // Display the popup when a table row is clicked
        redirectToPageWithInfo(sId);
        // pop = document.getElementById('popup'); 
        // pop.style.display = 'block';
    });
});

// Close the popup 
function closePopup() {
    var redirectURL = 'bookslot.php';
    window.location.href = redirectURL;
    // document.getElementById('popup').style.display = 'none';
}