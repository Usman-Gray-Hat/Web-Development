<?php
include("dbConnect.php");
$id = $_GET['id']??"";
$query = "select * from courses where id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Courses</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
.rating-star {
  cursor: pointer;
  font-size: 30px;
}

#public_ratings {
  cursor: default;
  font-size: 20px;
}

.rating-star.active {
  color: green;
}
    </style>
</head>
<body>

    <!-- Bootstrap Grid System -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="card-title"> <?php echo $data['name']; ?> </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-text" style="text-align: justify;">
                            <strong>
                                <?php echo $data['description']; ?>
                            </strong>
                        </div>
                        <div id="rating-container">
                            <div class="card-text text-center">
                                <span class="rating-star main" id="star1" data-rating="1">&#9733;</span>
                                <span class="rating-star main" id="star2" data-rating="2">&#9733;</span>
                                <span class="rating-star main" id="star3" data-rating="3">&#9733;</span>
                                <span class="rating-star main" id="star4" data-rating="4">&#9733;</span>
                                <span class="rating-star main" id="star5" data-rating="5">&#9733;</span>
                        <br> <b id="txt"> <!-- Rating text will be shown here --> </b>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
                <div id="loadRatings"> <!-- New Ratings will be loaded here --> </div>
            </div>
        </div>
    </div>

        <!-- Rating Modal -->
        <div class="modal fade" id="ratingModal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                            <h1 class="modal-title">ADD YOUR REVIEW</h1>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <input type="hidden" id="course_id" value="<?php echo $data['id']; ?>">
                    <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Enter Full Name">
                    <input type="text" name="email" id="email" class="form-control mb-3" placeholder="Enter Email">
                    <input type="number" name="contact" id="contact" class="form-control mb-3" placeholder="Enter Contact">
                    <textarea name="review" id="review" class="form-control" placeholder="Enter Review" cols="10" rows="5"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" class="btn btn-outline-primary">Save</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
      
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap Javascript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- JS Script CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    var rating;
    var course_id;
    $('.rating-star').click(function() {
    $("#txt").text("");
    $("#ratingModal").modal("show");
    rating = $(this).attr('data-rating');
    $('.rating-star.main').removeClass('active');
    $('.rating-star.main').each(function() {
    if($(this).attr('data-rating') <= rating) 
    {
      $(this).addClass('active');
    }
  });
  if(rating==1)
  {
    $("#txt").text("Very bad");
  }
  else if(rating==2)
  {
    $("#txt").text("Poor");
  }
  else if(rating==3)
  {
    $("#txt").text("OK");
  }
  else if(rating==4)
  {
    $("#txt").text("Good");
  }
  else if(rating==5)
  {
    $("#txt").text("Excellent");
  }
});

// On Hover
$("#star1").mouseenter(function(){
    $("#txt").text("Very bad");
    $("#star1").css("color","green");
});
$("#star2").mouseenter(function(){
    $("#txt").text("Poor");
    $("#star1").css("color","green");
    $("#star2").css("color","green");
});
$("#star3").mouseenter(function(){
    $("#txt").text("OK");
    $("#star1").css("color","green");
    $("#star2").css("color","green");
    $("#star3").css("color","green");
});
$("#star4").mouseenter(function(){
    $("#txt").text("Good");
    $("#star1").css("color","green");
    $("#star2").css("color","green");
    $("#star3").css("color","green");
    $("#star4").css("color","green");
});
$("#star5").mouseenter(function(){
    $("#txt").text("Excellent");
    $("#star1").css("color","green");
    $("#star2").css("color","green");
    $("#star3").css("color","green");
    $("#star4").css("color","green");
    $("#star5").css("color","green");
});

// Off Hover
$("#star1").mouseleave(function(){
    $("#txt").text("Please select");
    $("#star1").css("color","black");
});
$("#star2").mouseleave(function(){
    $("#txt").text("Please select");
    $("#star1").css("color","black");
    $("#star2").css("color","black");
});
$("#star3").mouseleave(function(){
    $("#txt").text("Please select");
    $("#star1").css("color","black");
    $("#star2").css("color","black");
    $("#star3").css("color","black");
});
$("#star4").mouseleave(function(){
    $("#txt").text("Please select");
    $("#star1").css("color","black");
    $("#star2").css("color","black");
    $("#star3").css("color","black");
    $("#star4").css("color","black");
});
$("#star5").mouseleave(function(){
    $("#txt").text("Please select");
    $("#star1").css("color","black");
    $("#star2").css("color","black");
    $("#star3").css("color","black");
    $("#star4").css("color","black");
    $("#star5").css("color","black");
});

        $("#btnSave").click(function(){
        let course_id = $("#course_id").val();
        let username = $("#name").val();
        let email = $("#email").val();
        let contact = $("#contact").val();
        let review = $("#review").val();
        if(username=='')
        {
            alert("Name is required!");
        }
        else
        {
            if(email=='')
            {
                alert("Email is required!");
            }
            else
            {
                if(review=='')
                {
                    alert("Review is required!");
                }
                else
                {
                    $.ajax({
                        type: "post",
                        url: "addReview.php",
                        data: {course_id:course_id, username:username, email:email, contact:contact, review:review, rating:rating},
                        success: function (data,status) 
                        {
                            if(data=="Review Added!")
                            {
                                readRecord();
                                $('.rating-star').removeClass('active');
                                $("input,textarea").val("");
                                $("#ratingModal").modal("hide");
                                $("#txt").text("");
                            } 
                            else if(data=="Review Not Added!")
                            {
                                alert(data);
                            }
                        }
                    });
                }
            }
        }
    });

    function readRecord()
    {
        let rd = 'rd';
        course_id = $("#course_id").val();
        $.ajax({
            type: "post",
            url: "fetchRatings.php",
            data: {rd:rd, course_id:course_id},
            success: function (data,status) 
            {
                $("#loadRatings").html(data);
            }
        });
    }

    $(document).ready(function () {
        $("#txt").text("Please select");
        course_id = $("#course_id").val();
        readRecord();
    });
    </script>
</body>
</html>