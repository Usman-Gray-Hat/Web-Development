<?php
include('dbConfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Data Table Style CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Sweet Alert2 CSS file -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
</head>
<style>
    *{
        font-family: sans-serif;
    }
    h1{
        font-weight:900;
        letter-spacing:2px;
    }
    label{
        font-size:17px;
        font-weight:bolder;
    }
</style>
<body>

    <!-- Bootstrap Grid System -->
    <div class="container mt-2">
        <div class="row"> <!-- 1st Row -->
            <div class="col-md-12">
                <h1 class="jumbotron text-center bg-dark text-white">GET MULTIPLE CHECKBOXES VALUES</h1>
            </div>
        </div>

        <div class="row"> <!-- 2nd Row -->
            <div class="col-md-12">
                <button type="button" class="btn btn-outline-info float-right" data-bs-toggle="modal" data-bs-target="#myModal">Add New Bucket</button>
            </div>
        </div>

        <div class="row mt-3"> <!-- 3rd Row -->
            <div class="col-md-12">
                <div id="tableRecords"> <!-- Table will be shown here without refreshing the page --> </div>
            </div>
        </div>
    </div>

    <!-- Modal Started -->
    <div class="modal fade" id="myModal" data-bs-backdrop="static">
        <!-- Modal Dialog -->
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!-- Modal Content -->
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">

                    <h1 class="text-center">SELECT YOUR BUCKET LIST</h1> <!-- Heading -->
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> &times; </button> <!-- Close Button -->

                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Form -->
                    <form action="" method="POST">

                        <!-- Apple -->
                        <input type="checkbox" name="fruits" id="fruits" value="&lt;li&gt;Apple&lt;/li&gt;" price="500">
                        <label for="">Apple 1KG <strong> $500.00 </strong> </label> 
                        <br>
                        
                        <!-- Banana -->
                        <input type="checkbox" name="fruits" id="fruits" value="&lt;li&gt;Banana&lt;/li&gt;" price="400">
                        <label for="">Banana 1KG <strong> $400.00 </strong> </label> 
                        <br>
                        
                        <!-- Mango -->
                        <input type="checkbox" name="fruits" id="fruits" value="&lt;li&gt;Mango&lt;/li&gt;" price="700">
                        <label for="">Mango 1KG <strong> $700.00 </strong> </label> 
                        <br>
                        
                        <!-- Oranges -->
                        <input type="checkbox" name="fruits" id="fruits" value="&lt;li&gt;Oranges&lt;/li&gt;" price="450">
                        <label for="">Oranges 1KG <strong> $450.00 </strong> </label> 
                        <br>
                        
                        <!-- Grapes -->
                        <input type="checkbox" name="fruits" id="fruits" value="&lt;li&gt;Grapes&lt;/li&gt;" price="200">
                        <label for="">Grapes 1KG <strong> $200.00 </strong> </label>
                        
                        <!-- Total Price -->
                        <div class="float-right" style="font-weight:900; font-size:30px;" id="total">Total: $0.00</div>

                        <!-- Hidden Fields -->
                        <input type="hidden" name="allFruits" id="allFruits"> <!-- All Fruits -->
                        <input type="hidden" name="finalTotal" id="finalTotal"> <!-- Final Total -->
                        
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" id="btnSubmit">Submit</button>
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                </form>
                </div>
            </div>
        </div>
    </div> <!-- Modal Ended -->

    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Data Table CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Sweet Alert2 JS file -->
    <script src="dist/sweetalert2.all.min.js"></script>

    <!-- Scripting -->
    <script type="text/javascript">

        $(document).ready(function () {

            $("input[name='fruits']").change(function(){

            var total = 0;
            var fruits = '';
            var length = $("input[name='fruits']:checked").length;
            if(length==0)
            {
                $("#total").text("Total: $0.00");
                $("#allFruits").val("");
                $("#finalTotal").val(0);
            }

                $("input[name='fruits']:checked").each(function(){
                    total = total + parseInt( $(this).attr("price") );
                    fruits = fruits + $(this).val();

                    $("#total").text("Total: $"+total+".00"); //For showing total in modal
                    $("#finalTotal").val(total); //For storing total in hidden field to use it later.
                    $("#allFruits").val(fruits); //For storing all fruits in hidden field to use it later.
                });


            });

            $("#btnSubmit").click(function(){
                var allFruits = $("#allFruits").val();
                var totalCost = $("#finalTotal").val();
                

                if(allFruits=='' || totalCost=='')
                {
                    alert('Select at least one');
                }
                else
                {
                    $.ajax({
                        type: "post",
                        url: "insert.php",
                        data: {allFruits:allFruits, totalCost:totalCost},
                        success: function (data,status) 
                        {
                            readRecords();
                            $("#myModal").modal("hide");
                        }
                    });
                }
            });

            function readRecords()
            {
                var rd = 'rd';
                if(rd!='')
                {
                    $.ajax({
                        type: "post",
                        url: "table.php",
                        data: {rd:rd},
                        success: function (data,status) 
                        {
                            $("#tableRecords").html(data);
                        }
                    });
                }
            }
            readRecords();
        });
 
    </script>

</body>
</html>