// Load Google Charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart1);
google.charts.setOnLoadCallback(drawChart2);


function drawChart1() {
    var data = google.visualization.arrayToDataTable([
        ['Leave Status', 'Count'],
        ['Pending', countPending],
        ['Approved', countApproved],
        ['Rejected', countRejected]
    ]);

    // Create options for the chart
    var options = {
        width: 500, // Set chart width to 100% of container
        height: 300, // Set chart height to 100% of container
        colors: ['#f6ce07', '#00ad00', '#FF0000']
    };

    // Function to draw the chart and resize it when the window changes size
    function drawAndResizeChart() {
        // Get the current width of the window
        var windowWidth = window.innerWidth;

        // Adjust chart dimensions based on screen size
        if (windowWidth < 1200) { // If screen width is less than 768px (sm)
            options.width = 350; // Set chart width for small screens
            options.height = 200; // Set chart height for small screens
        } else { // If screen width is 768px or larger (lg)
            options.width = 500; // Set chart width for large screens
            options.height = 300; // Set chart height for large screens
        }

        // Create the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart.draw(data, options);

        // Event listener for when a slice is selected
        google.visualization.events.addListener(chart, 'select', selectHandler);

        // Function to handle slice selection
        function selectHandler() {
            var selectedItem = chart.getSelection()[0]; // Get the selected item

            if (selectedItem) {
                var sliceLabel = data.getValue(selectedItem.row, 0); // Get label of selected slice

                // Determine the route based on the selected slice label
                var route;
                if (sliceLabel === 'Pending') {
                    route = '/hod/leave/history/pending'; // Route for pending
                } else if (sliceLabel === 'Approved') {
                    route = '/hod/leave/history/approved'; // Route for approved
                } else if (sliceLabel === 'Rejected') {
                    route = '/hod/leave/history/rejected'; // Route for rejected
                }

                // Navigate to the determined route
                if (route) {
                    window.location.href = route;
                }
            }
        }
    }

    // Redraw the chart when the window resizes
    window.addEventListener('resize', drawAndResizeChart);

    // Initial draw of the chart
    drawAndResizeChart();
}


// Draw the chart and set the chart values
function drawChart2() {
    var data = google.visualization.arrayToDataTable([
        ['Leave Status', 'Count'],
        ['Pending', countsPending],
        ['Approved', countsApproved],
        ['Rejected', countsRejected]
    ]);

    // Create options for the chart
    var options = {
        width: 500, // Set chart width to 100% of container
        height: 300, // Set chart height to 100% of container
        colors: ['#f6ce07', '#00ad00', '#FF0000']
    };

    // Function to draw the chart and resize it when the window changes size
    function drawAndResizeChart() {
        // Get the current width of the window
        var windowWidth = window.innerWidth;

        // Adjust chart dimensions based on screen size
        //  if (windowWidth < 400) { // If screen width is less than 768px (sm)
        //      options.width = 200; // Set chart width for small screens
        //      options.height = 100; // Set chart height for small screens
        //  }else
        if (windowWidth < 1200) { // If screen width is less than 768px (sm)
             options.width = 350; // Set chart width for small screens
             options.height = 200; // Set chart height for small screens
         }
         else { // If screen width is 768px or larger (lg)
             options.width = 500; // Set chart width for large screens
             options.height = 300; // Set chart height for large screens
        }

        // Create the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);

        // Event listener for when a slice is selected
        google.visualization.events.addListener(chart, 'select', selectHandler);

        // Function to handle slice selection
        function selectHandler() {
            var selectedItem = chart.getSelection()[0]; // Get the selected item

            if (selectedItem) {
                var sliceLabel = data.getValue(selectedItem.row, 0); // Get label of selected slice

                // Determine the route based on the selected slice label
                var route;
                if (sliceLabel === 'Pending') {
                    route = '/hod/pending/leave'; // Route for pending
                } else if (sliceLabel === 'Approved') {
                    route = '/hod/approved/leave'; // Route for approved
                } else if (sliceLabel === 'Rejected') {
                    route = '/hod/rejected/leave'; // Route for rejected
                }

                // Navigate to the determined route
                if (route) {
                    window.location.href = route;
                }
            }
        }
    }

    // Redraw the chart when the window resizes
    window.addEventListener('resize', drawAndResizeChart);

    // Initial draw of the chart
    drawAndResizeChart();
}



