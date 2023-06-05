<?php
session_start();
unset($_SESSION['token']);
if(!isset($_SESSION['token']))
{
    header("Location:index.php");
}
?>