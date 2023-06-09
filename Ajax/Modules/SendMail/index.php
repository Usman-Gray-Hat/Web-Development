<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Toaster CSS File -->
    <link rel="stylesheet" href="toaster.css">
</head>
<style>
    *{
        font-family:sans-serif;
        font-size:15px;
    }

    h1
    {
        font-weight:900;
    }

    .container
    {
        margin-top:40px;
    }

    #usmanCard:hover 
    {
        transform: scale(1.05);
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    #usmanCard 
    {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card shadow" id="usmanCard">
                    <div class="card-header">
                        <h1 class="text-center">SEND EMAIL</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" id="myForm" autocomplete="off">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control" required>

                            <label for="" class="mt-2">Email</label>
                            <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" required>

                            <label for="" class="mt-2">Subject</label>
                            <input type="text" name="subject" id="subject" placeholder="Enter Subject" class="form-control" required>

                            <label for="" class="mt-2">Message</label>
                            <textarea name="message" id="message" cols="30" rows="5" placeholder="Enter Message" class="form-control" required></textarea>

                            <label for="" class="mt-2">Attachment</label> <br>
                            <input type="file" name="file" id="file"> <br>

                            <button type="submit" class="btn btn-outline-primary mt-2" id="btnSend">Send <div id="loader"></div></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- Toaster JS File -->
    <script src="toaster.js"></script>
    <!-- Scripting -->
    <script type="text/javascript">

    // Toaster Customizable Options
    toastr.options =
    {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

        // Email Send
        $("#myForm").submit(function(e){
            e.preventDefault();
            $("#loader").addClass("spinner-border spinner-border-sm");
            var formData = new FormData(this);
            $.ajax({
                type: "post",
                url: "process.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data,status) 
                {
                    if(data==1)
                    {
                        toastr.success("Email has been sent");
                        $("#myForm input,textarea").val("");
                        $("#loader").removeClass("spinner-border spinner-border-sm");
                    }
                    else if(data==0)
                    {
                        toastr.error("Email has not been sent");
                    }
                }
            });
        });
    </script>
</body>
</html>