<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    *{
        font-family: sans-serif;
    }
    h1{
        font-weight:900;
        letter-spacing:2px;
    }
</style>
<body>


    <!-- Bootstrap Grid System -->
    <div class="container mt-2">
        <div class="row"> <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="jumbotron bg-dark text-center text-white">SET VALUES IN CUSTOM ATTRIBUTES USING JQUERY</h1>
            </div>
        </div>

        <div class="row mt-5"> <!-- 2nd Row -->
            <div class="col-md-5 mx-auto">
                <!-- HTML Form -->
                <form action="" method="POST">
                    <input type="text" name="product" id="product" placeholder="Enter Product Name" class="form-control">
                    <br>
                    <button type="button" class="btn btn-outline-info btn-block" id="btnSet">Set Value In Custom Attributes</button>
                    <button type="button" class="btn btn-outline-primary btn-block" id="btnSubmit">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Scripting -->
    <script type="text/javascript">
        $(document).ready(function () {

            // Set Button
            $("#btnSet").click(function(){
                // (Setting Values in custom/user-defined attributes).
                $("#product").attr("productCode",1001);
                $("#product").attr("price",70000);
                $("#product").attr("weight","300 Kilo Gram");

            });

            // Submit Button
            $("#btnSubmit").click(function(){
                var name = $("#product").val();

                // (Getting values from custom/user-defined attributes).
                var productCode = $("#product").attr("productCode");
                var price = $("#product").attr("price");
                var weight = $("#product").attr("weight");
                
                // Printing all values through alert message.
                alert("Product name is: "+name);
                alert("Product Code is: "+productCode);
                alert("Product price is: "+price);
                alert("Product weight is: "+weight);
            });
        });
    </script>
</body>
</html>