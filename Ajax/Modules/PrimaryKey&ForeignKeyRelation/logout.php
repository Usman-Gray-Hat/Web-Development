<?php
include("dbConnect.php");
session_destroy();
header("location:index.html");
?>