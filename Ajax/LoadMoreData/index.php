<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style>
        #userTable {
            width: 100%;
        }
        .main-heading {
            font-weight: 900;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center bg-dark text-white py-5 main-heading">INFINITE DATA CHUNKING WITH SCROLLING - TABLE</h1>
                <a href="cards.php" class="btn btn-primary float-end">Go to next page</a>
            </div>
        </div>
    </div>

    <div class="container mt-1">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody"></tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        var start = 0; // The starting point for loading data
        var chunkSize = 100; // Number of records to load at a time
        var isLoading = false; // Flag to prevent multiple simultaneous requests

        // Function to load more data
        function loadData() 
        {
            if (isLoading)  return; // Return if a request is in progress
            isLoading = true;
            $.ajax({
                url: 'load_table.php',
                type: 'POST',
                data: { start: start, chunkSize: chunkSize },
                success: function (data) 
                {
                    $('#userTableBody').append(data);
                    start += chunkSize; // Update the starting point
                    isLoading = false;
                }
            });
        }

        // Load initial data (First 100 records on page load) - from 0 to 100
        loadData();

        // Add a scroll event listener to trigger loading more data when near the bottom
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200) 
            {
                loadData();
            }
        });
    </script>
</body>
</html>