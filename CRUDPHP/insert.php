<?php
include 'Config.php';

//on click do 
//if isset = if clicked
if(isset($_POST[ 'insert_btn'])){
    $title=$_POST['bookTitle'];
    $author=$_POST['bookAuthor'];
    $image=$_FILES['bookPhoto']['name'];
    $tmp_name=$_FILES['bookPhoto']['tmp_name'];
    $destination="images/".$image;
    move_uploaded_file($tmp_name, $destination);

    $insert = "INSERT INTO books (bookTitle,bookAuthor,bookPhoto) VALUES ('$title','$author','$image') ";
    $insert_query=mysqli_query($con,$insert);

    if($insert_query){
       echo "DATA SAVED SuCCESSFULLY";
       header('location:view.php');
    }
    else {
        echo "PLEASE TRY AGAIN";
    }
}
?>