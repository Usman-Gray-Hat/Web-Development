<?php
include('dbConnect.php');
if(isset($_POST['name']) && isset($_POST['name'])!='')
{
    $name = $_POST['name'];
    $query = "select * from students where name like '%$name%'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);

    $name_list = "<ul class='list-unstyled'>";

    if($row>0)
    {
        while($data=mysqli_fetch_assoc($result))
        {
            $name_list .= "<li>".$data['name']."</li>";
        }
    }
    $name_list .= "</ul>";
    echo $name_list;
}
?>