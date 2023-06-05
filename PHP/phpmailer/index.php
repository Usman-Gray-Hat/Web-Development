<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Send Mail</title>
</head>
<body>

    <!-- Bootstrap Grid System -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <!-- Bootstrap Card -->
                <div class="card">
                    <!-- Card Header -->
                    <div class="card-header">
                        <h1 class="text-center" style="font-weight:900;">SEND MAIL</h1>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Form -->
                        <form action="sendmail.php" method="POST" enctype="multipart/form-data">
                            <!-- Recipient Email -->
                            <label for="">Email To:</label>
                            <input type="text" name="email" placeholder="Enter Recipient Email" class="form-control" required>
                            <!-- Email Subject -->
                            <label for="" class="mt-2">Subject:</label>
                            <input type="text" name="subject" placeholder="Enter Subject" class="form-control">
                            <!-- Message -->
                            <label for="" class="mt-2">Message:</label>
                            <textarea name="message" cols="30" rows="5" placeholder="Enter Message" class="form-control"></textarea>
                            <!-- Attachment -->
                            <label for="" class="mt-2">Add Attachment</label> <br>
                            <input type="file" name="image">
                            <!-- Send Button -->
                            <button type="submit" name="btnSend" class="btn btn-outline-primary btn-block mt-2">Send Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>