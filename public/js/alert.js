
function showSuccessAlert(message) {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: message,
        timer: 5000 // Set the timer to automatically close the alert after 1.5 seconds
    });
}

function showErrorAlert(message) {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: message,
        timer: 5000 // Set the timer to automatically close the alert after 5 seconds
    });
}

