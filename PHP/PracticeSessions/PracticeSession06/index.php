<?php
include('dbConnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
<body>
    <div class="container" style="margin-top:50px;">

    <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-bold text-uppercase jumbotron">crud application using jquery & ajax</h1>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">All Records</h1>
                <button type="button" class="btn btn-info float-right" data-bs-toggle="modal" data-bs-target="#insertModal">Add New Record</button>
            </div>
        </div>



        <div class="row">
            <div class="col-md-12">
            <div id="records">
            <!-- Table will be shown here -->
               </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="insertModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">INSERT RECORD FORM</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"> &times; </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="text" id="name" placeholder="Enter Full Name" class="form-control">
                        <br>

                        <input type="text" id="fname" placeholder="Enter Father Name" class="form-control">
                        <br>

                        <input type="number" id="age" placeholder="Enter Age" class="form-control">
                        <br>

                        <input type="number" id="fees" placeholder="Enter Tuition Fees" class="form-control">
                        <br>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="add()">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="updateModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">UPDATE RECORD FORM</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"> &times; </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="text" id="update_name" placeholder="Enter Full Name" class="form-control">
                        <br>

                        <input type="text" id="update_fname" placeholder="Enter Father Name" class="form-control">
                        <br>

                        <input type="number" id="update_age" placeholder="Enter Age" class="form-control">
                        <br>

                        <input type="number" id="update_fees" placeholder="Enter Tuition Fees" class="form-control">
                        <br>
                </div>

                <div class="modal-footer">
                    <input type="hidden" id="hidden_id">
                    <button type="button" class="btn btn-warning" onclick="update()">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">

function readRecords()
    {
        var rd = "rd";
        $.ajax({
            type: "post",
            url: "retrieve.php",
            data: {rd:rd},
            success: function (data,status) 
            {
                $('#records').html(data);
            }
        });
    }



    function add()
    {
        var name = $('#name').val();
        var fname = $('#fname').val();
        var age = $('#age').val();
        var fees = $('#fees').val();

        if(name=='' || fname=='' || age=='' || fees=='')
        {
            alert('All fields are required..!');
        }
        else
        {
            $.ajax({
                type:"post",
                url:"insert.php",
                data:{name:name, fname:fname, age:age, fees:fees},
                success:function(data,status) 
                {
                    readRecords();
                    $('#insertModal input').val("");
                    $('#insertModal').modal("hide");
                }
            });
        }
    }


    function EditUser(id1)
    {
        $('#hidden_id').val(id1);
        $.ajax({
            type:"post",
            url:"edit.php",
            data:{id1:id1},
            success: function (data,status) 
            {
                var obj = JSON.parse(data);
                $('#update_name').val(obj.name);
                $('#update_fname').val(obj.father_name);
                $('#update_age').val(obj.age);
                $('#update_fees').val(obj.fee);
            }
        });
        $('#updateModal').modal("show");
    }


    function update()
    {
        var hidden_id = $('#hidden_id').val();
        var update_name = $('#update_name').val();
        var update_fname = $('#update_fname').val();
        var update_age = $('#update_age').val();
        var update_fees = $('#update_fees').val();

        if(update_name =="" || update_fname=="" || update_age=="" || update_fees=="")
        {
            alert('All fields are required');
        }
        else
        {
            $.ajax({
                type: "post",
                url: "update.php",
                data: {hidden_id:hidden_id, update_name:update_name, update_fname:update_fname, update_age:update_age, update_fees:update_fees},
                success: function (data,status) 
                {
                    $('#updateModal').modal("hide");
                    readRecords();
                }
            });
        }
    }
    

    function DeleteUser(id2)
    {
        var conf = confirm("Are you sure you want to delete this record??");
        if(conf==true)
        {
            $.ajax({
                type: "post",
                url: "delete.php",
                data: {id2:id2},
                success: function (data,status) 
                {
                    readRecords();
                }
            });
        }
    }

</script>

<script>
    $(document).ready(function () {
        readRecords();
    });
</script>
</html>