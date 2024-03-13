$(document).ready(function() {

    $("#datepicker").datepicker({
        dateFormat: 'd/m/Y', // Set date format
        changeMonth: true,       // Allow changing of months
        changeYear: true,        // Allow changing of years
        yearRange: '1900:2100'   // Set range of selectable years
    });


    $("#start_date").datepicker({
        dateFormat: 'd/m/Y', // Set date format
        changeMonth: true,       // Allow changing of months
        changeYear: true,        // Allow changing of years
        yearRange: '1900:2100',  // Set range of selectable years
        daysOfWeekDisabled: '0',

    }).on('changeDate', function(selected){
            var startDate = new Date(selected.date.valueOf());
            $('#end_date').datepicker('setStartDate', startDate);
        }).on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        // Update minimum selectable date for end date picker
        $('#end_date').datepicker('setStartDate', startDate);
        // Ensure that end date is not before start date
        var endDate = new Date($('#end_date').val());
        if (endDate < startDate) {
            $('#end_date').datepicker('setDate', startDate);
        }
    });


    $("#end_date").datepicker({
    dateFormat: 'd/m/Y', // Set date format
    changeMonth: true,       // Allow changing of months
    changeYear: true,        // Allow changing of years
    yearRange: '1900:2100'   ,// Set range of selectable years
    daysOfWeekDisabled: '0',
    }).on('changeDate', function(selected) {
        var endDate = new Date(selected.date.valueOf());
        // Ensure that end date is not before start date
        var startDate = new Date($('#start_date').val());
        if (endDate < startDate) {
            $('#start_date').datepicker('setDate', endDate);
        }
    });
});
