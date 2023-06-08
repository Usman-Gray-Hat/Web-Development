<?php
include('dbConnect.php');
if(isset($_POST['name']) && isset($_POST['name'])!='')
{
    $name = $_POST['name'];
    $query = "select * from students where name like '%$name%'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);

    if($row>0)
    {
        $list = "<ul class='list-unstyled'>";
        while($data=mysqli_fetch_assoc($result))
        {
            $list .= "<li class='text-bold'>".$data['name']."</li>";
        }
        $list .= "</ul>";
        echo $list;
    }
}
?>