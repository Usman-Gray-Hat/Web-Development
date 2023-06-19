<?php
include("dbConnect.php");
if(isset($_POST['rd']) && isset($_POST['rd'])!='')
{
    // Extracting Course Name
    $course_id = $_POST['course_id'];
    $query = "SELECT * FROM courses WHERE id='$course_id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $course_name = $data['name'];

    if($course_name!='')
    {
        $query = "select * from course_ratings where course_name='$course_name'";
        $result = mysqli_query($conn,$query);
        $ratings = "";
        while($data=mysqli_fetch_assoc($result))
        {
            $ratings.= "<h5>".$data['username']."</h5>
            <p>".$data['review']."</p>
            <p>".$data['date_created']."</p>";
            if($data['rating']=='1')
            {
                $ratings.="<div id='rating-container'>
                <span class='rating-star active' data-rating='1' id='public_ratings'>&#9733;</span>
                <span class='rating-star' data-rating='2' id='public_ratings'>&#9733;</span>
                <span class='rating-star' data-rating='3' id='public_ratings'>&#9733;</span>
                <span class='rating-star' data-rating='4' id='public_ratings'>&#9733;</span>
                <span class='rating-star' data-rating='5' id='public_ratings'>&#9733;</span>
                </div>";
            }
            else if($data['rating']=='2')
            {
                $ratings.="<div id='rating-container'>
                <span class='rating-star active' data-rating='1' id='public_ratings'>&#9733;</span>
                <span class='rating-star active' data-rating='2' id='public_ratings'>&#9733;</span>
                <span class='rating-star' data-rating='3' id='public_ratings'>&#9733;</span>
                <span class='rating-star' data-rating='4' id='public_ratings'>&#9733;</span>
                <span class='rating-star' data-rating='5' id='public_ratings'>&#9733;</span>
                </div>";
            }
            else if($data['rating']=='3')
            {
                $ratings.="<div id='rating-container'>
                <span class='rating-star active' data-rating='1' id='public_ratings'>&#9733;</span>
                <span class='rating-star active' data-rating='2' id='public_ratings'>&#9733;</span>
                <span class='rating-star active' data-rating='3' id='public_ratings'>&#9733;</span>
                <span class='rating-star' data-rating='4' id='public_ratings'>&#9733;</span>
                <span class='rating-star' data-rating='5' id='public_ratings'>&#9733;</span>
                </div>";
            }
            else if($data['rating']=='4')
            {
                $ratings.="<div id='rating-container'>
                <span class='rating-star active' data-rating='1' id='public_ratings'>&#9733;</span>
                <span class='rating-star active' data-rating='2' id='public_ratings'>&#9733;</span>
                <span class='rating-star active' data-rating='3' id='public_ratings'>&#9733;</span>
                <span class='rating-star active' data-rating='4' id='public_ratings'>&#9733;</span>
                <span class='rating-star' data-rating='5' id='public_ratings'>&#9733;</span>
                </div>";
            }
            else if($data['rating']=='5')
            {
                $ratings.="<div id='rating-container'>
                <span class='rating-star active' data-rating='1' id='public_ratings'>&#9733;</span>
                <span class='rating-star active' data-rating='2' id='public_ratings'>&#9733;</span>
                <span class='rating-star active' data-rating='3' id='public_ratings'>&#9733;</span>
                <span class='rating-star active' data-rating='4' id='public_ratings'>&#9733;</span>
                <span class='rating-star active' data-rating='5' id='public_ratings'>&#9733;</span>
                </div>";
            }
            $ratings.="<hr>";
        }
        echo $ratings;
    }
}
?>