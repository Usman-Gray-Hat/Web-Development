<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Change URL</title>
    <style>
        *{
            font-family: sans-serif;
        }
        h1{
            font-weight:900;
            letter-spacing:1px;
        }
    </style>
</head>
<body>

    <!-- Bootstrap Grid System -->
    <div class="container mt-1">
        <div class="row"> <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="jumbotron text-center bg-dark text-white">CHANGE URL USING PUSH STATE & REPLACE STATE</h1>
            </div>
        </div>

        <div class="row"> <!-- 2nd Row -->
            <div class="col-md-12">
                <button type="button" class="btn btn-outline-primary" id="pushState">Push State</button> <br>
                <button type="button" class="btn btn-outline-info mt-2" id="replaceState">Replace State</button>
            </div>
        </div>
    </div>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- Scripting -->
    <script type="text/javascript">
        $("#pushState").click(function(){
            window.history.pushState({}, document.title, "/ChangeUrl/index.php?id=1");
        });

        $("#replaceState").click(function(){
            window.history.replaceState({}, document.title, "/ChangeUrl/index.php?id=1");
        });
    </script>
    <!-- Note: .pushState() & .replaceState() are both used to modify the URL without reloading a page.  -->
</body>
</html>