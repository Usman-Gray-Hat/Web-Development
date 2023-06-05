<?php
session_start();
include('dbConnection.php');
session_destroy();
header("Location:Login.php");
?>