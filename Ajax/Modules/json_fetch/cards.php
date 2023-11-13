<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style>
        .main-heading{
            font-weight: 900;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center bg-dark text-white py-5 main-heading">FETCHING DATA AFTER CONVERTING INTO JSON - CARDS</h1>
                <a href="index.php" class="btn btn-primary float-end">Go to previous page</a>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row" id="cardContent"> <!-- Cards Content Will Be Rendered Here --> </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        var start = 0; // The starting point for loading data
        var chunkSize = 100; // Number of records to load at a time
        var isLoading = false;

        // Function to load more data
        function loadData() 
        {
            if (isLoading)  return; // Return if a request is in progress
            isLoading = true;
            $.ajax({
                url: 'load_cards.php',
                type: 'POST',
                data: { start: start, chunkSize: chunkSize },
                dataType: 'json',
                success: function (data) 
                {
                    $.each(data, function(index, item)
                    {
                        $("#cardContent").append(`
                            <div class='col-md-3'>
                                <div class='card'>
                                    <div class='card-header text-center'>
                                        <h5>${item.id}</h5>
                                    </div>

                                    <div class='card-body text-center'>
                                        <p>${item.name}</p>
                                        <p>${item.email}</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                        `);
                    });
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
