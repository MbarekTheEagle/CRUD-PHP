<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

.action-links {
    text-decoration: none;
    color: #007bff;
    margin-right: 10px;
}

.action-links:hover {
    text-decoration: underline;
    color: #0056b3;
}
a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #333;
            margin-top: 20px;
        }

        a:hover {
            color: #666;
        }
    </style>

<?php
include 'Config.php';

$select = "SELECT * FROM books";

$select_query=mysqli_query($con,$select);
$data=mysqli_num_rows($select_query);
?>
<a href="index.php">INSERT</a>
<hr>
<table>
    <tr>
        <th>Book Title</th>
        <th>Book Author</th>
        <th>Book Photo</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    if($data){
        while($row = mysqli_fetch_array($select_query)){
            ?>
            <tr>
                <td><?php echo $row['bookTitle']?></td>
                <td><?php echo $row['bookAuthor']?></td>
                <td><img src="images/<?php echo $row['bookPhoto']?>" width="200px"/></td>
                <td><a class="action-links" href="edit.php?id=<?php echo $row['bookID']?>">Edit</a></td>
                <td><a class="action-links" onclick="return confirm('ARE YOU SURE?')" href="delete.php?id=<?php echo $row['bookID']?>">Delete</a></td>
            </tr>
            <?php
        }
    }
    else {
        echo "<tr><td colspan='5'>No Record Found</td></tr>";
    }
    ?>
</table>

</body>
</html>
