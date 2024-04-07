<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        form {
    width: 50%;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

form input[type="text"],
form input[type="file"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    display: block;
}

form input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

form img {
    display: block;
    margin-top: 10px;
    max-width: 100%;
}

    </style>

<?php
include 'Config.php';
$id = $_GET['id'];

$select = "SELECT * FROM books WHERE bookID = '$id'";
$select_query = mysqli_query($con, $select);

$fetch = mysqli_fetch_array($select_query);
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="bookTitle" value="<?php echo $fetch['bookTitle']?>">
    <br><br>
    <input type="text" name="bookAuthor" value="<?php echo $fetch['bookAuthor']?>">
    <br><br>
    <input type="file" name="bookPhoto">
    <img src="images/<?php echo $fetch['bookPhoto']?>" width="300px">
    <br><br>
    <input type="submit" name="update_btn" value="Update">
</form>

<?php
if(isset($_POST['update_btn'])){
    $title = $_POST['bookTitle'];
    $author = $_POST['bookAuthor'];
    $image = $_FILES['bookPhoto']['name'];
    $tmp_name = $_FILES['bookPhoto']['tmp_name'];
    $destination = "images/".$image;
    if($image !=""){
        move_uploaded_file($tmp_name, $destination);
        $update = "UPDATE books SET bookTitle='$title', bookAuthor='$author', bookPhoto='$image' WHERE bookID='$id'";
        $update_query = mysqli_query($con, $update);
        header('location:view.php');
    }
    else{
        $update = "UPDATE books SET bookTitle='$title', bookAuthor='$author' WHERE bookID='$id'";
        $update_query = mysqli_query($con, $update);
        header('location:view.php');
    }
}
?>

</body>
</html>
