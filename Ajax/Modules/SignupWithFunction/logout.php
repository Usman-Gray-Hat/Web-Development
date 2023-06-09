<?php
include('dbConfig.php');
session_destroy();
header("Location:index.php");
?>