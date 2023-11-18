
// Check if there is an error message in the URL
const urlParams = new URLSearchParams(window.location.search);
const error = urlParams.get('error');
const addVehicle = urlParams.get('addVehicle');
const review = urlParams.get('addReview');

// console.log(addVehicle);
if (addVehicle) {
    const addVehicleDiv = document.querySelector('.add-container');
    addVehicleDiv.style.display = 'flex';
}
const errorDiv = document.querySelector('.error');
if (error) {
    errorDiv.textContent = error;
} else {
    // Clear the error message if there is no error parameter in the URL
    errorDiv.textContent = '';
}
if (review) {
    const addVehicleDiv = document.querySelector('.review-container');
    console.log("hello");
    addVehicleDiv.style.display = 'flex';
}



// ---------------------------------------
var popupTriggers = document.querySelectorAll('.popup-trigger');

// Attach click event listener to each table row
popupTriggers.forEach(function (trigger) {
    trigger.addEventListener('click', function () {
        // Display the popup when a table row is clicked
        document.getElementById('popup').style.display = 'block';
    });
});

// Close the popup when the 'x' button is clicked
function closePopup() {
    document.getElementById('popup').style.display = 'none';
}


// ---------------------------------------
// console.log(addVehicle);

