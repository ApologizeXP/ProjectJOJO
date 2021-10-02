<?php
include 'sever.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Travel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gluten:wght@100;300&display=swap" rel="stylesheet">
    <style>
        body{
            background-color: #ccffff;
        }
        .center {
            margin: auto;
            margin-top: 200px;
            width: 30%;
            background-color: #FFC106;
            border-radius: 12px;
            padding: 10px;
        }

        h1.a {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container center"  style="font-family: 'Gluten', cursive;">
        <h1 class="a" >Add Travel</h1>
        <?php
        if (isset($_SESSION['error'])) :
        ?>
            <h5 class="a" style="color: red">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </h5>
        <?php
        endif
        ?>
        <form action="addInformation_db.php" method="POST" enctype="multipart/form-data">
        <div class="mb-2">
                <label for="file" class="form-label">Picture</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <div class="mb-2">
                <label for="attraction" class="form-label">Attraction Name</label>
                <input type="text" class="form-control" id="attraction" name="attraction">
            </div>
            <div class="mb-2">
                <label for="history" class="form-label">History</label>
                <textarea type="text" class="form-control" id="history" name="history" rows="4" cols="50"></textarea>
            </div>
            <div class="mb-2">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-2">
                <label for="link" class="form-label">Link Location</label>
                <input type="text" class="form-control" id="link" name="link" >
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" name="addtravel" class="btn btn-info">Submit</button>
            </div>
            
        </form>
    </div>
</body>

</html>