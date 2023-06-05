<?php
include('dbConnect.php');
$query = "select * from STUDENT";
$result = mysqli_query($conn,$query);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <!-- Using Bootstrap Grid System -->
    <div class="container" style="margin-top:50px">
        <div class="row">
            <div class="col-md-10 mx-auto">

               <!-- Bootstrap Card -->
                <div class="card">

                <!-- Bootstrap Card Header -->
                    <div class="card-header">
                        <span>
                        <h1 class="text-center" style="font-weight:900; letter-spacing:3px;">STUDENT RECORD</h1>
                        <a href="ExportStudentReport.php" class="btn btn-success float-right" title="Export records in excel sheet">Export</a>
                        </span>
                    </div>

                    <!-- Bootstrap Card Body -->
                    <div class="card-body">

                        <!-- Table -->
                        <table class="table table-bordered table-hover table-striped">
                            <thead>

                                <!-- Headings -->
                                <th class='text-center'>ID</th>
                                <th class='text-center'>NAME</th>
                                <th class='text-center'>GENDER</th>
                                <th class='text-center'>AGE</th>
                                <th class='text-center'>EMAIL</th>
                                
                            </thead>

                            <?php
                            while($data=mysqli_fetch_assoc($result))
                            {
                                echo "<tr>
                                <td class='text-center'>".$data['ID']."</td>
                                <td class='text-center'>".$data['NAME']."</td>
                                <td class='text-center'>".$data['GENDER']."</td>
                                <td class='text-center'>".$data['AGE']."</td>
                                <td class='text-center'>".$data['EMAIL']."</td>
                                </tr>";
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>