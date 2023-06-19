<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>

<?php
include("dbConnect.php");
if(isset($_POST['rd']) && isset($_POST['rd'])!='')
{
    $query = "select * from courses";
    $result = mysqli_query($conn,$query);
    $content = "<div class='container mt-5'> <div class='row'>";
    while($data=mysqli_fetch_assoc($result))
    {
        $content.= "<div class='col-md-3'>
        <div class='card'>
        <div class='card-body d-flex flex-column'>
          <h5 class='card-title'>".$data['name']."</h5>
          <p class='card-text overflow-auto' style='text-align: justify;'>".$data['description']."</p>";
          if($data['total_reviews']=='')
          {
            $content.="<strong><p class='card-text overflow-auto' style='text-align: justify;'> Total Reviews 0.0 </p></strong>";        
          }
          else
          {
            $content.="<div class='mt-auto'>
            <strong><p class='card-text overflow-auto' style='text-align: justify;'> Total Reviews ".$data['total_reviews']." </p></strong></div>";
          }
          if($data['average_rating']=='')
          {
            $content.= "<strong><p class='card-text overflow-auto' style='text-align: justify;'> Not rated yet </p> </strong>";
          }
          else
          {
            if($data['average_rating']==1 || $data['average_rating']<=1.9)
            {
              $content.= "<div id='rating-container'>
              <span class='rating-star active' data-rating='1' id='public_ratings'>&#9733;</span>
              <span class='rating-star' data-rating='2' id='public_ratings'>&#9733;</span>
              <span class='rating-star' data-rating='3' id='public_ratings'>&#9733;</span>
              <span class='rating-star' data-rating='4' id='public_ratings'>&#9733;</span>
              <span class='rating-star' data-rating='5' id='public_ratings'>&#9733;</span>
              </div>
              <strong><p class='card-text overflow-auto' style='text-align: justify; font-size:5px;''>".$data['average_rating']." </p> </strong>";
            }
            else if($data['average_rating']==2 || $data['average_rating']<=2.9)
            {
              $content.= "<div id='rating-container'>
              <span class='rating-star active' data-rating='1' id='public_ratings'>&#9733;</span>
              <span class='rating-star active' data-rating='2' id='public_ratings'>&#9733;</span>
              <span class='rating-star' data-rating='3' id='public_ratings'>&#9733;</span>
              <span class='rating-star' data-rating='4' id='public_ratings'>&#9733;</span>
              <span class='rating-star' data-rating='5' id='public_ratings'>&#9733;</span>
              </div>
              <strong><p class='card-text overflow-auto' style='text-align: justify; font-size:5px;''>".$data['average_rating']." </p> </strong>";
            }
            else if($data['average_rating']==3 || $data['average_rating']<=3.9)
            {
              $content.= "<div id='rating-container'>
              <span class='rating-star active' data-rating='1' id='public_ratings'>&#9733;</span>
              <span class='rating-star active' data-rating='2' id='public_ratings'>&#9733;</span>
              <span class='rating-star active' data-rating='3' id='public_ratings'>&#9733;</span>
              <span class='rating-star' data-rating='4' id='public_ratings'>&#9733;</span>
              <span class='rating-star' data-rating='5' id='public_ratings'>&#9733;</span>
              </div>
              <strong><p class='card-text overflow-auto' style='text-align: justify; font-size:5px;''>".$data['average_rating']." </p> </strong>";
            }
            else if($data['average_rating']==4 || $data['average_rating']<=4.9)
            {
              $content.= "<div id='rating-container'>
              <span class='rating-star active' data-rating='1' id='public_ratings'>&#9733;</span>
              <span class='rating-star active' data-rating='2' id='public_ratings'>&#9733;</span>
              <span class='rating-star active' data-rating='3' id='public_ratings'>&#9733;</span>
              <span class='rating-star active' data-rating='4' id='public_ratings'>&#9733;</span>
              <span class='rating-star' data-rating='5' id='public_ratings'>&#9733;</span>
              </div>
              <strong><p class='card-text overflow-auto' style='text-align: justify; font-size:5px;''>".$data['average_rating']." </p> </strong>";
            }
            else if($data['average_rating']==5 || $data['average_rating']<=5.9)
            {
              $content.= "<div id='rating-container'>
              <span class='rating-star active' data-rating='1' id='public_ratings'>&#9733;</span>
              <span class='rating-star active' data-rating='2' id='public_ratings'>&#9733;</span>
              <span class='rating-star active' data-rating='3' id='public_ratings'>&#9733;</span>
              <span class='rating-star active' data-rating='4' id='public_ratings'>&#9733;</span>
              <span class='rating-star active' data-rating='5' id='public_ratings'>&#9733;</span>
              </div>
              <strong><p class='card-text overflow-auto' style='text-align: justify; font-size:5px;'>".$data['average_rating']." </p> </strong>";
            }
          }

          $content.="
          <div class='mt-auto'>
            <div id='average_rating'>  </div>
            <a href='courseDescription.php?id=$data[id]' class='btn btn-primary'>Give review</a>
            <input type='hidden' id='course_hidden_id' value='$data[id]'>
          </div>
        </div>
      </div></div>";
    }
    $content.= "</div></div>";
    echo $content;
}
?>
 </div>
  </div>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap Javascript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- JS Script CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
</body>
</html>