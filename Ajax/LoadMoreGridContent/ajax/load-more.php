<?php
include("../Database/dbConnect.php");
if(isset($_POST['id']))
{
    function getMaxId()
    {
        global $conn;
        $query = "SELECT MAX(id) AS max_id FROM users";
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($result);
        return $data['max_id'];
    }
    $id = $_POST['id'];
    $query = "select * from users where id > '$id' order by id limit 8";
    $result = mysqli_query($conn,$query);
    // 1st row
    $card = "<div class='row'>";
    while($data=mysqli_fetch_assoc($result))
    {
        $card.= "<div class='col-md-3'>
        <div class='card shadow'>
        <div class='card-header'>
        <h2 class='card-title text-center'>".$data['name']."</h2>
        </div>
        <div class='card-body'>
        <p>ID: ".$data['id']." </p>
        <p>Email: ".$data['email']." </p>
        <p>Gender: ".$data['gender']." </p>
        <p>Age: ".$data['age']." </p>
        <p>City: ".$data['city']." </p>
        <p>Salary: ".$data['salary']." </p>
                </div>
            </div><br>
        </div>";
    $id = $data['id'];
    }
    $card.= "</div>"; // 1st row ends
    if($id < getMaxId())
    {
        // 2nd row
        $card.= "<div class='row' id='remove_row'>
        <div class='col-md-12'>
        <button type='button' class='btn btn-outline-primary mt-3' id='load-more' data-id='$id'>Load more</button>
        </div>
      </div>"; // 2nd row ends
    }
    echo $card;
}
?>