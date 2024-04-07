<?php
include 'Config.php';
$id=$_GET['id'];
$delete="DELETE  FROM books where bookID ='$id'";
$delete_query=mysqli_query($con,$delete);
header('location:view.php');
?>