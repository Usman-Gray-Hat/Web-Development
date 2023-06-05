<?php
include('dbConnect.php');
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
      <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <form action="" method="post">
                    <label for="">Roll Number</label>
                    <input type="number" name="" id="rollNo" onkeyup="GetDetail(this.value)" class="form-control" placeholder="Enter Roll No">
                    <br><br>

                    <label for="">Name</label>
                    <input type="text" name="" id="studentName" onkeyup="GetDetails(this.value)" class="form-control" placeholder="Enter Name">
                    <br><br>

                    <label for="">Class</label>
                    <input type="text" name="" id="ClassName" class="form-control" placeholder="Enter Class">
                    <br><br>
                </form>
            </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- By ID -->
    <script>
        function GetDetail(str){
            if(str.length == 0){
                document.getElementById("studentName").value = "";
                document.getElementById("ClassName").value="";
                return;
            }
            else{
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        document.getElementById("studentName").value = myObj[0];
                        document.getElementById("ClassName").value = myObj[1];
                    }
                }
                xmlhttp.open("GET","SearchByRollNo.php?rollNo=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

   <!-- By Name -->
<script>
        function GetDetails(str){
            if(str.length == 0){
                document.getElementById("rollNo").value = "";
                document.getElementById("ClassName").value="";
                return;
            }
            else{
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        document.getElementById("rollNo").value = myObj[0];
                        document.getElementById("ClassName").value = myObj[1];
                    }
                }
                xmlhttp.open("GET","SearchByName.php?studentName=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
  </body>
</html>