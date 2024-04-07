<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="bookTitle" placeholder="Book Title">
        <br><br>
        <input type="text" name="bookAuthor" placeholder="Book Author">
        <br><br>
        <input type="file" name="bookPhoto">
        <br><br>
        <input type="submit" name="insert_btn" value="Insert">
    </form>
    <br>
    <a href="view.php">View Books</a>
    
    <?php include 'insert.php'; ?>
</body>
</html>
