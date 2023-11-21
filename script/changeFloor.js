// function showDiv(divNumber) {
//     // Hide all divs
//     var allDivs = document.querySelectorAll('.map-grid');
//     allDivs.forEach(function(div) {
//         div.classList.add('hidden');
//     });
//     var allFloors = document.querySelectorAll('.radio-div');
//     allFloors.forEach(function(div) {
//         div.classList.remove('current');
//     });

//     // Show the selected div
//     var selectedDiv = document.getElementById(divNumber);
//     if (selectedDiv) {
//         selectedDiv.classList.remove('hidden');
//     }
//     var selectedFloor = document.getElementById("f"+divNumber);
//     if (selectedFloor) {
//         selectedFloor.classList.add('current');
//     }
// }

// showDiv(1);

// function redirectToPageWithInfo(sId) {
//     var redirectURL = 'bookingForm.php?slot=' + encodeURIComponent(sId);
//     window.location.href = redirectURL;
// }