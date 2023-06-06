<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Enable Button Using Checkbox</title>
</head>
<style>
    *{
        font-family:sans-serif;
    }
    h1{
        font-weight:900;
        letter-spacing:2px;
    }
    label{
        font-size:15px;
    }
</style>
<body>

    <!-- Bootstrap Grid System -->
    <div class="container mt-2"> <!-- Container 1 -->
        <div class="row"> <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="jumbotron text-center text-white bg-dark">ENABLE SUBMIT BUTTON BY CHECKING CHECKBOXES</h1>
            </div>
        </div>

        <div class="row mt-4"> <!-- 2nd Row -->
        <div class="col-md-4 mx-auto">

            <!-- Heading -->
            <h2> Please select all 3 packages</h2>

            <!-- Checkboxes -->
            <input type="checkbox" name="package" id="">
            <label for="">Package 1</label>
            <br>

            <input type="checkbox" name="package" id="">
            <label for="">Package 2</label>
            <br>

            <input type="checkbox" name="package" id="">
            <label for="">Package 3</label>
            <br>

            <!-- Button -->
            <button type="button" class="btn btn-secondary" id="btn1" disabled>Submit</button>
        </div>
        </div>
    </div>


    <!-- Container 2 -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mx-auto">

                <!-- Text Field For Name -->
                <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                <br>

                <!-- Checkbox For Terms & Conditions -->
                <input type="checkbox" name="policy" id="policy">
                <label for="">Will you accept our terms & conditions?</label>
                <br>

                <!-- Button -->
                <button type="button" class="btn btn-outline-success" id="btn2" disabled>Submit</button>
            </div>
        </div>
    </div>


    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

    <!-- Scripting -->
    <script type="text/javascript">

        $(document).ready(function () {

            // For above three packages
            $("input[name='package']").change(function(){
                var length = $("input[name='package']:checked").length;
                if(length==3)
                {
                    $("#btn1").attr("disabled",false);
                }
                else
                {
                    $("#btn1").attr("disabled",true);
                }
            });

            // Enable submit button after accepting terms & conditions.. 
            $("input[name='policy']").change(function(){
            var length2 = $("input[name='policy']:checked").length;
            if(length2>0)
            {
                $("#btn2").attr("disabled",false);
            }
            else
            {
                $("#btn2").attr("disabled",true);
            }
        });

            // Btn1
            $("#btn1").click(function(){
                alert("All packages selected successfully.!");
            });

            // Btn2
            $("#btn2").click(function(){
                var name = $("#name").val();
                if(name=="")
                {
                    alert("Name field can't be empty.");
                }
                else
                {
                    alert("You successfully registered Mr."+name);
                }
            });   

        });
    </script>
</body>
</html>