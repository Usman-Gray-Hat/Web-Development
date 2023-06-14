<?php
include("dbConnect.php");
if(isset($_POST['username']) && isset($_POST['review']) && isset($_POST['course_id']))
{
    // Extracting course name
    $course_id = $_POST['course_id'];
    $query = "select * from courses where id='$course_id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $course_name = $data['name'];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $query = "insert into course_ratings (course_name,username,email,contact,review,rating) 
    values ('$course_name','$username','$email','$contact','$review','$rating')";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        // Find average rating
        $query = "SELECT AVG(rating) AS average_rating FROM course_ratings where course_name='$course_name'";
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($result);
        $average_rating = round($data['average_rating'],1);

        // Count total reviews
        $count_review_query = mysqli_query($conn,"SELECT COUNT(review) as total_reivews FROM course_ratings WHERE course_name='$course_name'"); 
        $count_data = mysqli_fetch_assoc($count_review_query);
        $total_reviews = $count_data['total_reivews'];

        // Update average rating into their respective courses
        $update_query = "update courses set average_rating='$average_rating', total_reviews='$total_reviews' where id='$course_id'";
        $exec2 = mysqli_query($conn,$update_query);
        if($exec2==true)
        {
            echo "Review Added!";
        }
        else
        {
            echo "Review Not Added!";;
        }
    }
}
?>