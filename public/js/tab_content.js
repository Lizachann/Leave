// Function to open the selected tab
function openTab(evt, tabName) {
    // Hide all tab contents
    var tabContents = document.querySelectorAll('.tabcontent');
    tabContents.forEach(function(content) {
        content.style.display = 'none';
    });

    // Remove 'active' class from all tab links
    var tabLinks = document.querySelectorAll('.tablinks');
    tabLinks.forEach(function(link) {
        link.classList.remove('active');
    });

    // Show the selected tab content
    document.getElementById(tabName).style.display = 'block';

    // Add 'active' class to the clicked tab link
    if (evt) {
        evt.currentTarget.classList.add('active');
    }

    // Deactivate the dropdown button if it's active
    var dropdownButton = document.querySelector('.dropbtn');
    if (dropdownButton && dropdownButton.classList.contains('active')) {
        dropdownButton.classList.remove('active');
    }
    if (dropdownButton && tabName === 'tab1_1' || tabName === 'tab1_2' || tabName === 'tab1_3'|| tabName === 'tab1_4') {
        dropdownButton.style.borderBottom = '2px solid darkblue';
        dropdownButton.style.color = 'darkblue';
    } else {
        dropdownButton.style.borderBottom = '';
        dropdownButton.style.color = ''; // Reset the color
    }
}
function initializeTabs() {
    openTab(null, 'tab1_1');
}

document.addEventListener('DOMContentLoaded', function() {
    initializeTabs();
});
