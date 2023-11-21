
// Check if there is an error message in the URL
const urlParams = new URLSearchParams(window.location.search);
const error = urlParams.get('error');
// const addVehicle = urlParams.get('addVehicle');

// console.log(addVehicle);
// if (addVehicle) {
//     const addVehicleDiv = document.querySelector('.add-container');
//     addVehicleDiv.style.display = 'flex';
// }


// Display the error message in the div.error element
if (error) {
    const errorDiv = document.querySelector('.error');
    errorDiv.textContent = error;
}
else {
    // Clear the error message if there is no error parameter in the URL
    errorDiv.textContent = '';
}