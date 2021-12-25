<?php
echo "hello world";
include "db.php";
error_reporting(0);
session_start(); 
if(!isset($_SESSION['username'])){
    echo "<script>  alert('Please Login to continue!'); </script>";
    header('Location: home.php');
}
//else{}
?>
