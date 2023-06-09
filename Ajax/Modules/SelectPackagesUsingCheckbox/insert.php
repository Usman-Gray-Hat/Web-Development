<?php
include('dbConfig.php');
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['contact_no']) && isset($_POST['total']) && isset($_POST['packages']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $total = $_POST['total'];
    $packages = $_POST['packages'];

    $query = "insert into package (username,email,contact_no,package_name,total)
    values ('$username','$email','$contact_no','<ol>$packages</ol>','$total')";
    mysqli_query($conn,$query);

    /*
    Note: If you want to display Packages without number or bullets formatiing,
    then use add class 'list-unstyled' in <ul></ul> or <ol></ol> tag.
    Example:

    $query = "insert into package (username,email,contact_no,package_name,total)
    values ('$username','$email','$contact_no','<ol class=list-unstyled>$packages</ol>','$total')";
    */
}
?>